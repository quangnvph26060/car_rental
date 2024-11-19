@extends('frontend.layouts.master')

@section('content')
    <main id="home">
        <div class="page-position"
            style="
        background-image: url(https://xecuoiluxury.com/template//images/child-page/childpage-bg-1.jpg);
      ">
            <div class="title">
                <h2 class="hd">Liên Hệ</h2>
                <div class="pos-nav">
                    <a href="/">Trang chủ</a>
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
                                 {!! $contact->headquarters !!}
                            </div>
                        </li>
                        <li class="brand__item">
                            <div class="contact-block">
                                <p class="hd">Nhân Viên Tư Vấn</p>
                                <p>Tư Vấn Báo Giá</p>
                                <p><a href="tel:+">{{ $contact->advisory }}</a></p>
                            </div>
                        </li>
                        <li class="brand__item">
                            <div class="contact-block">
                                <p class="hd">Thời Gian Làm Việc</p>
                                {!! $contact->working_hours !!}
                            </div>
                        </li>
                        <li class="brand__item">
                            <div class="contact-block">
                                <p class="hd">Thủ Tục Đặt Xe:</p>
                                <p>Liên Hệ Hotline:</p>
                                <p>{{ $contact->booking_procedure }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="google-map" style="margin-top: 130px;">
                    <div class="map">
                        <iframe style="width: 100%; height: 100%"
                            src="{{ $configWebsite->map }}"
                            width="" height="" frameborder="0" style="border: 0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
