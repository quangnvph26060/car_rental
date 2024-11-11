@extends('frontend.layouts.master')


@section('content')
    <main class="datxe">
        <div class="page-position"
            style="
                background-image: url(https://xecuoiluxury.com/template//images/child-page/childpage-bg-1.jpg);
            ">
            <div class="title">
                <h2 class="hd">Dịch vụ</h2>
                <div class="pos-nav">
                    <a href="https://xecuoiluxury.com">Trang chủ</a>
                    -
                    <span class="current">Dịch vụ</span>
                </div>
            </div>
        </div>

        <div class="service-page">
            <div class="all">
                <div class="row100">
                    <div class="col25 left">

                        @include('frontend.includes.sideleft')

                    </div>

                    <div class="col75 right">


                        @if (!$slug)
                            @include('frontend.includes.service.noSlug')
                        @else
                            @include('frontend.includes.service.yesSlug')
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
