<div class="row">
    <div class="form-group">
        <input type="hidden" name="id_jenis" value="{{ $jenis->id_jenis ?? '' }}">
        <label for="nama_jenis">Nama Jenis Paket</label>
        <input type="text" name="nama_jenis" id="nama_jenis" class="form-control mt-2"
            placeholder="Masukkan Data Jenis Baru" value="{{ old('nama_jenis', $jenis->nama_jenis ?? '') }}">
    </div>
</div>
