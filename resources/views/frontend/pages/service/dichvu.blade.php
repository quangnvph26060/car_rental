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
                @foreach ($type->cars->take(6) as $car)
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
                                    <p>
                                        {{-- {{ Str::words($car->short_description, 5, '[...]') }} --}}
                                    </p>

                                </div>
                                <a href="{{ route('frontend.product', ['slug' => $car->slug]) }}" class="more">
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
        @if ($type->cars->count() >= 6)
            <div class="more-button">
                <a href="https://xecuoiluxury.com/xe-cuoi/" data-max="2" data-slug="{{ $slug }}" data-page="1"
                    class="mn-btn btn-1" id="mona-home-more-product">Xem thêm xe
                    <i class="fa fa-caret-down"></i>
                </a>
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
                @foreach ($brand->cars->take(6) as $car)
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
                                    <p>
                                        {{ Str::words($car->short_description, 5, '[...]') }}
                                    </p>

                                </div>
                                <a href="{{ route('frontend.product', ['slug' => $car->slug]) }}" class="more">
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
        @if ($brand->cars->count() >= 6)
            <div class="more-button">
                <a href="https://xecuoiluxury.com/xe-cuoi/" data-max="2" data-slug="{{ $slug }}" data-page="1"
                    class="mn-btn btn-1" id="mona-home-more-product">Xem thêm xe
                    <i class="fa fa-caret-down"></i>
                </a>
            </div>
        @endif
        <div class="pinfo-detail mn-content">
            {!! $brand->described_below !!}
        </div>
    </div>
@endisset


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
            const slug = jQuery(this).data('slug');

            const app_url = '{{ env('APP_URL') }}';


            const $this = jQuery(this); // Truy cập chính thẻ <a>

            // Lấy giá trị hiện tại của `data-page`
            let currentPage = parseInt($this.data('page'), 10); // Chuyển sang số nguyên

            // Tăng giá trị `data-page` lên 1
            currentPage++;

            // Cập nhật lại thuộc tính `data-page`
            $this.data('page', currentPage);

            jQuery.ajax({
                url: '{{ route('frontend.load.car.by.slug') }}',
                type: 'POST',
                data: {
                    action: 'mona_load_more',
                    page: currentPage,
                    slug: slug
                },
                beforeSend: function() {
                    // Thay đổi nội dung nút thành "Loading..." khi đang tải
                    $this.html('<i class="fa fa-spinner fa-spin"></i> Đang tải...');
                },
                success: function(data) {
                    if (data.cars && data.cars.length > 0) {
                        data.cars.forEach(car => {
                            jQuery('#mona-items-content').append(`

                                 <li class="product__item" src-popup=".mona-popup-${car.id}">
                        <div class="product-block">

                            <div class="img">
                                <a href="${app_url}/san-pham/${car.slug}">
                                    <img width="800" height="600" src="${app_url+'/storage/'+car.image}"
                                        class="attachment-full size-full wp-post-image" alt="${car.name}">
                                </a>
                            </div>
                            <div class="ct">
                                <p class="hd">
                                    <a href="${app_url}/san-pham/${car.slug}">${car.name}</a>
                                </p>
                                <p class="price mona-text-label">${car.price} VND</p>
                                <div class="mona-except">
                                     <p>${limitText(car.short_description, 20, '[...]')}</p>
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
