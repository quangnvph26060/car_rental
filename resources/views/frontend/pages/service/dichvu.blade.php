@isset($type)
    <div class="side-right">
        <div id="nav-ct1">
            <div class="content-entry">
                <div class="mn-content">

                    {!! $type->described_above !!}
                </div>
            </div>
        </div>
        <ul class="list-product clear" id="mona-items-content">
            @if ($type->cars->count() > 0)
                @foreach ($type->cars as $item)
                    <li class="product__item" src-popup="{{ $item->name }}">
                        <div class="product-block">
                            <div class="img">
                                <a href="{{ route('frontend.product', ['slug' => $item->slug]) }}">
                                    <img width="670" height="446"
                                        src="{{ showImage($item->image) }}"
                                        class="attachment-full size-full wp-post-image" alt=""
                                     >
                                </a>
                            </div>
                            <div class="ct">
                                <p class="hd">
                                    <a href="{{ route('frontend.product', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                </p>
                                <p class="price mona-text-label">{{ number_format($item->price) }} VND</p>
                                <div class="mona-except">
                                    {!! Str::limit($item->description, 120, '[...]') !!}
                                </div>
                                <a href="{{ route('frontend.product', ['slug' => $item->slug]) }}"
                                    class="more">
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            @else
            @endif


            {{-- <li class="product__item" src-popup=".mona-popup-1414">
            <div class="product-block">

                <div class="img">
                    <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-mercedes-c250/">
                        <img width="800" height="600"
                            src="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-c250-2.png"
                            class="attachment-full size-full wp-post-image" alt=""
                            srcset="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-c250-2.png 800w, https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-c250-2-300x225.png 300w, https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-c250-2-768x576.png 768w"
                            sizes="(max-width: 800px) 100vw, 800px">
                    </a>
                </div>
                <div class="ct">
                    <p class="hd">
                        <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-mercedes-c250/">Mercedes C250
                            Trắng</a>
                    </p>
                    <p class="price mona-text-label">1,200,000 VND</p>
                    <div class="mona-except">
                        <p>CHO THUÊ XE CƯỚI MERCEDES C250 ĐỜI MỚI TẠI HÀ […]</p>
                    </div>
                    <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-mercedes-c250/" class="more">
                        <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </li>
        <li class="product__item" src-popup=".mona-popup-1411">
            <div class="product-block">

                <div class="img">
                    <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-mercedes-c300-amg/">
                        <img width="800" height="599"
                            src="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-c300-2.png"
                            class="attachment-full size-full wp-post-image" alt=""
                            srcset="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-c300-2.png 800w, https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-c300-2-300x225.png 300w, https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-c300-2-768x575.png 768w"
                            sizes="(max-width: 800px) 100vw, 800px">
                    </a>
                </div>
                <div class="ct">
                    <p class="hd">
                        <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-mercedes-c300-amg/">Mercedes C300
                            Trắng</a>
                    </p>
                    <p class="price mona-text-label">1,200,000 VND</p>
                    <div class="mona-except">
                        <p>CHO THUÊ XE CƯỚI MERCEDES C300 AMG TẠI HÀ NỘI […]</p>
                    </div>
                    <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-mercedes-c300-amg/" class="more">
                        <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </li>
        <li class="product__item" src-popup=".mona-popup-1408">
            <div class="product-block">

                <div class="img">
                    <a href="https://xecuoiluxury.com/san-pham/cho-thue-xe-cuoi-mercedes-e250/">
                        <img width="800" height="600"
                            src="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-46.png"
                            class="attachment-full size-full wp-post-image" alt=""
                            srcset="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-46.png 800w, https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-46-300x225.png 300w, https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-46-768x576.png 768w"
                            sizes="(max-width: 800px) 100vw, 800px">
                    </a>
                </div>
                <div class="ct">
                    <p class="hd">
                        <a href="https://xecuoiluxury.com/san-pham/cho-thue-xe-cuoi-mercedes-e250/">Mercedes E250
                            Trắng</a>
                    </p>
                    <p class="price mona-text-label">2,300,000 VND</p>
                    <div class="mona-except">
                        <p>CHO THUÊ XE CƯỚI MERCEDES E250 ĐỜI MỚI TẠI HÀ […]</p>
                    </div>
                    <a href="https://xecuoiluxury.com/san-pham/cho-thue-xe-cuoi-mercedes-e250/" class="more">
                        <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </li>
        <li class="product__item" src-popup=".mona-popup-1405">
            <div class="product-block">

                <div class="img">
                    <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-mercedes-e300-trang-ha-noi/">
                        <img width="800" height="600"
                            src="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-45.png"
                            class="attachment-full size-full wp-post-image" alt=""
                            srcset="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-45.png 800w, https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-45-300x225.png 300w, https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-45-768x576.png 768w"
                            sizes="(max-width: 800px) 100vw, 800px">
                    </a>
                </div>
                <div class="ct">
                    <p class="hd">
                        <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-mercedes-e300-trang-ha-noi/">Mercedes
                            E300 Trắng</a>
                    </p>
                    <p class="price mona-text-label">2,300,000 VND</p>
                    <div class="mona-except">
                        <p>CHO THUÊ XE CƯỚI MERCEDES E300 Ở TẠI HÀ NỘI […]</p>
                    </div>
                    <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-mercedes-e300-trang-ha-noi/"
                        class="more">
                        <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </li>
        <li class="product__item" src-popup=".mona-popup-1402">
            <div class="product-block">

                <div class="img">
                    <a href="https://xecuoiluxury.com/san-pham/cho-thue-xe-cuoi-mercedes-e400/">
                        <img width="768" height="576"
                            src="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-luxury-com-80.png"
                            class="attachment-full size-full wp-post-image" alt=""
                            srcset="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-luxury-com-80.png 768w, https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-luxury-com-80-300x225.png 300w"
                            sizes="(max-width: 768px) 100vw, 768px">
                    </a>
                </div>
                <div class="ct">
                    <p class="hd">
                        <a href="https://xecuoiluxury.com/san-pham/cho-thue-xe-cuoi-mercedes-e400/">Mercedes E400
                            Trắng</a>
                    </p>
                    <p class="price mona-text-label">2,400,000 VND</p>
                    <div class="mona-except">
                        <p>CHO THUÊ XE CƯỚI MERCEDES E400 GIÁ RẺ TẠI HÀ […]</p>
                    </div>
                    <a href="https://xecuoiluxury.com/san-pham/cho-thue-xe-cuoi-mercedes-e400/" class="more">
                        <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </li>
        <li class="product__item" src-popup=".mona-popup-1399">
            <div class="product-block">

                <div class="img">
                    <a href="https://xecuoiluxury.com/san-pham/gia-thue-xe-cuoi-mercedes-s400-ha-noi/">
                        <img width="800" height="600"
                            src="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-59.png"
                            class="attachment-full size-full wp-post-image" alt=""
                            srcset="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-59.png 800w, https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-59-300x225.png 300w, https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-mercedes-59-768x576.png 768w"
                            sizes="(max-width: 800px) 100vw, 800px">
                    </a>
                </div>
                <div class="ct">
                    <p class="hd">
                        <a href="https://xecuoiluxury.com/san-pham/gia-thue-xe-cuoi-mercedes-s400-ha-noi/">Mercedes
                            S400 Trắng</a>
                    </p>
                    <p class="price mona-text-label">3,800,000 VND</p>
                    <div class="mona-except">
                        <p>CHO THUÊ XE CƯỚI MERCEDES S400 TRẮNG TẠI HÀ NỘI […]</p>
                    </div>
                    <a href="https://xecuoiluxury.com/san-pham/gia-thue-xe-cuoi-mercedes-s400-ha-noi/" class="more">
                        <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </li>
        <li class="product__item" src-popup=".mona-popup-1396">
            <div class="product-block">

                <div class="img">
                    <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-mercedes-s500-tai-ha-noi/">
                        <img width="670" height="446"
                            src="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-luxury-com-64-670x446-1.png"
                            class="attachment-full size-full wp-post-image" alt=""
                            srcset="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-luxury-com-64-670x446-1.png 670w, https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-luxury-com-64-670x446-1-300x200.png 300w, https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-luxury-com-64-670x446-1-210x140.png 210w, https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-cuoi-luxury-com-64-670x446-1-105x70.png 105w"
                            sizes="(max-width: 670px) 100vw, 670px">
                    </a>
                </div>
                <div class="ct">
                    <p class="hd">
                        <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-mercedes-s500-tai-ha-noi/">Mercedes
                            S500 Trắng</a>
                    </p>
                    <p class="price mona-text-label">4,300,000 VND</p>
                    <div class="mona-except">
                        <p>CHO THUÊ XE CƯỚI MERCEDES S500 ĐỜI MỚI TẠI HÀ […]</p>
                    </div>
                    <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-mercedes-s500-tai-ha-noi/" class="more">
                        <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </li>
        <li class="product__item" src-popup=".mona-popup-1393">
            <div class="product-block">

                <div class="img">
                    <a href="https://xecuoiluxury.com/san-pham/gia-thue-xe-mercedes-s450/">
                        <img width="360" height="270"
                            src="https://xecuoiluxury.com/wp-content/uploads/2019/01/thue-xe-s450-e1548493611706.png"
                            class="attachment-full size-full wp-post-image" alt="">
                    </a>
                </div>
                <div class="ct">
                    <p class="hd">
                        <a href="https://xecuoiluxury.com/san-pham/gia-thue-xe-mercedes-s450/">Mercedes S450</a>
                    </p>
                    <p class="price mona-text-label">0 VND</p>
                    <div class="mona-except">
                        <p>CHO THUÊ XE CƯỚI MERCEDES S450 TẠI HÀ NỘI Nếu […]</p>
                    </div>
                    <a href="https://xecuoiluxury.com/san-pham/gia-thue-xe-mercedes-s450/" class="more">
                        <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </li> --}}
        </ul>
        <div class="more-button">
            <a href="" data-tax-id="2" data-tax="product_cat" data-page="1" data-max="5"
                class="mn-btn btn-1 mona-load-button" id="mona-load-more-items">Xem thêm<i class="fa fa-caret-down"></i></a>
        </div>
        <div class="pinfo-detail mn-content">
            {!! $type->described_below !!}
        </div>
    </div>
@endisset
