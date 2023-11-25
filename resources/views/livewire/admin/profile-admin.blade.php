<div>
    <div class="row">
        <div class="row">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="">Email</label>
                    <input class="form-control" type="text" wire:model.live="email">
                </div>
                <div class="mb-3">
                    <label for="">Username</label>
                    <input class="form-control" type="text" wire:model="username" disabled>
                </div>

                <div class="mb-3">
                    <label for="">Password <span style="font-size: 10px; color: red">Masukan Password Jika Ingin
                            Merubah!</span></label>
                    <input class="form-control" type="password" wire:model.live="password">
                </div>


                <div class="mb-3">
                    <button wire:click="SimpanProfile" class="btn btn-warning btn-sm"><span
                            class="mdi mdi-content-save"></span> Simpan</button>

                </div>

            </div>
        </div>
    </div>

    <script>
        window.addEventListener('TambahBerhasil', () => {
            toastr.success(`Update Profile Berhasil`, 'success');

            // setTimeout(function() {
            //     window.location.href = "/admin";
            // }, 2000);

        })
    </script>
</div>
