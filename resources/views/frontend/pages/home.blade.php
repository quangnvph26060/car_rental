@extends('frontend.layouts.master')


@section('content')
    <main id="home">

        <marquee class="marquee" behavior="" direction="" style="color: #c8a667; margin: 5px; font-weight: 600; display: none">
            Chào mừng quý khách đã ghé thăm DROMAN - Chúc quý khách năm mới 2025 An Khang Thịnh Vượng
        </marquee>

        <div class="banner">
            <ul class="banner-slider">
                <li class="banner__bg"
                    style="
                        background-image: url({{ showImage($configWebsite->banner) }});
                        ">
                    <div class="flex-center">
                        <div class="all">

                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="advantages">
            <div class="all">
                <div class="btn-action">
                    <a href="{{ route('frontend.service', 'xe-sieu-sang') }}"><button>Xe Siêu Sang</button></a>

                    <a href="{{ route('frontend.service', 'xe-mui-tran') }}"> <button>Xe Mui Trần</button></a>

                </div>
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
                                        {!! $type->short_description !!}
                                    </p>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="serv__item">
                            <div class="serv-block">
                                <div class="front" style="background-image: url({{ showImage($type->image_front) }});">
                                    <div class="bl-content">
                                        <h3 class="hd">{{ $type->name }}</h3>
                                    </div>
                                </div>
                                {{-- {{ asset('frontend/assets/image/services-bg-hv-640x370.jpg') }} --}}
                                <div class="back" style="background-image: url({{ showImage($type->image_back) }});">

                                    <div class="black-overlay"></div>

                                    <div class="bl-content">
                                        <h3 class="hd">{{ $type->name }}</h3>
                                        <p>
                                            {!! $type->short_description !!}
                                        </p>
                                        <a href="{{ route('frontend.service', $type->slug) }}" class="color1">Xem
                                            thêm</a>
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
                            <h2 class="hd">BẢNG GIÁ CHO THUÊ XE</h2>
                        </div>
                    </div>
                    <div class="col75 right">
                        <ul class="list-product clear" id="mona-home-list">
                            @foreach ($cars as $car)
                                <li class="product__item" id="car-item" style="height: 380px">
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
                                                {{ \Str::words($car->short_description, 8, '[...]') }}
                                                {{-- <p>
                                                </p> --}}

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
                            <a href="{{ url('/') }}" data-max="2" data-page="1" class="mn-btn btn-1"
                                id="mona-home-more-product">Xem thêm xe
                                <i class="fa fa-caret-down"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="features">
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
                                        <div class="feat-block" style="">
                                            <div class="img">
                                                <img width="70" height="70" src="{{ showImage($commitment->icon) }}"
                                                    class="attachment-medium size-medium" alt="{{ $commitment->title }}" />
                                            </div>
                                            <div class="ct">
                                                <p class="hd" style="font-weight: 600; text-align: center">
                                                    {{ $commitment->title }}</p>
                                                <p>
                                                    {{ $commitment->description }}
                                                </p>
                                                <a href="#" style="text-align: center; display: block;"
                                                    class="more"><i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach


                            </ul>
                        @endif
                    </div>
                </div>
                <div class="car-img">

                    <img width="1214" height="271" src="{{ showImage($configWebsite->commit_img) }}"
                        class="attachment-slider-full size-slider-full" alt=""
                        sizes="(max-width: 1214px) 100vw, 1214px" />
                </div>
            </div>
        </div> --}}

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
                        <h2 class="hd">{{ $configWebsite->about_us_title }}</h2>
                        <div class="mona-content">

                            {!! $configWebsite->about_us_content !!}
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
                            {!! $configWebsite->headquarters !!}
                        </div>
                    </li>
                    <li class="brand__item">
                        <div class="contact-block">
                            <p class="hd">
                                <span style="color: #3366ff"><strong>THỜI GIAN LÀM VIỆC </strong></span>
                            </p>
                            {!! $configWebsite->working_hours !!}
                        </div>
                    </li>
                    <li class="brand__item">
                        <div class="contact-block">
                            <p class="hd">
                                <span style="color: #3366ff"><strong>TƯ VẤN THUÊ XE </strong></span>
                            </p>
                            <p><a href="tel:+">{{ $configWebsite->advisory }}</a></p>
                        </div>
                    </li>
                    <li class="brand__item">
                        <div class="contact-block">
                            <p class="hd">
                                <span style="color: #3366ff"><strong>ĐẶT THUÊ XE </strong></span>
                            </p>
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
    </main>
@endsection

@push('scripts')
    <script>
        function limitText(text, wordLimit = 8, suffix = '[...]') {
            const words = text.split(/\s+/);
            if (words.length > wordLimit) {
                return words.slice(0, wordLimit).join(' ') + ' ' + suffix;
            }
            return text;
        }

        function formatPrice(price) {
            return price.toLocaleString('en-US'); // Định dạng theo chuẩn US với dấu phẩy
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
                                <li class="product__item" id="car-item" style="height: 380px">
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
                                            <p class="price mona-text-label">${formatPrice(Number(car.price))} VND</p>
                                            <div class="mona-except">
                                             ${limitText(car.short_description ?? '')}
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

        /* .back {
                                                                                    position: relative;
                                                                                    background-size: cover;
                                                                                    background-position: center;
                                                                                    color: white;
                                                                                    overflow: hidden;

                                                                                } */

        .black-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);

            z-index: 1;
        }

        .bl-content {
            position: relative;
            z-index: 2;

            /* text-align: center; */
        }

        .btn-action {
            display: none;
            gap: 20px;
            justify-content: center;
        }

        .btn-action button {
            background: linear-gradient(45deg, #F8F4CA, #88613B);
            /* Gradient màu sắc */
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            color: white;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            /* Hiệu ứng chuyển động mượt mà */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Đổ bóng nhẹ */
        }

        .btn-action button:hover {
            transform: scale(1.1);
            /* Phóng to nút khi hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            /* Đổ bóng mạnh hơn khi hover */
            background: linear-gradient(45deg, #F8F4CA, #A67C52);
            /* Đổi màu gradient khi hover */
        }

        .btn-action button:active {
            transform: scale(1.05);
            /* Thu nhỏ nút khi nhấn */
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
            /* Đổ bóng nhẹ khi nhấn */
        }
    </style>
@endpush
