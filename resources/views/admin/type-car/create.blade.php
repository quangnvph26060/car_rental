@extends('admin.layout.master')
@section('title')
    Thêm loại xe
@endsection
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Loại xe</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="fa-solid fa-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Thêm loại xe</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Thêm loại xe</div>
                    </div>
                    <form action="{{ route('admin.type-car.store') }}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="">Tên loại xe <code>*</code></label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" id="name" placeholder="Nhập tên loại xe" />
                                        @error('name')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="">Tiêu đề giới thiệu <code>(Không bắt buộc)</code></label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title') }}" id="title"
                                            placeholder="Nhập tiêu đề giới thiệu loại xe" />
                                        @error('title')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="">Ảnh chính<code>(Trước)</code></label>
                                        <input type="file" class="form-control" name="image_front"
                                            onchange="loadFile(event ,'outputImageFront')" />
                                        @error('image_front')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                        <img id="outputImageFront" src="{{ asset('backend/assets/img/no-image.jpg') }}"
                                            width="545" height="260" class="mt-3 border" /> <br>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="">Ảnh nền<code>(Sau)</code></label>
                                        <input type="file" class="form-control" name="image_back"
                                            onchange="loadFile(event ,'outputImageBack')" />
                                        @error('image_back')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                        <img id="outputImageBack" src="{{ asset('backend/assets/img/no-image.jpg') }}"
                                            width="545" height="260" class="mt-3 border" /> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="comment">Mô tả ngắn <code>*</code></label>
                                        <textarea class="form-control" name="short_description" rows="3">{{ old('short_description') }}</textarea>
                                        @error('short_description')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="comment">Mô tả trên <code>(Không bắt buộc)</code></label>
                                        <textarea class="form-control ckeditor" name="described_above" id="content" rows="4">{{ old('described_above') }}</textarea>
                                        @error('described_above')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="comment">Mô tả dưới <code>(Không bắt buộc)</code></label>
                                        <textarea class="form-control ckeditor" name="described_below" id="content" rows="5">{{ old('described_below') }}</textarea>
                                        @error('described_below')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
