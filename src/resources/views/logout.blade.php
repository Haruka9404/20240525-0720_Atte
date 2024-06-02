@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/logout.css')}}">
@endsection

@section('header')
@endsection

@section('content')
<div class="content">
    <div class="content-logout">
        <div class="content-logout__text">ログアウトしました</div>
        <a class="content-logout__link" href="/login">ログイン画面へ</a>
    </div>
</div>
@endsection('content')