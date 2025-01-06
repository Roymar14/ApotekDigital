@extends('layout.master-admin')

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit User</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" 
                         value="{{ old('name', $user->name) }}" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" 
                         value="{{ old('email', $user->email) }}" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="contact">Contact</label>
                  <input type="text" class="form-control" id="contact" name="contact" 
                         value="{{ old('contact', $user->contact) }}" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="role">Jabatan</label>
                  <input type="text" class="form-control" id="role" name="role" 
                         value="{{ old('role', $user->role) }}" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $user->alamat) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
