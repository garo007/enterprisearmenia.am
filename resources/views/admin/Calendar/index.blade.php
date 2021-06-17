@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{asset('admin_1/calendar/calendar-style.css')}}">
@endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('content')

    @include('admin.includes.info-box')

    <div class="main-container all">
        <div class="container cont">
            <div class="calendar oracuyc"></div>
        </div>


        <div class="event admin-event" id="dateOfFind" style="{{$eventstoday==null?'opacity: 0;':' '}} ">
            @if($eventstoday)
            <p class="event_title" style="">{{json_decode($eventstoday)->name->hy ?? ' '}}</p>

            <p class="event_text">{{json_decode($eventstoday)->desc->hy ?? ' '}}</p>
            @if($eventstoday->event_started_date)
                <p class="event_text">{{\Carbon\Carbon::parse($eventstoday->event_started_date)->format('H:i') ?? ' '}}</p>
            @endif

            @if($eventstoday->img)
                <img style="max-width: 318px; object-fit: contain;" src="{{ showImage($eventstoday->img) }}" alt="">

            @endif

            @endif
        </div>



    </div>


@endsection

@section('scripts')

    @isset($event_started_date)
        <script>
            var today = @json($event_started_date);
            if(today != "undefined"){
                not_nul("am",1);
                non("or",2);
            }
        </script>
    @endisset
    <script>
        var week=["@lang('lang.Sunday')","@lang('lang.Monday')","@lang('lang.Tuesday')","@lang('lang.Wednesday')","@lang('lang.Thursday')","@lang('lang.Friday')","@lang('lang.Saturday')"];
        var Lossiguienteseventos="@lang('lang.Lossiguienteseventos')";

        var mnts =[
            "@lang('lang.January')",
            "@lang('lang.Febuary')",
            "@lang('lang.March')",
            "@lang('lang.April')",
            "@lang('lang.May')",
            "@lang('lang.June')",
            "@lang('lang.July')",
            "@lang('lang.August')",
            "@lang('lang.September')",
            "@lang('lang.October')",
            "@lang('lang.November')",
            "@lang('lang.December')",
        ];
        var mnts2 =[
            "@lang('lang.math_01')",
            "@lang('lang.math_02')",
            "@lang('lang.math_03')",
            "@lang('lang.math_04')",
            "@lang('lang.math_05')",
            "@lang('lang.math_06')",
            "@lang('lang.math_07')",
            "@lang('lang.math_08')",
            "@lang('lang.math_09')",
            "@lang('lang.math_10')",
            "@lang('lang.math_11')",
            "@lang('lang.math_12')",
        ]

    </script>



    <script>
        let post_json =@json($post);
        let eventsa =@json($events);

        // console.log(post_json);
    </script>
    <script defer src="{{asset('admin_1/calendar/calendar.js')}}"></script>
    <script defer src="{{asset('admin_1/calendar/funkcional.js')}}"></script>
    <script>
        function ff(item) {
            this_day(item)
            if (item.hasAttribute("name")) {
                for (d of post_json) {
                    if (d.id == item.getAttribute("name")) {
                        console.log(d.id);
                        $.ajax({
                            type: 'get',
                            url: '{{url('admin123/calendar/find/')}}/' + d.id,
                            headers: {'XSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                            data: {
                                id: d.id
                            },

                            success: function (res) {
                                $('#dateOfFind').html(res)
                                $('#dateOfFind').css({'filter': 'alpha(opacity=60)', 'zoom': '1', 'opacity': '1'})
                            }

                        });
                        // Eventi id-Ina ajaxi hamar
                    }
                }
            }
        }
    </script>

@endsection
