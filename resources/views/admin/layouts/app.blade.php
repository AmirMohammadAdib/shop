<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/media-1600.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/media-992.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/media-740.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/media-600.css') ?>">

    <link rel="stylesheet" href="<?= asset('https://meping.ir/ping/public/css/media-499.css') ?>">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- font awosom -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.8/sweetalert2.min.js" integrity="sha512-c1AfYKag4intaizqJC0Zx1NxImYP7B2namyOLbpFW3P12oYkZjQGQ/8r6N75SlWidbm7oQElnVZqBzRvFtU0Hw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.8/sweetalert2.css" integrity="sha512-JzSVRb7c802/njMbV97pjo1wuJAE/6v9CvthGTDxiaZij/TFpPQmQPTcdXyUVucsvLtJBT6YwRb5LhVxX3pQHQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('head')
</head>

<body>
    @include('admin.layouts.sidebar')
    <div class="container" id="container_admin">
        <div class="head-container">
            <div id="menu-mobile">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </div>
            <h2>امیر محمد ادیب به @yield("section_name")
                خوش آمدی</h2>
        </div><br>
        @yield('content')
    </div>
    <div id="back"></div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="<?= asset('js/app.js') ?>"></script>
<script src="<?= asset('js/chart.js') ?>"></script>
<script src="{{ asset("js/getting-ping.js") }}"></script>
@yield('script')

</html>
