<div class="row">
    <div class="form-group">
        <label for="nama_user">Nama user</label>
        <input type="text" name="nama_user" id="nama_user"
            class="form-control {{ $errors->has('nama_user') ? ' is-invalid' : '' }}"
            value="{{ old('nama_user', $user->nama_user ?? '') }}">

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

            <option value="{{ old('hak_akses', $user->hak_akses ?? '') }}" selected>
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
            value="{{ old('username', $user->username ?? '') }}">

        @if ($errors->has('username'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="form-group col mt-3">
        <label for="password">Password</label>
        <input type="password" name="password" id="password"
            class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
            value="{{ old('password', $user->password ?? '') }}">

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>
