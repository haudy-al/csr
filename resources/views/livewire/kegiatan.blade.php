<div>
    <div class="card mt-5 border-0 p-0 m-0">
        <div class="card-header">
            <div class="col-3">
                <select class="form-control" wire:model='type'>
                    <option selected value="all">Semua</option>
                    <option value="pd">Perangkat Daerah</option>

                </select>
                           
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Pengusul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataKegiatan as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->nama_kegiatan }}</td>
                                <td>{{ $item->member->nama_perusahaan }}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-primary">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
