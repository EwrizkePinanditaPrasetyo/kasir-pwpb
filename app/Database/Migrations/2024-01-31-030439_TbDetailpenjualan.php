<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbDetailpenjualan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail' => [
                'type' => 'int',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'id_penjualan' => [
                'type' => 'int',
                'constraint' => 11
            ],
            'id_produk' => [
                'type' => 'int',
                'constraint' => 11
            ],
            'jumlah_produk' => [
                'type' => 'int',
                'constraint' => 11
            ],
            'subtotal' => [
                'type' => 'decimal',
                'constraint' => 10,2
            ],
        ]);

        $this->forge->addKey('id_detail');
        $this->forge->createTable('tb_detailpenjualan');
    }

    public function down()
    {
        //
        $this->forge->dropTable('tb_detailpenjualan');
    }
}
