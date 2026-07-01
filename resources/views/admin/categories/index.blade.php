@extends('admin.layouts.master')

@section('content')
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="table overflow-auto" tabindex="8">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl">
                        </div>
                    </div>
                    @include('admin.layouts.partials.messages')
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th class="text-center align-middle text-primary">ردیف</th>
                            <th class="text-center align-middle text-primary">عنوان دسته بندی</th>
                            <th class="text-center align-middle text-primary">دسته بندی مادر</th>
                            <th class="text-center align-middle text-primary">ویرایش</th>
                            <th class="text-center align-middle text-primary">حذف</th>
                            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $index => $category)
                            <tr>
                                <td class="text-center align-middle">{{$categories->firstItem() + $index}}</td>
                                <td class="text-center align-middle">{{$category->title}}</td>
                                <td class="text-center align-middle">{{$category->parentCategory->title}}</td>
                                <td class="text-center align-middle">
                                    <a class="btn btn-outline-info"
                                       href="{{route('admin.categories.edit',$category->id)}}">
                                        ویرایش
                                    </a>
                                </td>
                                <td class="text-center align-middle">
                                    <a class="btn btn-outline-danger" onclick="deleteCategory({{$category->id}})"
                                       href="#">
                                        حذف
                                    </a>
                                </td>
                                <td class="text-center align-middle">{{Hekmatinasser\Verta\Verta::instance($category->created_at)->format('%d %B، %Y')}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <div style="margin: 40px !important;"
                         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function deleteCategory($id) {
            Swal.fire({
                title: "آیا از حذف این دسته بندی اطمینان دارید؟",
                text: "تمامی دسته بندی های زیر مجموعه این دسته بندی نیز حذف خواهند شد!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "بله!",
                cancelButtonText: "خیر"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/admin/categories/' + $id,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function (data) {
                            Swal.fire({
                                title: "دسته بندی حذف شد!",
                                text: data.success,
                                icon: "success"
                            });
                            location.reload();
                        }
                    });
                }
            });
        }
    </script>
@endpush
