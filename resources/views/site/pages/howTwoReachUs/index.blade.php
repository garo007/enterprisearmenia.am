{{--Category.html template--}}
@extends('layouts.site')

@section('styles')


@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
    @include('site.includes.info-box')


    <div class="general-container">
        <div class="norut-anun post-anun-no-image">{{ Lang::get('howTwoReachUs.title') }}</div>

    </div>

    <div class="post silka">
        <div class="post silka">
            {!! settings()->group(App::getLocale())->get('address') !!}
        </div>
    </div>
    <br><br>

    <div class="post silka">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6097.029738604778!2d44.50897312532324!3d40.17535387329825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abcf78bb69d1b%3A0x58b1b517be40c544!2zNSBNaGVyIE1rcnRjaHlhbiBTdCwgWWVyZXZhbiAwMDEwLCDQkNGA0LzQtdC90LjRjw!5e0!3m2!1sru!2s!4v1622115064958!5m2!1sru!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>            </div>
        </div>
    </div>

    <div class="share">
        <div class="addthis_inline_share_toolbox_cs1s"></div>
    </div>
@endsection


@section('footer')
    @include('site.includes.footer')

@endsection
@section('scripts')

@endsection
