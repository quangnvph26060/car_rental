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
                            <ul class="list-product clear" id="mona-sticky-content">
                                <li class="product__item" src-popup=".mona-popup-2586">
                                    <div class="product-block">
                                        <div class="img">
                                            <a href="https://xecuoiluxury.com/san-pham/mau-xe-hoa-hcl-039/">
                                                <img width="902" height="1026"
                                                    src="https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1.png"
                                                    class="attachment-full size-full wp-post-image" alt=""
                                                    srcset="
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1.png          902w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1-264x300.png  264w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1-768x874.png  768w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-1-900x1024.png 900w
                          "
                                                    sizes="(max-width: 902px) 100vw, 902px" />
                                            </a>
                                        </div>
                                        <div class="ct">
                                            <p class="hd">
                                                <a href="https://xecuoiluxury.com/san-pham/mau-xe-hoa-hcl-039/">Hoa Xe Cưới
                                                    – HCL: 039</a>
                                            </p>
                                            <p class="price mona-text-label">1,600,000 VND</p>
                                            <div class="mona-except">
                                                <p>
                                                    Khuyến Mại: Tặng Hoa Cầm Tay Cô Dâu + Hoa Cài Áo Chủ
                                                    Rể
                                                </p>
                                            </div>
                                            <a href="https://xecuoiluxury.com/san-pham/mau-xe-hoa-hcl-039/" class="more">
                                                <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="product__item" src-popup=".mona-popup-2583">
                                    <div class="product-block">
                                        <div class="img">
                                            <a href="https://xecuoiluxury.com/san-pham/mau-hoa-xe-cuoi-dep-hcl-038/">
                                                <img width="900" height="855"
                                                    src="https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-3.png"
                                                    class="attachment-full size-full wp-post-image" alt=""
                                                    srcset="
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-3.png         900w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-3-300x285.png 300w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-3-768x730.png 768w
                          "
                                                    sizes="(max-width: 900px) 100vw, 900px" />
                                            </a>
                                        </div>
                                        <div class="ct">
                                            <p class="hd">
                                                <a href="https://xecuoiluxury.com/san-pham/mau-hoa-xe-cuoi-dep-hcl-038/">Hoa
                                                    Xe Cưới – HCL: 038</a>
                                            </p>
                                            <p class="price mona-text-label">1,700,000 VND</p>
                                            <div class="mona-except">
                                                <p>
                                                    Khuyến Mại: Tặng Hoa Cầm Tay Cô Dâu + Hoa Cài Áo Chủ
                                                    Rể
                                                </p>
                                            </div>
                                            <a href="https://xecuoiluxury.com/san-pham/mau-hoa-xe-cuoi-dep-hcl-038/"
                                                class="more">
                                                <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="product__item" src-popup=".mona-popup-2580">
                                    <div class="product-block">
                                        <div class="img">
                                            <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-giua-hcl-037/">
                                                <img width="900" height="675"
                                                    src="https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-2.png"
                                                    class="attachment-full size-full wp-post-image" alt=""
                                                    srcset="
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-2.png         900w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-2-300x225.png 300w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/10/hoa-cuoi-luxury-2-768x576.png 768w
                          "
                                                    sizes="(max-width: 900px) 100vw, 900px" />
                                            </a>
                                        </div>
                                        <div class="ct">
                                            <p class="hd">
                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-giua-hcl-037/">Hoa
                                                    Xe Cưới – HCL: 037</a>
                                            </p>
                                            <p class="price mona-text-label">1,800,000 VND</p>
                                            <div class="mona-except">
                                                <p>
                                                    Khuyến Mại: Tặng Hoa Cầm Tay Cô Dâu + Hoa Cài Áo Chủ
                                                    Rể
                                                </p>
                                            </div>
                                            <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-giua-hcl-037/"
                                                class="more">
                                                <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="product__item" src-popup=".mona-popup-2369">
                                    <div class="product-block">
                                        <div class="img">
                                            <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-hcl-036/">
                                                <img width="640" height="480"
                                                    src="https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-3.png"
                                                    class="attachment-full size-full wp-post-image" alt=""
                                                    srcset="
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-3.png         640w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-3-300x225.png 300w
                          "
                                                    sizes="(max-width: 640px) 100vw, 640px" />
                                            </a>
                                        </div>
                                        <div class="ct">
                                            <p class="hd">
                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-hcl-036/">Hoa Xe
                                                    Cưới – HCL: 036</a>
                                            </p>
                                            <p class="price mona-text-label">2,300,000 VND</p>
                                            <div class="mona-except">
                                                <p>
                                                    Khuyến Mại: Tặng Hoa Cầm Tay Cô Dâu + Hoa Cài Áo Chủ
                                                    Rể
                                                </p>
                                            </div>
                                            <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-hcl-036/"
                                                class="more">
                                                <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="product__item" src-popup=".mona-popup-2365">
                                    <div class="product-block">
                                        <div class="img">
                                            <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-dep-hcl-035/">
                                                <img width="900" height="675"
                                                    src="https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-2.png"
                                                    class="attachment-full size-full wp-post-image" alt=""
                                                    srcset="
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-2.png         900w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-2-300x225.png 300w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-2-768x576.png 768w
                          "
                                                    sizes="(max-width: 900px) 100vw, 900px" />
                                            </a>
                                        </div>
                                        <div class="ct">
                                            <p class="hd">
                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-dep-hcl-035/">Hoa Xe
                                                    Cưới – HCL: 035</a>
                                            </p>
                                            <p class="price mona-text-label">2,300,000 VND</p>
                                            <div class="mona-except">
                                                <p>
                                                    Khuyến Mại: Tặng Hoa Cầm Tay Cô Dâu + Hoa Cài Áo Chủ
                                                    Rể
                                                </p>
                                            </div>
                                            <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-dep-hcl-035/"
                                                class="more">
                                                <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="product__item" src-popup=".mona-popup-2362">
                                    <div class="product-block">
                                        <div class="img">
                                            <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-hcl-034/">
                                                <img width="900" height="675"
                                                    src="https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-1.png"
                                                    class="attachment-full size-full wp-post-image" alt=""
                                                    srcset="
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-1.png         900w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-1-300x225.png 300w,
                            https://xecuoiluxury.com/wp-content/uploads/2019/09/hoa-xe-cuoi-dep-1-768x576.png 768w
                          "
                                                    sizes="(max-width: 900px) 100vw, 900px" />
                                            </a>
                                        </div>
                                        <div class="ct">
                                            <p class="hd">
                                                <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-hcl-034/">Hoa Xe
                                                    Cưới – HCL: 034</a>
                                            </p>
                                            <p class="price mona-text-label">2,300,000 VND</p>
                                            <div class="mona-except">
                                                <p>
                                                    Khuyến Mại: Tặng Hoa Cầm Tay Cô Dâu + Hoa Cài Áo Chủ
                                                    Rể
                                                </p>
                                            </div>
                                            <a href="https://xecuoiluxury.com/san-pham/hoa-xe-cuoi-hcl-034/"
                                                class="more">
                                                <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="more-button">
                                <a href="" data-page="1" data-max="14" class="mn-btn btn-1 mona-load-button"
                                    id="mona-load-more-sticky">Xem thêm xe<i class="fa fa-caret-down"></i></a>
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
@endpush
