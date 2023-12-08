<div>

    <div class="mb-3 input-group">
        <input type="password" class="form-control" name="password_lama" id="password_lama" wire:model="password_lama"
            placeholder="Masukan Password Lama Anda">
    </div>
    <div class="mb-3">
        @error('password_lama')
            <span class="text-danger" style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3 input-group">
        @if ($password)
            <span class="input-group-text password-{{ $statusPassword }}">{{ $statusPassword }}</span>
        @endif
        <input type="password" class="form-control" name="password" id="password" wire:model.live="password"
            placeholder="Masukan Password Baru Anda...">
        <span class="input-group-text">
            <i class="fas fa-eye" id="showPasswordIcon"></i>
        </span>
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

    <script nonce="{{ csp_nonce() }}">
        const passwordInput = document.getElementById("password");
        const showPasswordIcon = document.getElementById("showPasswordIcon");

        showPasswordIcon.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordIcon.classList.remove("fa-eye");
                showPasswordIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                showPasswordIcon.classList.remove("fa-eye-slash");
                showPasswordIcon.classList.add("fa-eye");
            }
        });
    </script>
</div>
