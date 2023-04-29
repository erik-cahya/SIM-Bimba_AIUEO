<div class="row">
    <div class="form-group col mt-3">
        <label for="nama_paket">Nama Murid</label>
        <select id="nama_paket" name="nama_paket" class="form-control form-select">
            <option selected> Pilih Murid...</option>
            <option value="{{ $murid->id_murid }}">{{ $murid->nama_murid }}</option>
        </select>
    </div>
</div>

<div class="row">
    <div class="form-group mt-3">
        <label for="tanggal_perkembangan">Tanggal</label>
        <input type="date" name="tanggal_perkembangan" id="tanggal_perkembangan" class="form-control">
    </div>
</div>
<div class="row">
    <div class="form-group mt-3">
        <label for="deskripsi">Perkembangan</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
    </div>
</div>
