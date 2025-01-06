@extends('layout.master-admin')
@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Edit Barang Masuk </h4>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.barang-masuk.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="supplier_id">Supplier</label>
              <select name="supplier_id" id="supplier_id" class="form-control" required>
                @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ $barang->supplier_id == $supplier->id ? 'selected' : '' }}>
                  {{ $supplier->name }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="nama">Nama Obat</label>
              <input type="text" name="nama" id="nama" class="form-control" value="{{ $barang->nama }}" required>
            </div>
            <div class="form-group">
              <label for="kandungan">Kandungan</label>
              <input type="text" name="kandungan" id="kandungan" class="form-control" value="{{ $barang->kandungan }}" required>
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $barang->jumlah }}" required>
            </div>
            <div class="form-group">
              <label for="price">Harga</label>
              <input type="number" name="price" id="price" class="form-control" value="{{ $barang->price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('barang') }}" class="btn btn-secondary">Batal</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
