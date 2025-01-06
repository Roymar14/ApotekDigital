@extends('layout.master-admin')

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Tambah Barang Masuk Baru</h5>
        </div>
        <div class="card-body">
          <form class="form" action="{{route('admin.barang-masuk.store')}}" method="POST">
            @csrf
            <div class="row">
           
              <div class="col-md-6 pl-1">
                <div class="form-group">
                  <label for="user_id">User</label>
                  <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                    <option value="">Pilih User</option>
                    @foreach ($user as $item)
                    <option value="{{$item->id}}"">{{$item->name}}</option>
                    @endforeach
                  </select>
                  @error('role')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <div class="form-group">
                  <label for="kandungan">Kandungan</label>
                  <input type="text" class="form-control" id="kandungan" name="kandungan" placeholder="kandungan" 
                  value="{{ old('kandungan') }}" required>
                  @error('kandungan')
                    <div style="color: red;">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label for="nama">Obat</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" 
                  value="{{ old('nama') }}" required>
                  @error('nama')
                    <div style="color: red;">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="jumlah" 
                  value="{{ old('jumlah') }}" step="0.01" required>
                  @error('jumlah')jumlah
                    <div style="color: red;">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-6 pl-1">
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" class="form-control" id="price" name="price" placeholder="price" 
                      value="{{ old('price') }}" required>
                      @error('price')
                        <div style="color: red;">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Barang</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
