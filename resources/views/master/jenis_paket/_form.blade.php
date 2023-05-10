<div class="row">
    <div class="form-group">
        <label for="nama_paket">Nama Jenis Paket</label>
        <input type="text" name="nama_paket" id="nama_paket" class="form-control mt-2" placeholder="Masukkan Nama Paket"
            value="{{ old('nama_paket', $paket->nama_paket ?? '') }}">
    </div>
</div>
