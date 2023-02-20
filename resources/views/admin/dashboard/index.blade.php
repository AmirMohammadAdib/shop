@extends('admin.layouts.app')

@section('title')
    <title>403 - سامانه دور زدن تحریم های تجاری</title>
@endsection

@section('section_name')
    پنل مدیریت
@endsection

@section('content')
    <div class="dashboard">
        {{-- games --}}
        <div class="box-dashboard" style="margin-bottom: 20px">
            <h3>سرویس های موجود</h3>
            <div class="added_item">
                <a href="{{ url("/admin/game/create") }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    <p>افزودن سرویس</p>
                </a>
            </div>
            @foreach ($services as $service)
                <div class="game" style="background-image: url({{ $service->picture }})"
                    style="height: auto; padding: 20px;" id="dashboard_game">
                    <h2>{{ $service->name }}</h2>
                </div>
            @endforeach
        </div>
        {{-- avrage ping --}}
        <div class="box-dashboard" style="margin-bottom: 20px">
            <h3>مسیر های دور زدن تحریم</h3>
            <div class="added_item">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    <p>افزودن مسیر</p>
                </a>
            </div>
            @foreach ($crossings as $crossing)
                <div class="game"
                    style="background-image: url(); padding: 0; height: 100px; margin-bottom: 20px;"
                    id="dashboard_game">
                    <div class="ping-dashbord">
                        <p>
                           {{ $crossing->name }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- list ip --}}
        <div class="box-dashboard" id="every_ip" style="width: 100%">
            <div class="added_item">
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    <p>افزودن آموزش</p>
                </a>
            </div>
            <h3>لیست تمامی آموزش های موجود</h3>
            @foreach ($trainings as $training)
                <div class="game" style="background-color: rgba(51, 51, 51, 0.745); height: 80px; justify-content: space-around;"
                    id="every_ip_box">
                    <div>
                        <h6>آموزش دستگاه</h6>
                        <p style="text-align: center; font-size: 25px; font-family: 'kalameh_light'; color: var(--white);">{{ $training->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
