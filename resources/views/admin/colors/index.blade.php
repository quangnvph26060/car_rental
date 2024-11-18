@extends('admin.layout.master')
@section('title')
    Danh sách màu sắc xe
@endsection
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Danh sách màu sắc xe</h4>
                        <div>
                            <button id="add-color-btn" data-bs-toggle="modal" data-bs-target="#addColorsModal"
                                class="btn btn-success">Thêm màu</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên màu</th>
                                        <th>Mã màu</th>
                                        <th>Màu</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Mã màu</th>
                                        <th>Màu</th>
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($colors as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->code_color }}</td>
                                            <td>
                                                <div
                                                    style="width: 50px; height: 50px; background-color: {{ $item->code_color }};">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="#" id="{{ $item->id }}"
                                                        class="m-1 d-block btn btn-primary editIconColors"
                                                        data-bs-toggle="modal" data-bs-target="#editColorsModal"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('admin.colors.destroy', $item->id) }}"
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
    <div class="modal fade" id="addColorsModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm màu sắc</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_colors_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="name">Tên màu sắc xe</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Nhập tên màu sắc xe(đen,đỏ,...)">
                            <span class="text-danger error-text name_error" style="color: red"></span>
                        </div>
                        <div class="my-2">
                            <label for="code_color">Mã màu</label>
                            <input type="text" name="code_color" id="code_color_input" class="form-control"
                                placeholder="Nhập mã màu(#FF0000,#FFFF00,...)">
                            <span class="text-danger error-text code_color_error" style="color: red"></span>
                            <div id="color_preview"
                                style="margin-top: 10px; width: 100%; height: 50px; background-color: #fff; border: 1px solid #ccc;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="add_colors_btn" class="btn btn-primary">Xác nhận</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- add new benefit modal end --}}
    {{-- edit benefit modal start --}}
    <div class="modal fade" id="editColorsModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa lợi ích</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_colors_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="color_id" id="color_id">
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="name">Tên màu sắc xe</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Nhập tên màu sắc xe(đen,đỏ,...)">
                            <span class="text-danger error-text name_error" style="color: red"></span>
                        </div>
                        <div class="my-2">
                            <label for="code_color">Mã màu</label>
                            <input type="text" name="code_color" class="form-control" id="code_color"
                                placeholder="Nhập mã màu(#FF0000,#FFFF00,...)">
                            <span class="text-danger error-text code_color_error" style="color: red"></span>
                            <div id="color_preview" class="color_preview"
                                style="margin-top: 10px; width: 100%; height: 50px; background-color: #fff; border: 1px solid #ccc;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="edit_colors_btn" class="btn btn-success">Cập nhật</button>
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
            $('input[name="code_color"]').on('input', function() {
                const colorCode = $(this).val().trim();
                const preview = $('#color_preview');
                if (/^#[0-9A-F]{6}$/i.test(colorCode)) {
                    preview.css('background-color', colorCode);
                    $('.color_preview').css('background-color', colorCode);
                } else {
                    preview.css('background-color', '#fff');
                }
            });
            $('#add_colors_form').submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_colors_btn").text('Đang thêm...');
                $("#add_colors_btn").prop('disabled', true);
                $.ajax({
                    url: '{{ route('admin.colors.store') }}',
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
                                'Thêm cam màu sắc xe thành công!',
                                'success'
                            )
                        }
                        $(".error-text").text('');
                        $("#add_colors_btn").text('Xác nhận');
                        $("#add_colors_btn").prop('disabled', false);
                        $("#add_colors_form")[0].reset();
                        $("#addColorsModal").modal('hide');
                        window.location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.validation_errors;
                            printErrorMsg(errors)
                            $("#add_colors_btn").text('Xác nhận');
                            $("#add_colors_btn").prop('disabled', false);
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
            $(document).on('click', '.editIconColors', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('admin.colors.edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#name').val(response.name)
                        $('#code_color').val(response.code_color)
                        $('#color_id').val(response.id)
                        $('.color_preview').css('background-color', response.code_color);
                    }
                })
            })

            $("#edit_colors_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_colors_btn").text('Đang thêm...');
                $("#edit_colors_btn").prop('disabled', true);
                $.ajax({
                    url: '{{ route('admin.colors.update') }}',
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
                                'Đã cập nhật màu sắc thành công',
                                'success'
                            )
                        }
                        $("#edit_colors_form")[0].reset();
                        $("#editColorsModal").modal('hide');
                        $("#edit_colors_btn").text('Cập nhật');
                        $("#edit_colors_btn").prop('disabled', false);
                        window.location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.validation_errors;
                            printErrorMsg(errors)
                            $("#edit_colors_btn").text('Xác nhận');
                            $("#edit_colors_btn").prop('disabled', false);
                        }
                    }
                });
            });

            $('#addColorsModal , #editColorsModal').on('hidden.bs.modal', function() {
                $('#edit_colors_form')[0].reset();
                $('#add_colors_form')[0].reset();
                $(".error-text").text('');
                $('#color_preview').css('background-color', '#fff');
            });
        });
    </script>
@endpush
