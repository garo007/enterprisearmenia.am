{{--Category.html template--}}
@extends('layouts.site')
@section('styles')
    <style>
        .menu_map{
            margin-left: 130px;
        }
        .item1>li>a {
            color: #922B35;
            font-weight: bold;
        }
        .item1 ul>li>a {
            text-decoration: underline;
            text-decoration-color: #922B35;
            line-height: 28px;
            letter-spacing: 1px;
        }
    </style>
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
    @include('site.includes.info-box')

    <br>
    <br>

    <div class="menu_map">
        <div class="item1">
            @foreach($menu_tree as $item)
                @include('site.includes.menu_header_navigation', ['item' => $item, 'dropdownMenuLink_id' => 0, 'firstParentElement' => true])
            @endforeach
        </div>
        <div class="item1">
            <li><a href="">{{__('home.our_mission')}}</a></li>
                <ul>
                    @foreach($our_mission as $item)
                        <li><a href="{{ $item->path }}">{{ $item->title }}</a></li>
                    @endforeach
                </ul>
        </div>
        <div class="item1">
            <ul>
                @foreach($footer as $item)
                    <li><a href="{{ $item->path }}">{{ $item->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    </div>
@endsection


@section('footer')
    @include('site.includes.footer')

@endsection
@section('scripts')

@endsection
