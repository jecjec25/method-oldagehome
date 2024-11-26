<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MessageMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'sender_id'  => ['type' => 'INT'],
            'receiver_id'  => ['type' => 'INT'],
            'content'    => ['type' => 'TEXT', 'null' => false],
            'is_new'     => ['type' => 'BOOLEAN', 'default' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('messages');
    }

    public function down()
    {
        $this->forge->dropTable('messages');
    }
}
