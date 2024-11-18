<div class="side-left">
    <div class="sec-title2">
        <h2 class="hd">Dịch vụ</h2>
    </div>
    <div id="nav_menu-3" class="widget widget_nav_menu">
        <div class="menu-product-container">
            @if ($types->isNotEmpty())
                <ul id="menu-product" class="menu">
                    @foreach ($types as $type)
                        <li id="menu-item-1082" {{-- current-menu-ancestor current-menu-parent --}}
                            class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor menu-item-has-children has-dropdown menu-item-1082">
                            <a href="">{{ strtoupper($type->name) }}<i class="fa fa-angle-right"></i></a>
                            @if ($type->brands->count() > 0)
                                <ul class="sub-menu">
                                    @foreach ($type->brands as $brand)
                                        <li id="menu-item-1086"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1086">
                                            <a
                                                href="http://xecuoiluxury.com/hang-xe/thue-xe-cuoi-mercedes/">{{ $brand->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                        </li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>
</div>
