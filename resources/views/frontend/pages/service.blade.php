@extends('frontend.layouts.master')


@section('content')
<main class="datxe">
    <div class="page-position" style="
                background-image: url(https://xecuoiluxury.com/template//images/child-page/childpage-bg-1.jpg);
            ">
        <div class="title">
            <h2 class="hd">{{ $title }}</h2>
            <div class="pos-nav">
                <a href="https://xecuoiluxury.com">Trang chủ</a>
                -
                <span class="current">{{ $title }}</span>
            </div>
        </div>
    </div>

    <div class="service-page">

        <div class="all">
            <div class="row100">
                <div class="col25 left">
                    @include('frontend.includes.sideleft' , ['types' => $types])
                </div>
                <div class="col75 right">
                    @if($slug == null)
                    <div class="side-right">
                        <div id="nav-ct1">
                            @forelse ($types as $item)
                            @php
                                $images = is_string($item->images) ? json_decode($item->images, true) : $item->images;
                            @endphp
                            <div class="serv-block2"
                                style="background-image: url({{ isset($images[0]) ? asset('storage/' . $images[0]) : asset('frontend/assets/images/no-photo.jpg') }})
                                ">
                                <div class="detail right">
                                    <h4 class="hd"><a href="https://xecuoiluxury.com/dich-vu/xe-cuoi-dep/">{{ $item->name }}</a></h4>
                                    <p>
                                        {{ $item->short_description }}
                                    </p>
                                    <a href="https://xecuoiluxury.com/dich-vu/xe-cuoi-dep/" class="mn-btn btn-1">Xem
                                        thêm</a>
                                    <a href="https://xecuoiluxury.com/dat-xe/?dich-vu=2" class="mn-btn btn-1">Đặt xe</a>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    @else
                    @include('frontend.pages.service.dichvu')
                    @endif

                </div>
            </div>
        </div>

    </div>
</main>
@endsection
