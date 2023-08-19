@extends('admin.layouts.master')

@section('head-tag')
    <title>پست ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> پست ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        پست ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('post.create') }}" class="btn btn-info btn-sm text-white">ایجاد پست</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان پست</th>
                                <th>دسته</th>
                                <th>تصویر</th>
                                <th>وضعیت</th>
                                <th>درج کامنت</th>

                                <th class="width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $post)
                                <tr>
                                    <th>{{ $key += 1 }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td><img src="{{ asset($post->image['indexArray'][$post->image['currentImage']]) }}"
                                            width="100" height="50"></td>
                                    <td>
                                        <label for="">
                                            <input type="checkbox" name="status"
                                                @if ($post->status === 1) checked @endif
                                                id="{{ $post->id }}"
                                                data-url="{{ route('post.status', [$post]) }}"
                                                onChange="chageStatus({{ $post->id }})">
                                        </label>
                                    </td>
                                    <td>
                                        <label for="">
                                            <input type="checkbox" name="commentable"
                                                @if ($post->commentable === 1) checked @endif
                                                id="commentable-{{ $post->id }}"
                                                data-url-commentable="{{ route('post.commentable', [$post]) }}"
                                                onChange="chagecCommentable({{ $post->id }})">
                                        </label>
                                    </td>
                                    <td class="width-16-rem lefter text-left">
                                        <a href="{{ route("post.edit", [$post]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                                            ویرایش</a>
                                            <form class="d-inline" action="{{ route('post.destroy', $post->id) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>

    <script>
        function chageStatus(id){
            var element = $("#" + id)
            var url = element.attr("data-url")
            var element_value = !element.prop("checked")

            $.ajax({
                url: url,
                type: "GET",
                success: (response) => {
                    if(response.status){
                        if(response.checked){
                            element.prop("checked", true);
                            toast("پست با موفقیت فعال شد", 'success')
                        }else{
                            element.prop("checked", false);
                            toast("پست با موفقیت غیرفعال شد", 'success')
                        }
                    }else{
                        element.prop("checked", element_value);
                        toast("هنگام ویرایش مشکلی پیش آمده است", 'error')
                    }
                },
                error: () => {
                    toast("ارتباط برقرار نشد", 'error')
                }
            })
        }

        function chagecCommentable(id){
            var element = $("#commentable-" + id)
            var url = element.attr("data-url-commentable")
            var element_value = !element.prop("checked")

            $.ajax({
                url: url,
                type: "GET",
                success: (response) => {
                    if(response.status){
                        if(response.checked){
                            element.prop("checked", true);
                            toast("پست با موفقیت مجاز به کامنت گذاری شد", 'success')
                        }else{
                            element.prop("checked", false);
                            toast("پست با موفقیت غیر مجاز به کامنت گذاری شد", 'success')
                        }
                    }else{
                        element.prop("checked", element_value);
                        toast("هنگام ویرایش مشکلی پیش آمده است", 'error')
                    }
                },
                error: () => {
                    toast("ارتباط برقرار نشد", 'error')
                }
            })
        }

        
        function toast(message, type) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: type,
                    title: message
                })
            }
    </script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

    @include("admin.alerts.sweetalert.delete-confirm", ["className" => 'delete'])

@endsection
