<table class="" border="1" width="100%" style="font-family:Calibri (Body); font-size: 14px; background: rgb(248, 248, 248)" cellspacing="0" cellpadding="4">
    <tr>
        <td colspan="1" align="center" width="5%">I</td>
        <td colspan="7">Kegiatan Usulan</td>
    </tr>
    <tr>
        <td colspan="1" rowspan="7" width="5%"></td>
        <td colspan="1" width="5%" align="center">1</td>
        <td colspan="2" width="45%">Nama Kegiatan :</td>
        <td colspan="4" width="45%">{{ $dataKegiatan->nama_kegiatan ?? '-' }}</td>
    </tr>
    <tr>
        <!--<td colspan="1" width="5%"></td> <!-- rowspan1 -->-->
        <td colspan="1" width="5%" align="center">2</td>
        <td colspan="2" width="45%">Kategori Manfaat :</td>
        <td colspan="4" width="45%">{{ $dataKegiatan->bidang->nama }}</td>
    </tr>
    <tr>
        <!--<td colspan="1" width="5%"></td> <!-- rowspan1 -->-->
        <td colspan="1" width="5%" align="center">3</td>
        <td colspan="2" width="45%">Penerima Manfaat :</td>
        <td colspan="4" width="45%">{{ $dataKegiatan->penerima_manfaat }}</td>
    </tr>

    <tr>
        <!--<td colspan="1" width="5%"></td> <!-- rowspan1 -->-->
        <td colspan="1" width="5%" align="center">4</td>
        <td colspan="2" width="45%">Bentuk Manfaat :</td>
        <td colspan="4" width="45%">({{ convertSatuanTargetSasaran2($dataKegiatan->kategori_manfaat) }})</td>
    </tr>
    <tr>
        <!--<td colspan="1" width="5%"></td> <!-- rowspan1 -->-->
        <td colspan="1" width="5%" align="center">5</td>
        <td colspan="2" width="45%">Waktu Pelaksanaan :</td>
        <td colspan="4" width="45%">{{ $dataKegiatan->waktu_pelaksanaan }}</td>
    </tr>
    <tr>
        <!--<td colspan="1" width="5%"></td> <!-- rowspan1 -->-->
        <td colspan="1" width="5%" align="center">6</td>
        <td colspan="2" width="45%">Lokasi Kegiatan :</td>
        <td colspan="4" width="45%">{{ $dataKegiatan->lokasi_kegiatan }}</td>
    </tr>
    <tr>
        <!--<td colspan="1" width="5%"></td> <!-- rowspan1 -->-->
        <td colspan="1" width="5%" align="center">7</td>
        <td colspan="2" width="45%">Keterangan :</td>
        <td colspan="4" width="45%">{!! $dataKegiatan->bentuk_kegiatan !!}</td>
    </tr>

    <tr>
        <td colspan="1" align="center" width="5%">II</td>
        <td colspan="7">Jumlah Transaksi</td>
    </tr>

    <tr>
        <td colspan="1" rowspan="1" width="5%"></td>
        <td colspan="1" width="5%" align="center">1</td>
        <td colspan="2" width="45%">Jumlah ({{ convertSatuanTargetSasaran2($dataKegiatan->kategori_manfaat) }}) :</td>
        <td colspan="4" width="45%">{{ $dataTransaksi->target_sasaran }}</td>
    </tr>
    
   
</table>