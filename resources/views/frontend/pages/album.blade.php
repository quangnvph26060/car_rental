@extends('frontend.layouts.master')

@section('content')
    <main class="thuvienanh">
        <div class="page-position"
            style="
                     background-image: url({{ asset('frontend/assets/image/childpage-bg-1.jpg') }});
      ">
            <div class="title">
                <h2 class="hd">Thư viện ảnh</h2>
                <div class="pos-nav">
                    <a href="{{ url('/') }}">Trang chủ</a>
                    -
                    <span class="current">Thư viện ảnh</span>
                </div>
            </div>
        </div>

        <div class="gallery-page">
            <div class="nav-filter">
                <ul class="list-filter">
                    @foreach ($albums as $item)
                        <li class="filter__item">
                            <a href="javascript:;" img-filter=".{{ $item->slug }}">{{ \Str::title($item->title) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="gallery">
                <ul class="list-gallery clear">
                    @foreach ($albums as $item)
                        @foreach ($item->album ?? [] as $image)
                            <li class="{{ $item->slug }}">
                                <div class="img-wrap img-src" data-src="{{ showImage($image) }}"
                                    style="
                             background-image: url({{ showImage($image) }});
                                 ">
                                    <img width="476" height="286" src="{{ showImage($image) }}" class="hide-img"
                                        alt="" />
                                </div>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            </div>

        </div>
    </main>
@endsection


@push('scripts')
    <script>
        jQuery(document).ready(function($) {
            var gal_img = $(".list-gallery").lightGallery({
                selector: ".img-src",
            });
            $(".gallery-page .filter__item a").on("click", function(e) {
                e.preventDefault();
                var imgfilter = $(this).attr("img-filter");
                $(this).parent().addClass("active").siblings().removeClass("active");
                $(".gallery-page .list-gallery").isotope({
                    filter: imgfilter
                });
                gal_img.data("lightGallery").destroy(true);
                gal_img = $(".list-gallery").lightGallery({
                    selector: imgfilter + " .img-src",
                });
            });
        });
    </script>
@endpush
