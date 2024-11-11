@extends('admin.layout.master')
@section('title')
    Thêm xe
@endsection
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Xe</h3>
            <ul class="breadcrumbs mb-3">
                <li class="separator">
                    <i class="fa-solid fa-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Thêm xe</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Thêm xe</div>
                    </div>
                    <form action="{{ route('admin.car.store') }}" method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="">Tên xe <code>*</code></label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" id="name" placeholder="Nhập tên xe" />
                                        @error('name')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="">Hình ảnh <code>*</code></label>
                                        <input type="file" name="image" class="form-control"
                                            onchange="loadFile(event)">
                                        <img id="output" src="{{ asset('admin/assets/img/no-image.jpg') }}"
                                            width="100" height="100" class="mt-3 border" />
                                        @error('image')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="">Tiêu đề giới thiệu <code>(Không bắt buộc)</code></label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title') }}" id="title"
                                            placeholder="Nhập tiêu đề giới thiệu hãng xe" />
                                        @error('title')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label for="">Giá thuê <code>*</code></label>
                                        <input type="text" class="form-control" name="price"
                                            value="{{ old('price') }}" id="price" placeholder="Nhập giá thuê xe" />
                                        @error('price')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label for="">Số chỗ <code>*</code></label>
                                        <input type="text" class="form-control" name="number_of_seats"
                                            value="{{ old('number_of_seats') }}" id="number_of_seats"
                                            placeholder="Nhập số chỗ trên xe" />
                                        @error('number_of_seats')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label for="">Màu sắc <code>(Không bắt buộc)</code></label>
                                        <input type="text" class="form-control" name="color"
                                            value="{{ old('color') }}" id="color" placeholder="Nhập màu xe" />
                                        @error('color')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label for="">Số điện thoại liên hệ <code>(Không bắt buộc)</code></label>
                                        <input type="text" class="form-control" name="contact_phone"
                                            value="{{ old('contact_phone') }}" id="contact_phone"
                                            placeholder="Nhập số điện thoại liên hệ" />
                                        @error('contact_phone')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Loại xe</label><br />
                                        <div class="d-flex flex-wrap">
                                            @if ($types->isNotEmpty())
                                                @foreach ($types as $key => $type)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="type_id[]"
                                                            value="{{ $type->id }}"
                                                            id="type_id_{{ $key + 1 }}" />
                                                        <label class="form-check-label"
                                                            for="type_id_{{ $key + 1 }}">
                                                            {{ $type->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>Chưa có loại xe nào</p>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Hãng xe</label><br />
                                        <div class="d-flex flex-wrap">
                                            @if ($types->isNotEmpty())
                                                @foreach ($brands as $keyBrand => $brand)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="brand_id[]"
                                                            value="{{ $brand->id }}"
                                                            id="brand_id_{{ $keyBrand + 1 }}" />
                                                        <label class="form-check-label"
                                                            for="brand_id_{{ $keyBrand + 1 }}">
                                                            {{ $brand->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>Chưa có hãng xe nào</p>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="comment">Mô tả<code>*</code></label>
                                        <textarea class="form-control ckeditor" name="description" id="content" rows="5"
                                            placeholder="Nhập mô tả chiếc xe">{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="comment">Chi tiết chương trình giảm giá <code>(Không bắt
                                                buộc)</code></label>
                                        <textarea class="form-control ckeditor" name="promotion_details" id="content" rows="5">{{ old('promotion_details') }}</textarea>
                                        @error('promotion_details')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
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
                                                <input class="form-check-input" type="radio" name="status"
                                                    value="0" id="flexRadioDefault2" checked />
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Không công khai
                                                </label>
                                            </div>
                                        </div>
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
