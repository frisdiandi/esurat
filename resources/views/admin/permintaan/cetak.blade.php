<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Surat Permintaan</title>
    <style>
        /* Mengatur ukuran font dan margin untuk memperkecil ukuran konten */
        body { font-family: Arial, sans-serif; margin: 10px; font-size: 12px; }
        .container { width: 100%; max-width: 700px; margin: 0 auto; }
        .header, .footer { text-align: center; margin-bottom: 10px; }
        .header h2 { margin: 0; font-size: 16px; }
        .letter-body { margin-top: 10px; line-height: 1.4; }
        .field { margin-bottom: 10px; }
        .date { text-align: right; margin-bottom: 10px; }
        .content { text-indent: 40px; }
        .btn-print { display: none; }
        .address, .date, .letter-body, .signature { margin-left: 20px; margin-right: 20px; }
        
        /* Pengaturan untuk cetak */
        @media print {
            .btn-print { display: none; }
            body { margin: 0; }
            .container { max-width: 100%; margin: 0; }
        }
    </style>
</head>
<body>
    <div class="container">
        
        <!-- Kepala Surat -->
        <div class="header">
            <h2>Kementerian Sistem Informasi Pengaduan</h2>
            <p>Jl. Mawar No. 123, Jakarta, Indonesia</p>
            <p>Telepon: (021) 123-4567, Email: info@sisteminformasi.go.id</p>
            <hr>
            <button onclick="window.print();" class="btn btn-primary btn-print">Print</button>
        </div>

        <!-- Alamat Surat -->
        <div class="date">
            <p>{{ now()->format('d F Y') }}</p>
        </div>
        <div class="address">
            <p>Kepada Yth.</p>
            <p>Bapak/Ibu Penerima</p>
            <p>Alamat Penerima</p>
            <p>Kota, Indonesia</p>
        </div>
        
        <!-- Salam Pembuka -->
        <p>Dengan hormat,</p>

        <!-- Isi Surat -->
        <div class="letter-body">
            <div class="field">
                <strong>Persoalan:</strong> {{ $permintaan->perihal }}
            </div>
            <div class="field">
                <strong>Peranggapan:</strong>
                <p class="content">{{ $permintaan->isi_surat }}</p>
            </div>
            <div class="field">
                <strong>Fakta-Fakta Yang Mempengaruhi:</strong>
                <p class="content">{{ $permintaan->keterangan ?? 'Tidak ada keterangan' }}</p>
            </div>
            <div class="field">
                <strong>Analisis:</strong>
                <p class="content">{{ $permintaan->keterangan ?? 'Tidak ada keterangan' }}</p>
            </div>
            <div class="field">
                <strong>Kesimpulan:</strong>
                <p class="content">{{ $permintaan->isi_surat }}</p>
            </div>
            <div class="field">
                <strong>Saran:</strong>
                <p class="content">{{ $permintaan->isi_surat }}</p>
            </div>
        </div>

        <!-- Salam Penutup -->
        <p>Demikian surat ini kami sampaikan. Atas perhatian Bapak/Ibu, kami ucapkan terima kasih.</p>

        <!-- Tanda Tangan -->
        <div class="signature" style="text-align: right; margin-top: 30px;">
            <p>Hormat Kami,</p>
            <p><strong>Sistem Informasi Pengaduan</strong></p>
        </div>

        <div class="footer">
            <p>&copy; 2024 Sistem Informasi Pengaduan</p>
        </div>
    </div>
</body>
</html>
