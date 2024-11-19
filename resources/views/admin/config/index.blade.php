@extends('admin.layout.master')
@section('title')
    Cấu hình website
@endsection
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Cấu hình website</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">Cập nhật thông tin</div>
                    </div>
                    <form method="POST" action="{{ route('admin.config.update') }}" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title">Tiêu đề</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" value="{{ old('title', $config->title ?? '') }}"
                                            placeholder="Nhập tiêu đề cho website">
                                        @error('title')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="website">Địa chỉ website</label>
                                        <input type="text" class="form-control @error('website') is-invalid @enderror"
                                            id="website" name="website" value="{{ old('title', $config->website ?? '') }}"
                                            placeholder="Nhập url website">
                                        @error('website')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fanpage">Fanpage</label>
                                        <input type="text" class="form-control @error('fanpage') is-invalid @enderror"
                                            id="fanpage" name="fanpage"
                                            value="{{ old('fanpage', $config->fanpage ?? '') }}"
                                            placeholder="Nhập url fanpage">
                                        @error('fanpage')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="script">Script</label>
                                        <textarea class="form-control @error('script') is-invalid @enderror" id="script" name="script"
                                            placeholder="Nhập script">{{ old('script', $config->script ?? '') }}</textarea>
                                        @error('script')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="keywords_seo">Keywords seo</label>
                                        <textarea class="form-control @error('keywords_seo') is-invalid @enderror" id="keywords_seo" name="keywords_seo"
                                            placeholder="Nhập keyword seo">{{ old('keywords_seo', $config->keywords_seo ?? '') }}</textarea>
                                        @error('keywords_seo')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_seo"> Nhập tiêu đề seo</label>
                                        <textarea class="form-control @error('title_seo') is-invalid @enderror" id="title_seo" name="title_seo"
                                            placeholder="Nhập title seo">{{ old('title_seo', $config->title_seo ?? '') }}</textarea>
                                        @error('title_seo')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="map">Map</label>
                                        <textarea class="form-control @error('map') is-invalid @enderror" id="map" name="map" placeholder="Nhập map">{{ old('map', $config->map ?? '') }}</textarea>
                                        @error('map')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="about_us">Giới thiệu</label>
                                        <textarea class="form-control @error('about_us') is-invalid @enderror" id="about_us" name="about_us"
                                            placeholder="Nhập giới thiệu">{{ old('about-us', $config->about_us ?? '') }}</textarea>
                                        @error('about_us')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" name="logo" class="form-control"
                                            onchange="loadFile(event , 'previewLogo')">
                                        <img id="previewLogo" src="{{ showImage($config->logo) }}" width="100"
                                            height="100" class="mt-3 border" />
                                        @error('logo')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="favicon">Favicon</label>
                                        <input type="file" name="favicon" class="form-control"
                                            onchange="loadFile(event , 'previewFavicon')">
                                        <img id="previewFavicon" src="{{ showImage($config->favicon) }}"
                                            width="100" height="100" class="mt-3 border" />
                                        @error('favicon')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="banner">Banner</label>
                                        <input type="file" name="banner" class="form-control"
                                            onchange="loadFile(event , 'previewBanner')">
                                        <img id="previewBanner" src="{{ showImage($config->banner) }}"
                                            width="545" height="350" class="mt-3 border" />
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
                                            src="{{ showImage($config->about_us_image) }}" width="545"
                                            height="350" class="mt-3 border" />
                                        @error('about_us_image')
                                            <p class="form-text text-muted text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Nút Gửi -->
                            <div class="card-action">
                                <button type="submit" class="btn btn-primary w-100">Cập Nhật Thông Tin</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
