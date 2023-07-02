<div class="row">
    <div class="form-group col ">
        <label for="id_murid">Nama Murid</label>
        @php
            $get_idPembayaran = App\Models\Pembayaran::where('id_murid', '=', $bayar->id_murid)->get('id_pembayaran');
        @endphp
        @foreach ($get_idPembayaran as $idBayar)
            <input type="hidden" name="id_pembayaran" value="{{ $idBayar->id_pembayaran ?? '' }}">
        @endforeach
        <input type="text" class="form-control" value="{{ $bayar->nama_murid }}" disabled readonly>
    </div>
</div>

<div class="row">
    <div class="form-group col mt-3">
        <label for="jumlah_bayar">Jumlah Pembayaran</label>
        <div class="input-group">
            <div class="input-group-text">Rp.</div>
            <input type="text" name="jumlah_bayar" id="jumlah_bayar" value="{{ $bayar->harga }}" class="form-control"
                disabled readonly>
        </div>
    </div>
</div>



<div class="row">
    <div class="form-group col mt-3">
        <label for="tanggal_bayar">Tanggal Pembayaran</label>

        <input type="date" id="tanggal_bayar" name="tanggal_bayar" class="form-control bg-transparent"
            placeholder="Select date" value="{{ $bayar->tanggal_bayar ?? '' }}" required>


    </div>
</div>
