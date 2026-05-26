<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>E-Ticket Paskibraku</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #F8F9FA; padding: 20px; color: #212529; }
        .container { max-width: 600px; margin: 0 auto; background-color: #FFFFFF; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .header { background-color: #0B2447; color: #FFFFFF; padding: 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .content { padding: 30px; }
        .ticket-box { background-color: #F8F9FA; border: 2px dashed #0B2447; border-radius: 8px; padding: 20px; text-align: center; margin: 20px 0; }
        .ticket-id { font-family: monospace; font-size: 24px; font-weight: bold; color: #0B2447; letter-spacing: 2px; }
        .detail-row { display: flex; justify-content: space-between; margin-bottom: 10px; border-bottom: 1px solid #EEEEEE; padding-bottom: 5px; }
        .detail-label { color: #6C757D; }
        .detail-value { font-weight: bold; }
        .footer { background-color: #F8F9FA; padding: 20px; text-align: center; font-size: 12px; color: #6C757D; border-top: 1px solid #EEEEEE; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>E-Ticket Paskibraku</h1>
            <p>Terima kasih atas pembayaran Anda!</p>
        </div>
        <div class="content">
            <p>Halo, <strong><?= esc($ticket['buyer_name']) ?></strong>,</p>
            <p>Pembayaran Anda telah berhasil kami verifikasi. Berikut adalah E-Ticket Anda untuk menghadiri acara Paskibraku:</p>
            
            <div class="ticket-box">
                <p style="margin-top:0; color: #6C757D; font-size: 14px;">Tunjukkan kode ini saat registrasi</p>
                <div class="ticket-id"><?= $ticket['payment_code'] ?></div>
            </div>

            <div class="details">
                <div class="detail-row">
                    <span class="detail-label">Nama Lengkap</span>
                    <span class="detail-value"><?= esc($ticket['buyer_name']) ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Asal Instansi</span>
                    <span class="detail-value"><?= esc($ticket['buyer_institution']) ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Jenis Tiket</span>
                    <span class="detail-value"><?= ucfirst($ticket['ticket_type']) ?> Ticket</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Jumlah Tiket</span>
                    <span class="detail-value"><?= $ticket['quantity'] ?> Tiket</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Status</span>
                    <span class="detail-value" style="color: #198754;">Telah Dibayar (Verified)</span>
                </div>
            </div>
            
            <p style="margin-top: 30px;">Harap simpan email ini dan tunjukkan kepada panitia pada saat acara berlangsung. Sampai jumpa di lokasi!</p>
        </div>
        <div class="footer">
            &copy; <?= date('Y') ?> Paskibraku. All rights reserved.<br>
            Jl. Pemuda No. 123, Semarang, Jawa Tengah
        </div>
    </div>
</body>
</html>
