@extends('admin.layout.master')
@section('title')
    Danh sách lợi ích
@endsection
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Danh sách lợi ích</h4>
                        <div>
                            <button id="add-benefit-btn" data-bs-toggle="modal" data-bs-target="#addBenefitModal"
                                class="btn btn-success">Thêm lợi ích</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Icon</th>
                                        <th>Hình ảnh</th>
                                        <th>Mô tả ngắn</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Icon</th>
                                        <th>Hình ảnh</th>
                                        <th>Mô tả ngắn</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($benefits as $benefit)
                                        <tr>
                                            <td>{{ $benefit->title }}</td>
                                            <td><img src="{{ showImage($benefit->icon) }}" width="100" height="100"
                                                    alt=""></td>
                                            <td><img src="{{ showImage($benefit->image) }}" width="100" height="100"
                                                    alt=""></td>
                                            <td>
                                                {{ \Str::limit($benefit->description, 50) }}
                                            </td>
                                            <td> <select name="status" data-id="{{ $benefit->id }}"
                                                    class="form-control change-status-benefit">
                                                    <option {{ $benefit->status === 1 ? 'selected' : '' }} value="1">
                                                        Công khai</option>
                                                    <option {{ $benefit->status === 0 ? 'selected' : '' }} value="0">
                                                        Không công khai</option>
                                                </select></td>
                                            <td>

                                                <div class="d-flex">
                                                    <a href="#" id="{{ $benefit->id }}"
                                                        class="m-1 d-block btn btn-primary editIconBenefit"
                                                        data-bs-toggle="modal" data-bs-target="#editBenefitModal"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('admin.benefits.destroy', $benefit->id) }}"
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
    <div class="modal fade" id="addBenefitModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm lợi ích</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_benefit_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="title">Tiêu đề lợi ích</label>
                            <input type="text" name="title" class="form-control" placeholder="Tiêu đề lợi ích">
                            <span class="text-danger error-text title_error" style="color: red"></span>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <label for="icon">Chọn icon</label>
                                <input type="file" name="icon" class="form-control"
                                    onchange="loadFile(event ,'outputIcon')">
                                <img id="outputIcon" src="{{ asset('backend/assets/img/no-image.jpg') }}" width="120"
                                    height="120" class="mt-3 border" /> <br>
                                <span class="text-danger error-text icon_error" style="color: red"></span>
                            </div>
                            <div class="col-lg">
                                <label for="image">Chọn hình ảnh</label>
                                <input type="file" name="image" class="form-control"
                                    onchange="loadFile(event ,'outputImage')">
                                <img id="outputImage" src="{{ asset('backend/assets/img/no-image.jpg') }}" width="120"
                                    height="120" class="mt-3 border" /> <br>
                                <span class="text-danger error-text image_error" style="color: red"></span>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="description">Mô tả ngắn</label> <br>
                            <textarea name="description" class="form-control" cols="10" rows="10" placeholder="Nhập mô tả ngắn"></textarea>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" id="add_benefit_btn" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- add new benefit modal end --}}
    {{-- edit benefit modal start --}}
    <div class="modal fade" id="editBenefitModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa lợi ích</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_benefit_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="benefit_id" id="benefit_id">
                    <input type="hidden" name="benefit_icon" id="benefit_icon">
                    <input type="hidden" name="benefit_image" id="benefit_image">
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="title">Tiêu đề lợi ích</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Tiêu đề lợi ích" required>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <label for="icon">Chọn icon</label>
                                <input type="file" name="icon" id="icon" class="form-control"
                                    onchange="loadFile(event ,'outputIcon1')">
                                <div id="showIcon">

                                </div> <br>

                                <span class="text-danger error-text icon_error" style="color: red"></span>
                            </div>
                            <div class="col-lg">
                                <label for="image">Chọn hình ảnh</label>
                                <input type="file" name="image" id="image" class="form-control"
                                    onchange="loadFile(event ,'outputImage1')">
                                <div id="showImage">

                                </div>
                                <br>
                                <span class="text-danger error-text image_error" style="color: red"></span>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="description">Mô tả ngắn</label> <br>
                            <textarea name="description" class="form-control" id="description" cols="10" rows="10" required
                                placeholder="Nhập mô tả ngắn"></textarea>
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
                                            id="status1" />
                                        <label class="form-check-label" for="status1">
                                            Không công khai
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" id="edit_benefit_btn" class="btn btn-success">Cập nhật</button>
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
            $('#add_benefit_form').submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_benefit_btn").text('Đang thêm...');
                $("#add_benefit_btn").prop('disabled', true);
                $.ajax({
                    url: '{{ route('admin.benefits.store') }}',
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
                                'Thêm lợi ích khi thuê xe thành công!',
                                'success'
                            )
                        }
                        $(".error-text").text('');
                        $("#add_benefit_btn").text('Xác nhận');
                        $("#add_benefit_btn").prop('disabled', false);
                        $("#add_benefit_form")[0].reset();
                        $("#addBenefitModal").modal('hide');
                        window.location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.validation_errors;
                            printErrorMsg(errors)
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
            $(document).on('click', '.editIconBenefit', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('admin.benefits.edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#title').val(response.title)
                        $('#description').val(response.description)
                        $('#showIcon').html(
                            `<img id="outputIcon1" src="{{ asset('storage/${response.icon}') }}"
                                        width="120" height="120" class="mt-3 border" />`
                        )
                        $('#showImage').html(` <img id="outputImage1" src="{{ asset('storage/${response.image}') }}"
                                        width="120" height="120" class="mt-3 border" />`)
                        if (response.status === 1) {
                            $('#status1').prop('checked', true);
                        } else {
                            $('#status0').prop('checked', true);
                        }
                        $('#benefit_id').val(response.id)
                        $('#benefit_icon').val(response.icon)
                        $('#benefit_image').val(response.image)
                    }
                })
            })

            $("#edit_benefit_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_benefit_btn").text('Đang thêm...');
                $("#edit_benefit_btn").prop('disabled', true);
                $.ajax({
                    url: '{{ route('admin.benefits.update') }}',
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
                                'Đã cập nhật lợi ích thành công',
                                'success'
                            )
                        }
                        $("#edit_benefit_form")[0].reset();
                        $("#editBenefitModal").modal('hide');
                        $("#edit_benefit_btn").text('Cập nhật');
                        $("#edit_benefit_btn").prop('disabled', false);
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endpush
