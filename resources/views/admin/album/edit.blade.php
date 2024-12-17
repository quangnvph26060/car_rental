@extends('admin.layout.master')

@section('content')
    <div class="page-inner">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Cập nhật album: {{ $album->title }}</h3>
                <div class="card-tools">
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('admin.album.index') }}"><i class="fas fa-undo-alt me-2"></i>Quay lại</a>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">


                    <div class="form-group mb-3">
                        <label for="" class="form-label">Tiêu đề</label>
                        <input type="text" value="{{ $album->title }}" name="title" id="" class="form-control"
                            placeholder="Nhập tiêu đề">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label">Album ảnh</label>
                        <div class="album pb-3"></div>
                    </div>

                </div>
                <div class="card-footer"><button class="btn btn-primary btn-sm" type="submit">Lưu thay đổi</button></div>

            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/js/image-uploader.min.js') }}"></script>

    <script>
        @if (isset($albums))
            let preloaded = @json($albums);
        @else
            let preloaded = [];
        @endif

        $('.album').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'images',
            preloadedInputName: 'old',
            maxSize: 2 * 1024 * 1024,
            maxFiles: 15,
        });
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/css/image-uploader.min.css') }}">
@endpush
