<div class="row">
    <div class="form-group col ">
        <label for="id_murid">Nama Murid</label>
        <select id="id_murid" name="id_murid" class="js-example-modal form-control form-select" data-width="100%" required>
            <option selected> Pilih Murid...</option>
            @foreach ($data_murid as $murid)
                <option value="{{ $murid->id_murid }}">{{ $murid->nama_murid }}</option>
            @endforeach
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
        <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
    </div>
</div>
