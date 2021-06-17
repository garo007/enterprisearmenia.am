{{--Category.html template--}}
@extends('layouts.site')
<link rel="stylesheet" href="{{ $assetPath }}/css/jquery.fancybox.min.css" />

@section('styles')


@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
    @include('site.includes.info-box')

    <div class="general-container">
        <div class="norut-anun">{{ __('galleries.images.title') }}</div>
        @if(settings()->group('Galeries_Page_Image')->has('page_img'))

            <img src="{{ showImage(settings()->group('Galeries_Page_Image')->get('page_img')) }}" alt="news" />
        @endif
    </div>

    <h1 class="gallery_anun">{{ $post->name }}</h1>

    <div class="about-us-content inter">

        @foreach($post->images()->get() as $img)
            <div>
                <div class="about-nkar">
                    @if(isset($img->name))
                        <a href="{{ showImage($img->name) }}" data-fancybox="gallery">
                            <img src="{{ showImage($img->name) }}" />
                        </a>
                    @endif
                </div>
                {{-- <div class="about-info">
                    <p class="about-fio">{{ $post->name }}</p>
                </div> --}}
            </div>
        @endforeach
    </div>


@endsection


@section('footer')
    @include('site.includes.footer')

@endsection
@section('scripts')

    <script src="{{ $assetPath }}/js-plugins/jquery.fancybox.min.js"></script>
@endsection
