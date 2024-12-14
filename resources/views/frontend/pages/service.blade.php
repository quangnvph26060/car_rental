@extends('frontend.layouts.master')


@section('content')
<main class="datxe">
    <div class="page-position" style="
                background-image: url({{asset('frontend/assets/image/childpage-bg-1.jpg')}});
            ">
        <div class="title">
            <h2 class="hd">{{ $title }}</h2>
            <div class="pos-nav">
                <a href="{{ url('/') }}">Trang chủ</a>
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
                            <div class="serv-block2"
                                style="background-image: url({{ showImage($item->image_front) }})
                                ">
                                <div class="detail right">
                                    <h4 class="hd"><a href="{{ route('frontend.service' , $item->slug) }}">{{ $item->name }}</a></h4>
                                    <p>
                                        {{ $item->short_description }}
                                    </p>
                                    <a href="{{ route('frontend.service' , $item->slug) }}" class="mn-btn btn-1">Xem
                                        thêm</a>
                                    <a href="{{ route('frontend.booking') }}" class="mn-btn btn-1">Đặt xe</a>
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
