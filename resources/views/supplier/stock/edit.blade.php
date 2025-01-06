@extends('layout.master-admin')

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Edit Barang</h5>
        </div>
        <div class="card-body">
          <form class="form" action="{{ route('admin.barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" 
                  value="{{ old('name', $barang->name) }}" required>
                  @error('name')
                    <div style="color: red;">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <div class="form-group">
                  <label for="kandungan">Kandungan</label>
                  <input type="text" class="form-control" id="kandungan" name="kandungan" 
                  value="{{ old('kandungan', $barang->kandungan) }}" required>
                  @error('kandungan')
                    <div style="color: red;">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label for="stock">Stock</label>
                  <input type="number" class="form-control" id="stock" name="stock" 
                  value="{{ old('stock', $barang->stock) }}" required>
                  @error('stock')
                    <div style="color: red;">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" class="form-control" id="price" name="price" 
                  value="{{ old('price', $barang->price) }}" step="0.01" required>
                  @error('price')
                    <div style="color: red;">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Barang</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
