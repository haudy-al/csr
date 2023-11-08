<!DOCTYPE html>
<html>
<head>
    <title>SURAT PERNYATAAN MINAT MENGIKUTI PROGRAM/KEGIATAN TJSLP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .content {
            margin-bottom: 40px;
        }

        .signature {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h3>SURAT PERNYATAAN MINAT MENGIKUTI PROGRAM/KEGIATAN TJSLP</h3>
        </div>

        <div class="content">
            <p>Yang bertanda tangan di bawah ini:</p>
            <p><strong>Nama:</strong> {{ getDataMember()->nama_kontak_person }}</p>
            <p><strong>Jabatan: - </strong> </p>
            <p><strong>Nomor HP: {{ getDataMember()->no_telepon_person }}</strong> </p>

            <p><strong>Bertindak untuk atas nama:</strong></p>
            <p><strong>Perusahaan:</strong> {{ getDataMember()->nama_perusahaan }}</p>
            <p><strong>Alamat:</strong> {{ getDataMember()->alamat_perusahaan }}</p>
            <p><strong>Nomor Telepon/Fax:</strong> {{ getDataMember()->no_telepon_perusahaan }}</p>

            <p>Menyatakan dengan ini setelah mengikuti Sosialisasi Program/Kegiatan Tanggung Jawab Sosial dan Lingkungan Perusahaan, maka dengan ini saya menyatakan berminat untuk berpartisipasi dalam pelaksanaan Program/Kegiatan Tanggung Jawab Sosial dan Lingkungan Perusahaan.</p>

            <p>Program/Kegiatan yang akan dilaksanakan adalah: {{ $data->usulanKegiatan->nama_kegiatan }}</p>

            <p>Demikian surat ini dibuat dan ditandatangani untuk dipergunakan sebagaimana mestinya.</p>
        </div>

        <div class="signature">
            <p>Bogor,............</p>
            <br>
            <br>
            <br>
            <p>{{ getDataMember()->nama_kontak_person }}</p>
            <p><small>-</small></p>
        </div>
    </div>
</body>
</html>
