<div class="row">
    <div class="form-group">
        <label for="nama_murid">Nama Murid</label>
        <input type="text" name="nama_murid" id="nama_murid"
            class="form-control {{ $errors->has('nama_murid') ? ' is-invalid' : '' }}"
            value="{{ old('nama_murid', $murid->nama_murid ?? '') }}">

        @if ($errors->has('nama_murid'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nama_murid') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="form-group col mt-3">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" id="tempat_lahir"
            class="form-control {{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}"
            value="{{ old('tempat_lahir', $murid->tempat_lahir ?? '') }}">
        @if ($errors->has('tempat_lahir'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tempat_lahir') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col mt-3">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <div class="input-group flatpickr " id="dashboardDate">
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                value="{{ old('tanggal_lahir', $murid->tanggal_lahir ?? '') }}">
            @if ($errors->has('tanggal_lahir'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                </span>
            @endif
        </div>
    </div>

</div>
<div class="row">
    <div class="form-group col mt-3">
        <label for="tanggal_masuk">Tanggal Masuk</label>
        <div class="input-group flatpickr " id="dashboardDate">
            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                value="{{ old('tanggal_masuk', $murid->tanggal_masuk ?? '') }}">
            @if ($errors->has('tanggal_masuk'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tanggal_masuk') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col mt-3">
        <label for="alamat" class="form-label ">Alamat</label>
        <textarea class="form-control {{ $errors->has('alamat') ? ' is-invalid' : '' }}" id="alamat" name="alamat">{{ old('alamat', $murid->alamat ?? '') }}</textarea>
        @if ($errors->has('alamat'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('alamat') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group mt-3">
        <label for="nama_ortu">Nama Orang Tua</label>
        <input type="text" name="nama_ortu" id="nama_ortu"
            class="form-control {{ $errors->has('nama_ortu') ? ' is-invalid' : '' }}"
            value="{{ old('nama_ortu', $murid->nama_ortu ?? '') }}">
        @if ($errors->has('nama_ortu'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nama_ortu') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group mt-3">
        <label for="no_telp">Nomor Telp</label>
        <input type="text" name="no_telp" id="no_telp"
            class="form-control {{ $errors->has('no_telp') ? ' is-invalid' : '' }}"
            value="{{ old('no_telp', $murid->no_telp ?? '') }}">
        @if ($errors->has('no_telp'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('no_telp') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="form-group col mt-3">
        <label for="nama_paket">Nama Paket</label>
        <select id="nama_paket" name="nama_paket" class="form-control form-select">
            <option value="{{ old('nama_paket', $murid->nama_paket ?? '') }}" selected>
                {{ old('nama_paket', $murid->nama_paket ?? 'Pilih Paket...') }}
            </option>
            @foreach ($data_paket as $paket)
                <option value="{{ $paket->nama_paket }}">{{ $paket->nama_paket }}</option>
            @endforeach
        </select>
    </div>
</div>
