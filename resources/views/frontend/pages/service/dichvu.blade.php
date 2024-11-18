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
                    <li class="product__item" src-popup=".mona-popup-{{ $item->id }}">
                        <div class="product-block">

                            <div class="img">
                                <a href="{{ route('frontend.product', $item->slug) }}">
                                    <img width="800" height="600" src="{{ showImage($item->image) }}"
                                        class="attachment-full size-full wp-post-image" alt="{{ $item->name }}">
                                </a>
                            </div>
                            <div class="ct">
                                <p class="hd">
                                    <a href="{{ route('frontend.product', $item->slug) }}">{{ $item->name }}</a>
                                </p>
                                <p class="price mona-text-label">{{ number_format($item->price, 0, '.', '.') }}VND</p>
                                <div class="mona-except">
                                    {!! \Str::words($item->description, 20, '[...]') !!}
                                </div>
                                <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-mercedes-c250/" class="more">
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
        @if ($type->cars->count() > 6)
            <div class="more-button">
                <a href="" data-tax-id="2" data-tax="product_cat" data-page="1" data-max="5"
                    class="mn-btn btn-1 mona-load-button" id="mona-load-more-items">Xem thêm<i
                        class="fa fa-caret-down"></i></a>
            </div>
        @endif
        <div class="pinfo-detail mn-content">
            {!! $type->described_below !!}
        </div>
    </div>
@endisset

@isset($brand)
    <div class="side-right">
        <div id="nav-ct1">
            <div class="content-entry">
                <div class="mn-content">
                    {!! $brand->described_above !!}
                </div>
            </div>
        </div>
        <ul class="list-product clear" id="mona-items-content">
            @if ($brand->cars->count() > 0)
                @foreach ($brand->cars as $item)
                    <li class="product__item" src-popup=".mona-popup-{{ $item->id }}">
                        <div class="product-block">

                            <div class="img">
                                <a href="{{ route('frontend.product', $item->slug) }}">
                                    <img width="800" height="600" src="{{ showImage($item->image) }}"
                                        class="attachment-full size-full wp-post-image" alt="{{ $item->name }}">
                                </a>
                            </div>
                            <div class="ct">
                                <p class="hd">
                                    <a href="{{ route('frontend.product', $item->slug) }}">{{ $item->name }}</a>
                                </p>
                                <p class="price mona-text-label">{{ number_format($item->price, 0, '.', '.') }}VND</p>
                                <div class="mona-except">
                                    {!! \Str::words($item->description, 20, '[...]') !!}
                                </div>
                                <a href="https://xecuoiluxury.com/san-pham/thue-xe-cuoi-mercedes-c250/" class="more">
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
        @if ($brand->cars->count() > 6)
            <div class="more-button">
                <a href="" data-tax-id="2" data-tax="product_cat" data-page="1" data-max="5"
                    class="mn-btn btn-1 mona-load-button" id="mona-load-more-items">Xem thêm<i
                        class="fa fa-caret-down"></i></a>
            </div>
        @endif
        <div class="pinfo-detail mn-content">
            {!! $brand->described_below !!}
        </div>
    </div>
@endisset
