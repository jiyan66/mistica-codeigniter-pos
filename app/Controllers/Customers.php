<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();

        $customers = $customerModel->findAll();

        return view('customers', ['customers' => $customers]);
    }

    public function new()
    {
        return view('customers/create');
    }

    public function create()
    {
        $customer = [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
            'phone'     => trim((string) $this->request->getPost('phone')),
        ];

        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validateData($customer, $rules)) {
            return view('customers/create', [
                'errors'   => $this->validator->getErrors(),
                'customer' => $customer,
            ]);
        }

        $customerModel = new CustomerModel();

        $customerModel->insert([
            'full_name' => $customer['full_name'],
            'email'     => $customer['email'],
            'phone'     => $customer['phone'],
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()
            ->to('/customers')
            ->with('success', 'Customer added successfully.');
    }

    public function edit(int $id)
    {
        $customerModel = new CustomerModel();

        $customer = $customerModel->find($id);

        if ($customer === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Customer not found.'
            );
        }

        return view('customers/edit', [
            'customer' => $customer,
            'errors'   => [],
        ]);
    }

    public function update(int $id)
    {
        $customerModel = new CustomerModel();

        if ($customerModel->find($id) === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Customer not found.'
            );
        }

        $customer = [
            'id'        => $id,
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
            'phone'     => trim((string) $this->request->getPost('phone')),
        ];

        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validateData($customer, $rules)) {
            return view('customers/edit', [
                'customer' => $customer,
                'errors'   => $this->validator->getErrors(),
            ]);
        }

        $customerModel->update($id, [
            'full_name' => $customer['full_name'],
            'email'     => $customer['email'],
            'phone'     => $customer['phone'],
        ]);

        return redirect()
            ->to('/customers')
            ->with('success', 'Customer updated successfully.');
    }
}