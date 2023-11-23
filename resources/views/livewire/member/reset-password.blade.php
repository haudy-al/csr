<div>

    <div class="mb-3 input-group">
        <span class="input-group-text password-{{ $statusPassword }}">{{ $statusPassword }}</span>
        <input type="password" class="form-control" name="password" id="password" wire:model.live="password"
            placeholder="Masukan Password Baru Anda...">
    </div>

    <div class="mb-3">
        @error('password')
            <span class="text-danger" style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror
    </div>

    <button type="button" class="btn btn-success text-light btn-sm" wire:click="resetPassword">Simpan</button>

    <script>
        window.addEventListener('UbahPasswordSuccess', () => {
            toastr.success(`Ubah Password Berhasil`, 'success');

            setTimeout(function() {
                window.location.href = "/member";
            }, 2000);

        })

        window.addEventListener('PasswordLemah', ($message) => {
            toastr.error(`${$message.detail.message}`, 'error');
        })
    </script>
</div>
