@extends('layouts.auth')

@section('title', 'Login :: SIM Peminjaman')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
	<h1 class="display-4 text-center mb-10">Selamat Datang</h1>
	<p class="text-center mb-30">Silahkan Login Terlebih Dahulu</p> 
	@if ($errors->any())
	  @foreach ($errors->all() as $error)
	  <div class="alert alert-danger" role="alert">
	    {{ $error }}
	  </div>
	  @endforeach
	@endif
	<div class="form-group">
		<input class="form-control  @error('username') is-invalid @enderror" placeholder="Username" type="text" value="{{ old('email') }}" required autofocus name="username">
	</div>
	<div class="form-group">
		<input class="form-control @error('password') is-invalid @enderror" placeholder="Password" type="password" name="password" required>
	</div>
	<button class="btn btn-primary btn-block" type="submit">Login</button>
	
</form>
@endsection