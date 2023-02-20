@extends('auth.layouts.app')

@section('title')
    ثبت نام - 403
@endsection

@section('content')
    <div class="container-login">
        <h1 id="header_title_login">آزاد از تحریم ها</h1>
        <div class="login-box">
            <div class="poster-login">
                <i class="fa-sharp fa-solid fa-circle"></i>
                <span></span>
            </div>
            <div class="fields-login">
                <div class="head-login">
                    <h1>خوشحالیم که مارو انتخاب کردید:)</h1>
                    <p>خوش اومدی رفیق! لطفا اطلاعاتت رو وارد کن</p>
                </div><br>
                <div class="datalis">
                    <form action="" method="post">
                        @csrf
                        <label for="">نام</label><br>
                        <input type="text" name="name" placeholder="لطفا نام خود را وارد کنید"><br><br>
                        <label for="">ایمیل</label><br>
                        <input type="email" name="email" placeholder="لطفا ایمیل خود را وارد کنید"><br><br>
                        <label for="">پسوورد</label><br>
                        <input type="password" name="password" placeholder="لطفا پسوورد خود را وارد کنید"><br><br><br>
                        <input type="submit" value="ثبت نام">
                    </form>
                    <p id="make_account">حساب کاربری داری؟ <a href="<?= url("/login") ?>">ورود</a></p>
                </div>
            </div>
        </div>
    </div>
    @include("alerts.error")
    @include("alerts.warning")
    @include("alerts.info")

@endsection
