@extends('frontend.layouts.master')

@section('content')
    <main class="sanpham-detail">
        <div class="page-position"
            style="
        background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/childpage-bg-1.jpg);
      ">
            <div class="title">
                <h2 class="hd">{{ $product->name }}</h2>
                <div class="pos-nav">
                    <a href="{{ route('frontend.home') }}">Trang chủ</a>
                    -
                    <span class="current">{{ $product->name }}</span>
                </div>
            </div>
        </div>

        <div class="prd-detail-page">
            <div class="info-prd">
                <div class="all">
                    <div class="row100">
                        <div class="col60 left">
                            <div class="prdimg-show">
                                <ul class="prod-img_display" id="prod-img_display">
                                    <li>
                                        <div class="img">
                                            <img width="670" height="446" src="{{ showImage($product->image) }}"
                                                class="attachment-670x446 size-670x446" alt=""
                                                sizes="(max-width: 670px) 100vw, 670px" />
                                        </div>
                                    </li>
                                    @if ($product->carImages->count() > 0)
                                        @foreach ($product->carImages as $item)
                                            <li>
                                                <div class="img">
                                                    <img width="670" height="446"
                                                        src="{{ showImage($item->image_path) }}"
                                                        class="attachment-670x446 size-670x446" alt=""
                                                        srcset="
                                          {{ showImage($item->image_path) }} 670w,
                                        "
                                                        sizes="(max-width: 670px) 100vw, 670px" />
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif

                                </ul>
                                <ul class="prod-img_nav" id="prod-img_nav">
                                    <li>
                                        <div class="img">
                                            <img width="210" height="140" src="{{ showImage($product->image) }}"
                                                class="attachment-210x140 size-210x140" alt=""
                                                sizes="(max-width: 210px) 100vw, 210px" />
                                        </div>
                                    </li>
                                    @if ($product->carImages->count() > 0)
                                        @foreach ($product->carImages as $item)
                                            <li>
                                                <div class="img">
                                                    <img width="210" height="140"
                                                        src="{{ showImage($item->image_path) }}"
                                                        class="attachment-210x140 size-210x140" alt=""
                                                        sizes="(max-width: 210px) 100vw, 210px" />
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif


                                </ul>
                            </div>
                        </div>
                        <div class="col40 right">
                            <div class="prd-detail-block">
                                <div class="prd-head">
                                    <h3 class="hd">{{ $product->name }}</h3>
                                    <p class="p-hl mona-text-label">Giá Khuyến Mại:</p>
                                    <p class="price mona-text-label">{{ number_format($product->price) }} VND</p>
                                </div>
                                <div class="prd-sum">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Loại xe</td>
                                                <td>
                                                    @if ($product->types->count() > 0)
                                                        @foreach ($product->types as $key => $type)
                                                            <a href="https://xecuoiluxury.com/dich-vu/xe-cuoi-dep/"
                                                                rel="tag">{{ $type->name }}</a>
                                                            @if ($key < $product->types->count() - 1)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    @endif


                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Hãng xe</td>
                                                <td>
                                                    @if ($product->brands->count() > 0)
                                                        <a href="https://xecuoiluxury.com/dich-vu/xe-cuoi-dep/"
                                                            rel="tag">{{ $product->brands->first()->name }}</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Số chỗ</td>
                                                <td>{{ $product->number_of_seats }} Chỗ Sedan</td>
                                            </tr>

                                            @if ($product->color)
                                                <tr>
                                                    <td>Màu sắc</td>
                                                    <td>
                                                        <a href=""><span class="mona-span-color"
                                                                style="background-color: {{ $product->color->code_color }}"><span></span></span></a>
                                                    </td>
                                                </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                    <p><strong>Chi tiết khuyến mãi:</strong></p>
                                    <span class="hl">
                                        {!! $product->promotion_details !!}
                                        <a href="{{ route('frontend.booking') }}?xe={{ $product->id }}"
                                            class="mn-btn btn-1">Đặt xe</a>
                                        <a href="tel:{{ $contact->phone_number }}"
                                            class="btn-phone">{{ $contact->phone_number }}</a>
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="prd-detail__descript">
                        <!--                        <p class="hd">Chi tiết</p>-->
                        <div class="mona-content">
                            <h1 style="text-align: center">
                                <span style="color: #3366ff; font-size: 18pt"><strong>CHO THUÊ XE CƯỚI {{ $product->name }}
                                        TẠI HÀ
                                        NỘI</strong></span>
                            </h1>
                            {!! $product->description !!}

                        </div>
                    </div>
                </div>
            </div>
            <div class="favor-prd">
                <div class="all">
                    <div class="row100">
                        <div class="col25 left">
                            <div class="sec-title1">
                                <h2 class="hd">Xe Được Ưa Thích</h2>
                            </div>
                        </div>
                        <div class="col75 right">
                            <ul class="list-product clear" id="mona-home-list">
                                @foreach ($productFavorite as $car)
                                    <li class="product__item" src-popup=".mona-popup-{{ $car->id }}">
                                        <div class="product-block">

                                            <div class="img">
                                                <a href="{{ route('frontend.product', $car->slug) }}">
                                                    <img width="800" height="600" src="{{ showImage($car->image) }}"
                                                        class="attachment-full size-full wp-post-image"
                                                        alt="{{ $car->name }}">
                                                </a>
                                            </div>
                                            <div class="ct">
                                                <p class="hd">
                                                    <a
                                                        href="{{ route('frontend.product', $car->slug) }}">{{ $car->name }}</a>
                                                </p>
                                                <p class="price mona-text-label">
                                                    {{ number_format($car->price, 0, '.', '.') }}VND</p>
                                                <div class="mona-except">
                                                    {!! \Str::words($car->description, 20, '[...]') !!}
                                                </div>
                                                <a href="{{ route('frontend.product', $car->slug) }}" class="more">
                                                    <i class="fa fa-long-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="more-button">
                                <a href="https://xecuoiluxury.com/xe-cuoi/" data-max="2" data-page="1"
                                    class="mn-btn btn-1" id="mona-home-more-product">Xem thêm xe
                                    <i class="fa fa-caret-down"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        jQuery(document).ready(function($) {
            $("#prod-img_display").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: "#prod-img_nav",
            });
            $("#prod-img_nav").slick({
                slidesToShow: 5,
                asNavFor: "#prod-img_display",
                centerPadding: "5px",
                dots: false,
                prevArrow: "<button type='button' class='slick-prev pull-left'><i class=\"fa fa-chevron-left\"></i></button>",
                nextArrow: "<button type='button' class='slick-next pull-right'><i class=\"fa fa-chevron-right\"></i></button>",
                centerMode: true,
                focusOnSelect: true,
                responsive: [{
                    breakpoint: 650,
                    settings: {
                        centerPadding: "0",
                        slidesToShow: 3,
                    },
                }, ],
            });
        });
    </script>

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
                                            <p class="price mona-text-label">${car.price} VND</p>
                                            <div class="mona-except">
                                                <p>${limitText(car.short_description, 120, '[...]')}</p>
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
