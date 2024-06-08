@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth/login.css')}}">
@endsection

@section('header')
@endsection

@section('content')
<div class="content">
    <div class="content-title">
        <div class="content-title__inner">
            <p>ログイン</p>
        </div>
    </div>

    <form class="content-form" action="/login" method="post">
        @csrf
        <div class="content-form__user">
            <div class="content-form__user__email">
                <!--バリデーション機能を実装したら記述します。-->
                <input type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}" />
            </div>
            <div class="form__error">
            @if ($errors->has('email'))
            {{$errors->first('email')}}
            @endif
            </div>

            <div class="content-form__user__password">
            <!--バリデーション機能を実装したら記述します。-->
                <input type="password" name="password" placeholder="パスワード" />
            </div>
            <div class="form__error">
            @if ($errors->has('password'))
            {{$errors->first('password')}}
            @endif
            </div>
        </div>

        <div class="content-form__buttom">
            <button class="content-form__buttom__submit" type="submit">ログイン</button>
        </div>
    </form>

    <div class="content-register">
        <div class="content-register__text">アカウントをお持ちでない方はこちらから</div>
        <a class="content-register__link" href="/register">会員登録</a>
    </div>
</div>
@endsection('content')