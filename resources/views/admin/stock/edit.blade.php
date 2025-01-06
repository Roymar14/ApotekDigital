{{-- resources/views/barang/edit.blade.php --}}
@extends('layout.master-admin')

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Stock</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="barang">Name</label>
              <input type="text" name="barang" class="form-control" id="barang" value="{{ old('barang', $barang->barang) }}" required>
            </div>
            <div class="form-group">
              <label for="kandungan">Kandungan</label>
              <input type="text" name="kandungan" class="form-control" id="kandungan" value="{{ old('kandungan', $barang->kandungan) }}" required>
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input type="number" name="jumlah" class="form-control" id="jumlah" value="{{ old('jumlah', $barang->jumlah) }}" required>
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" name="price" class="form-control" id="price" value="{{ old('price', $barang->price) }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
