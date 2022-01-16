<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class ProductController extends ResourceController
{
    use ResponseTrait;
    protected $helpers = ['my_helper'];
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $productModel = new ProductModel();
        $data = $productModel->findAll();
        if (!$data) return $this->respond(successRespond('Data tidak ditemukan'));
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $productModel = new ProductModel();
        $data = $productModel->find($id);
        if (!$data) return $this->respond(successRespond('Data tidak ditemukan'));
        return $this->respond($data);
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $productModel = new ProductModel();
        $request = $this->request;
        if ($request) {
            if ($request->getJSON()) {
                $json = $request->getJSON();
                try {
                    $productModel->transStart();
                    $productModel->insert([
                        'title' => $json->title,
                        'price' => $json->price,
                    ]);
                    $productModel->transComplete();
                    return $this->respond(successRespond());
                } catch (Exception $e) {
                    return $this->respond(errorRespond($e->getMessage()));
                }
            } else {
                return $this->respond(errorRespond('Data harus diinput dengan JSON', 401));
            }
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $json = $this->request->getJSON();
        $data = [
            'title' => $json->title,
            'price' => $json->price
        ];
        $productModel = new ProductModel();
        if ($json) {
            $cekData = $productModel->find($id);
            if (!$cekData) return $this->respond(errorRespond('Data tidak ditemukan', 404));
            try {
                $update = $productModel->update($id, $data);
                return $this->respond(successRespond('Data berhasil diubah'));
            } catch (Exception $e) {
                return $this->respond(errorRespond($e->getMessage(), 401));
            }
        } else {
            return $this->respond(errorRespond('Data harus berupa json'));
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $productModel = new ProductModel();
        $cekData = $productModel->find($id);
        if (!$cekData) return $this->respond(errorRespond('Data tidak ditemukan', 404));
        try {
            $hapus = $productModel->delete($id);
            return $this->respond(successRespond('Data berhasil dihapus!'));
        } catch (Exception $e) {
            return $this->respond(errorRespond($e->getMessage(), 401));
        }
    }
}
