@extends('admin.layout.master')
@section('title')
    Danh sách cam kết dịch vụ
@endsection
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Danh sách cam kết dịch vụ</h4>
                        <div>
                            <button id="add-service-commitment-btn" data-bs-toggle="modal"
                                data-bs-target="#addServiceCommitmentModal" class="btn btn-success">Thêm cam kết</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Icon</th>
                                        <th>Mô tả ngắn</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Icon</th>
                                        <th>Mô tả ngắn</th>
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($serviceCommitments as $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td><img src="{{ showImage($item->icon) }}" width="100" height="100"
                                                    alt=""></td>

                                            <td>
                                                {{ \Str::limit($item->description, 50) }}
                                            </td>

                                            <td>

                                                <div class="d-flex">
                                                    <a href="#" id="{{ $item->id }}"
                                                        class="m-1 d-block btn btn-primary editIconServiceCommitment"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editServiceCommitmentModal"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('admin.service-commitment.destroy', $item->id) }}"
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
    <div class="modal fade" id="addServiceCommitmentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm lợi ích</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_service_commitment_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="title">Tiêu đề cam kết</label>
                            <input type="text" name="title" class="form-control" placeholder="Tiêu đề cam kết">
                            <span class="text-danger error-text title_error" style="color: red"></span>
                        </div>
                        <div class="my-2">
                            <label for="icon">Chọn icon</label>
                            <input type="file" name="icon" class="form-control"
                                onchange="loadFile(event ,'outputIcon')">
                            <img id="outputIcon" src="{{ asset('backend/assets/img/no-image.jpg') }}" width="120"
                                height="120" class="mt-3 border" /> <br>
                            <span class="text-danger error-text icon_error" style="color: red"></span>
                        </div>
                        <div class="my-2">
                            <label for="description">Mô tả ngắn</label> <br>
                            <textarea name="description" class="form-control" cols="10" rows="10" placeholder="Nhập mô tả ngắn"></textarea>
                            <span class="text-danger error-text description_error" style="color: red"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" id="add_service_commitment_btn" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- add new benefit modal end --}}
    {{-- edit benefit modal start --}}
    <div class="modal fade" id="editServiceCommitmentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa lợi ích</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_service_commitment_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="service_commitment_id" id="service_commitment_id">
                    <input type="hidden" name="service_commitment_icon" id="service_commitment_icon">
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="title">Tiêu đề lợi ích</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Tiêu đề lợi ích" required>
                        </div>

                        <div class="my-2">
                            <label for="icon">Chọn icon</label>
                            <input type="file" name="icon" id="icon" class="form-control"
                                onchange="loadFile(event ,'outputIcon1')">
                            <div id="showIcon">

                            </div> <br>

                            <span class="text-danger error-text icon_error" style="color: red"></span>
                        </div>


                        <div class="my-2">
                            <label for="description">Mô tả ngắn</label> <br>
                            <textarea name="description" class="form-control" id="description" cols="10" rows="10" required
                                placeholder="Nhập mô tả ngắn"></textarea>
                            <span class="text-danger error-text description_error" style="color: red"></span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" id="edit_service_commitment_btn" class="btn btn-success">Cập nhật</button>
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
            $('#add_service_commitment_form').submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_service_commitment_btn").text('Đang thêm...');
                $("#add_service_commitment_btn").prop('disabled', true);
                $.ajax({
                    url: '{{ route('admin.service-commitment.store') }}',
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
                                'Thêm cam kết khi thuê xe thành công!',
                                'success'
                            )
                        }
                        $(".error-text").text('');
                        $("#add_service_commitment_btn").text('Xác nhận');
                        $("#add_service_commitment_btn").prop('disabled', false);
                        $("#add_service_commitment_form")[0].reset();
                        $("#addServiceCommitmentModal").modal('hide');
                        window.location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.validation_errors;
                            printErrorMsg(errors)
                            $("#add_service_commitment_btn").text('Xác nhận');
                            $("#add_service_commitment_btn").prop('disabled', false);
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
            $(document).on('click', '.editIconServiceCommitment', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('admin.service-commitment.edit') }}',
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
                        $('#service_commitment_id').val(response.id)
                        $('#service_commitment_icon').val(response.icon)
                    }
                })
            })

            $("#edit_service_commitment_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#edit_service_commitment_btn").text('Đang thêm...');
                $("#edit_service_commitment_btn").prop('disabled', true);
                $.ajax({
                    url: '{{ route('admin.service-commitment.update') }}',
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
                        $("#edit_service_commitment_form")[0].reset();
                        $("#editServiceCommitmentModal").modal('hide');
                        $("#edit_service_commitment_btn").text('Cập nhật');
                        $("#edit_service_commitment_btn").prop('disabled', false);
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endpush
