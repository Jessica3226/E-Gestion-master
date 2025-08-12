<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true,
            ],
            'matricule' =>  [
                'type'  =>  'VARCHAR',
                'constraint'=>'8',
                'unique'    =>  true,
            ],
            'post'  =>  [
                'type'  =>  'VARCHAR',
                'constraint'    =>'255',
                'null'  =>false,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');
    }


    public function down()
    {
        $this->forge->dropTable('users');
    }
}
