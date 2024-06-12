@extends('layouts.auth')

@section('title', 'Register :: SIM Peminjaman')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf
	<h1 class="display-4 text-center mb-10">Register</h1>
	<p class="text-center mb-30">Silahkan Lengkapi Formulir Terlebih Dahulu</p> 
	@if ($errors->any())
	  @foreach ($errors->all() as $error)
	  <div class="alert alert-danger" role="alert">
	    {{ $error }}
	  </div>
	  @endforeach
	@endif
	<div class="form-group">
		<input class="form-control  @error('name') is-invalid @enderror" placeholder="Name" type="text" value="{{ old('name') }}" required autofocus name="name">
	</div>
	<div class="form-group">
		<input class="form-control  @error('username') is-invalid @enderror" placeholder="Username" type="text" value="{{ old('username') }}" required autofocus name="username">
	</div>
	<div class="form-group">
		<input class="form-control @error('password') is-invalid @enderror" placeholder="Password" type="password" name="password" required>
	</div>
	<div class="form-group">
		<input class="form-control" placeholder="Ketik Ulang Password" type="password" name="password_confirmation" required>
	</div>
	<button class="btn btn-primary btn-block" type="submit">Login</button>
	
</form>
@endsection