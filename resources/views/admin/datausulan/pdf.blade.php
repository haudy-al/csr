<table class="" border="1" width="100%" style="font-family:Calibri (Body); font-size: 14px; background: rgb(248, 248, 248)" cellspacing="0" cellpadding="4">
    <tr>
        <td colspan="1" align="center" width="5%">I</td>
        <td colspan="7">Kegiatan Usulan</td>
    </tr>
    <tr>
        <td colspan="1" rowspan="7" width="5%"></td>
        <td colspan="1" width="5%" align="center">1</td>
        <td colspan="2" width="45%">Nama Kegiatan :</td>
        <td colspan="4" width="45%">{{ $data->nama_kegiatan ?? '-' }}</td>
    </tr>
    <tr>
        <!--<td colspan="1" width="5%"></td> <!-- rowspan1 -->-->
        <td colspan="1" width="5%" align="center">2</td>
        <td colspan="2" width="45%">Kategori Manfaat :</td>
        <td colspan="4" width="45%">{{ $data->bidang->nama }}</td>
    </tr>
    <tr>
        <!--<td colspan="1" width="5%"></td> <!-- rowspan1 -->-->
        <td colspan="1" width="5%" align="center">3</td>
        <td colspan="2" width="45%">Penerima Manfaat :</td>
        <td colspan="4" width="45%">{{ $data->penerima_manfaat }}</td>
    </tr>

    <tr>
        <!--<td colspan="1" width="5%"></td> <!-- rowspan1 -->-->
        <td colspan="1" width="5%" align="center">4</td>
        <td colspan="2" width="45%">Bentuk Manfaat :</td>
        <td colspan="4" width="45%">({{ convertSatuanTargetSasaran2($data->kategori_manfaat) }})</td>
    </tr>
    <tr>
        <!--<td colspan="1" width="5%"></td> <!-- rowspan1 -->-->
        <td colspan="1" width="5%" align="center">5</td>
        <td colspan="2" width="45%">Waktu Pelaksanaan :</td>
        <td colspan="4" width="45%">{{ $data->waktu_pelaksanaan }}</td>
    </tr>
    <tr>
        <!--<td colspan="1" width="5%"></td> <!-- rowspan1 -->-->
        <td colspan="1" width="5%" align="center">6</td>
        <td colspan="2" width="45%">Lokasi Kegiatan :</td>
        <td colspan="4" width="45%">{{ $data->lokasi_kegiatan }}</td>
    </tr>
    <tr>
        <!--<td colspan="1" width="5%"></td> <!-- rowspan1 -->-->
        <td colspan="1" width="5%" align="center">7</td>
        <td colspan="2" width="45%">Keterangan :</td>
        <td colspan="4" width="45%">{!! $data->bentuk_kegiatan !!}</td>
    </tr>

      
   
</table>