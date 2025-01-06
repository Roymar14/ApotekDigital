@extends('layout.master-admin')

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Tambah Gaji Pegawai </h4>
        </div>
        <div class="card-body">
          <form action="{{ route('gaji.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="user_id">Pilih Pegawai</label>
              <select name="user_id" id="user_id" class="form-control">
                <option value="" disabled selected>Pilih Pegawai</option>
                @foreach ($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
              @error('user_id')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="gaji">Gaji</label>
              <input type="number" name="gaji" id="gaji" class="form-control" placeholder="Masukkan Gaji">
              @error('gaji')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option value="">Pilih Status</option>
                   <option value="pending">Pending</option>
                   <option value="done">Done</option>
                </select>
                @error('barangs_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
