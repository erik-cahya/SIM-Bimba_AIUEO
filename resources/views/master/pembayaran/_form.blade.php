<div class="row">
    <div class="form-group col ">
        <label for="id_murid">Nama Murid</label>
        <select id="id_murid" name="id_murid" class="js-example-modal form-control form-select" data-width="100%" required>
            @foreach ($data_murid as $murid)
                <option style="height: 500px;" value="{{ $murid->id_murid }}">{{ $murid->nama_murid }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="form-group col mt-3">
        <label for="jumlah_bayar">Jumlah Pembayaran</label>
    </div>
    <div class="input-group">
        <div class="input-group-text">Rp.</div>
        <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar"
            placeholder="Masukkan Jumlah yang Dibayarkan" required />
    </div>
</div>

<div class="row">
    <div class="form-group col mt-3">
        <label for="tanggal_bayar">Tanggal Pembayaran</label>
        <div class="input-group flatpickr " id="dashboardDate">
            <input type="date" id="tanggal_bayar" name="tanggal_bayar" class="form-control bg-transparent"
                placeholder="Select date" data-input>

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
