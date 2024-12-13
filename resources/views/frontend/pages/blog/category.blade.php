@extends('frontend.layouts.master')

@section('content')
    <main class="tintuc">

        <div class="page-position"
            style="background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/childpage-bg-1-1900x240.jpg)">
            <div class="title">
                <h2 class="hd">Tin tức</h2>
                <div class="pos-nav">
                    <a href="/">Trang chủ</a>
                    -
                    <a href="" class="current">{{ $category->name }}</a>
                </div>
            </div>
        </div>

        <div class="news-page">
            <div class="all">
                <div class="row100">

                    <div class="col25 left">
                        <div class="side-left">
                            <div class="sec-title2">
                                <h2 class="hd">Danh mục <br>tin tức</h2>
                            </div>
                            <ul class="sidebar-nav">
                                @if ($categoriesPost->isNotEmpty())
                                    @foreach ($categoriesPost as $category)
                                        <li
                                            class="nav__item {{ isActiveRouteWithParams([['name' => 'frontend.category.blog', 'params' => ['slug' => $category->slug]]], 'active') }}">
                                            <a href="{{ route('frontend.category.blog', $category->slug) }}">{{ $category->name }}<i
                                                    class="fa fa-chevron-right"></i></a>
                                        </li>
                                    @endforeach
                                @endif


                            </ul>
                        </div>
                    </div>

                    <div class="col75 right">
                        <div class="side-right">
                            <div id="nav-ct1">
                                <ul class="list-news clear">
                                    @if ($category->posts->isNotEmpty())
                                        @foreach ($category->posts as $post)
                                            <li class="news__item">
                                                <div class="news-block1">
                                                    <div class="img"><a href="{{ route('frontend.blog', $post->slug) }}">
                                                            <img width="800" height="723"
                                                                src="{{ showImage($post->image) }}"
                                                                class="attachment-full size-full wp-post-image"
                                                                alt="" /> </a></div>
                                                    <div class="ct">
                                                        <p class="hd"><a
                                                                href="{{ route('frontend.blog', $post->slug) }}">{{ $post->title }}</a>
                                                        </p>
                                                        <p class="date">
                                                            Đăng ngày
                                                            {{ \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}
                                                        </p>
                                                        <div class="mona-except">
                                                            <p> {!! Str::words($post->description, 20, '[...]') !!}
                                                            </p>
                                                        </div>

                                                        <a href="{{ route('frontend.blog', $post->slug) }}"
                                                            class="mn-btn btn-right"><i
                                                                class="fa fa-long-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <p>Chưa có tin tức nào</p>
                                    @endif


                                </ul>
                                <div class="more-button">
                                </div>
                            </div>
                            <div id="nav-ct2"></div>
                            <div id="nav-ct3"></div>
                        </div>
                    </div>

                    <div class="col25 left">
                        <div class="sideleft-bot">

                            <div class="callus-block">
                                <div class="detail">
                                    <div class="img"><img
                                            src="https://xecuoiluxury.com/template/images/child-page/callus-icon.png"
                                            alt=""></div>
                                    <p>Gọi cho chúng tôi:</p>
                                    <p class="hl"></p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>
@endsection
