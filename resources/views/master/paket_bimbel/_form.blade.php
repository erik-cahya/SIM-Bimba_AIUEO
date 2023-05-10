<div class="row">
    <div class="form-group">
        <label for="nama_paket">Nama Paket</label>
        <input type="text" name="nama_paket" id="nama_paket" class="form-control" placeholder="Masukkan Nama Paket"
            value="{{ old('nama_paket', $paket->nama_paket ?? '') }}">
    </div>
</div>

<div class="row">
    <div class="form-group col mt-3">
        <label for="id_jenis" disabled>Jenis Paket</label>
        <select id="id_jenis" name="id_jenis" class="form-control form-select">

            <option value="{{ old('jenis_paket', $paket->jenis_paket ?? '') }}" selected>
                {{ old('jenis_paket', $paket->jenis_paket ?? 'Pilih Paket...') }}</option>
            @foreach ($data_jenis as $jenis)
                <option value="{{ $jenis->id_jenis }}">{{ $jenis->nama_jenis }}</option>
            @endforeach

        </select>
    </div>

    <div class="form-group col mt-3">
        <label for="harga_paket">Harga Paket</label>
        <div class="input-group">
            <div class="input-group-text">Rp.</div>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername" name="harga"
                placeholder="Masukkan Harga Paket" value="{{ old('harga_paket', $paket->harga ?? '') }}" />
        </div>
    </div>

</div>
