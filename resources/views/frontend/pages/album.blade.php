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
                    @foreach ($cateCars as $item)
                        <li class="filter__item">
                            <a href="javascript:;" img-filter=".{{ $item->slug }}">{{ \Str::title($item->name) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="gallery">
                <ul class="list-gallery clear">
                    @foreach ($cateCars as $category)
                        @foreach ($category->cars as $car)
                            @foreach ($car->carImages as $image)
                                {{-- <li class="">
                                    <div class="img-wrap img-src"
                                        style="background-image: url({{ showImage($image->image_path) }});">
                                        <img src="{{ showImage($image->image_path) }}" alt="{{ $car->name }}"
                                            class="hide-img">
                                    </div>
                                </li> --}}

                                <li class="{{ $category->slug }}">
                                    <div class="img-wrap img-src"
                                        data-src="{{ showImage($image->image_path) }}"
                                        style="
                                         background-image: url({{ showImage($image->image_path) }});
                                  ">
                                        <img width="476" height="286"
                                            src="{{ showImage($image->image_path) }}"
                                            class="hide-img" alt="" />
                                    </div>
                                </li>

                            @endforeach
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
