<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPenjualan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penjualan' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'tanggal_penjualan' => [
                'type' => 'DATE',
            ],
            'total_harga' => [
                'type' => 'decimal',
                'constraint' => '10,2',
            ],
            'id_pelanggan' => [
                'type' => 'int',
                'constraint' => 11
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id_penjualan');
        $this->forge->createTable('tb_penjualan');
    }

    public function down()
    {
        //
        $this->forge->dropTable('tb_penjualan');
    }
}
