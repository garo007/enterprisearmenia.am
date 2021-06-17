{{--Category.html template--}}
@extends('layouts.site')

@section('styles')
    <link rel="stylesheet" href="{{asset('asset/site/css/owl.theme.default.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/site/css/owl.carousel.min.css')}}" />


@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
    @include('site.includes.info-box')

    <!--  -->
    <!--    Slider-->
    <!--    -->

    @if(isset($sliders) && $sliders->count() > 0)
        <div class="slider-carousel owl-carousel parallax" data-rellax-speed="-6">
            @foreach($sliders as $item)
                    <div>
                        <div class="slide-text">
                            @if($item->hasTranslation('desc', app()->getLocale()) )
                                <p>{{ $item->name }}</p>
                                <p>{{ $item->desc }}</p>
                            @endif
                            @if(isset($item->link))
                                <a target="_blank" href="{{ $item->link }}" class="btn">{{ $item->link_name }}</a>
                            @endif
                        </div>
                        @if(isset($item->img))
                            <img src="{{ showImage($item->img) }}" alt="" />
                        @endif
                    </div>
            @endforeach
        </div>
    @endif

    <!-- -->
    <!--Our mission-->
    <!-- -->

    <div class="our-mission">
        <img src='{{asset('asset/site/css/icons-images/mission-fon.svg')}}' alt="" />
        <div class="mission-info">
            <div>
                <h2>{{__('home.our_mission')}}</h2>
                <p>{{ settings()->group(App::getLocale())->get('ourMissionsPage_description') }}</p>
            </div>
        </div>
        <div>
            <div class="mission-containers">
                @foreach($ourMissions as $item)
                    <div>
                        <a href="{{ $item->path }}">
                            <img src="{{ showImage($item->img) }}" alt="{{ $item->title }}" />
                        </a>

                        <p><a href="{{ $item->path }}">{{ $item->title }}</a></p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!--    -->
    <!--News-->
    <!-- -->

    <div class="tweets-block">
        <div class="tweets">
            <div class="left-content">
                <div class="head-info">
                    <h2>{{ __('home.latest_news') }}</h2>
                    <div class="by">

                        <span class='name'>{{ __('home.tweets') }}</span>
                        <span>by @EnterpriseAM</span>

                        {{-- <span class="info-icon">
                              by @EnterpriseAM
                            <img src="{{asset('asset/site/css/icons-images/info.svg')}}" alt="info" />
                        </span> --}}
                    </div>
                </div>
                <div class="info-content-left">
                    @forelse ($tweets as $item)
                        {!!$item->embed!!}
                    @empty
                    @endforelse
                    {{-- <blockquote class="twitter-tweet"><p lang="en" dir="ltr">US House votes to punish Marjorie Taylor

                        Greene, the Republican congresswoman who pushed QAnon conspiracy theory <a

                        href="https://t.co/uh3QLKPHqJ">https://t.co/uh3QLKPHqJ</a></p>&mdash; BBC Breaking News

                        (@BBCBreaking) <a href="https://twitter.com/BBCBreaking/status/1357477570799955971?ref_src=twsrc

                        %5Etfw">February 4, 2021</a></blockquote> <script async src="https://platform.twitter.com/widgets.js"

                        charset="utf-8"></script> --}}

                    {{-- <div class='news-item'>
                        <div class='news-logo'>
                            <img src="{{asset('asset/site/css/icons-images/sm-logo.png')}}" alt="" />
                        </div>
                        <div class="news-info">
                            <div>
                                <span class="news-name">Enterprise Armenia</span>
                                <span class="nuyn">by @EnterpriseAM</span>
                                <span class="nuyn nuyn-data">1 dec 2020</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque similique eos reprehenderit tempora rerum vel corporis non odio pariatur minus.</p>
                            <div class='news-img'>
                                <img src="{{asset('asset/site/css/icons-images/wine.png')}}" alt="wine" />
                            </div>
                            <div class="exit">
                                <span>
                                    <i class="far fa-heart"></i>
                                </span>
                                <span>
                                    <i class="fas fa-sign-out-alt"></i>
                                </span>
                            </div>
                        </div>
                        <div class="ellipsis">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                    </div>
                    <div class='news-item'>
                        <div class='news-logo'>
                            <img src="{{asset('asset/site/css/icons-images/sm-logo.png')}}" alt="" />
                        </div>
                        <div class="news-info">
                            <div>
                                <span class="news-name">Enterprise Armenia</span>
                                <span class="nuyn">@EnterpriseAM</span>
                                <span class="nuyn nuyn-data">1 dec 2020</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque similique eos reprehenderit tempora rerum vel corporis non odio pariatur minus.</p>
                            <div class='news-img'>
                                <img src="{{asset('asset/site/css/icons-images/wine.png')}}" alt="wine" />
                            </div>
                            <div class="exit">
                                <span>
                                    <i class="far fa-heart"></i>
                                </span>
                                <span>
                                    <i class="fas fa-sign-out-alt"></i>
                                </span>
                            </div>
                        </div>
                        <div class="ellipsis">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                    </div> --}}

                </div>
                {{-- <div class="tweets-footer">
                    <span class="embed">Embed</span>
                    <span class="view">View in Twitter</span>
                </div> --}}
            </div>

            <div class="right-content">
                <div class="head-info">
                    <h2 style="white-space: nowrap;">{{ __('home.upcoming_events') }}</h2>
                    <div class="by">

                        <span class="name">{{ Lang::get('home.events') }} </span>
                        <span>by @EnterpriseAM</span>

                    </div>
                </div>
                <div class="info-content-right">

                    @foreach($events as $event)
                    <?php $math=\Carbon\Carbon::parse($event->event_started_date)->format('m') ?>

                    <div class="event">
                        <div class="event-img">
                            <div class="data-logo">
                                <img src="{{asset('asset/site/css/icons-images/data-logo.png')}}" alt="data" class="data-image" />
                                <div>{{\Carbon\Carbon::parse($event->event_started_date)->format('d')}}
                                    @lang('lang.math_'.$math)</div>
                            </div>
                            <img src="{{ showImage($event->img_mini) }}" alt="man" class="event-image" />
                        </div>

                        <div class="event-info">
                            <h3>{{        $event->getTranslation('name', App::getLocale()) ?? ' ' }}</h3>
                            <span>{{        $event->getTranslation('desc', App::getLocale()) ?? ' '}}</span>
                            <p class="learn-more" onclick="location.href='{{route('site.calendar.show',$event->id)}}'" style="cursor: pointer;">@lang('lang.Learn more')</p>
                        </div>
                    </div>


                    @endforeach
                    <div>
                        <p class="more-text"><a href="{{ route('site.calendar.index') }}">{{__('home.more_events')}}</a></p>
                    </div>
                </div>
                <div class="tweets-footer">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>


    <!---->
    <!--Discoer-->
    <!---->

    <div class="discover_armenia_block">
        <h2 class="discover_armenia">{{ __('home.discover_armenia') }}</h2>
    </div>
    <div class="slider-discover owl-carousel owl-theme">

        @foreach($discoveryArmenia as $item)
        @if($item->hasTranslation('name', app()->getLocale()) )
            <div class="item">
                <div class="discover">
                    <div class="discover_img">
                        <img src="{{ showImage($item->img) }}" alt="{{ $item->name }}" />
                    </div>
                    <div class="discover_info">
                        <div>

                            <h2>{{ $item->getTranslation('name',App::getLocale()) }}</h2>
                            <p>{{ $item->getTranslation('desc',App::getLocale()) }}</p>

                            @if(isset($item->file))
                                <div>
                                    <!-- <a href="{{ route('site.showPdf',['pdfFileName' => $item->file]) }}" class="button">{{ __('home.read') }}</a> -->
                                    <a href="{{ route('site.showPdf',['pdfFileName' => $item->file]) }}" class="button" target="_blank">
                                        {{ __('home.view_brochure') }}
                                    </a>

                                    {{-- <a href="{{ getFile($item->file) }}" class="button">{{ __('Download') }}</a> --}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>



@endsection


@section('footer')
    @include('site.includes.footer')
@endsection
@section('scripts')
    <script src="{{asset('asset/site/js-plugins/owl.carousel.min.js')}}"></script>
    <script src="{{asset('asset/site/js-plugins/rellax.min.js')}}"></script>
@endsection
