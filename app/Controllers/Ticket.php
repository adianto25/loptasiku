<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TicketModel;

class Ticket extends ResourceController
{
    protected $modelName = 'App\Models\TicketModel';
    protected $format    = 'json';

    public function create()
    {
        $rules = [
            'name' => 'required',
            'institution' => 'required',
            'phone' => 'required',
            'email' => 'required|valid_email',
            'ticket_type' => 'required|in_list[early,regular]',
            'quantity' => 'required|numeric|greater_than[0]',
            'payment_method' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = $this->request->getPost();
        
        // Calculate price based on type
        $price = $data['ticket_type'] === 'early' ? 15000 : 18000;
        $totalPrice = $price * (int)$data['quantity'];
        
        $paymentCode = 'PAY' . substr(time(), -6) . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);

        $ticketData = [
            'ticket_type' => $data['ticket_type'],
            'quantity' => $data['quantity'],
            'buyer_name' => $data['name'],
            'buyer_institution' => $data['institution'],
            'buyer_phone' => $data['phone'],
            'buyer_email' => $data['email'],
            'total_price' => $totalPrice,
            'payment_method' => $data['payment_method'],
            'payment_account' => $data['payment_account'] ?? '',
            'payment_code' => $paymentCode,
            'status' => 'pending'
        ];

        $id = $this->model->insert($ticketData);
        $ticketData['id'] = $id;

        return $this->respondCreated([
            'status' => 201,
            'message' => 'Ticket created successfully',
            'data' => $ticketData
        ]);
    }

    public function myTickets()
    {
        // For simplicity in this demo, we might fetch all tickets or by email.
        // The original logic just used local array / dataSdk.
        // Let's return all tickets for the demo (not secure for prod, but mimics the SDK).
        $tickets = $this->model->findAll();
        return $this->respond($tickets);
    }
}
