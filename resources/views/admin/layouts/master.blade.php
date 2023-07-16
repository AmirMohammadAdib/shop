<!DOCTYPE html>
<html lang="en">
    <head>
        @include("admin.layouts.head-tag")
        @yield("head-tag")
    </head>

    <body dir="rtl">
        <!-- header -->
            @include("admin.layouts.header")
        <!-- header -->

        <section class="body-container">
            @include("admin.layouts.sidebar")
            <section class="main-body" id="main-body">
                @yield("content")
            </section>
        </section>
        @include("admin.layouts.scripts")
    </body>
</html>
