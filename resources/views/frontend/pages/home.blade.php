@extends('frontend.layouts.master')


@section('content')
    <main id="home">
        <div class="banner">
            <ul class="banner-slider">
                <li class="banner__bg"
                    style="
          background-image: url({{ showImage($configWebsite->banner) }});
        ">
                    <div class="flex-center">
                        <div class="all">
                            <div class="title">
                                <h1 class="hd">XE CƯỚI LUXURY</h1>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="advantages">
            <div class="all">
                <ul class="list-adv clear">
                    @foreach ($benefits as $benefit)
                        <li class="adv__item">
                            <div class="advantage-block">
                                <div class="front">
                                    <div class="img">
                                        <img width="68" height="70" src="{{ showImage($benefit->icon) }}"
                                            class="attachment-thumbnail size-thumbnail" alt="{{ $benefit->title }}" />
                                    </div>
                                    <p class="hd">{{ $benefit->title }}</p>
                                </div>
                                <div class="back" style="background-image: url({{ showImage($benefit->image) }});">
                                    <p>
                                        {{ $benefit->description }}
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="services">
            <ul class="list-serv clear">


                @foreach ($types as $type)
                    @if ($loop->iteration == 1)
                        <li class="serv__item">
                            <div class="serv-title">
                                <div class="tit-wrap">
                                    <h3 class="hd">{{ $type->name }}</h3>
                                    <p style="text-align: justify">
                                        {{ $type->short_description }}
                                    </p>
                                    <p style="text-align: justify">
                                        Chúng tôi cho thuê tất cả các dòng xe cưới hạng sang đang được
                                        yêu thích nhất như:<strong>
                                            Mercedes, Audi, BMW, Lexus, Bentley, Porscher, Jaguar, Rolls
                                            Royce.</strong>
                                    </p>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="serv__item">
                            <div class="serv-block">
                                <div class="front"
                                    style="background-image: url({{ showImage($type->image_front) }});">
                                    <div class="bl-content">
                                        <h3 class="hd">{{ $type->name }}</h3>
                                    </div>
                                </div>
                                <div class="back"
                                    style="background-image: url({{ showImage($type->image_back) }});">
                                    <div class="bl-content">
                                        <h3 class="hd">{{ $type->name }}</h3>
                                        <p>
                                            {{ $type->short_description }}
                                        </p>
                                        <a href="{{ route('frontend.service', $type->slug) }}" class="color1">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>

        <div class="most-favorite">
            <div class="all">
                <div class="row100">
                    <div class="col25 left">
                        <div class="sec-title1">
                            <h2 class="hd">BẢNG GIÁ CHO THUÊ XE CƯỚI TẠI HÀ NỘI</h2>
                        </div>
                    </div>
                    <div class="col75 right">
                        <ul class="list-product clear" id="mona-home-list">
                            @foreach ($cars as $car)
                                <li class="product__item" id="car-item" style="height: 450px">
                                    <div class="product-block">
                                        <div class="img">
                                            <a href="{{ route('frontend.product', ['slug' => $car->slug]) }}">
                                                <img width="670" height="446"
                                                    src="{{ file_exists(public_path('storage/' . $car->image)) ? asset('storage/' . $car->image) : asset('frontend/assets/images/no-photo.jpg') }}"
                                                    class="attachment-full size-full wp-post-image" alt="Car Image" />
                                            </a>
                                        </div>
                                        <div class="ct">
                                            <p class="hd">
                                                <a
                                                    href="{{ route('frontend.product', ['slug' => $car->slug]) }}">{{ $car->name }}</a>
                                            </p>
                                            <p class="price mona-text-label">{{ number_format($car->price) }} VND</p>
                                            <div class="mona-except">
                                                <p>
                                                    {!! Str::limit($car->description, 120, '[...]') !!}
                                                </p>

                                            </div>
                                            <a href="{{ route('frontend.product', ['slug' => $car->slug]) }}"
                                                class="more">
                                                <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <div class="more-button">
                            <a href="https://xecuoiluxury.com/xe-cuoi/" data-max="2" data-page="1" class="mn-btn btn-1"
                                id="mona-home-more-product">Xem thêm xe
                                <i class="fa fa-caret-down"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="features">
            <div class="all">
                <div class="row100">
                    <div class="col25 left">
                        <div class="sec-title1">
                            @if ($commitments->isNotEmpty())
                                <h2 class="hd">CAM KẾT CỦA CHÚNG TÔI</h2>
                            @endif

                        </div>
                    </div>
                    <div class="col75 right">
                        @if ($commitments->isNotEmpty())
                            <ul class="list-feat clear">
                                @foreach ($commitments as $commitment)
                                    <li class="feat__item">
                                        <div class="feat-block">
                                            <div class="img">
                                                <img width="70" height="70" src="{{ showImage($commitment->icon) }}"
                                                    class="attachment-medium size-medium" alt="{{ $commitment->title }}" />
                                            </div>
                                            <div class="ct">
                                                <p class="hd">{{ $commitment->title }}</p>
                                                <p>
                                                    {{ $commitment->description }}
                                                </p>
                                                <a href="#" class="more"><i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach


                            </ul>
                        @endif
                    </div>
                </div>
                <div class="car-img">
                    <img width="1214" height="271"
                        src="https://xecuoiluxury.com/wp-content/uploads/2019/01/xe-limouisne.png"
                        class="attachment-slider-full size-slider-full" alt=""
                        sizes="(max-width: 1214px) 100vw, 1214px" />
                </div>
            </div>
        </div>

        <div class="feedbacks">
            <div class="all">
                <div class="sec-title2">
                    <h2 class="hd">Ý KIẾN VÀ HÌNH ẢNH CỦA KHÁCH HÀNG</h2>
                </div>
                <ul class="list-feedback slide-feedback">
                    @foreach ($reviews as $review)
                        <li class="feed__item">
                            <div class="feedback-block">
                                <div class="ct">
                                    <div class="img">
                                        <span class="mona-rating-wrap">
                                            <span class="ra-none">
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                            </span>
                                            <span class="ra">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </span>
                                        </span>

                                    </div>
                                    <p>{{ $review->comment }}</p>
                                </div>
                                <div class="info">
                                    <div class="info-img">
                                        <img width="150" height="150" src="{{ showImage($review->avatar) }}"
                                            class="attachment-thumbnail size-thumbnail" alt="" />
                                    </div>
                                    <div class="info-dt">
                                        <p class="main">{{ $review->customer_name }}</p>
                                        <p class="color1 sub">{{ $review->customer_role ?? 'Khách hàng' }}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="slide-feedback-dots"></div>
            </div>
        </div>

        @include('frontend.pages.image.gallery')
        <div class="home-news">
            <div class="all">
                <div class="sec-title2">
                    <h2 class="hd">Tin Tức</h2>
                </div>
                <ul class="list-hnews clear">
                    @forelse ($posts as $item)
                        <li class="news__item">
                            <div class="news-block1">
                                <div class="img">
                                    <a href="{{ route('frontend.blog', ['slug' => $item->slug]) }}">
                                        <img width="800" height="723" src="{{ asset('storage/' . $item->image) }}"
                                            class="attachment-full size-full wp-post-image" alt="" />
                                    </a>
                                </div>
                                <div class="ct">
                                    <p class="hd">
                                        <a href="{{ route('frontend.blog', ['slug' => $item->slug]) }}">
                                            {{ $item->title }}
                                        </a>
                                    </p>
                                    <p class="date">Đăng ngày
                                        {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d \\T\\há\\n\\g F, Y') }}
                                    </p>

                                    <div class="mona-except">
                                        <p class="truncate-text">
                                            {!! Str::limit(strip_tags($item->description), 60, ' [...]') !!}
                                        </p>

                                    </div>

                                    <a href="{{ route('frontend.blog', ['slug' => $item->slug]) }}"
                                        class="mn-btn btn-right"><i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </li>
                    @empty
                    @endforelse

                </ul>
                <div class="all-button">
                    <a href="{{ route('frontend.blog') }}">Xem tất cả tin tức<i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="about-us">
            <div class="float-img">
                <img width="717" height="405" src="{{ showImage($configWebsite->about_us_image) }}"
                    class="has-shadow" alt="" sizes="(max-width: 717px) 100vw, 717px" />
            </div>
            <div class="all">
                <div class="abu-wrap">
                    <div class="ab-ct">
                        <h2 class="hd">GIỚI THIỆU VỀ XE CƯỚI LUXURY</h2>
                        <div class="mona-content">
                            <p style="text-align: justify">
                                {{ $configWebsite->about_us }}
                        </div>
                        <a href="{{ route('frontend.introduce') }}" class="mn-btn btn-1">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact">
            <div class="all">
                <div class="sec-title2">
                    <h2 class="hd">LIÊN HỆ VỚI CHÚNG TÔI</h2>
                </div>
                <ul class="list-ctbrand clear">
                    <li class="brand__item">
                        <div class="contact-block">
                            <p class="hd">
                                <span style="color: #3366ff"><strong>ĐỊA CHỈ </strong></span>
                            </p>
                            {!! $contact->headquarters !!}
                        </div>
                    </li>
                    <li class="brand__item">
                        <div class="contact-block">
                            <p class="hd">
                                <span style="color: #3366ff"><strong>THỜI GIAN LÀM VIỆC </strong></span>
                            </p>
                            {!! $contact->working_hours !!}
                        </div>
                    </li>
                    <li class="brand__item">
                        <div class="contact-block">
                            <p class="hd">
                                <span style="color: #3366ff"><strong>TƯ VẤN THUÊ XE </strong></span>
                            </p>
                            <p>Hotline:</p>
                            <p><a href="tel:+">{{ $contact->advisory }}</a></p>
                        </div>
                    </li>
                    <li class="brand__item">
                        <div class="contact-block">
                            <p class="hd">
                                <span style="color: #3366ff"><strong>ĐẶT THUÊ XE </strong></span>
                            </p>
                            <p>Hotline:</p>
                            <p>{{ $contact->booking_procedure }}</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="google-map" style="margin-top: 130px;">
                <div class="map">
                    <iframe style="width: 100%; height: 100%" src="{{ $configWebsite->map }}" width=""
                        height="" frameborder="0" style="border: 0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        function limitText(text, limit = 120, suffix = '[...]') {
            if (text.length > limit) {
                return text.substring(0, limit) + suffix;
            }
            return text;
        }


        jQuery('.more-button a').on('click', function(e) {
            e.preventDefault();

            const app_url = '{{ env('APP_URL') }}';


            const $this = jQuery(this); // Truy cập chính thẻ <a>

            // Lấy giá trị hiện tại của `data-page`
            let currentPage = parseInt($this.data('page'), 10); // Chuyển sang số nguyên

            // Tăng giá trị `data-page` lên 1
            currentPage++;

            // Cập nhật lại thuộc tính `data-page`
            $this.data('page', currentPage);

            jQuery.ajax({
                url: '{{ route('frontend.ajax') }}',
                type: 'POST',
                data: {
                    action: 'mona_load_more',
                    page: currentPage
                },
                beforeSend: function() {
                    // Thay đổi nội dung nút thành "Loading..." khi đang tải
                    $this.html('<i class="fa fa-spinner fa-spin"></i> Đang tải...');
                },
                success: function(data) {
                    if (data.cars && data.cars.length > 0) {
                        data.cars.forEach(car => {
                            jQuery('#mona-home-list').append(`
                                <li class="product__item" id="car-item" style="height: 450px">
                                    <div class="product-block">
                                        <div class="img">
                                            <a href="${app_url}/san-pham/${car.slug}"> <!-- Link tới hình ảnh lớn -->
                                                <img width="670" height="446"
                                                    src="${app_url+'/storage/'+car.image}" <!-- URL ảnh nhỏ hiển thị -->
                                                    class="attachment-full size-full wp-post-image" alt="${car.name}" />
                                            </a>
                                        </div>
                                        <div class="ct">
                                            <p class="hd">
                                                <a href="${app_url}/san-pham/${car.slug}">${car.name}</a>
                                            </p>
                                            <p class="price mona-text-label">${car.price} VND</p>
                                            <div class="mona-except">
                                                <p>${limitText(car.description, 120, '[...]')}</p>
                                            </div>
                                            <a href="${app_url}/san-pham/${car.slug}" class="more">
                                                <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            `);
                        });

                        // Cập nhật lại nút "Xem thêm xe" sau khi hoàn tất
                        $this.html('Xem thêm xe');
                    } else {
                        // Nếu không còn dữ liệu, ẩn nút
                        $this.html('Hết xe').prop('disabled', true).addClass('disabled');
                    }
                },

                error: function() {
                    // Nếu có lỗi, khôi phục lại trạng thái nút
                    $this.html('Xem thêm xe');
                    alert('Đã xảy ra lỗi, vui lòng thử lại!');
                }
            });
        });
    </script>
@endpush


@push('styles')
    <style>
        .mona-rating-wrap {
            display: flex;
            align-items: center;
        }

        .ra,
        .ra-none {
            display: flex;
        }

        .ra i,
        .ra-none i {
            font-size: 20px;
            /* Tùy chỉnh kích thước */
            color: #f39c12;
            /* Màu sao */
            margin-bottom: 10px
        }
    </style>
@endpush
