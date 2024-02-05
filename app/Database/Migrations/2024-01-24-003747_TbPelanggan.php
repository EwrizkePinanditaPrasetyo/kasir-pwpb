<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPelanggan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true, //digunakan untuk A_I
                'unsigned' => true //digunakan untuk nilai tak bertanda (-/+)
            ],
            'nama_pelanggan' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'alamat' => [
                'type' => 'text',
            ],
            'no_telp' => [
                'type' => 'varchar',
                'constraint' => '15'
            ],
            'created_at' =>[
                'type'=>'DATETIME',
                'null' => true
            ],
            'updated_at' =>[
                'type'=>'DATETIME',
                'null' => true
            ],
            'deleted_at' =>[
                'type'=>'DATETIME', //panah => menunjukkan array assosiatif
                'null' => true
            ],
        ]);
        $this->forge->addKey('id_pelanggan', true);
        $this->forge->createTable('tb_pelanggan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_pelanggan');
    }
}
