<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Baju Oblong',
                'price' => '100000'
            ],
            [
                'title' => 'Sepatu Bola',
                'price' => '500000'
            ],
        ];
        $this->db->table('tbl_products')->insertBatch($data);
    }
}
