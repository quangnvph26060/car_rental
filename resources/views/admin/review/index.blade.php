@extends('admin.layout.master')
@section('title')
    Danh sách đánh giá của khách hàng
@endsection
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Danh sách đánh giá của khách hàng</h4>
                        <div>
                            <button id="add-review-btn" data-bs-toggle="modal" data-bs-target="#addReviewModal"
                                class="btn btn-success">Thêm đánh giá của khách hàng</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên khách hàng</th>
                                        <th>Hình ảnh</th>
                                        <th>Vai trò</th>
                                        <th>Đánh giá</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Tên khách hàng</th>
                                        <th>Hình ảnh</th>
                                        <th>Vai trò</th>
                                        <th>Đánh giá</th>
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($reviews as $review)
                                        <tr>
                                            <td>{{ $review->customer_name }}</td>
                                            <td><img src="{{ showImage($review->avatar) }}" width="100" height="100"
                                                    alt=""></td>
                                            <td>{{ $review->customer_role }}</td>
                                            <td> {{ \Str::limit($review->comment, 50) }}</td>
                                            <td>

                                                <div class="d-flex">
                                                    <a href="#" id="{{ $review->id }}"
                                                        class="m-1 d-block btn btn-primary editIconReview"
                                                        data-bs-toggle="modal" data-bs-target="#editReviewModal"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('admin.reviews.destroy', $review->id) }}"
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
    <div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm đánh giá</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_review_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="customer_name">Tên khách hàng</label>
                                <input type="text" name="customer_name" class="form-control"
                                    placeholder="Nhập tên khách hàng">
                                <span class="text-danger error-text customer_name_error" style="color: red"></span>
                            </div>
                            <div class="col-lg">
                                <label for="avatar">Chọn hình ảnh</label>
                                <input type="file" name="avatar" class="form-control"
                                    onchange="loadFile(event ,'outputAvatar')">
                                <span class="text-danger error-text avatar_error" style="color: red"></span> <br>
                                <img id="outputAvatar" src="{{ asset('backend/assets/img/no-image.jpg') }}" width="120"
                                    height="120" class="mt-3 border" /> <br>
                            </div>
                            <div class="col-lg">
                                <label for="customer_role">Vai trò khách hàng</label>
                                <input type="text" name="customer_role" class="form-control"
                                    placeholder="Nhập vai trò (Chú rể, cô dâu....)">
                                <span class="text-danger error-text customer_role_error" style="color: red"></span>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="comment">Đánh giá khách hàng</label> <br>
                            <textarea name="comment" class="form-control" cols="10" rows="10" placeholder="Nhập mô tả"></textarea>
                            <span class="text-danger error-text comment_error" style="color: red"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="add_review_btn" class="btn btn-primary">Xác nhận</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- add new benefit modal end --}}
    {{-- edit benefit modal start --}}
    <div class="modal fade" id="editReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật đánh giá</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_review_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="review_id" id="review_id">
                    <input type="hidden" name="review_avatar" id="review_avatar">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="customer_name">Tên khách hàng</label>
                                <input type="text" name="customer_name" id="customer_name" class="form-control"
                                    placeholder="Nhập tên khách hàng">
                                <span class="text-danger error-text customer_name_error" style="color: red"></span>
                            </div>
                            <div class="col-lg">
                                <label for="avatar">Chọn hình ảnh</label>
                                <input type="file" name="avatar" class="form-control"
                                    onchange="loadFile(event ,'outputAvatar1')">
                                <span class="text-danger error-text avatar_error" style="color: red"></span> <br>
                                <div id="showAvatar">

                                </div>
                            </div>
                            <div class="col-lg">
                                <label for="customer_role">Vai trò khách hàng</label>
                                <input type="text" name="customer_role" id="customer_role" class="form-control"
                                    placeholder="Nhập vai trò (Chú rể, cô dâu....)">
                                <span class="text-danger error-text customer_role_error" style="color: red"></span>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="comment">Đánh giá khách hàng</label> <br>
                            <textarea name="comment" class="form-control" id="comment" cols="10" rows="10"
                                placeholder="Nhập mô tả"></textarea>
                            <span class="text-danger error-text comment_error" style="color: red"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="edit_review_btn" class="btn btn-success">Cập nhật</button>
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
            $('#add_review_form').submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_review_btn").text('Đang thêm...');
                $("#add_review_btn").prop('disabled', true);
                $.ajax({
                    url: '{{ route('admin.reviews.store') }}',
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
                                'Thêm đánh giá thành công!',
                                'success'
                            )
                        }
                        $(".error-text").text('');
                        $("#add_review_btn").text('Xác nhận');
                        $("#add_review_btn").prop('disabled', false);
                        $("#add_review_form")[0].reset();
                        $("#addReviewModal").modal('hide');
                        window.location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.validation_errors;
                            printErrorMsg(errors)
                            $("#add_review_btn").text('Xác nhận');
                            $("#add_review_btn").prop('disabled', false);
                        }
                    }
                })
            })
            $('#addReviewModal , #editReviewModal').on('hidden.bs.modal', function() {
                $('#add_review_form')[0].reset();
                $('#edit_review_form')[0].reset();
                $(".error-text").text('');
            });

            function printErrorMsg(msg) {
                $(".error-text").text('');
                $.each(msg, function(key, value) {
                    $('.' + key + '_error').text(value[0]);
                });
            }
            $(document).on('click', '.editIconReview', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('admin.reviews.edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#customer_name').val(response.customer_name)
                        $('#customer_role').val(response.customer_role)
                        $('#showAvatar').html(` <img id="outputAvatar1" src="{{ asset('storage/${response.avatar}') }}"
                                        width="120" height="120" class="mt-3 border" />`)
                        $('#comment').val(response.comment)
                        $('#review_id').val(response.id)
                        $('#review_avatar').val(response.avatar)
                    }
                })
            })

            $("#edit_review_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_review_btn").text('Đang thêm...');
                $("#edit_review_btn").prop('disabled', true);
                $.ajax({
                    url: '{{ route('admin.reviews.update') }}',
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
                                'Đã cập nhật đánh giá thành công',
                                'success'
                            )
                        }
                        $("#edit_review_form")[0].reset();
                        $("#editReviewModal").modal('hide');
                        $("#edit_review_btn").text('Cập nhật');
                        $("#edit_review_btn").prop('disabled', false);
                        window.location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.validation_errors;
                            printErrorMsg(errors)
                            $("#edit_review_btn").text('Xác nhận');
                            $("#edit_review_btn").prop('disabled', false);
                        }
                    }
                });
            });
        });
    </script>
@endpush
