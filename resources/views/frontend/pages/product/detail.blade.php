@extends('frontend.layouts.master')

@section('content')
<style>
    .mona-except {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.5em;
        max-height: 3em;
        white-space: normal;
        margin-bottom: 15px;
    }


    .mona-except * {
        display: block;
        margin: 0;
        padding: 0;
    }
</style>
<main class="sanpham-detail">
    <div class="page-position" style="
        background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/childpage-bg-1.jpg);
      ">
        <div class="title">
            <h2 class="hd">{{ $product->name }}</h2>
            <div class="pos-nav">
                <a href="https://xecuoiluxury.com">Trang chủ</a>
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
                                @foreach ($product->carImages as $image)
                                <li>
                                    <div class="img">
                                        <img width="670" height="446"
                                            src="{{ file_exists(public_path('storage/' . $image->image_path)) ? asset('storage/' . $image->image_path) : asset('frontend/assets/images/no-photo.jpg') }}"
                                            class="attachment-670x446 size-670x446" alt=""
                                            srcset="
                                                 {{ file_exists(public_path('storage/' . $image->image_path)) ? asset('storage/' . $image->image_path) : asset('frontend/assets/images/no-photo.jpg') }}   670w,
                                                 {{ file_exists(public_path('storage/' . $image->image_path)) ? asset('storage/' . $image->image_path) : asset('frontend/assets/images/no-photo.jpg') }} 300w,
                                                 {{ file_exists(public_path('storage/' . $image->image_path)) ? asset('storage/' . $image->image_path) : asset('frontend/assets/images/no-photo.jpg') }} 210w,
                                                 {{ file_exists(public_path('storage/' . $image->image_path)) ? asset('storage/' . $image->image_path) : asset('frontend/assets/images/no-photo.jpg') }}  105w"
                                            sizes="(max-width: 670px) 100vw, 670px" />
                                    </div>
                                </li>
                                @endforeach
                            </ul>

                            <ul class="prod-img_nav" id="prod-img_nav">
                                @foreach ($product->carImages as $image)
                                <li>
                                    <div class="img">
                                        <img width="210" height="140"
                                            src="{{ file_exists(public_path('storage/' . $image->image_path)) ? asset('storage/' . $image->image_path) : asset('frontend/assets/images/no-photo.jpg') }}"
                                            class="attachment-210x140 size-210x140" alt=""
                                            srcset="
                                                 {{ file_exists(public_path('storage/' . $image->image_path)) ? asset('storage/' . $image->image_path) : asset('frontend/assets/images/no-photo.jpg') }} 210w,
                                                 {{ file_exists(public_path('storage/' . $image->image_path)) ? asset('storage/' . $image->image_path) : asset('frontend/assets/images/no-photo.jpg') }} 670w,
                                                 {{ file_exists(public_path('storage/' . $image->image_path)) ? asset('storage/' . $image->image_path) : asset('frontend/assets/images/no-photo.jpg') }} 105w"
                                            sizes="(max-width: 210px) 100vw, 210px" />
                                    </div>
                                </li>
                                @endforeach
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
                                                <a href="https://xecuoiluxury.com/dich-vu/xe-cuoi-dep/" rel="tag">{{
                                                    $type->name }}</a>
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
                                                <a href="https://xecuoiluxury.com/dich-vu/xe-cuoi-dep/" rel="tag">{{
                                                    $product->brands->first()->name }}</a>
                                                @endif

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Số chỗ</td>
                                            <td>{{ $product->number_of_seats }} Chỗ Sedan</td>
                                        </tr>
                                        <tr>
                                            <td>Màu sắc</td>
                                            <td>
                                                <a href="https://xecuoiluxury.com/mau-sac/xe-cuoi-mau-trang/"><span
                                                        class="mona-span-color" style="width: 100%"><span> {{
                                                            isset($product->color) ? $product->color->name : '' }}
                                                        </span></span></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p><strong>Chi tiết khuyến mãi:</strong></p>
                                <span class="hl">
                                    {!! $product->promotion_details !!}

                                    <a
                                    href="{{route('frontend.booking')}}?xe={{$product->id}}"
                                    class="mn-btn btn-1"
                                    >Đặt xe</a
                                  >
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
                        <ul class="list-product clear" id="mona-sticky-content">

                        </ul>
                        <div class="more-button" style="padding-top: 0px; margin-top: 15px">
                            <a href="javascript:void(0);" data-page="1" data-max="{{ $maxPages }}"
                                class="mn-btn btn-1 mona-load-button" id="mona-load-more-sticky">
                                Xem thêm xe <i class="fa fa-caret-down"></i>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    jQuery(document).ready(function () {
        const loadMoreCarsUrl = `{{ route('frontend.load_more_cars') }}`; // URL route của Laravel
        const countcar = `{{ $totalCars }}`;
        let newProducts = 0;

        // Hàm tải thêm sản phẩm
        function loadCars(page) {
            $.ajax({
                url: loadMoreCarsUrl,
                type: 'GET',
                data: { page: page },
                success: function (response) {
                    console.log(response.data);
                    if (response.length > 0) {
                        newProducts += response.length;
                        response.forEach(car => {
                            const imageUrl = '/storage/' + car.image;

                            $('#mona-sticky-content').append(`
                            <li class="product__item" src-popup=".mona-popup-2647">
                                        <div class="product-block">
                                            <div class="img">
                                                <a href="${car.slug}">
                                                    <img width="600" height="450"
                                                        src="${imageUrl}"
                                                        class="attachment-full size-full wp-post-image" alt=""
                                                        srcset=" ${imageUrl} 600w, ${imageUrl} 300w "
                                                        sizes="(max-width: 600px) 100vw, 600px" />
                                                </a>
                                            </div>
                                            <div class="ct">
                                                <p class="hd">
                                                    <a href="${car.slug}"> ${car.name}</a>
                                                </p>
                                                <p class="price mona-text-label"> ${ new Intl.NumberFormat('vi-VN').format(car.price).replace(/\./g, ',') } VND</p>
                                                <div class="mona-except"
                                                    <p>
                                                        ${car.description}
                                                    </p>
                                                </div>
                                                <a href="${car.slug}"
                                                    class="more">
                                                    <i class="fa fa-long-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                            `);
                        });

                        if (newProducts == countcar) {
                            $('#mona-load-more-sticky').hide();
                        } else {
                            // Nếu có sản phẩm mới, tiếp tục cập nhật page cho nút Load More
                            $('#mona-load-more-sticky').data('page', page + 1);
                        }
                    } else {
                        $('#mona-load-more-sticky').hide();
                    }
                },
                error: function () {
                    alert('Có lỗi xảy ra khi tải dữ liệu!');
                }
            });
        }

        // Tải trang đầu tiên khi vào trang
        loadCars(1); // Tải 6 sản phẩm đầu tiên

        // Sự kiện bấm nút "Xem thêm"
        $('#mona-load-more-sticky').on('click', function () {
            let button = $(this);
            let page = button.data('page');

            button.addClass('loading');

            setTimeout(function() {
                button.removeClass('loading');
                loadCars(page)
            }, 1500);

            // loadCars(page);
        });
    });
</script>


@endpush
