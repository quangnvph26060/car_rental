@extends('admin.layout.master')
@section('title')
    Danh sách danh mục tin tức
@endsection
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Danh sách danh mục tin tức</h4>
                        <div>
                            <button id="add-categories-post-btn" data-bs-toggle="modal"
                                data-bs-target="#addCategoriesPostModal" class="btn btn-success">Thêm danh mục</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên danh mục</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($categories as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="#" id="{{ $item->id }}"
                                                        class="m-1 d-block btn btn-primary editIconCategoriesPost"
                                                        data-bs-toggle="modal" data-bs-target="#editCategoriesPostModal"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('admin.categories-post.destroy', $item->id) }}"
                                                        class="m-1 d-block btn btn-danger delete-item"><i
                                                            class="fa-solid fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- add new benefit modal start --}}
    <div class="modal fade" id="addCategoriesPostModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm lợi ích</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_categories_post_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="name">Tên danh mục</label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
                            <span class="text-danger error-text name_error" style="color: red"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="add_categories_post_btn" class="btn btn-primary">Xác nhận</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- add new benefit modal end --}}
    {{-- edit benefit modal start --}}
    <div class="modal fade" id="editCategoriesPostModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa lợi ích</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_categories_post_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="categories_post_id" id="categories_post_id">
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="name">Tên danh mục</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Nhập tên danh mục">
                            <span class="text-danger error-text name_error" style="color: red"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="edit_categories_post_btn" class="btn btn-success">Cập nhật</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- edit benefit modal end --}}
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            dataTableRental([0])
            $('#add_categories_post_form').submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_categories_post_btn").text('Đang thêm...');
                $("#add_categories_post_btn").prop('disabled', true);
                $.ajax({
                    url: '{{ route('admin.categories-post.store') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            Swal.fire(
                                'Hoàn thành',
                                'Thêm cam danh mục tin tức thành công!',
                                'success'
                            )
                        }
                        $(".error-text").text('');
                        $("#add_categories_post_btn").text('Xác nhận');
                        $("#add_categories_post_btn").prop('disabled', false);
                        $("#add_categories_post_form")[0].reset();
                        $("#addCategoriesPostModal").modal('hide');
                        window.location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.validation_errors;
                            printErrorMsg(errors)
                            $("#add_categories_post_btn").text('Xác nhận');
                            $("#add_categories_post_btn").prop('disabled', false);
                        }
                    }
                })
            })


            function printErrorMsg(msg) {
                $(".error-text").text('');
                $.each(msg, function(key, value) {
                    $('.' + key + '_error').text(value[0]);
                });
            }

            $(document).on('change', '.change-status-benefit', function() {
                var benefitId = $(this).data('id');
                var status = $(this).find(":selected").val()
                $.ajax({
                    url: '{{ route('admin.benefits.change.status') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        benefitId,
                        status
                    },
                    success: function(response) {
                        alert(response.success);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            })
            $(document).on('click', '.editIconCategoriesPost', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('admin.categories-post.edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#name').val(response.name)

                        $('#categories_post_id').val(response.id)
                    }
                })
            })

            $("#edit_categories_post_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_categories_post_btn").text('Đang thêm...');
                $("#edit_categories_post_btn").prop('disabled', true);
                $.ajax({
                    url: '{{ route('admin.categories-post.update') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                            Swal.fire(
                                'Đã cập nhật!',
                                'Đã cập nhật cam kết thành công',
                                'success'
                            )
                        }
                        $("#edit_categories_post_form")[0].reset();
                        $("#editCategoriesPostModal").modal('hide');
                        $("#edit_categories_post_btn").text('Cập nhật');
                        $("#edit_categories_post_btn").prop('disabled', false);
                        window.location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.validation_errors;
                            printErrorMsg(errors)
                            $("#edit_categories_post_btn").text('Xác nhận');
                            $("#edit_categories_post_btn").prop('disabled', false);
                        }
                    }
                });
            });

            $('#addCategoriesPostModal , #editCategoriesPostModal').on('hidden.bs.modal', function() {
                $('#edit_categories_post_form')[0].reset();
                $('#add_categories_post_form')[0].reset();
                $(".error-text").text('');
            });
        });
    </script>
@endpush
