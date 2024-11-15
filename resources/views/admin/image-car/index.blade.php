@extends('admin.layout.master')
@section('title')
Danh sách hình ảnh {{ $car->name }}
@endsection
@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thêm hình ảnh</h4>
                </div>
                <div class="card-body">
                    <form id="uploadForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="">Tải hình ảnh <code>*</code></label>
                                    <input type="hidden" name="carId" value="{{ $car->id }}">
                                    <input type="file" class="form-control" name="image_path[]" multiple
                                        id="imageUpload" />
                                    <span class="text-danger error-text image_path_error" style="color: red"></span>
                                    <div class="preview-container" id="previewContainer"></div>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" id="btn-upload">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- <form action="{{ route('admin.images.car.store') }}" class="dropzone" id="myDropzone"></form>
                    --}}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Danh sách hình ảnh xe : {{ $car->name }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if ($images->isNotEmpty())
                        @foreach ($images as $image)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                            <div class="position-relative image-container">
                                <img src="{{ showImage($image->image_path) }}" class="img-fluid" alt="Image"
                                    style="height: 120px; object-fit: cover;">
                                <!-- Nút xóa nằm trong ảnh -->
                                <a href="{{ route('admin.images.car.destroy', $image->id) }}" class="m-1 delete-item"><i
                                        class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p class="text-center">Không có hình ảnh nào, hãy thêm ngay!</p>
                        @endif
                    </div>
                </div>


            </div>
        </div>


    </div>
</div>
@endsection
@push('scripts')
{{-- <script>
    Dropzone.options.myDropzone = {
            paramName: "file", // Tên tham số sẽ được gửi lên server
            maxFilesize: 2, // Giới hạn kích thước file (MB)
            acceptedFiles: ".jpeg,.jpg,.png,.gif", // Các loại file chấp nhận
            init: function() {
                this.on("sending", function(file, xhr, formData) {
                    var carId = "{{ $car->id }}";
                    formData.append("_token", document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content'));
                    formData.append("carId", carId);
                });
            },
            success: function(file, response) {
                console.log("File uploaded successfully: ", response);
            },
            error: function(file, response) {
                console.error("Error uploading file: ", response);
            },
            removedfile: function(file) {
                var serverId = file.serverId; // Lấy ID của file từ server (được gán trong success)
                if (serverId) {
                    // Gửi yêu cầu xóa file từ server
                    $.ajax({
                        url: '{{ route('admin.images.car.delete', ':id') }}'.replace(':id',
                            serverId), // Đường dẫn API xóa ảnh trên server
                        type: 'DELETE',
                        success: function(response) {
                            console.log("File deleted from server: ", response);
                        },
                        error: function(response) {
                            console.error("Error deleting file: ", response);
                        }
                    });
                }
            };
        }
</script> --}}
<script>
    document.getElementById("imageUpload").addEventListener("change", function(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById("previewContainer");

            // Clear previous previews
            previewContainer.innerHTML = "";

            // Loop through each selected file
            Array.from(files).forEach(file => {
                if (file.type.startsWith("image/")) {
                    const reader = new FileReader();

                    // On load, create an image element and add it to the preview container
                    reader.onload = function(e) {
                        const img = document.createElement("img");
                        img.src = e.target.result;
                        previewContainer.appendChild(img);
                    };

                    // Read file as data URL
                    reader.readAsDataURL(file);
                }
            });
        });
</script>
<script>
    $(document).ready(function() {
            function printErrorMsg(msg) {
                $(".error-text").text('');
                $.each(msg, function(key, value) {
                    $('.' + key + '_error').text(value[0]);
                });
            }
            $('#uploadForm').submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#btn-upload").text('Đang thêm...');
                $("#btn-upload").prop('disabled', true);
                $.ajax({
                    url: '{{ route('admin.images.car.store') }}',
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
                                'Thêm ảnh cho xe thành công!',
                                'success'
                            )
                        }
                        $(".error-text").text('');
                        $("#uploadForm")[0].reset();
                        $("#btn-upload").text('Xác nhận');
                        $("#btn-upload").prop('disabled', false);
                        window.location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.validation_errors;
                            printErrorMsg(errors)
                            $("#btn-upload").text('Xác nhận');
                            $("#btn-upload").prop('disabled', false);
                        }
                    }
                })
            })
        })
</script>
@endpush

@push('styles')
<style>
     #previewContainer {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: flex-start;
        }
        #previewContainer img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 5px;
        }

    .image-container {
        position: relative;
        display: inline-block;
    }

    .delete-item {
        position: absolute;
        right: 5px;
        background-color: rgba(255, 255, 255, 0.6);
        padding: 5px;
        color: red;
        text-decoration: none;
        font-size: 16px;
    }

    .delete-item:hover {
        background-color: rgba(255, 255, 255, 0.8);
    }
</style>
@endpush
