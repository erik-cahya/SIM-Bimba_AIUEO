<div class="row">
    <div class="form-group">
        <label for="nama_user">Nama user</label>
        <input type="hidden" name="id_user" value="{{ $user->id_user }}">
        <input type="text" name="nama_user" id="nama_user"
            class="form-control {{ $errors->has('nama_user') ? ' is-invalid' : '' }}"
            value="{{ old('nama_user', $user->nama_user) }}">

        @if ($errors->has('nama_user'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nama_user') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="form-group col mt-3">
        <label for="hak_akses" disabled>Hak Akses</label>
        <select id="hak_akses" name="hak_akses" class="form-control form-select">

            <option value="{{ old('hak_akses', $user->hak_akses) }}" selected>
                {{ old('hak_akses', $user->hak_akses ?? 'Pilih Role User...') }}</option>
            <option value="kepala_staff">Kepala Staff</option>
            <option value="guru">Guru</option>

        </select>
    </div>
</div>

<div class="row">
    <div class="form-group col mt-3">
        <label for="username">Username</label>
        <input type="text" name="username" id="username"
            class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}"
            value="{{ old('username', $user->username) }}">

        @if ($errors->has('username'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-12 mt-3">
        <label for="password">Ganti Password</label>
        <div class="input-group mb-3">
            <input name="password" type="password"
                class="input form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password_edit"
                 aria-label="password" aria-describedby="basic-addon1" placeholder="Masukkan Password Baru"/>
            <div class="input-group-append">
                <span class="input-group-text" style="height: 100%" onclick="show_hide_password();">
                    <i class="fas fa-eye" id="show_password"></i>
                    <i class="fas fa-eye-slash d-none" id="hide_password"></i>
                </span>
            </div>
        </div>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<script>
    function show_hide_password() {
        var x = document.getElementById("password_edit");
        var show_eye = document.getElementById("show_password");
        var hide_eye = document.getElementById("hide_password");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
</script>
