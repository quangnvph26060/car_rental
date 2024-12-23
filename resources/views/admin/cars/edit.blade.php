@extends('admin.layout.master')
@section('title')
    Cập nhật xe
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
                    <a href="#">Cập nhật xe</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">Cập nhật xe</div>
                        <div><a href="{{ route('admin.car.index') }}" class="btn btn-success">Danh sách</a></div>
                    </div>
                    <form action="{{ route('admin.car.update', $car->id) }}" method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="">Tên xe <code>*</code></label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $car->name }}" id="name" placeholder="Nhập tên xe" />
                                        @error('name')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="">Hình ảnh <code>*</code></label>
                                        <input type="hidden" name="old_image" value="{{ $car->image }}">
                                        <input type="file" name="image" class="form-control"
                                            onchange="loadFile(event , 'output')">
                                        <img id="output" src="{{ showImage($car->image) }}" width="100" height="100"
                                            class="mt-3 border" />
                                        @error('image')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="">Tiêu đề giới thiệu <code>(Không bắt buộc)</code></label>
                                        <input type="text" class="form-control" name="introductory_title"
                                            value="{{ $car->introductory_title }}" id="introductory_title"
                                            placeholder="Nhập tiêu đề giới thiệu hãng xe" />
                                        @error('introductory_title')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="">Giá thuê <code>*</code></label>
                                        <input type="text" class="form-control" name="price"
                                            value="{{ $car->price }}" id="price" placeholder="Nhập giá thuê xe" />
                                        @error('price')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="">Số chỗ <code>(Không bắt buộc)</code></label>
                                        <input type="text" class="form-control" name="number_of_seats"
                                            value="{{ $car->number_of_seats }}" id="number_of_seats"
                                            placeholder="Nhập số chỗ trên xe" />
                                        @error('number_of_seats')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="">Màu sắc <code>(Không bắt buộc)</code></label>
                                        <select name="color_id" id="color_id" class="form-control">
                                            <option value="">-- Chọn màu --</option>
                                            @foreach ($colors as $color)
                                                <option {{ $car->color_id === $color->id ? 'selected' : '' }}
                                                    value="{{ $color->id }}">{{ $color->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('color_id')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Hãng xe</label><br />
                                        <div class="d-flex flex-wrap">
                                            @if ($types->isNotEmpty())
                                                <select class="form-control select2-types" name="type_ids[]" multiple>
                                                    @foreach ($types as $type)
                                                        <option value="{{ $type->id }}" @selected(in_array($type->id, old('type_ids', $car->types->pluck('id')->toArray())))>
                                                            {{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <p>Chưa có hãng xe nào (Hãy thêm để thêm được xe)</p>
                                            @endif

                                        </div>
                                        @error('brand_ids')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Loại xe</label><br />
                                        <div class="d-flex flex-wrap">
                                            @if ($types->isNotEmpty())
                                                <select class="form-control select2-brands" name="brand_ids[]" multiple>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" @selected(in_array($brand->id, old('brand_ids', $car->brands->pluck('id')->toArray())))>
                                                            {{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <p>Chưa có loại xe nào (Hãy thêm để thêm được xe)</p>
                                            @endif


                                        </div>
                                        @error('type_ids')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="comment">Mô tả ngắn</label>
                                        <textarea class="form-control" name="short_description" id="" rows="5"
                                            placeholder="Nhập mô tả ngắn">{{ old('short_description', $car->short_description) }}</textarea>
                                        @error('short_description')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="comment">Mô tả<code>(Không bắt buộc)</code></label>
                                        <textarea class="form-control ckeditor" name="description" id="content" rows="5"
                                            placeholder="Nhập mô tả chiếc xe">{{ $car->description }}</textarea>
                                        @error('description')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="comment">Chi tiết chương trình giảm giá <code>(Không bắt
                                                buộc)</code></label>
                                        <textarea class="form-control ckeditor" name="promotion_details" rows="5">{{ $car->promotion_details }}</textarea>
                                        @error('promotion_details')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Là xe được yêu thích</label><br />
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_favorite"
                                                    value="1" id="checkFavorite1"
                                                    {{ $car->is_favorite === 1 ? 'checked' : '' }} />
                                                <label class="form-check-label" for="checkFavorite1">
                                                    Có
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_favorite"
                                                    value="0" id="checkFavorite2"
                                                    {{ $car->is_favorite === 0 ? 'checked' : '' }} />
                                                <label class="form-check-label" for="checkFavorite2">
                                                    Không
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Trạng thái</label><br />
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                    value="1" {{ $car->status === 1 ? 'checked' : '' }}
                                                    id="flexRadioDefault1" />
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Công khai
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                    value="0" {{ $car->status === 0 ? 'checked' : '' }}
                                                    id="flexRadioDefault2" />
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Select2 for brands
            $('.select2-brands').select2({
                placeholder: "Chọn hãng xe",
                allowClear: true
            });

            // Select2 for types
            $('.select2-types').select2({
                placeholder: "Chọn loại xe",
                allowClear: true
            });
        });
    </script>

    <script>
        const BASE_URL = "{{ url('/') }}";
    </script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder_2/ckfinder.js') }}"></script>

    <script>
        CKEDITOR.replace('promotion_details', {
            filebrowserImageUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
        });

        CKEDITOR.replace('description', {
            filebrowserImageUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
        });
    </script>
@endpush

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
