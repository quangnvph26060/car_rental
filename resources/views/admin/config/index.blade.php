@extends('admin.layout.master')
@section('title')
    Cấu hình website
@endsection
@section('content')
    <div class="page-inner">
        <div class="page-header" style="display: flex; justify-content: space-between">
            <h3 class="fw-bold mb-3">Cấu hình website</h3>
            <form id="maintenance-form" action="{{ route('admin.config.maintenance') }}" method="POST">
                @csrf
                <button type="submit"
                    class="btn btn-primary">{{ $config->maintenance == 0 ? 'Hoàn tất bảo trì' : 'Bảo trì' }}</button>
            </form>

        </div>
        <form method="POST" action="{{ route('admin.config.update') }}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-9">
                    <ul class="nav nav-tabs" id="configTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                                type="button" role="tab" aria-controls="info" aria-selected="true">
                                Cấu hình Thông tin
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo"
                                type="button" role="tab" aria-controls="seo" aria-selected="false">
                                Cấu hình SEO
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image"
                                type="button" role="tab" aria-controls="image" aria-selected="false">
                                Cấu hình giới thiệu
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="commit-tab" data-bs-toggle="tab" data-bs-target="#commit"
                                type="button" role="tab" aria-controls="commit" aria-selected="false">
                                Cấu hình ảnh cam kết
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="configTabsContent">

                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">Tiêu đề</label>
                                                <input type="text"
                                                    class="form-control @error('title') is-invalid @enderror" id="title"
                                                    name="title" value="{{ old('title', $config->title ?? '') }}"
                                                    placeholder="Nhập tiêu đề cho website">
                                                @error('title')
                                                    <p class="form-text text-muted text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="headquarters">Trụ sở chính <code>*</code></label>
                                                <textarea class="form-control @error('headquarters') is-invalid @enderror" id="headquarters" name="headquarters"
                                                    placeholder="Nhập trụ sở chính">{!! $config->headquarters !!}</textarea>
                                                @error('headquarters')
                                                    <p class="form-text text-muted text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="working_hours">Thời gian làm việc <code>*</code></label>
                                                <textarea class="form-control @error('working_hours') is-invalid @enderror" id="working_hours" name="working_hours"
                                                    placeholder="Nhập thời gian làm việc">{!! $config->working_hours !!}</textarea>
                                                @error('working_hours')
                                                    <p class="form-text text-muted text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="advisory">Nhân viên Tư Vấn <code>*</code></label>
                                                <input type="text"
                                                    class="form-control @error('advisory') is-invalid @enderror"
                                                    id="advisory" name="advisory" value="{{ $config->advisory }}"
                                                    placeholder="Nhập số điện thoại nhân viên tư vấn">
                                                @error('advisory')
                                                    <p class="form-text text-muted text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="booking_procedure">Hotline đặt xe<code>*</code></label>
                                                <input type="text"
                                                    class="form-control @error('booking_procedure') is-invalid @enderror"
                                                    id="booking_procedure" name="booking_procedure"
                                                    value="{{ $config->booking_procedure }}"
                                                    placeholder="Nhập thủ tục đặt xe">
                                                @error('booking_procedure')
                                                    <p class="form-text text-muted text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="map">Map</label>
                                                <input type="text" name="map" id="map"
                                                    value="{{ old('map', $config->map ?? '') }}"
                                                    class="form-control @error('map') is-invalid @enderror">
                                                @error('map')
                                                    <p class="form-text text-muted text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="copyright">Nội dung chân trang</label>
                                                <input type="text" name="copyright" id="copyright"
                                                    value="{{ old('copyright', $config->copyright ?? '') }}"
                                                    class="form-control ">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="marquee">Nội dung Marquee</label>
                                                <input type="text" name="marquee" id="marquee"
                                                    value="{{ old('marquee', $config->marquee ?? '') }}"
                                                    class="form-control ">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                            <div class="card">


                                <div class="card-body">

                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="title_seo"> Tiêu đề seo</label>

                                            <input type="text" name="title_seo" id="title_seo"
                                                class="form-control @error('title_seo') is-invalid @enderror"
                                                placeholder="Nhập tiêu đề seo" value="{{ $config->title_seo }}">

                                            @error('title_seo')
                                                <p class="form-text text-muted text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="keywords_seo">Keywords seo</label>
                                            <input type="text" placeholder="Nhập từ khóa seo"
                                                value="{{ old('keywords_seo', $config->keywords_seo) }}"
                                                name="keywords_seo" id="keywords_seo" class="form-control">
                                            @error('keywords_seo')
                                                <p class="form-text text-muted text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="description_seo">Mô tả seo</label>
                                            <textarea class="form-control @error('description_seo') is-invalid @enderror" id="description_seo"
                                                name="description_seo" placeholder="Nhập mô tả seo">{{ old('description_seo', $config->description_seo ?? '') }}</textarea>
                                            @error('description_seo')
                                                <p class="form-text text-muted text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="banner">Banner</label>
                                                <input type="file" name="banner" class="form-control"
                                                    onchange="loadFile(event , 'previewBanner')">
                                                <img id="previewBanner" src="{{ showImage($config->banner) }}"
                                                    class=" img-fluid  mt-3 border" />
                                                @error('banner')
                                                    <p class="form-text text-muted text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="about_us_image">Ảnh giới thiệu</label>
                                                <input type="file" name="about_us_image" class="form-control"
                                                    onchange="loadFile(event , 'previewAboutUsImage')">
                                                <img id="previewAboutUsImage"
                                                    src="{{ showImage($config->about_us_image) }}"
                                                    class="img-fluid mt-3 border" />
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="about_us_title">Tiêu đề</label>
                                                <input type="text" placeholder="Nhập tiêu đề" class="form-control"
                                                    name="about_us_title"
                                                    value="{{ old('about_us_title', $config->about_us_title) }}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="about_us_content">Giới thiệu</label>
                                                <textarea name="about_us_content" id="about_us_content" cols="30" rows="10">{!! $config->about_us_content !!}</textarea>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="commit" role="tabpanel" aria-labelledby="commit-tab">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="commit_img">Ảnh nên cam kết</label>
                                                <input type="file" name="commit_img" class="form-control"
                                                    onchange="loadFile(event , 'commit_img')">
                                                <img id="commit_img" src="{{ showImage($config->commit_img) }}"
                                                    class=" img-fluid  mt-3 border" />
                                                @error('commit_img')
                                                    <p class="form-text text-muted text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-action">
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Ảnh đại diện
                            </h3>
                        </div>

                        <div class="card-body">
                            <input type="file" name="logo" class="form-control"
                                onchange="loadFile(event , 'previewLogo')">
                            @if (\Storage::exists($config->logo))
                                <img id="previewLogo" class="img-fluid mt-3" src="{{ showImage($config->logo) }}"
                                    class="mt-3 border" />
                            @endif
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Icon
                            </h3>
                        </div>

                        <div class="card-body">
                            <input type="file" name="favicon" class="form-control"
                                onchange="loadFile(event , 'previewFavicon')">
                            @if (\Storage::exists($config->favicon))
                                <img id="previewFavicon" src="{{ showImage($config->favicon) }}"
                                    class="mt-3 border img-fluid mt-3" />
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection

@push('scripts')
    <script>
        const BASE_URL = "{{ url('/') }}";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder_2/ckfinder.js') }}"></script>
    <script>
        CKEDITOR.replace('about_us_content', {
            filebrowserImageUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
        });
        CKEDITOR.replace('headquarters', {
            filebrowserImageUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            height: 100
        });
        CKEDITOR.replace('working_hours', {
            filebrowserImageUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            height: 100
        });



        const input = document.querySelector('#keywords_seo');
        new Tagify(input);
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.9.1/summernote-bs4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
@endpush
