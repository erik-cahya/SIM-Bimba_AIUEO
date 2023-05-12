<div class="row">
    <div class="form-group">
        <input type="hidden" name="id_perkembangan" id="id_perkembangan" value="{{ $perkembangan->id_perkembangan }}"
            class="form-control">

        <label for="nama_murid">Nama Murid</label>
        <input class="form-control" id="disabledInput" type="text" placeholder="{{ $data_murid[0]->nama_murid }}"
            readonly>
    </div>
</div>

<div class="row">
    <div class="form-group mt-3">
        <label for="tanggal_perkembangan">Tanggal</label>
        <input type="date" name="tanggal_perkembangan" id="tanggal_perkembangan" class="form-control"
            value="{{ $perkembangan->tgl_perkembangan }}">
    </div>
</div>
<div class="row">
    <div class="form-group mt-3">
        <label for="deskripsi">Perkembangan</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $perkembangan->deskripsi }}</textarea>
    </div>
</div>
