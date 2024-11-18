@extends('frontend.layouts.master')

@section('content')
    <main class="gioithieu">
        <div class="page-position"
            style="
        background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/childpage-bg-1.jpg);
      ">
            <div class="title">
                <h2 class="hd">Giới thiệu</h2>
                <div class="pos-nav">
                    <a href="https://xecuoiluxury.com">Trang chủ</a>
                    -
                    <span class="current">Giới thiệu</span>
                </div>
            </div>
        </div>

        <div class="ele-wrap" style="background-color: #f8f8f8">
            <div class="about-us">
                <div class="float-img">
                    <img class="has-shadow" src="https://xecuoiluxury.com/wp-content/uploads/2018/07/GIOI-THIEU.jpg"
                        alt="" />
                </div>

                <div class="all">
                    <div class="abu-wrap">
                        <div class="ab-ct">
                            <h2 class="hd">GIỚI THIỆU</h2>
                            <p style="text-align: justify">
                                <a href="http://xecuoiluxury.com/"><strong><span style="color: #3366ff">THUÊ XE CƯỚI
                                            LUXURY</span></strong></a>
                                là địa chỉ cho thuê xe hoa đi đón dâu uy tín và chuyên nghiệp
                                tại Hà Nội. Công ty chúng tôi sở hữu và cho thuê tất cả các
                                dòng xe sang làm xe cưới. Cam kết toàn bộ xe cho thuê là xe
                                đời mới. Đội ngũ lái xe của chúng tôi được đào tạo bài bản đáp
                                ứng các tiêu chí: Đúng giờ, lịch sự, vui vẻ. Đội ngũ nhân viên
                                tư vấn nhiệt tình, chu đáo. Đảm bảo mang đến sự cẩn trọng,
                                chuyên nghiệp từ khâu nhỏ nhất. Giá thuê xe cưới luôn cạnh
                                tranh và hợp lý hơn các đơn vị khác do đang được ưu đãi và
                                khuyến mãi. <strong><br /> </strong>
                            </p>
                            <p style="text-align: justify">
                                Đó là lý do vì sao hơn 69.000 cô dâu chú rể đã hài lòng về
                                dịch vụ
                                <span style="color: #3366ff"><strong>thuê xe cưới</strong></span>
                                của chúng tôi. Mùa cưới 2020 Xe Cưới Luxury áp dụng chính sách
                                khuyến mãi và giảm giá, cho tất cả khách hàng
                                <strong>ký hợp đồng xe</strong> sớm trước từ 10 &#8211; 15
                                ngày và đặt dịch vụ<strong> trang trí hoa xe cưới</strong> của
                                chúng tôi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cost">
                <div class="all">
                    <div class="sec-title2">
                        <h2 class="hd">CÁC DỊCH VỤ CHO THUÊ XE</h2>
                    </div>
                </div>
                <ul class="cost-table clear">
                    @forelse ($use_service as $item)
                        <li class="cost__col">
                            <div class="cost-block">
                                <div class="head">
                                    <h4>{{ $item->name }}</h4>
                                </div>
                                <div class="price">
                                    <p>{{ $item->cars->min('price') ? number_format($item->cars->min('price'), 0, '.', '.') : '' }}
                                        VND</p>

                                </div>
                                <div class="detail">
                                    <p class="truncate-description">
                                        {{ $item->short_description }}
                                    </p>
                                    <a href="http://xecuoiluxury.com/dich-vu/xe-cuoi-dep/" class="mn-btn btn-1">XEM THÊM</a>
                                </div>
                            </div>
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>

        <div class="strengths">
            <div class="all">
                <div class="strengths-wrap">
                    <div class="whyus">
                        <div class="sec-title2">
                            <h2 class="hd">TẠI SAO LẠI CHỌN CHÚNG TÔI</h2>
                        </div>
                        <ul class="list-whyus clear">
                            @foreach ($benefits as $item)
                                <li class="whyus__item">
                                    <div class="midcol-block">
                                        <div class="img">
                                            <img width="70" height="70" src="{{ showImage($item->icon) }}"
                                                class="attachment-thumbnail size-thumbnail" alt="{{ $item->title }}" />
                                        </div>
                                        <div class="ct">
                                            <p class="hd">{{ $item->title }}</p>
                                            <p>
                                                {{ $item->description }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="guarantee">
                        <h2 class="hd">CAM KẾT VỀ DỊCH VỤ</h2>
                        @forelse ($commitments as $item)
                            <p class="hd">
                                <span style="color: #3366ff"><strong><span style="font-size: 10pt">
                                            {{ $item->title }}</span></strong></span>
                            </p>
                            <p>
                                {{ $item->description }}
                            </p>
                        @empty
                        @endforelse

                    </div>
                </div>
            </div>
            <div class="float-img"
                style="
          background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/gioithieu-float-img.png);
        ">
            </div>
        </div>

        <div class="feedbacks">
            <div class="all">
                <div class="sec-title2">
                    <h2 class="hd">Ý KIẾN VÀ HÌNH ẢNH CỦA KHÁCH HÀNG</h2>
                </div>
                <ul class="list-feedback slide-feedback">
                    @forelse ($reviews as $review)
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
                                    <p>
                                        {{ $review->comment }}
                                    </p>
                                </div>
                                <div class="info">
                                    <div class="info-img">
                                        <img width="150" height="150" src="{{ asset('storage/' . $review->avatar) }}"
                                            class="attachment-thumbnail size-thumbnail" alt="" />
                                    </div>
                                    <div class="info-dt">
                                        <p class="main">{{ $review->customer_name }}</p>
                                        <p class="color1 sub">{{ $review->customer_role }}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                    @endforelse

                </ul>
                <div class="slide-feedback-dots"></div>
            </div>
        </div>

        @include('frontend.pages.image.gallery')
    </main>
    <style>
        .truncate-description {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            /* Giới hạn tối đa 4 dòng */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            /* Thêm dấu "..." khi văn bản bị cắt */
        }

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
            font-size: 13px;
            color: #f39c12;

        }
    </style>
@endsection
