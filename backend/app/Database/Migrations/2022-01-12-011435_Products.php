<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_products' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'title' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'price' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'create_by' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'null'           => true
            ],
            'create_date' => [
                'type'           => 'DATETIME',
                'null'           => true
            ],
            'update_by' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'null'           => true
            ],
            'update_date' => [
                'type'           => 'DATETIME',
                'null'           => true
            ],
            'delete_by' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'null'           => true
            ],
            'delete_date' => [
                'type'           => 'DATETIME',
                'null'           => true
            ],
        ]);
        $this->forge->addKey('id_products', TRUE);
        $this->forge->createTable('tbl_products');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_products');
    }
}
