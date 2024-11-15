@extends('frontend.layouts.master')

@section('content')
<main class="datxe">
    <div class="page-position" style="
        background-image: url(https://xecuoiluxury.com/template//images/child-page/childpage-bg-1.jpg);
      ">
        <div class="title">
            <h2 class="hd">Đặt xe</h2>
            <div class="pos-nav">
                <a href="https://xecuoiluxury.com">Trang chủ</a>
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
                    <form action="/dat-xe/#wpcf7-f165-p123-o1" method="post" class="wpcf7-form" novalidate="novalidate">
                        <div style="display: none">
                            <input type="hidden" name="_wpcf7" value="165" />
                            <input type="hidden" name="_wpcf7_version" value="5.0.2" />
                            <input type="hidden" name="_wpcf7_locale" value="vi" />
                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f165-p123-o1" />
                            <input type="hidden" name="_wpcf7_container_post" value="123" />
                        </div>
                        <div class="form-order clear">
                            <div class="form__child">
                                <span class="wpcf7-form-control-wrap menu-123"><select name="menu-123"
                                        class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required f-control"
                                        id="mona-loai-xe-select" aria-required="true" aria-invalid="false">
                                        <option value="Chọn xe">Chọn xe</option>
                                    </select>
                                </span>
                                <span class="icon"><i class="fa fa-caret-down"></i></span>
                            </div>
                            <div class="form__child">
                                <span class="wpcf7-form-control-wrap menu-124"><select name="menu-124"
                                        class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required f-control"
                                        id="mona-dv-xe-select" aria-required="true" aria-invalid="false">
                                        <option value="Chọn Dịch vụ">Chọn Dịch vụ</option>
                                    </select></span>
                                <span class="icon"><i class="fa fa-caret-down"></i></span>
                            </div>
                            <div class="form__child">
                                <span class="icon"><i class="fa fa-calendar"></i></span>
                                <span class="wpcf7-form-control-wrap date-129"><input type="date" name="date-129"
                                        value=""
                                        class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required wpcf7-validates-as-date f-control ngaythue"
                                        aria-required="true" aria-invalid="false" placeholder="Ngày thuê" /></span>
                            </div>
                            <div class="form__child">
                                <span class="wpcf7-form-control-wrap text-931"><input type="text" name="text-931"
                                        value="" size="40"
                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required f-control"
                                        aria-required="true" aria-invalid="false" placeholder="Số ngày thuê" /></span>
                            </div>
                            <div class="form__child">
                                <span class="wpcf7-form-control-wrap text-932"><input type="text" name="text-932"
                                        value="" size="40"
                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required f-control"
                                        aria-required="true" aria-invalid="false"
                                        placeholder="Họ tên khách hàng" /></span>
                            </div>
                            <div class="form__child">
                                <span class="wpcf7-form-control-wrap tel-373"><input type="tel" name="tel-373" value=""
                                        size="40"
                                        class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel f-control"
                                        aria-required="true" aria-invalid="false" placeholder="Số điện thoại" /></span>
                            </div>
                            <div class="form__child full">
                                <span class="wpcf7-form-control-wrap textarea-960">
                                    <textarea name="textarea-960" cols="40" rows="10"
                                        class="wpcf7-form-control wpcf7-textarea f-control" aria-invalid="false"
                                        placeholder="Ghi Chú Thêm Yêu Cầu Thuê Xe ( Lịch trình: điểm đón, điểm đến, thời gian dùng xe...)"></textarea>
                                </span>
                            </div>
                        </div>
                        <div class="img">
                            <div class="wpcf7-form-control-wrap">
                                <div data-sitekey="6LdOG2MUAAAAACqzgDgDH7cdchUUtQUW78I-lSRY"
                                    class="wpcf7-form-control g-recaptcha wpcf7-recaptcha"></div>
                                <noscript>
                                    <div style="width: 302px; height: 422px">
                                        <div style="
                          width: 302px;
                          height: 422px;
                          position: relative;
                        ">
                                            <div style="
                            width: 302px;
                            height: 422px;
                            position: absolute;
                          ">
                                                <iframe
                                                    src="https://www.google.com/recaptcha/api/fallback?k=6LdOG2MUAAAAACqzgDgDH7cdchUUtQUW78I-lSRY"
                                                    frameborder="0" scrolling="no" style="
                              width: 302px;
                              height: 422px;
                              border-style: none;
                            ">
                                                </iframe>
                                            </div>
                                            <div style="
                            width: 300px;
                            height: 60px;
                            border-style: none;
                            bottom: 12px;
                            left: 25px;
                            margin: 0px;
                            padding: 0px;
                            right: 25px;
                            background: #f9f9f9;
                            border: 1px solid #c1c1c1;
                            border-radius: 3px;
                          ">
                                                <textarea id="g-recaptcha-response" name="g-recaptcha-response"
                                                    class="g-recaptcha-response" style="
                              width: 250px;
                              height: 40px;
                              border: 1px solid #c1c1c1;
                              margin: 10px 25px;
                              padding: 0px;
                              resize: none;
                            ">
                          </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </noscript>
                            </div>
                        </div>
                        <div class="nav-button">
                            <a href="" class="mn-btn back"><i class="fa fa-long-arrow-left"></i>Danh sách
                                xe</a>
                            <input type="submit" value="Gửi Yêu Cầu Đặt Xe"
                                class="wpcf7-form-control wpcf7-submit mn-btn btn-1" />
                        </div>
                        <div class="wpcf7-response-output wpcf7-display-none"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="float-img" style="
          background-image: url(https://xecuoiluxury.com/template/images/child-page/datxe-float-img.png);
        ">
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    jQuery(document).ready(function($) {

            var cars = @json($cars); // Lấy danh sách xe từ controller (ở dạng JSON)

            // Tạo danh sách option cho dropdown xe
            var options = '<option value="Chọn xe">Chọn xe</option>';
            cars.forEach(function(car) {
                options += '<option value="' + car.name + '">' + car.name + '</option>';
            });
            $("#mona-loai-xe-select").html(options);
            // $("#mona-loai-xe-select").html(
            //     '<option value="Chọn xe">Chọn xe</option><option  value="Xe Cưới Vinfast Lux A 2.0">Xe Cưới Vinfast Lux A 2.0</option><option  value="Hoa Xe Cưới &#8211; HCL: 039">Hoa Xe Cưới &#8211; HCL: 039</option><option  value="Hoa Xe Cưới &#8211; HCL: 038">Hoa Xe Cưới &#8211; HCL: 038</option><option  value="Hoa Xe Cưới &#8211; HCL: 037">Hoa Xe Cưới &#8211; HCL: 037</option><option  value="Hoa Xe Cưới &#8211; HCL: 036">Hoa Xe Cưới &#8211; HCL: 036</option><option  value="Hoa Xe Cưới &#8211; HCL: 035">Hoa Xe Cưới &#8211; HCL: 035</option><option  value="Hoa Xe Cưới &#8211; HCL: 034">Hoa Xe Cưới &#8211; HCL: 034</option><option  value="Hoa Xe Cưới &#8211; HCL: 033">Hoa Xe Cưới &#8211; HCL: 033</option><option  value="Hoa Xe Cưới &#8211; HCL: 032">Hoa Xe Cưới &#8211; HCL: 032</option><option  value="Hoa Xe Cưới &#8211; HCL: 031">Hoa Xe Cưới &#8211; HCL: 031</option><option  value="Hoa Xe Cưới &#8211; HCL: 030">Hoa Xe Cưới &#8211; HCL: 030</option><option  value="Hoa Xe Cưới &#8211; HCL: 029">Hoa Xe Cưới &#8211; HCL: 029</option><option  value="Hoa Xe Cưới &#8211; HCL: 028">Hoa Xe Cưới &#8211; HCL: 028</option><option  value="Hoa Xe Cưới &#8211; HCL: 027">Hoa Xe Cưới &#8211; HCL: 027</option><option  value="Hoa Xe Cưới &#8211; HCL: 026">Hoa Xe Cưới &#8211; HCL: 026</option><option  value="Hoa Xe Cưới &#8211; HCL: 025">Hoa Xe Cưới &#8211; HCL: 025</option><option  value="Hoa Xe Cưới &#8211; HCL: 024">Hoa Xe Cưới &#8211; HCL: 024</option><option  value="Hoa Xe Cưới &#8211; HCL: 023">Hoa Xe Cưới &#8211; HCL: 023</option><option  value="Hoa Xe Cưới &#8211; HCL: 022">Hoa Xe Cưới &#8211; HCL: 022</option><option  value="Hoa Xe Cưới &#8211; HCL: 021">Hoa Xe Cưới &#8211; HCL: 021</option><option  value="Hoa Xe Cưới &#8211; HCL: 020">Hoa Xe Cưới &#8211; HCL: 020</option><option  value="Hoa Xe Cưới &#8211; HCL: 019">Hoa Xe Cưới &#8211; HCL: 019</option><option  value="Hoa Xe Cưới &#8211; HCL: 018">Hoa Xe Cưới &#8211; HCL: 018</option><option  value="Hoa Xe Cưới &#8211; HCL: 017">Hoa Xe Cưới &#8211; HCL: 017</option><option  value="Hoa Xe Cưới &#8211; HCL: 016">Hoa Xe Cưới &#8211; HCL: 016</option><option  value="Hoa Xe Cưới &#8211; HCL: 015">Hoa Xe Cưới &#8211; HCL: 015</option><option  value="Hoa Xe Cưới &#8211; HCL: 014">Hoa Xe Cưới &#8211; HCL: 014</option><option  value="Hoa Xe Cưới &#8211; HCL: 013">Hoa Xe Cưới &#8211; HCL: 013</option><option  value="Hoa Xe Cưới &#8211; HCL: 012">Hoa Xe Cưới &#8211; HCL: 012</option><option  value="Hoa Xe Cưới &#8211; HCL: 011">Hoa Xe Cưới &#8211; HCL: 011</option><option  value="Hoa Xe Cưới &#8211; HCL: 010">Hoa Xe Cưới &#8211; HCL: 010</option><option  value="Hoa Xe Cưới &#8211; HCL: 009">Hoa Xe Cưới &#8211; HCL: 009</option><option  value="Hoa Xe Cưới &#8211; HCL: 008">Hoa Xe Cưới &#8211; HCL: 008</option><option  value="Hoa Xe Cưới &#8211; HCL: 007">Hoa Xe Cưới &#8211; HCL: 007</option><option  value="Hoa Xe Cưới &#8211; HCL: 006">Hoa Xe Cưới &#8211; HCL: 006</option><option  value="Hoa Xe Cưới &#8211; HCL: 005">Hoa Xe Cưới &#8211; HCL: 005</option><option  value="Hoa Xe Cưới &#8211; HCL: 004">Hoa Xe Cưới &#8211; HCL: 004</option><option  value="Hoa Xe Cưới &#8211; HCL: 003">Hoa Xe Cưới &#8211; HCL: 003</option><option  value="Hoa Xe Cưới &#8211; HCL: 002">Hoa Xe Cưới &#8211; HCL: 002</option><option  value="Hoa Xe Cưới &#8211; HCL: 001">Hoa Xe Cưới &#8211; HCL: 001</option><option  value="mẫu hoa cưới lan hồ điệp">mẫu hoa cưới lan hồ điệp</option><option  value="Xe Cưới Mercedes C200">Xe Cưới Mercedes C200</option><option  value="Mercedes C250 Trắng">Mercedes C250 Trắng</option><option  value="Mercedes C300 Trắng">Mercedes C300 Trắng</option><option  value="Mercedes E250 Trắng">Mercedes E250 Trắng</option><option  value="Mercedes E300 Trắng">Mercedes E300 Trắng</option><option  value="Mercedes E400 Trắng">Mercedes E400 Trắng</option><option  value="Mercedes S400 Trắng">Mercedes S400 Trắng</option><option  value="Mercedes S500 Trắng">Mercedes S500 Trắng</option><option  value="Mercedes S450">Mercedes S450</option><option  value="Lexus is250c Mui Trần">Lexus is250c Mui Trần</option><option  value="Audi A5 Mui Trần">Audi A5 Mui Trần</option><option  value="Audi RS5 Mui Trần">Audi RS5 Mui Trần</option><option  value="BMW 320i Mui Trần">BMW 320i Mui Trần</option><option  value="BMW 420i Mui Trần">BMW 420i Mui Trần</option><option  value="BMW M6 Mui Trần">BMW M6 Mui Trần</option><option  value="Bentley Flying Spur">Bentley Flying Spur</option><option  value="Porscher Panamera 4S">Porscher Panamera 4S</option><option  value="Xe Cưới BMW i8">Xe Cưới BMW i8</option><option  value="Xe Cưới Audi A4">Xe Cưới Audi A4</option><option  value="Xe Cưới Audi A5">Xe Cưới Audi A5</option><option  value="Xe Cưới Audi A6">Xe Cưới Audi A6</option><option  value="BMW 320i">BMW 320i</option><option  value="Xe Cưới BMW 520i">Xe Cưới BMW 520i</option><option  value="Xe Cưới BMW 750li">Xe Cưới BMW 750li</option><option  value="Xe Cưới Mercedes C300">Xe Cưới Mercedes C300</option><option  value="Mercedes E250 Màu Đen">Mercedes E250 Màu Đen</option><option  value="Mercedes E300 đen">Mercedes E300 đen</option><option  value="Mercedes S400 Đen">Mercedes S400 Đen</option><option  value="Mercedes S500 Màu Đen">Mercedes S500 Màu Đen</option><option  value="Maybach S600">Maybach S600</option><option  value="Xe Cưới Camry">Xe Cưới Camry</option><option  value="Xe Cưới Mazda 6">Xe Cưới Mazda 6</option><option  value="Mazda 3">Mazda 3</option><option  value="Xe Cưới Cổ Con Bọ">Xe Cưới Cổ Con Bọ</option><option  value="New Beetle">New Beetle</option><option  value="Xe Cưới Cổ Mui Trần">Xe Cưới Cổ Mui Trần</option><option  value="Xe Cưới Jaguar XJL">Xe Cưới Jaguar XJL</option><option  value="Xe Limousine 3 khoang">Xe Limousine 3 khoang</option><option  value="Xe Cưới 3 Khoang">Xe Cưới 3 Khoang</option><option  value="Rolls Royce Ghost">Rolls Royce Ghost</option><option  value="Xe Cưới Phantom">Xe Cưới Phantom</option><option  value="Phantom Drophead">Phantom Drophead</option><option  value="Siêu Xe Ferrari trắng">Siêu Xe Ferrari trắng</option><option  value="Xe Lamboghini Aventador">Xe Lamboghini Aventador</option><option  value="Siêu Xe Astonmartin Rapide">Siêu Xe Astonmartin Rapide</option><option  value="Xe Dcar Limousine">Xe Dcar Limousine</option><option  value="Xe Cưới Hỏi 16 Chỗ">Xe Cưới Hỏi 16 Chỗ</option><option  value="Xe Cưới Hỏi 29 Chỗ">Xe Cưới Hỏi 29 Chỗ</option><option  value="Lexus is250c Mui Trần Đỏ">Lexus is250c Mui Trần Đỏ</option>'
            // );
            var typecars = @json($typecars);

            var optionsdv = '<option value="">Chọn dịch vụ</option>';
            typecars.forEach(function(type) {
                optionsdv += '<option value="' + type.id + '">' + type.name + '</option>';
            });
            $("#mona-dv-xe-select").html(optionsdv);
            // $("#mona-dv-xe-select").html(
            //     '<option value="Chọn xe">Dịch vụ</option><option  value="XE CƯỚI ĐẸP">XE CƯỚI ĐẸP</option><option  value="XE HẠNG SANG">XE HẠNG SANG</option><option  value="XE MUI TRẦN">XE MUI TRẦN</option><option  value="XE SIÊU SANG">XE SIÊU SANG</option><option  value="HOA XE CƯỚI">HOA XE CƯỚI</option>'
            // );
        });
</script>
@endpush
