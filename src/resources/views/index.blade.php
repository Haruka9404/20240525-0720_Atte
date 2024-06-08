@extends('layouts/app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css')}}">
@endsection

@section('header')

@endsection

@section('content')
<div class="content">
    <div class="content-title">
        <div class="content-title__inner">
            <p><?php $user = Auth::user(); ?>{{ $user->name }}さん お疲れ様です！</p>
        </div>
    </div>
    <div class="timestamp-content">
        <div class="timestamp-content__attendance">
            <form class="timestamp-content__attendance__button" action="#" method="post">
            @csrf
                <button class="timestamp-content__attendance__button-submit" type="submit">勤務開始</button>
            </form>
            <form class="timestamp-content__attendance__button" action="#" method="post">
            @csrf
                <button class="timestamp-content__attendance__button-submit" type="submit">勤務終了</button>
            </form>
        </div>

        <div class="timestamp-content_rest">
            <form class="timestamp-content__rest__button" action="#" method="post">
            @csrf
                <button class="timestamp-content__rest__button-submit" type="submit">休憩開始</button>
            </form>
            <form class="timestamp-content__rest__button" action="#" method="post">
            @csrf
                <button class="timestamp-content__rest__button-submit" type="submit">休憩終了</button>
            </form>
        </div>
    </div>
@endsection