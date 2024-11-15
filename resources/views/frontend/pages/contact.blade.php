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
                    <a href="https://xecuoiluxury.com">Trang chủ</a>
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
                <div class="google-map">
                    <div class="map">
                        <iframe style="width: 100%; height: 100%"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14898.338307598791!2d105.8237589!3d21.0092832!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd9bb6c31e0b4147e!2sViet%20Tower!5e0!3m2!1svi!2s!4v1570088327782!5m2!1svi!2s"
                            width="" height="" frameborder="0" style="border: 0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
