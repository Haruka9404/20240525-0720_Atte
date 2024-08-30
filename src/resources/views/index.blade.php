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
            <p><?php $user = Auth::user(); ?>{{ optional($user)->name }}さん お疲れ様です！</p>
            <p><?php $user = Auth::user(); ?>{{ session('my_status') }}</p>
            <div class="timestamp__error">
                <p><?php $user = Auth::user(); ?>{{ session('error') }}</p>
            </div>
        </div>
    </div>
    <div class="timestamp-content">
        <div class="timestamp-content__attendance">
            <form class="timestamp-content__attendance__button" action="/attendance_start" method="post">
            @csrf
                <button class="timestamp-content__attendance__button-submit" name="attendance_start" type="submit">勤務開始</button>
            </form>
            <form class="timestamp-content__attendance__button" action="/attendance_end" method="post">
            @csrf
                <button class="timestamp-content__attendance__button-submit" type="submit">勤務終了</button>
            </form>
        </div>

        <div class="timestamp-content_rest">
            <form class="timestamp-content__rest__button" action="rest_start" method="post">
            @csrf
            @if (Auth::check())
                <button class="timestamp-content__rest__button-submit" name="rest_start" type="submit" <?php $result = "disabled";
                if ( $restStart ) {
                    $result = "";
                }
                echo $result;?>>休憩開始</button>
            </form>
            <form class="timestamp-content__rest__button" action="rest_end" method="post">
            @endif

            @csrf
            @if (Auth::check())
                <button class="timestamp-content__rest__button-submit" type="submit" <?php $result = "disabled";
                if ( $restEnd ) {
                    $result = "";
                }
                echo $result;?>>休憩終了</button>
            @endif
            </form>
        </div>
    </div>
@endsection