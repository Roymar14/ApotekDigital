@extends('layout.master-admin')

@section('title', 'Profil Pengguna')

@section('content')
<div class="container">
    <h1>Profil Pengguna</h1>
    <div class="card">
        <div class="card-header">
            Detail Profil
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Tanggal Bergabung:</strong> {{ Auth::user()->created_at->format('d M Y') }}</p>
        </div>
    </div>
</div>
@endsection
