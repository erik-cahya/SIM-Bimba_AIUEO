<div class="row">
    <div class="form-group col ">
        <label for="id_murid">Nama Murid</label>
        <input type="text" class="form-control" value="{{ $bayar->nama_murid }}" disabled readonly>
        <input type="hidden" class="form-control" value="{{ $bayar->id_murid }}" name="id_murid">

    </div>
</div>

<div class="row">
    <div class="form-group col mt-3">
        <label for="jumlah_bayar">Jumlah Pembayaran</label>
    </div>
    <div class="input-group">
        <div class="input-group-text">Rp.</div>
        <input type="text" name="jumlah_bayar" id="jumlah_bayar" value="{{ $bayar->harga }}" class="form-control"
            readonly>
    </div>
</div>

<div class="row">
    <div class="form-group col mt-3">
        <label for="tanggal_bayar">Tanggal Pembayaran</label>
        <div class="input-group flatpickr " id="dashboardDate">
            <input type="date" id="tanggal_bayar" name="tanggal_bayar" class="form-control bg-transparent"
                placeholder="Select date" data-input required>

        </div>
    </div>
</div>

{{-- <div class="row">
    <div class="form-group col mt-3">
        <label for="nama_paket">Nama Paket</label>
        <select id="nama_paket" name="nama_paket" class="form-control">
            <option selected>Pilih Paket...</option>
            <option>Standard 01</option>
            <option>Standard 02</option>
            <option>Standard 03</option>
            <option>Standard 04</option>
        </select>
    </div>
</div> --}}
