<div class="ft-top">
    <div class="all">
        <ul id="menu-main-1" class="mona-main-menu ft-nav">
            <li
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item menu-item-131">
                <a href="/">Trang chủ</a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2224">
                <a href="{{ route('frontend.introduce') }}">Giới thiệu</a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1940">
                <a href="{{ route('frontend.service') }}">Dịch vụ</a>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1943">
                <a href="{{ route('frontend.service', 'xe-sieu-sang') }}">Xe Siêu Sang</a>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2445">
                <a href="{{ route('frontend.service', 'xe-mui-tran') }}">Xe Mui Trần</a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2426">
                <a href="{{ route('frontend.contact') }}">Liên Hệ</a>
            </li>
        </ul>
        <ul class="ft-media clear">
            <li>
                <a href="{{ $configWebsite->fanpage }}" target="_blank" class="square-30fa"><i
                        class="fa-brands fa-facebook-f"></i></a>
            </li>
            <li>
                <a href="#" target="_blank" class="square-30fa"><i class="fa-brands fa-google"></i></a>
            </li>
            <li>
                <a href="#" target="_blank" class="square-30fa"><i class="fa-brands fa-instagram"></i></a>
            </li>
            <li>
                <a href="#" target="_blank" class="square-30fa"><i class="fa-brands fa-linkedin"></i></a>
            </li>
        </ul>
    </div>
</div>
<div class="ft-sys">
    <div class="all center-txt">
        {{ $configWebsite->copyright }}
    </div>
</div>

<div class="fixed-buttons">
    <a href="tel:{{ $configWebsite->booking_procedure }}" class="button button-blue">
        <i>📞</i> {{ $configWebsite->advisory }}
    </a>
    <a href="tel:{{ $configWebsite->booking_procedure }}" class="button button-green">
        <i>📞</i> {{ $configWebsite->booking_procedure }}
    </a>
</div>
