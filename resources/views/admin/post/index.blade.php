@extends('admin.layout.master')
@section('title')
    Danh sách bài viết
@endsection
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Danh sách bài viết</h4>
                        <div>
                            <button id="add-post-btn" data-bs-toggle="modal" data-bs-target="#addPostModal"
                                class="btn btn-success">Thêm bài viết</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Hình ảnh</th>
                                        <th>Danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Hình ảnh</th>
                                        <th>Danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->title }}</td>
                                            <td><img src="{{ showImage($post->image) }}" width="100" height="100"
                                                    alt=""></td>
                                            <td>{{ $post->categoryPost->name }}</td>
                                            <td> <select name="status" data-id="{{ $post->id }}"
                                                    class="form-control change-status-post">
                                                    <option {{ $post->status === 1 ? 'selected' : '' }} value="1">
                                                        Công khai</option>
                                                    <option {{ $post->status === 0 ? 'selected' : '' }} value="0">
                                                        Không công khai</option>
                                                </select></td>
                                            <td>

                                                <div class="d-flex">
                                                    <a href="#" id="{{ $post->id }}"
                                                        class="m-1 d-block btn btn-primary editIconPost"
                                                        data-bs-toggle="modal" data-bs-target="#editPostModal"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('admin.posts.destroy', $post->id) }}"
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
    <div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm lợi ích</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_post_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="title">Tiêu đề</label>
                                <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề">
                                <span class="text-danger error-text title_error" style="color: red"></span>
                            </div>
                            <div class="col-lg">
                                <label for="title">Danh mục</label>
                                <select name="category_post_id" id="" class="form-control">
                                    <option value="">-- Chọn danh mục --</option>
                                    @if ($categories->isNotEmpty())
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Chưa có danh mục nào, hãy thêm</option>
                                    @endif

                                </select>
                                <span class="text-danger error-text title_error" style="color: red"></span>
                            </div>
                            <div class="col-lg">
                                <label for="image">Chọn hình ảnh</label>
                                <input type="file" name="image" class="form-control"
                                    onchange="loadFile(event ,'outputImage')">
                                <span class="text-danger error-text image_error" style="color: red"></span> <br>
                                <img id="outputImage" src="{{ asset('backend/assets/img/no-image.jpg') }}" width="120"
                                    height="120" class="mt-3 border" /> <br>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="description">Mô tả</label> <br>
                            <textarea name="description" class="form-control ckeditor" id="content1" cols="10" rows="10"
                                placeholder="Nhập mô tả"></textarea>
                            <span class="text-danger error-text description_error" style="color: red"></span>
                        </div>
                        <div class="my-2">
                            <div class="form-group">
                                <label>Trạng thái</label><br />
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" checked name="status"
                                            value="1" id="flexRadioDefault1" />
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Công khai
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="0"
                                            id="flexRadioDefault2" />
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Không công khai
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="add_post_btn" class="btn btn-primary">Xác nhận</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- add new benefit modal end --}}
    {{-- edit benefit modal start --}}
    <div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật bài biết</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_post_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="post_id" id="post_id">
                    <input type="hidden" name="post_image" id="post_image">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="title">Tiêu đề bài viết</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="Tiêu đề bài viết">
                                <span class="text-danger error-text title_error" style="color: red"></span>
                            </div>
                            <div class="col-lg">
                                <label for="title">Danh mục</label>
                                <select name="category_post_id" id="category_post_id" class="form-control">
                                    <option value="">-- Chọn danh mục --</option>
                                    @if ($categories->isNotEmpty())
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="">Chưa có danh mục nào, hãy thêm</option>
                                    @endif

                                </select>
                                <span class="text-danger error-text title_error" style="color: red"></span>
                            </div>
                            <div class="col-lg">
                                <label for="image">Chọn hình ảnh</label>
                                <input type="file" name="image" id="image" class="form-control"
                                    onchange="loadFile(event ,'outputImage1')">
                                <span class="text-danger error-text image_error" style="color: red"></span> <br>
                                <div id="showImage">

                                </div>
                                <br>
                                <span class="text-danger error-text image_error" style="color: red"></span>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="description">Mô tả</label> <br>
                            <textarea name="description" class="form-control ckeditor" id="content2" cols="10" rows="10"
                                placeholder="Nhập mô tả"></textarea>
                            <span class="text-danger error-text description_error" style="color: red"></span>
                        </div>
                        <div class="my-2">
                            <div class="form-group">
                                <label>Trạng thái</label><br />
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="1"
                                            id="status1" />
                                        <label class="form-check-label" for="status1">
                                            Công khai
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="0"
                                            id="status0" />
                                        <label class="form-check-label" for="status0">
                                            Không công khai
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="edit_post_btn" class="btn btn-success">Cập nhật</button>
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
            $('#add_post_form').submit(function(e) {
                e.preventDefault();
                CKEDITOR.instances['content1'].updateElement();
                const fd = new FormData(this);
                $("#add_post_btn").text('Đang thêm...');
                $("#add_post_btn").prop('disabled', true);
                $.ajax({
                    url: '{{ route('admin.posts.store') }}',
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
                                'Thêm bài viết thành công!',
                                'success'
                            )
                        }
                        $(".error-text").text('');
                        $("#add_post_btn").text('Xác nhận');
                        $("#add_post_btn").prop('disabled', false);
                        $("#add_post_form")[0].reset();
                        $("#addPostModal").modal('hide');
                        window.location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.validation_errors;
                            printErrorMsg(errors)
                            $("#add_post_btn").text('Xác nhận');
                            $("#add_post_btn").prop('disabled', false);
                        }
                    }
                })
            })
            $('#addPostModal , #editPostModal').on('hidden.bs.modal', function() {
                $('#add_post_form')[0].reset();
                $('#edit_post_form')[0].reset();
                $(".error-text").text('');
            });
            function printErrorMsg(msg) {
                $(".error-text").text('');
                $.each(msg, function(key, value) {
                    $('.' + key + '_error').text(value[0]);
                });
            }

            $(document).on('change', '.change-status-post', function() {
                var postId = $(this).data('id');
                var status = $(this).find(":selected").val()
                $.ajax({
                    url: '{{ route('admin.posts.change.status') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        postId,
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
            $(document).on('click', '.editIconPost', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('admin.posts.edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);

                        $('#title').val(response.title)
                        CKEDITOR.instances['content2'].setData(response.description);
                        $('#showImage').html(` <img id="outputImage1" src="{{ asset('storage/${response.image}') }}"
                                        width="120" height="120" class="mt-3 border" />`)
                        if (response.status === 1) {
                            $('#status1').prop('checked', true);
                        } else {
                            $('#status0').prop('checked', true);
                        }
                        $('#post_id').val(response.id)
                        $('#post_image').val(response.image)
                        $('#category_post_id').val(response.category_post_id)
                    }
                })
            })

            $("#edit_post_form").submit(function(e) {
                e.preventDefault();
                CKEDITOR.instances['content2'].updateElement();
                const fd = new FormData(this);
                $("#edit_post_btn").text('Đang thêm...');
                $("#edit_post_btn").prop('disabled', true);
                $.ajax({
                    url: '{{ route('admin.posts.update') }}',
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
                                'Đã cập nhật bài viết thành công',
                                'success'
                            )
                        }
                        $("#edit_post_form")[0].reset();
                        $("#editPostModal").modal('hide');
                        $("#edit_post_btn").text('Cập nhật');
                        $("#edit_post_btn").prop('disabled', false);
                        window.location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.validation_errors;
                            printErrorMsg(errors)
                            $("#edit_post_btn").text('Xác nhận');
                            $("#edit_post_btn").prop('disabled', false);
                        }
                    }
                });
            });
        });
    </script>
@endpush
