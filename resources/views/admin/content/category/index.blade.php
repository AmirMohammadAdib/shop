@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> دسته بندی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        دسته بندی
                    </h5>
                </section>

                @include('admin.alerts.alert-section.success')

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route("content.category.create") }}" class="btn btn-info btn-sm text-white">ایجاد دسته بندی</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام دسته بندی</th>
                                <th>توضیحات</th>
                                <th>اسلاگ</th>
                                <th>عکس</th>
                                <th>تگ ها</th>
                                <th>وضعیت</th>
                                <th class="width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($postCategories as $key => $postCategory)
                                <tr>
                                    <th>{{ $key+=1 }}</th>
                                    <td>{{ $postCategory->name }}</td>
                                    <td>{{ $postCategory->description }}</td>
                                    <td>{{ $postCategory->slug }}</td>
                                    <td><img src="{{ asset($postCategory->image['indexArray'][$postCategory->image['currentImage']]) }}" width="100" height="50"></td>
                                    <td>{{ $postCategory->tags }}</td>
                                    <td>
                                        <label for="">
                                            <input type="checkbox" name="status" @if($postCategory->status === 1) checked @endif id="{{ $postCategory->id }}" data-url="{{ route("content.category.status", [$postCategory]) }}" onChange="chageStatus({{ $postCategory->id }})">
                                        </label>
                                    </td>
                                    <td class="width-16-rem">
                                        <a href="{{ route("content.category.edit", [$postCategory->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                        <form class="d-inline" action="{{ route('content.category.destroy', $postCategory->id) }}" method="post">
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
@endsection

@section('script')
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
                            toast("دسته بندی با موفقیت فعال شد", 'success')
                        }else{
                            element.prop("checked", false);
                            toast("دسته بندی با موفقیت غیرفعال شد", 'success')
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
        }
    </script>
    @include("admin.alerts.sweetalert.delete-confirm", ["className" => 'delete'])
@endsection
