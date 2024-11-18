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
                    @include('frontend.includes.sideleft')
                </div>
                <div class="col75 right">
                    @if($slug == null)
                    <div class="side-right">
                        <div id="nav-ct1">
                            {{-- {{ dd($types) }} --}}

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
                            {{-- <div class="serv-block2"
                                style="background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/11/xecuoiluxury1-878x440.jpg)">
                                <div class="detail right">
                                    <h4 class="hd"><a href="https://xecuoiluxury.com/dich-vu/xe-hang-sang/">XE HẠNG
                                            SANG</a></h4>
                                    <p>Bảng giá các mẫu xe cưới VIP sang trọng như: Mercedes, Audi, Lexus, BMW. Click
                                        vào xem thêm để xem hình ảnh và giá thuê xe.</p>
                                    <a href="https://xecuoiluxury.com/dich-vu/xe-hang-sang/" class="mn-btn btn-1">Xem
                                        thêm</a>
                                    <a href="https://xecuoiluxury.com/dat-xe/?dich-vu=4" class="mn-btn btn-1">Đặt xe</a>
                                </div>
                            </div>
                            <div class="serv-block2"
                                style="background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/BANNER-XE-MUI-TRAN-1-878x440.jpg)">
                                <div class="detail right">
                                    <h4 class="hd"><a
                                            href="https://xecuoiluxury.com/dich-vu/thue-xe-cuoi-mui-tran-ha-noi/">XE MUI
                                            TRẦN</a></h4>
                                    <p>Bảng giá thuê xe cưới: Audi, BMW, Lexus, Mercedes mui trần tại Hà Nội. Click vào
                                        xem thêm để xem hình ảnh và giá thuê xe.</p>
                                    <a href="https://xecuoiluxury.com/dich-vu/thue-xe-cuoi-mui-tran-ha-noi/"
                                        class="mn-btn btn-1">Xem thêm</a>
                                    <a href="https://xecuoiluxury.com/dat-xe/?dich-vu=5" class="mn-btn btn-1">Đặt xe</a>
                                </div>
                            </div>
                            <div class="serv-block2"
                                style="background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/IMG_2080-Copy-Copy-Copy-Copy-878x440.jpg)">
                                <div class="detail right">
                                    <h4 class="hd"><a href="https://xecuoiluxury.com/dich-vu/thue-xe-cuoi-sieu-sang/">XE
                                            SIÊU SANG</a></h4>
                                    <p>Bảng giá các dòng xe Siêu Sang: Bentley, Posrcher, Jaguar, Rollsroyce, Limousine
                                        3 Khoang. Click vào xem thêm để xem hình ảnh và giá thuê xe</p>
                                    <a href="https://xecuoiluxury.com/dich-vu/thue-xe-cuoi-sieu-sang/"
                                        class="mn-btn btn-1">Xem thêm</a>
                                    <a href="https://xecuoiluxury.com/dat-xe/?dich-vu=6" class="mn-btn btn-1">Đặt xe</a>
                                </div>
                            </div>
                            <div class="serv-block2"
                                style="background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/IMG_6800-878x440.jpg)">
                                <div class="detail right">
                                    <h4 class="hd"><a
                                            href="https://xecuoiluxury.com/dich-vu/trang-tri-hoa-xe-cuoi-dep/">HOA XE
                                            CƯỚI</a></h4>
                                    <p>Các mẫu Hoa Xe Cưới đẹp đang giảm giá. Tặng Hoa Cô Dâu, Hoa Chú Rể. Click để xem
                                        thêm hình ảnh và giá Hoa Cưới.</p>
                                    <a href="https://xecuoiluxury.com/dich-vu/trang-tri-hoa-xe-cuoi-dep/"
                                        class="mn-btn btn-1">Xem thêm</a>
                                    <a href="https://xecuoiluxury.com/dat-xe/?dich-vu=53" class="mn-btn btn-1">Đặt
                                        xe</a>
                                </div>
                            </div> --}}
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
