@extends('layouts.app')

@section('title', 'Login')

@section('content')


<div class="frame">
    <img class="HAND" src="{{ asset('img/Login/HAND.png') }}" alt="Hand Background">

    <div class="welcome-text">
        <div class="text-wrapper-4">Hello Nailist!</div>
        <p class="ready-to-dive-in-log">Ready to dive in?<br>Log in to your account</p>
    </div>

    <div class="vektor-tangan-wrapper">
        <img class="vektor-tangan" src="{{ asset('img/Login/Vektor Tangan.png') }}" alt="Vector Hand">
    </div>

    <form class="login" method="POST" action="#">
        @csrf
        <div class="text-wrapper">LUXE NAIL</div>

        <div class="div-wrapper">
            <input type="text" name="username" placeholder="Username" required>
        </div>

        <div class="div-wrapper">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit" class="login-2">Log in</button>
    </form>
</div>
@endsection
