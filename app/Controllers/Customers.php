<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $customers = [
            [
                'full_name' => 'Juan Dela Cruz',
                'email'     => 'juan@gmail.com',
                'phone'     => '09123456781',
            ],
            [
                'full_name' => 'Maria Santos',
                'email'     => 'maria@gmail.com',
                'phone'     => '09123456782',
            ],
            [
                'full_name' => 'Pedro Reyes',
                'email'     => 'pedro@gmail.com',
                'phone'     => '09123456783',
            ],
            [
                'full_name' => 'Ana Garcia',
                'email'     => 'ana@gmail.com',
                'phone'     => '09123456784',
            ],
            [
                'full_name' => 'Carlo Mendoza',
                'email'     => 'carlo@gmail.com',
                'phone'     => '09123456785',
            ],
        ];

        return view('customers', ['customers' => $customers]);
    }
}