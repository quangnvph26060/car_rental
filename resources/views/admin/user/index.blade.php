@extends('admin.layout.master')
@section('title')
    Thông tin tài khoản
@endsection

{{-- @section('title', $title) --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css" rel="stylesheet">
@section('content')

<div class="card">

    <div class="card-body">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Tài khoản</h3>
            <ul class="breadcrumbs mb-3">
                <li class="separator">
                    <i class="fa-solid fa-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Thông tin tài khoản</a>
                </li>
            </ul>
        </div>
        <form
            action="{{ route('admin.admin.update') }}"
            method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Danh mục -->
            <h5 class="section-title">Thông tin tài khoản</h5>
            <div class="row">

                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên người dùng</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Tên người dùng"
                            value="{{ old('name', $user->name ?? '') }}" />
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Email"
                            value="{{ old('email', $user->email ?? '') }}" />
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" placeholder="Điện thoại"
                            value="{{ old('phone', $user->phone ?? '') }}" />
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" placeholder="Mật khẩu"
                            value="{{ old('password') }}" />
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="addess" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control @error('addess') is-invalid @enderror" id="addess"
                            name="addess" placeholder="Địa chỉ"
                            value="{{ old('addess', $user->addess ?? '') }}" />
                        @error('addess')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="image" class="form-label">Ảnh danh mục</label>
                        <input type="file" id="image" name="avatar" class="form-control d-none" accept="image/*">
                        <div id="preview-frame" style="cursor: pointer; border: 1px solid #ccc; padding: 20px; text-align: center;">
                            <p class="text-muted">Click here to select an image</p>
                        </div>

                    </div>


                </div>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-end">

                <button type="submit" class="btn btn-success">{{ isset($category) ? 'Cập nhật' : 'Lưu' }}</button>
            </div>
        </form>


    </div>
</div>


@endsection

@push('styles')

<style>
    .cke_notifications_area {
        display: none;
    }

    .error {
        color: red;
    }

    .selectize-control {
        border: 0px !important;
        padding: 0px !important;
    }

    .selectize-input {
        padding: 10px 12px !important;
        border: 2px solid #ebedf2 !important;
        border-radius: 5px !important;
        border-top: 1px solid #ebedf2 !important;
    }

    /* Phần danh mục */
    .section-title {
        font-size: 1.2rem;
        font-weight: bold;
        padding-top: 20px;
        margin-bottom: 15px;
        padding: 10px;
        color: #fff;
        text-align: center;
    }

    .section-title+.section-title {
        color: #FF9800
    }

    .section-title:nth-of-type(1) {
        background-color: #4CAF50;
    }

    /* Nền cam cho SEO */
    .section-title:nth-of-type(2) {
        margin-top: 20px;
        background-color: #695aec;
    }

    .mb-3 {
        margin-bottom: 15px;
    }

    .btn {
        font-size: 1rem;
        padding: 10px 20px;
        border-radius: 5px;
    }
    #preview-frame {
        width: 70%;
        height: 200px;
        border: 2px dashed #ddd;
        display: flex;
        border-radius: 10px;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        margin-top: 10px;
    }

    #preview-frame img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }
    label{
        font-weight: 600;
    }
</style>

@endpush

@push('scripts')
<script>
    const BASE_URL = "{{ url('/') }}";
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script src="{{ asset('ckfinder_php_3.7.0/ckfinder/ckfinder.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const imageInput = document.getElementById('image');
    const previewFrame = document.getElementById('preview-frame');

    // Khi click vào khung preview, kích hoạt input file
    previewFrame.addEventListener('click', () => {
        imageInput.click();
    });

    // Khi chọn file, hiển thị ảnh
    imageInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewFrame.innerHTML = `<img src="${e.target.result}" alt="Selected Image" style="max-width: 100%; height: auto;">`;
            };
            reader.readAsDataURL(file);
        } else {
            previewFrame.innerHTML = '<p class="text-muted">Click here to select an image</p>';
        }
    });

    // Nếu có ảnh được chọn sẵn (ví dụ: từ trước khi tải lại trang), hiển thị ảnh
    const currentImageSrc = '{{ old("image", asset("storage/" . ($user->avatar ?? ""))) }}'; // Thay đổi này theo cách bạn lấy ảnh cũ từ server
    if (currentImageSrc) {
        previewFrame.innerHTML = `<img src="${currentImageSrc}" alt="Selected Image" style="max-width: 100%; height: auto;">`;
    }
});
</script>

@endpush
