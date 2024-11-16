@extends('frontend.layouts.master')


@section('content')
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
<main id="home">
    <div class="banner">
        <ul class="banner-slider">
            <li class="banner__bg" style="
          background-image: url(https://xecuoiluxury.com/wp-content/uploads/2019/10/thue-xe-cuoi-luxury.png);
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
                <li class="adv__item">
                    <div class="advantage-block">
                        <div class="front">
                            <div class="img">
                                <img width="68" height="70"
                                    src="https://xecuoiluxury.com/wp-content/uploads/2018/07/advantage-icon-2.png"
                                    class="attachment-thumbnail size-thumbnail" alt="" />
                            </div>
                            <p class="hd">Xe Mới Đẹp</p>
                        </div>
                        <div class="back" style="
                background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/services-bg-hv-300x202.jpg);
              ">
                            <p>
                                Với Hơn 100 Xe Cưới Đời Mới. Đầy Đủ Các Loại Xe Từ Giá Rẻ,
                                Hạng Sang, Mui Trần Đến Siêu Sang Như: Mercedes - Audi - BMW
                                - Lexus - Bentley - Porscher - Rolls Royce... Để Quý Khách
                                Lựa Chọn.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="adv__item">
                    <div class="advantage-block">
                        <div class="front">
                            <div class="img">
                                <img width="70" height="70"
                                    src="https://xecuoiluxury.com/wp-content/uploads/2018/07/feature-icon-2.png"
                                    class="attachment-thumbnail size-thumbnail" alt="" />
                            </div>
                            <p class="hd">Giá Tốt Nhất</p>
                        </div>
                        <div class="back" style="
                background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/advantage-bg-hv.jpg);
              ">
                            <p>
                                Mùa Cưới 2019, Xe Cưới Luxury Áp Dụng Chương Trình Khuyến
                                Mãi và Giảm Giá Thuê Xe Cưới Cho Tất Cá Khách Hàng Liên Hệ
                                Đặt Thuê Xe Sớm Trước Từ 10 - 15 Ngày
                            </p>
                        </div>
                    </div>
                </li>
                <li class="adv__item">
                    <div class="advantage-block">
                        <div class="front">
                            <div class="img">
                                <img width="63" height="70"
                                    src="https://xecuoiluxury.com/wp-content/uploads/2018/07/advantage-icon-3.png"
                                    class="attachment-thumbnail size-thumbnail" alt="" />
                            </div>
                            <p class="hd">Lái Xe Chuyên Nghiệp</p>
                        </div>
                        <div class="back" style="
                background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/advantage-bg-hv.jpg);
              ">
                            <p>
                                Đội Ngũ Lái Xe Vui Vẻ, Nhiệt Tình, Ăn Mặc Lịch Sự Và Luôn
                                Đúng Giờ. Chắc Chắn Sẽ Khiến Khách Hàng Cảm Thấy Thân Thiện,
                                Và Hài Lòng Về Dịch Vụ Của Chúng Tôi
                            </p>
                        </div>
                    </div>
                </li>
                <li class="adv__item">
                    <div class="advantage-block">
                        <div class="front">
                            <div class="img">
                                <img width="71" height="71"
                                    src="https://xecuoiluxury.com/wp-content/uploads/2018/07/advantage-icon-4.png"
                                    class="attachment-thumbnail size-thumbnail" alt="" />
                            </div>
                            <p class="hd">Dịch Vụ Uy Tín</p>
                        </div>
                        <div class="back" style="
                background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/advantage-bg-hv.jpg);
              ">
                            <p>
                                Xe Cưới Luxury Khẳng Định Sự Uy Tín Về Thương Hiệu Của Mình
                                Bằng Chính Sự Hài Lòng Của Khách Hàng. Hơn 69.000 Cô Dâu Chú
                                Rể Đã Thuê Xe Và Hài Lòng Về Dịch Vụ Của Chúng Tôi
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="services">
        <ul class="list-serv clear">
            <li class="serv__item">
                <div class="serv-title">
                    <div class="tit-wrap">
                        <h3 class="hd">THUÊ XE CƯỚI VIP</h3>
                        <p style="text-align: justify">
                            Đến với dịch vụ <strong>Thuê xe cưới VIP</strong>,
                            <strong>Mui Trần</strong>, <strong>Siêu Sang</strong> của
                            <strong>Xe Cưới Luxury</strong>. Khách hàng dễ dàng lựa chọn
                            được chiếc xe cưới mới đẹp, sang trọng với giá
                            <strong>cho thuê xe cưới</strong> tốt nhất tại Hà Nội.
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
            @foreach ($types as $type)
            <li class="serv__item">
                <div class="serv-block">
                    <div class="front"
                        style="background-image: url({{ isset($type->images[0]) ? asset('storage/' . $type->images[0]) : asset('frontend/assets/images/no-photo.jpg') }});">
                        <div class="bl-content">
                            <h3 class="hd">{{ $type->name }}</h3>
                        </div>
                    </div>
                    <div class="back"
                        style="background-image: url({{ isset($type->images[1]) ? asset('storage/' . $type->images[1]) : (isset($type->images[0]) ? asset('storage/' . $type->images[0]) : asset('frontend/assets/images/no-photo.jpg')) }});">
                        <div class="bl-content">
                            <h3 class="hd">{{ $type->name }}</h3>
                            <p>
                                {{ $type->short_description }}
                            </p>
                            <a href="https://xecuoiluxury.com/dich-vu/xe-cuoi-dep/" class="color1">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </li>
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
                        <li class="product__item" src-popup=".mona-popup-1417">
                            <div class="product-block">
                                <div class="img">
                                    <a href="https://xecuoiluxury.com/san-pham/gia-cho-thue-xe-cuoi-mercedes-c200/">
                                        <img width="670" height="446"
                                            src="{{ file_exists(public_path('storage/' . $car->image)) ? asset('storage/' . $car->image) : asset('frontend/assets/images/no-photo.jpg') }}"
                                            class="attachment-full size-full wp-post-image" alt="Car Image" />
                                    </a>
                                </div>
                                <div class="ct">
                                    <p class="hd">
                                        <a href="https://xecuoiluxury.com/san-pham/gia-cho-thue-xe-cuoi-mercedes-c200/">{{
                                            $car->name }}</a>
                                    </p>
                                    <p class="price mona-text-label">{{ number_format($car->price) }} VND</p>
                                    <div class="mona-except">
                                        <p>
                                            {!! \Illuminate\Support\Str::limit($car->description, 45, '...') !!}
                                        </p>

                                    </div>
                                    <a href="https://xecuoiluxury.com/san-pham/gia-cho-thue-xe-cuoi-mercedes-c200/"
                                        class="more">
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div id="mona-data-query" class="mona-hiden"
                        data-query='{"notin":[1417,1414,1411,1408,1405,1402,1399,1396,1393,1390,1387,1384,1382,1379,1376,1373,1370,1367,1364,1361,1359,1357,1355,1352,1349,1347,1345,1343,1341,1339,1337,1335,1333],"category":2,"nextload":9}'>
                    </div>
                    <div class="more-button">
                        <a href="https://xecuoiluxury.com/xe-cuoi/" data-max="2" data-page="0" class="mn-btn btn-1"
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
                        <h2 class="hd">CAM KẾT CỦA CHÚNG TÔI</h2>
                    </div>
                </div>
                <div class="col75 right">
                    <ul class="list-feat clear">
                        <li class="feat__item">
                            <div class="feat-block">
                                <div class="img">
                                    <img width="70" height="70"
                                        src="https://xecuoiluxury.com/wp-content/uploads/2018/07/feature-icon-1.png"
                                        class="attachment-medium size-medium" alt="" />
                                </div>
                                <div class="ct">
                                    <p class="hd">Cam Kết Xe Mới Đẹp</p>
                                    <p>
                                        Toàn bộ dàn xe cưới VIP cho thuê đều là những model mới
                                        nhất. Xe được kiểm tra, bảo dưỡng định kỳ thường xuyên.
                                        Để đảm bảo xe luôn mới đẹp khi phục vụ khách hàng thuê
                                        xe cưới.
                                    </p>
                                    <a href="#" class="more"><i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="feat__item">
                            <div class="feat-block">
                                <div class="img">
                                    <img width="70" height="70"
                                        src="https://xecuoiluxury.com/wp-content/uploads/2018/07/feature-icon-2.png"
                                        class="attachment-medium size-medium" alt="" />
                                </div>
                                <div class="ct">
                                    <p class="hd">Cam Kết Giá Rẻ Nhất</p>
                                    <p>
                                        Mùa Cưới 2019 chúng Tôi còn áp dụng chính sách khuyến
                                        mãi và giảm giá cho những khách hàng liên hệ và đặt thuê
                                        xe sớm. Cam kết mang đến giá thuê xe cưới tốt nhất trên
                                        thị trường Hà Nội.
                                    </p>
                                    <a href="#" class="more"><i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="feat__item">
                            <div class="feat-block">
                                <div class="img">
                                    <img width="70" height="70"
                                        src="https://xecuoiluxury.com/wp-content/uploads/2018/07/feature-icon-3.png"
                                        class="attachment-medium size-medium" alt="" />
                                </div>
                                <div class="ct">
                                    <p class="hd">Cam Kết 100% Hài Lòng</p>
                                    <p>
                                        Ngày cưới là một công việc hệ trọng, Vì vậy Xe Cưới
                                        Luxury luôn thận trọng, chu đáo trong từng khâu nhỏ
                                        nhất. Nhằm mang đến sự yên tâm, hài lòng cho khách hàng
                                        thuê xe cưới.
                                    </p>
                                    <a href="#" class="more"><i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="car-img">
                <img width="1214" height="271"
                    src="https://xecuoiluxury.com/wp-content/uploads/2019/01/xe-limouisne.png"
                    class="attachment-slider-full size-slider-full" alt="" srcset="
            https://xecuoiluxury.com/wp-content/uploads/2019/01/xe-limouisne.png          1214w,
            https://xecuoiluxury.com/wp-content/uploads/2019/01/xe-limouisne-300x67.png    300w,
            https://xecuoiluxury.com/wp-content/uploads/2019/01/xe-limouisne-768x171.png   768w,
            https://xecuoiluxury.com/wp-content/uploads/2019/01/xe-limouisne-1024x229.png 1024w
          " sizes="(max-width: 1214px) 100vw, 1214px" />
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
                                    <span class="ra">
                                        <?php
                                                $rate = $review->rate; // Lấy giá trị rate của review
                                                $fullStars = floor($rate); // Số sao đầy
                                                $halfStar = $rate - $fullStars >= 0.5; // Kiểm tra có sao nửa không
                                                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0); // Số sao rỗng, tính cả nửa sao
                                                ?>

                                        <!-- Vẽ sao đầy -->
                                        @for ($i = 0; $i < $fullStars; $i++) <i class="fa fa-star" aria-hidden="true">
                                            </i>
                                            @endfor

                                            <!-- Vẽ sao nửa (nếu có) -->
                                            @if ($halfStar)
                                            <i class="fa fa-star-half" aria-hidden="true"></i>
                                            @endif

                                            <!-- Vẽ sao rỗng -->
                                            @for ($i = 0; $i < $emptyStars; $i++) <i class="fa fa-star-o"
                                                aria-hidden="true"></i>
                                                @endfor
                                    </span>
                                </span>
                            </div>
                            <p>{{ $review->comment }}</p>
                        </div>
                        <div class="info">
                            <div class="info-img">
                                <img width="150" height="150"
                                    src="https://xecuoiluxury.com/wp-content/uploads/2018/07/IMG_0395-1-150x150.jpg"
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

    <div class="gallery">
        <ul class="list-gallery clear">
            <li>
                <div class="img-wrap" style="
            background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/IMG_0395-476x286.jpg);
          ">
                    <div class="hv-ct">
                        <a href="https://xecuoiluxury.com/thu-vien-anh/" class="view-btn">Xem thêm ảnh</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="img-wrap" style="
            background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/IMG_0165-476x286.jpg);
          ">
                    <div class="hv-ct">
                        <a href="https://xecuoiluxury.com/thu-vien-anh/" class="view-btn">Xem thêm ảnh</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="img-wrap" style="
            background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/11/xecuoiluxury1-476x286.jpg);
          ">
                    <div class="hv-ct">
                        <a href="https://xecuoiluxury.com/thu-vien-anh/" class="view-btn">Xem thêm ảnh</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="img-wrap" style="
            background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/IMG_4729-476x286.jpg);
          ">
                    <div class="hv-ct">
                        <a href="https://xecuoiluxury.com/thu-vien-anh/" class="view-btn">Xem thêm ảnh</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="img-wrap" style="
            background-image: url(https://xecuoiluxury.com/wp-content/uploads/2019/01/IMG_4942-476x286.jpg);
          ">
                    <div class="hv-ct">
                        <a href="https://xecuoiluxury.com/thu-vien-anh/" class="view-btn">Xem thêm ảnh</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="img-wrap" style="
            background-image: url(https://xecuoiluxury.com/wp-content/uploads/2019/01/IMG_4718-476x286.jpg);
          ">
                    <div class="hv-ct">
                        <a href="https://xecuoiluxury.com/thu-vien-anh/" class="view-btn">Xem thêm ảnh</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="img-wrap" style="
            background-image: url(https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-audi-rs5-mui-tran-2-476x286.png);
          ">
                    <div class="hv-ct">
                        <a href="https://xecuoiluxury.com/thu-vien-anh/" class="view-btn">Xem thêm ảnh</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="img-wrap" style="
            background-image: url(https://xecuoiluxury.com/wp-content/uploads/2019/07/ANHDEP-21-476x286.jpg);
          ">
                    <div class="hv-ct">
                        <a href="https://xecuoiluxury.com/thu-vien-anh/" class="view-btn">Xem thêm ảnh</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="home-news">
        <div class="all">
            <div class="sec-title2">
                <h2 class="hd">Tin Tức</h2>
            </div>
            <ul class="list-hnews clear">
                @forelse ($posts as $item )
                <li class="news__item">
                    <div class="news-block1">
                        <div class="img">
                            <a href="{{ route('frontend.blog', ['slug' => $item->slug]) }}">
                                <img width="800" height="723" src="{{ asset('storage/'.$item->image) }}"
                                    class="attachment-full size-full wp-post-image" alt="" />
                            </a>
                        </div>
                        <div class="ct">
                            <p class="hd">
                                <a href="{{ route('frontend.blog', ['slug' => $item->slug]) }}">
                                    {{ $item->title }}
                                </a>
                            </p>
                            <p class="date">Đăng ngày {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d \\T\\há\\n\\g F, Y') }}</p>

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
                {{-- <li class="news__item">
                    <div class="news-block1">
                        <div class="img">
                            <a href="https://xecuoiluxury.com/gia-thue-xe-cuoi-duoc-tinh-nhu-the-nao/">
                                <img width="800" height="599"
                                    src="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-audi-4.png"
                                    class="attachment-full size-full wp-post-image" alt="" srcset="
                    https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-audi-4.png         800w,
                    https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-audi-4-300x225.png 300w,
                    https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-audi-4-768x575.png 768w
                  " sizes="(max-width: 800px) 100vw, 800px" />
                            </a>
                        </div>
                        <div class="ct">
                            <p class="hd">
                                <a href="https://xecuoiluxury.com/gia-thue-xe-cuoi-duoc-tinh-nhu-the-nao/">Giá
                                    Thuê Xe Cưới Tính Như Thế Nào?</a>
                            </p>
                            <p class="date">Đăng ngày 21 Tháng Chín, 2019</p>
                            <div class="mona-except">
                                <p>CÁCH TÍNH GIÁ XE CƯỚI RA SAO ? Giá thuê [&hellip;]</p>
                            </div>

                            <a href="https://xecuoiluxury.com/gia-thue-xe-cuoi-duoc-tinh-nhu-the-nao/"
                                class="mn-btn btn-right"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </li>
                <li class="news__item">
                    <div class="news-block1">
                        <div class="img">
                            <a href="https://xecuoiluxury.com/thu-tuc-dat-thue-xe-cuoi-luxury/">
                                <img width="800" height="507"
                                    src="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-bentley-9.png"
                                    class="attachment-full size-full wp-post-image" alt="" srcset="
                    https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-bentley-9.png         800w,
                    https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-bentley-9-300x190.png 300w,
                    https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-bentley-9-768x487.png 768w
                  " sizes="(max-width: 800px) 100vw, 800px" />
                            </a>
                        </div>
                        <div class="ct">
                            <p class="hd">
                                <a href="https://xecuoiluxury.com/thu-tuc-dat-thue-xe-cuoi-luxury/">Thủ Tục Đặt
                                    Thuê Xe Cưới Ra Sao</a>
                            </p>
                            <p class="date">Đăng ngày 21 Tháng Chín, 2019</p>
                            <div class="mona-except">
                                <p>
                                    HƯỚNG DẪN THỦ TỤC ĐẶT THUÊ XE TẠI XECUOILUXURY.COM Cảm
                                    [&hellip;]
                                </p>
                            </div>

                            <a href="https://xecuoiluxury.com/thu-tuc-dat-thue-xe-cuoi-luxury/"
                                class="mn-btn btn-right"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </li>
                <li class="news__item">
                    <div class="news-block1">
                        <div class="img">
                            <a href="https://xecuoiluxury.com/huong-dan-cach-lua-chon-xe-cuoi-phu-hop/">
                                <img width="800" height="600"
                                    src="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-roll-royce-5.png"
                                    class="attachment-full size-full wp-post-image" alt="" srcset="
                    https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-roll-royce-5.png         800w,
                    https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-roll-royce-5-300x225.png 300w,
                    https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-roll-royce-5-768x576.png 768w
                  " sizes="(max-width: 800px) 100vw, 800px" />
                            </a>
                        </div>
                        <div class="ct">
                            <p class="hd">
                                <a href="https://xecuoiluxury.com/huong-dan-cach-lua-chon-xe-cuoi-phu-hop/">Hưỡng
                                    Dẫn Cách Lựa Chọn Xe Cưới</a>
                            </p>
                            <p class="date">Đăng ngày 25 Tháng Bảy, 2019</p>
                            <div class="mona-except">
                                <p>
                                    NÊN THUÊ XE CƯỚI LOẠI NÀO MÙA CƯỚI 2020 Hiện [&hellip;]
                                </p>
                            </div>

                            <a href="https://xecuoiluxury.com/huong-dan-cach-lua-chon-xe-cuoi-phu-hop/"
                                class="mn-btn btn-right"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </li> --}}
            </ul>
            <div class="all-button">
                <a href="https://xecuoiluxury.com/tin-tuc/">Xem tất cả tin tức<i class="fa fa-long-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="about-us">
        <div class="float-img">
            <img width="717" height="405" src="https://xecuoiluxury.com/wp-content/uploads/2018/07/GIOI-THIEU.jpg"
                class="has-shadow" alt="" srcset="
          https://xecuoiluxury.com/wp-content/uploads/2018/07/GIOI-THIEU.jpg         717w,
          https://xecuoiluxury.com/wp-content/uploads/2018/07/GIOI-THIEU-300x169.jpg 300w
        " sizes="(max-width: 717px) 100vw, 717px" />
        </div>
        <div class="all">
            <div class="abu-wrap">
                <div class="ab-ct">
                    <h2 class="hd">GIỚI THIỆU VỀ XE CƯỚI LUXURY</h2>
                    <div class="mona-content">
                        <p style="text-align: justify">
                            Nếu Bạn đang tìm một địa chỉ<strong> thuê xe cưới VIP </strong>mới đẹp, uy tín, giá tốt
                            nhất tại Hà Nội<strong>,</strong>
                            <span style="color: #3366ff"><strong>XeCuoiLuxury.com</strong></span>
                            chắc chắn sẽ làm Bạn hài lòng. Chúng tôi cho thuê tất cả các
                            dòng xe cưới hạng sang và đáp ứng mọi yêu cầu về
                            <strong>thuê xe đám cưới</strong> của bạn. Cam kết toàn bộ xe
                            cho thuê là xe đời mới. Đội ngũ lái xe được đào tạo bài bản,
                            luôn vui vẻ, lịch sự và đúng giờ. Dịch vụ chu đáo, chuyên
                            nghiệp, uy tín từ khâu nhỏ nhất.
                            <strong>Giá thuê xe cưới</strong> của chúng tôi cam kết luôn
                            tốt nhất trên thị trường.
                        </p>
                        <p style="text-align: justify">
                            Đó là lý do vì sao hơn 69.000 cô dâu chú rể đã
                            <strong>thuê xe hoa đi đón dâu</strong> và hài lòng về dịch vụ
                            <strong>thuê xe cưới</strong> của chúng tôi. Mùa cưới 2019,
                            <span style="color: #3366ff"><strong>Xe Cưới Luxury</strong></span>
                            áp dụng chính sách khuyến mãi và giảm giá cho tất cả khách
                            hàng <strong>thuê xe cưới</strong> <strong>hỏi</strong> và đặt
                            dịch vụ<strong> trang trí hoa cưới.</strong>
                        </p>
                    </div>
                    <a href="http://www.xecuoiluxury.com/gioi-thieu/" class="mn-btn btn-1">Xem thêm</a>
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
        <div class="google-map">
            <div class="map">
                <iframe style="width: 100%; height: 100%"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14898.338307598791!2d105.8237589!3d21.0092832!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd9bb6c31e0b4147e!2sViet%20Tower!5e0!3m2!1svi!2s!4v1570088327782!5m2!1svi!2s"
                    width="" height="" frameborder="0" style="border: 0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</main>
@endsection
