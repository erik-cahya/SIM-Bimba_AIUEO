<div class="row">
    <div class="form-group col ">
        <label for="id_murid">Nama Murid</label>
        <input type="hidden" name="id_pembayaran" value="'{{ $bayar->id_pembayaran }}">
        <input type="text" class="form-control" value="{{ $bayar->nama_murid }}" disabled readonly>
    </div>
</div>

<div class="row">
    <div class="form-group col mt-3">
        <label for="jumlah_bayar">Jumlah Pembayaran</label>
        <input type="text" name="jumlah_bayar" id="jumlah_bayar" value="{{ $bayar->jumlah_bayar }}"
            class="form-control">
    </div>
</div>

<div class="row">
    <div class="form-group col mt-3">
        <label for="tanggal_bayar">Tanggal Pembayaran</label>

        <input type="date" id="tanggal_bayar" name="tanggal_bayar" class="form-control bg-transparent"
            placeholder="Select date" value="{{ $bayar->tanggal_bayar }}">


    </div>
</div>
