@extends('frontend.layouts.master')

@section('content')
    <main class="datxe">
        <div class="page-position"
            style="
      background-image: url({{asset('frontend/assets/image/childpage-bg-1.jpg')}});
      ">
            <div class="title">
                <h2 class="hd">Đặt xe</h2>
                <div class="pos-nav">
                    <a href="{{ url('/') }}">Trang chủ</a>
                    -
                    <span class="current">Đặt xe</span>
                </div>
            </div>
        </div>

        <div class="order">
            <div class="all">
                <div class="order-wrap">
                    <div class="call-btn">
                        <a href="" class="mn-btn btn-red">THÔNG TIN ĐẶT THUÊ XE</a>
                    </div>
                    <div role="form" class="wpcf7" id="wpcf7-f165-p123-o1" lang="vi" dir="ltr">
                        <div class="screen-reader-response"></div>
                        <form action="" method="post" class="" id="add_booking_form">
                            <div class="form-order clear">
                                <div class="form__child">
                                    <span class="wpcf7-form-control-wrap menu-123">
                                        <select name="car_id"
                                            class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required f-control"
                                            id="mona-loai-xe-select" aria-required="true" aria-invalid="false">
                                            @foreach ($cars as $id => $name)
                                                <option value="{{ $id }}" @selected($id == request('xe', null))>
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                    <span class="icon"><i class="fa fa-caret-down"></i></span>
                                </div>

                                <div class="form__child">
                                    <span class="wpcf7-form-control-wrap menu-124">
                                        <select name="type_id"
                                            class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required f-control"
                                            id="mona-dv-xe-select" aria-required="true" aria-invalid="false">
                                            <option value="">Chọn dịch vụ</option>

                                        </select>
                                    </span>
                                    <span class="icon"><i class="fa fa-caret-down"></i></span>
                                </div>

                                <div class="form__child">

                                    <input type="datetime-local"
                                        class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required wpcf7-validates-as-date f-control ngaythue"
                                        placeholder="Ngày thuê" name="start_date">
                                </div>
                                <div class="form__child">

                                    <input type="text" pattern="[0-9]*" inputmode="numeric"
                                        title="Vui lượng nhập số ngày thuê" size="40"
                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required f-control"
                                        placeholder="Số ngày thuê" name="rental_days">
                                </div>
                                <div class="form__child">
                                    <input type="text"
                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required f-control"
                                        placeholder="Họ tên khách hàng" name="name">
                                </div>
                                <div class="form__child">
                                    <input type="text" name="phone" value="" size="40"
                                        pattern="[0-9]*" title="Vui lượng nhập số điện thoại"
                                        class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel f-control"
                                        aria-required="true" aria-invalid="false" placeholder="Số điện thoại">
                                </div>
                                <div class="form__child full">
                                    <span class="wpcf7-form-control-wrap textarea-960">
                                        <textarea name="note" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea f-control"
                                            aria-invalid="false"
                                            placeholder="Ghi Chú Thêm Yêu Cầu Thuê Xe ( Lịch trình: điểm đón, điểm đến, thời gian dùng xe...)"></textarea>
                                    </span>
                                </div>
                            </div>

                            <div class="nav-button">
                                <a href="" class="mn-btn back"><i class="fa fa-long-arrow-left"></i>Danh sách
                                    xe</a>
                                <button type="submit" class="wpcf7-form-control wpcf7-submit mn-btn btn-1">THÔNG TIN ĐẶT
                                    THUÊ XE</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="float-img"
                style="
                background-image: url(https://xecuoiluxury.com/template/images/child-page/datxe-float-img.png);
                ">
            </div>
        </div>
    </main>
@endsection

@push('scripts')
<script src="{{asset('frontend/assets/js/toastr.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('#mona-loai-xe-select').on('change', function() {

                jQuery.ajax({
                    type: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}',
                        car_id: this.value
                    },
                    success: function(response) {

                        var options = '<option value="Chọn dịch vụ">Chọn dịch vụ</option>';
                        response.types.forEach(function(type) {
                            options += '<option value="' + type.id + '">' + type.name +
                                '</option>';
                        });
                        jQuery("#mona-dv-xe-select").html(options);
                    }
                })
            });

            const urlParams = new URLSearchParams(window.location.search);

            const xe = urlParams.get('xe');

            if (xe) {

                jQuery.ajax({
                    type: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}',
                        car_id: xe
                    },
                    success: function(response) {
                        var options = '<option value="">Chọn dịch vụ</option>';
                        response.types.forEach(function(car) {
                            options += '<option value="' + car.id + '">' + car.name +
                                '</option>';
                        });
                        jQuery("#mona-dv-xe-select").html(options);
                    }
                });
            }

            jQuery('#add_booking_form').on('submit', function(e) {
                e.preventDefault();

                const data = jQuery(this).serialize();

                jQuery.ajax({
                    url: '{{ route('frontend.booking.store') }}',
                    type: 'POST',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },

                    success: function(response) {
                        if (response.status) {
                            toastr.success(response.message);
                            jQuery('#add_booking_form').trigger('reset');
                        }
                    },
                    error: function(error) {
                        toastr.error(error.responseJSON.message);

                    }
                })
            })
        })
    </script>
@endpush

@push('styles')
<link rel="stylesheet" href="{{asset('frontend/assets/css/toastr.min.css')}}">
@endpush
