@extends('frontend.layouts.master')

@section('content')
    @if (!$slug)
        @include('frontend.includes.product.list')
    @else
        @include('frontend.includes.product.detail')
    @endif
@endsection
