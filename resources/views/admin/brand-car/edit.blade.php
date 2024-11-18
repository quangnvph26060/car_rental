@extends('admin.layout.master')
@section('title')
    Cập nhật hãng xe
@endsection
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Hãng xe</h3>
            <ul class="breadcrumbs mb-3">
                <li class="separator">
                    <i class="fa-solid fa-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Cập nhật hãng xe</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Cập nhật hãng xe</div>
                    </div>
                    <form action="{{ route('admin.brand-car.update' , $brand->id) }}" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="">Tên hãng xe <code>*</code></label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $brand->name }}" id="name" placeholder="Nhập tên hãng xe" />
                                        @error('name')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="">Tên loại xe <code>*</code></label>
                                        <select name="type_id" class="form-control" id="">
                                            <option value="" selected>- - Chọn loại xe - -</option>
                                            @foreach ($types as $type)
                                                <option {{ $brand->type_id === $type->id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('type_id')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="">Tiêu đề giới thiệu <code>(Không bắt buộc)</code></label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ $brand->title }}" id="title"
                                            placeholder="Nhập tiêu đề giới thiệu hãng xe" />
                                        @error('title')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="comment">Mô tả ngắn <code>(Không bắt buộc)</code></label>
                                        <textarea class="form-control ckeditor" name="described_above" id="content" rows="4">{{ $brand->described_above }}</textarea>
                                        @error('described_above')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="comment">Mô tả dài <code>(Không bắt buộc)</code></label>
                                        <textarea class="form-control ckeditor" name="described_below" id="content" rows="5">{{ $brand->described_below }}</textarea>
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
