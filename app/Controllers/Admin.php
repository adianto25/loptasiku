<?php

namespace App\Controllers;

use App\Models\TicketModel;

class Admin extends BaseController
{
    public function index()
    {
        $session = session();
        if(!$session->get('logged_in')){
            return redirect()->to('/login');
        }

        $ticketModel = new TicketModel();
        $data['tickets'] = $ticketModel->orderBy('created_at', 'DESC')->findAll();

        return view('admin/dashboard', $data);
    }

    public function verifyTicket($id)
    {
        $session = session();
        if(!$session->get('logged_in')){
            return redirect()->to('/login');
        }

        $ticketModel = new TicketModel();
        
        // Cek data tiket
        $ticket = $ticketModel->find($id);
        if (!$ticket) {
            return redirect()->to('/admin')->with('error', 'Tiket tidak ditemukan.');
        }

        // Update status tiket
        $ticketModel->update($id, ['status' => 'verified']);

        // Kirim Email
        $email = \Config\Services::email();
        $email->setFrom('noreply@paskibraku.com', 'Admin Paskibraku');
        $email->setTo($ticket['buyer_email']);
        $email->setSubject('E-Ticket Paskibraku - Pembayaran Berhasil');

        // Render template email
        $message = view('email/ticket', ['ticket' => $ticket]);
        $email->setMessage($message);
        
        // Handle send (catch error if SMTP not configured correctly)
        if ($email->send()) {
            return redirect()->to('/admin')->with('msg', 'Ticket berhasil diverifikasi dan Email telah dikirim.');
        } else {
            // Log error tapi tetap sukses verifikasi
            log_message('error', $email->printDebugger(['headers']));
            return redirect()->to('/admin')->with('msg', 'Ticket berhasil diverifikasi. (Simulasi Email Gagal/Belum dikonfigurasi nyata)');
        }
    }
}
