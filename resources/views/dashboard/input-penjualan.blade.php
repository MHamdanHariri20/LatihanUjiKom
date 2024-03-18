@extends('dashboard.layout')

@section('layout')

<form action="{{route('tambah.penjualan.data')}}" method="POST" style="padding: 0 100px;">
    @csrf
    <div class="mb-3">
      <label class="form-label">Nama Pelanggan</label>
      <select class="form-select" aria-label="Small select example" name="pelangganId">
        <option selected>Pilih Nama Pelanggan</option>
        @foreach($pelanggan as $pelanggans)
            <option value="{{ $pelanggans->id }}">{{ $pelanggans->namalengkap }}</option>
        @endforeach
      </select>
    </div>
    <div class="d-flex" style="justify-content: space-between; gap: 30px;">
        <div class="mb-3" style="width: 100%;">
            <label class="form-label">Produk</label>
            <select class="form-select" aria-label="Small select example" id="produkSelect" name="produkId">
            <option selected>Pilih Produk</option>
            @foreach($produk as $produks)
                <option value="{{ $produks->id }}" data-harga="{{ $produks->harga }}">{{ $produks->namaproduk }}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3" style="width: 100%;">
            <label class="form-label">Jumlah Barang</label>
            <input type="number" name="jumlahproduk" class="form-control" id="jumlahBarang">
        </div>
        <div class="mb-3" style="width: 100%;">
            <label class="form-label">Harga</label>
            <input type="number" name="subtotal" readonly class="form-control" id="hargaTotal">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const produkSelect = document.getElementById('produkSelect');
        const jumlahBarang = document.getElementById('jumlahBarang');
        const hargaTotal = document.getElementById('hargaTotal');

        // Fungsi untuk menghitung subtotal
        function hitungSubtotal() {
            const harga = produkSelect.options[produkSelect.selectedIndex].getAttribute('data-harga');
            const jumlah = jumlahBarang.value;
            const subtotal = harga * jumlah;
            hargaTotal.value = subtotal || 0; // Jika NaN maka menjadi 0
        }

        // Event listener untuk perubahan pada dropdown produk
        produkSelect.addEventListener('change', function() {
            hitungSubtotal();
        });

        // Event listener untuk perubahan pada input jumlah barang
        jumlahBarang.addEventListener('input', function() {
            hitungSubtotal();
        });
    });
    </script>

@endsection
