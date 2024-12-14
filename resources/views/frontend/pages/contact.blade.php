@extends('frontend.layouts.master')

@section('content')
    <main id="home">
        <div class="page-position"
            style="
       background-image: url({{asset('frontend/assets/image/childpage-bg-1.jpg')}});
      ">
            <div class="title">
                <h2 class="hd">Liên Hệ</h2>
                <div class="pos-nav">
                    <a href="{{ url('/') }}">Trang chủ</a>
                    -
                    <span class="current">Liên Hệ</span>
                </div>
            </div>
        </div>
        <div class="contact-page">
            <div class="contact">
                <div class="all">
                    <div class="sec-title2">
                        <h2 class="hd">LIÊN HỆ VỚI CHÚNG TÔI</h2>
                    </div>
                    <ul class="list-ctbrand clear">
                        <li class="brand__item">
                            <div class="contact-block">
                                <p class="hd">Trụ sở chính</p>
                                 {!! $configWebsite->headquarters !!}
                            </div>
                        </li>
                        <li class="brand__item">
                            <div class="contact-block">
                                <p class="hd">Nhân Viên Tư Vấn</p>
                                <p><a href="tel:+">{{ $configWebsite->advisory }}</a></p>
                            </div>
                        </li>
                        <li class="brand__item">
                            <div class="contact-block">
                                <p class="hd">Thời Gian Làm Việc</p>
                                {!! $configWebsite->working_hours !!}
                            </div>
                        </li>
                        <li class="brand__item">
                            <div class="contact-block">
                                <p class="hd">Thủ Tục Đặt Xe:</p>
                                <p>{{ $configWebsite->booking_procedure }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="google-map" style="margin-top: 130px;">
                    <div class="map">
                        {!! $configWebsite->map !!}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
