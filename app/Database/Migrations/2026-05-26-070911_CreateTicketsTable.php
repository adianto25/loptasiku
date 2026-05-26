<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'ticket_type' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'quantity' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'buyer_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'buyer_institution' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'buyer_phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'buyer_email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'total_price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'payment_method' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'payment_account' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'payment_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'verified', 'rejected'],
                'default'    => 'pending',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tickets');
    }

    public function down()
    {
        $this->forge->dropTable('tickets');
    }
}
