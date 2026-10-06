<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPasswordToUsers extends Migration
{
    public function up()
    {
        if (! $this->db->fieldExists('password', 'users')) {
            $this->forge->addColumn('users', [
                'password' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                    'after'      => 'avatar',
                ],
            ]);
        }

        $initialHash = password_hash('Password123!', PASSWORD_DEFAULT);

        $this->db->table('users')
            ->groupStart()
                ->where('password', null)
                ->orWhere('password', '')
            ->groupEnd()
            ->update(['password' => $initialHash]);

        $this->forge->modifyColumn('users', [
            'password' => [
                'name'       => 'password',
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
        ]);
    }

    public function down()
    {
        if ($this->db->fieldExists('password', 'users')) {
            $this->forge->dropColumn('users', 'password');
        }
    }
}
