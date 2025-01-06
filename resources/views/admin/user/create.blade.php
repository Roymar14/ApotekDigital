@extends('layout.master-admin')

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Tambah User Baru</h5>
        </div>
        <div class="card-body">
          <form class="form" action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <!-- Nama -->
            <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama" required>
                  @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <!-- Email -->
              <div class="col-md-6 pl-1">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
                  @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            
            <!-- Kontak dan Role -->
            <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label for="contact">Kontak</label>
                  <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ old('contact') }}" placeholder="Masukkan kontak" required>
                  @error('contact')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 pl-1">
                <div class="form-group">
                  <label for="role">Role</label>
                  <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                    <option value="">Pilih Role</option>
                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Supplier" {{ old('role') == 'Supplier' ? 'selected' : '' }}>Supplier</option>
                    <option value="Pegawai" {{ old('role') == 'Pegawai' ? 'selected' : '' }}>Pegawai</option>
                  </select>
                  @error('role')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <!-- Password -->
            <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password" required>
                  @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            
            <!-- Alamat -->
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="4" placeholder="Masukkan alamat lengkap" required>{{ old('alamat') }}</textarea>
                  @error('alamat')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Tambah User</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
