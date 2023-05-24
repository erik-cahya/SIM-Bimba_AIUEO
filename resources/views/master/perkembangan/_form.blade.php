<div class="row">
    <div class="form-group">
        <label for="nama_murid">Nama Murid cokk</label>
        <input class="form-control" id="disabledInput" type="text" placeholder="{{ $get_name->nama_murid ?? '' }}"
            readonly>
        <input type="hidden" name="id_murid" id="id_murid" value="{{ $get_name->id_murid ?? '' }}" class="form-control">
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
