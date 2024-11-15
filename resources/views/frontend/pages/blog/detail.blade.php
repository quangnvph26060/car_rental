@extends('frontend.layouts.master')

@section('content')
    <main class="tintuc-detail">
        <div class="page-position"
            style="
        background-image: url(https://xecuoiluxury.com/wp-content/uploads/2018/07/childpage-bg-1.jpg);
      ">
            <div class="title">
                <h2 class="hd">{{ $post->title }}</h2>
                <div class="pos-nav">
                    <a href="{{ asset('frontend') }}">Trang chủ</a>
                    -
                    <span class="current">{{ $post->title }}</span>
                </div>
            </div>
        </div>

        <div class="newsdetail-page">
            <div class="all">
                <div class="row100">
                    <div class="col75 left">
                        <div class="content-entry">
                            <div class="mn-content">
                                <div class="img">
                                    <img width="800" height="723"
                                    src="{{ asset('storage/'.$post->image) }}"
                                        class="attachment-full size-full wp-post-image" alt=""
                                        srcset="
                                        {{ asset('storage/'.$post->image) }}         800w,
                                        {{ asset('storage/'.$post->image) }}    300w,
                                        {{ asset('storage/'.$post->image) }}    768w
                    "
                                        sizes="(max-width: 800px) 100vw, 800px" />
                                </div>
                                <h2 class="hd" style="margin-top: 20px">
                                    {{ $post->title }}
                                </h2>
                                <p class="meta">Đăng ngày {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d \\T\\há\\n\\g F, Y') }}</p>
                                <div class="mona-content">
                                    {!! $post->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
