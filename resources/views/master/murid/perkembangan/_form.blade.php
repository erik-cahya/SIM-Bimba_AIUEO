<div class="row">
    <div class="form-group">
        <label for="nama_murid">Nama Murid</label>

        <input class="form-control" id="disabledInput" type="text" placeholder="{{ $data_murid[0]->nama_murid ?? '' }}">

        <input type="hidden" name="id_murid" id="id_murid" value="{{ $data_murid[0]->id_murid ?? '' }}"
            class="form-control">
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
