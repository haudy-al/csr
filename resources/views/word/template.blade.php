<div>

    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead>
            <tr style="background-color: #0400fc;">
                <th style="border: 1px solid #000; padding: 8px;">Nama Kegiatan</th>
                <th style="border: 1px solid #000; padding: 8px;">Penerima Manfaat</th>
                <th style="border: 1px solid #000; padding: 8px;">Anggaran</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $data->nama_kegiatan }}
                </td>
                <td>
                    {{ $data->penerima_manfaat }}
                </td>
                <td>
                    Rp. {{ $data->anggaran }}
                </td>
            </tr>
        </tbody>
    </table>

    <p style="margin-top: 50px">
        Lokasi Kegiatan : {{ $data->lokasi_kegiatan }}
    </p>
</div>
