<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $customers = [
            [
                'full_name' => 'Juan Dela Cruz',
                'email'     => 'juan@example.com',
                'phone'     => '09123456789',
            ],
            [
                'full_name' => 'Maria Santos',
                'email'     => 'maria@example.com',
                'phone'     => '09234567890',
            ],
            [
                'full_name' => 'Pedro Reyes',
                'email'     => 'pedro@example.com',
                'phone'     => '09345678901',
            ],
            [
                'full_name' => 'Ana Garcia',
                'email'     => 'ana@example.com',
                'phone'     => '09456789012',
            ],
            [
                'full_name' => 'Carlo Mendoza',
                'email'     => 'carlo@example.com',
                'phone'     => '09567890123',
            ],
        ];

        return view('customers', ['customers' => $customers]);
    }
}