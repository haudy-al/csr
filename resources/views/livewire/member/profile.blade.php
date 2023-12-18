<div>

    {{-- <div wire:loading>

        <h3>Mohon Tunggu...</h3>

    </div> --}}


    <form action="" enctype="multipart/form-data">


        <div id="lengkapi-data" class="content" role="tabpanel" aria-labelledby="lengkapi-data-trigger">

            <div class="row mt-5" style="text-align: left">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="" class="float-left mb-2">Nama Perusahaan :</label>
                                <input type="text" id="nama_perusahaan" wire:model.live="nama_perusahaan"
                                    name="nama_perusahaan" class="form-control" required>
                                @error('nama_perusahaan')
                                    <span class="text-danger"
                                        style="color: red; font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="float-left mb-2">Email Perusahaan :</label>
                                <input type="email" id="email_perusahaan" wire:model.live="email_perusahaan"
                                    name="email_perusahaan" class="form-control" required>
                                @error('email_perusahaan')
                                    <span class="text-danger"
                                        style="color: red; font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="float-left mb-2">Nama Kontak Person
                                    :</label>
                                <input type="text" id="nama_kontak_person" name="nama_kontak_person"
                                    wire:model.live="nama_kontak_person" class="form-control" required>
                                @error('nama_kontak_person')
                                    <span class="text-danger"
                                        style="color: red; font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="float-left mb-2">Nomor Telepon Person
                                    :</label>
                                <input type="number" id="no_telepon_person" name="no_telepon_person"
                                    class="form-control" required wire:model.live="no_telepon_person">
                                @error('no_telepon_person')
                                    <span class="text-danger"
                                        style="color: red; font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="float-left mb-2">Nomor Telepon Perusahaan
                                    :</label>
                                <input type="number" id="no_telepon_perusahaan" name="no_telepon_perusahaan"
                                    class="form-control" required wire:model.live="no_telepon_perusahaan">
                                @error('no_telepon_perusahaan')
                                    <span class="text-danger"
                                        style="color: red; font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="float-left mb-2">Kategori Perusahaan
                                    :</label>

                                <select name="" id="kategori_perusahaan" class="form-control"
                                    wire:model.live="kategori_perusahaan">
                                    <option value="">Pilih Kategori Perusahaan</option>
                                    @foreach (getKategoriPerusahaan() as $item)
                                        <option @if ($item->id == $kategori_perusahaan) selected @endif
                                            value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach

                                </select>
                                @error('kategori_perusahaan')
                                    <span class="text-danger"
                                        style="color: red; font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="float-left mb-2">Alamat Perusahaan
                                    :</label>
                                <textarea name="" id="alamat_perusahaan" wire:model.live="alamat_perusahaan" name="alamat_perusahaan"
                                    class="form-control" cols="30" rows="5" required></textarea>
                                @error('alamat_perusahaan')
                                    <span class="text-danger"
                                        style="color: red; font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-6">

                    <div wire:ignore id="map" style="height: 200px;"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="float-left mb-2">Latitude :</label>
                                <input type="text" class="form-control" wire:model.live="latitude" name="latitude"
                                    id="latitude" required>
                                @error('latitude')
                                    <span class="text-danger"
                                        style="color: red; font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="float-left mb-2">longitude :</label>
                                <input type="text" class="form-control" name="longitude" id="longitude" required
                                    wire:model.live="longitude">
                                @error('longitude')
                                    <span class="text-danger"
                                        style="color: red; font-size: 12px;">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>



                        <div class="col-md-12">
                            @if ($ubah == true)
                                <div class="card">
                                    <div class="card-body border border-2">
                                        <div class="mb-3 ">

                                            <input type="password" class="form-control" name="password"
                                                id="password" wire:model.live="passwordSekarang"
                                                placeholder="Password Anda Saat ini...">
                                            <br>

                                            @error('passwordSekarang')
                                                <span class="text-danger"
                                                    style="color: red; font-size: 12px;">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="mb-3 ">

                                            <input type="password" class="form-control" name="password"
                                                id="password" wire:model.live="password"
                                                placeholder="Masukan Password Baru Anda...">
                                            <br>
                                            @if ($password)
                                                <span
                                                    class="badge rounded-pill password-{{ $statusPassword }}">{{ $statusPassword }}</span>
                                            @endif


                                            @error('password')
                                                <span class="text-danger"
                                                    style="color: red; font-size: 12px;">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="mb-3">
                                            <button type="button" class="btn btn-danger text-light btn-sm"
                                                wire:click="Batal">Batal</button>
                                            <button type="button" class="btn btn-success text-light btn-sm"
                                                wire:click="SimpanPassword">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="mb-3">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        wire:click="ubahPass">Ubah Password</button>

                                </div>
                            @endif
                        </div>


                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="gambar_perusahaan"
                                    style="background-color: blue; padding: 5px; color: #fff; border-radius: 10px">Upload
                                    Gambar Perusahaan</label>
                                <input type="file" id="gambar_perusahaan" wire:model.live="gambar_perusahaan"
                                    class="d-none" name="gambar" accept="image/*">
                                @error('gambar_perusahaan')
                                    <span class="text-danger"
                                        style="color: red; font-size: 12px;">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-6">

                                @if ($gambar_perusahaan)
                                    <div class="mb-3">
                                        <img src="{{ $gambar_perusahaan->temporaryUrl() }}" width="200px">
                                        <button type="button" class="btn btn-sm"
                                            wire:click="clearGambar">Batal</button>
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <img src="{{ cekGambarMember($gambar_perusahaan_lama) }}" width="200px">

                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a class="btn btn-success" href="#" wire:click="SimpanProfile"><span class="mdi mdi-content-save">
                    Simpan </a>

        </div>


    </form>



    <script>
        window.addEventListener('TambahBerhasil', () => {
            toastr.success(`Profile Berhasil di Rubah`, 'success');
            setTimeout(function() {
                window.location.href = "/member/profile";
            }, 1500);
        })

        window.addEventListener('UbahPasswordSuccess', () => {
            toastr.success(`Ubah Password Berhasil`, 'success');

        })

        window.addEventListener('PasswordLemah', ($message) => {
            toastr.error(`${$message.detail.message}`, 'error');
        })
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let mapOptions = {
                center: [-6.595018, 106.816635],
                zoom: 13
            }

            let map = new L.map('map', mapOptions);

            let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
            map.addLayer(layer);



            marker = L.marker([`{{ $latitude }}`, `{{ $longitude }}`]).addTo(map);
            map.setView([`{{ $latitude }}`, `{{ $longitude }}`], 15);

            // Event handler saat peta diklik
            map.on('click', (event) => {
                if (marker !== null) {
                    map.removeLayer(marker);
                }

                marker = L.marker([event.latlng.lat, event.latlng.lng]).addTo(map);

                // document.getElementById('latitude').value = event.latlng.lat;
                // document.getElementById('longitude').value = event.latlng.lng;

                @this.set('latitude', event.latlng.lat);
                @this.set('longitude', event.latlng.lng);

                // Mendapatkan alamat berdasarkan koordinat
                const url =
                    `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${event.latlng.lat}&lon=${event.latlng.lng}`;
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        const alamat = data.display_name || 'Tidak dapat menemukan alamat';
                        // document.getElementById('alamat_perusahaan').textContent = alamat;
                        @this.set('alamat_perusahaan', alamat);

                    })
                    .catch(error => {
                        console.error('Gagal mendapatkan alamat:', error);
                    });
            });

            // Tambahkan fitur pencarian lokasi
            const searchControl = new GeoSearch.GeoSearchControl({
                provider: new GeoSearch.OpenStreetMapProvider(),
                style: 'bar',
                showMarker: true,
                showPopup: false,
                autoClose: true,
                useMapBounds: false, // Menonaktifkan penggunaan batas peta
            });
            map.addControl(searchControl);

            // Event listener untuk input latitude dan longitude
            const latitudeInput = document.getElementById('latitude');
            const longitudeInput = document.getElementById('longitude');

            latitudeInput.addEventListener('input', updateMapLocation);
            longitudeInput.addEventListener('input', updateMapLocation);

            function updateMapLocation() {
                const latitude = parseFloat(latitudeInput.value);
                const longitude = parseFloat(longitudeInput.value);

                if (!isNaN(latitude) && !isNaN(longitude)) {
                    if (marker !== null) {
                        map.removeLayer(marker);
                    }

                    marker = L.marker([latitude, longitude]).addTo(map);
                    map.setView([latitude, longitude], 15);

                    const url =
                        `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latitude}&lon=${longitude}`;
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            const alamat = data.display_name || 'Tidak dapat menemukan alamat';
                            document.getElementById('alamat').textContent = alamat;
                        })
                        .catch(error => {
                            console.error('Gagal mendapatkan alamat:', error);
                        });
                }
            }
        });
    </script>

</div>
