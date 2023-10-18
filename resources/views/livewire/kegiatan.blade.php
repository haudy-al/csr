<div>
    <div class="card mt-5 border-0 p-0 m-0">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3 col-6">
                    <select class="form-control-custom" wire:model.live='type'>
                        <option value="all">Semua</option>
                        <option value="pd">Perangkat Daerah</option>
                        <option value="cp">Pengusaha</option>

                    </select>

                </div>

                <div class="col-md-3 col-6">
                    <input class="form-control-custom" type="text" wire:model.live.debounce.300ms="search" placeholder="Cari Kegiatan...">
                </div>
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
                                <td>{{ ($dataKegiatan->currentPage() - 1) * $dataKegiatan->perPage() + $key + 1 }}</td>
                                <td>{{ $item->nama_kegiatan }}</td>
                                <td>{{ $item->member->nama_perusahaan }}</td>
                                <td>
                                    <a href="/proyek-csr/kegiatan/detail?i={{ $item->id }}" class="btn btn-sm btn-primary">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $dataKegiatan->links() }}
            </div>
        </div>
    </div>
</div>
