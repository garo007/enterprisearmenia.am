{{--Category.html template--}}
@extends('layouts.site')
@section('styles')
    <meta name="viewport" content="width=device-width, initial-scale=0.7">
    <link rel="stylesheet" href="{{asset('asset/Region/style.css')}}" />

    <script>

        var regions=@json($regionJsons);

            console.log(regions)
        window.addEventListener("load",()=>{
            marz[6].style.color = "#fff";
            let val = marzer[4];
            map_part.innerHTML="";
            createImg({
                src:source_active+val.img_active,
                className:val.class_name+" translate",
            });

            info(4);
        });
    </script>
    <script defer src="{{asset('asset/Region/qartez-script.js')}}"></script>

    <script>
var reg_id={{$id-1}}
        window.addEventListener("load",()=>{
            marz[reg_id].style.color = "#fff";
            let val = marzer[reg_id];
            map_part.innerHTML="";
            createImg({
                src:source_active+val.img_active,
                className:val.class_name+" translate",
            });

            info(reg_id);
        });
    </script>
@endsection

@section('header')

    @include('site.includes.header')
@endsection

@section('content')

<div class="map-body">
    <div class="qartez" id="qartez">
        <div class="region_name_title color" id="region_name"></div>
        <img src="{{asset('asset/Region/png-marzer-active/qartez-yndhanur.jpg')}}" />
        <div id="map_part"></div>
    </div>
    <div class="map-info">
        <ul class="first-info">
            <li class="li-mek">
                <img src="{{asset('asset/Region/qartez-iconner/1.png')}}" alt="location" />
                <ul>
                    <li>@lang('lang.Territory')</li>

                    <li id="territorya"></li>
                    <li>@lang('lang.Agriculturalland')</li>
                    <li id="agricultural"></li>
                </ul>
            </li>
            <li class="li-erku">
                <img src="{{asset('asset/Region/qartez-iconner/2.png')}}" alt="population" />
                <ul>
                    <li>@lang('lang.Totalpopulation')</li>
                    <li id="population"></li>
                    <li>@lang('lang.Urban')</li>
                    <li id="urban"></li>
                    <li>@lang('lang.Rural')</li>
                    <li id="rural"></li>
                </ul>
            </li>
            <li class="li-ireq">
                <img src="{{asset('asset/Region/qartez-iconner/3.png')}}" alt="salary" />
                <ul>
                    <li>@lang('lang.TotalWorkforce')</li>
                    <li id="workspace"></li>
                    <li>@lang('lang.Employed')</li>
                    <li id="employed"></li>
                    <li>@lang('lang.AverageSalary')</li>
                    <li id="salary"></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="third-info">
        <div class="sub-info">
            <div class="second-info">
                <div>
                    <ul>
                        <li class="icon"><img src="{{asset('asset/Region/qartez-iconner/4.png')}}" alt="" /></li>
                        <li class="text" id="weather"></li>
                    </ul>
               </div >
                <div>
                    <ul>
                        <li class="icon"><img src="{{asset('asset/Region/qartez-iconner/5.png')}}" alt="" /></li>
                        <li class="text">
                            <div class="ucase_bold color" id="region_centre"></div>
                            <div id="region_centre_info">
                                <span class="ucase_bold color"></span>
                                <span class="ucase"></span>
                                <span class="ucase_bold color"></span>
                                <span class="ucase"></span>
                                <span class="ucase_bold color"></span>
                                <span class="ucase"></span>
                            </div>
                            <div>
                                <span class="ucase_bold color">@lang('lang.largestcities') </span>-<span id="region_center_other"></span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li class="icon"><img src="{{asset('asset/Region/qartez-iconner/6.png')}}" alt="" /></li>
                        <li class="text">
                            <div class="ucase_bold margin color">@lang('lang.averageprices')</div>
                            <div>
                                <span class="ucase_bold color">@lang('lang.apartment')</span>-
                                <span id="average_prices"></span>
                            </div>
                            <div>
                                <span class="ucase_bold color">@lang('lang.land')</span>-
                                <span id="average_other"></span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="loc">
                    <img src="{{asset('asset/Region/qartez-iconner/7.png')}}" alt="two-location" />
                </div>
                <div class="end">
                    <div class="ucase_bold right color" id="distinations">@lang('lang.Distance_you_main_distinations'):</div>
                    <div class="general_border">
                        <div class="ucase_bold">
                            <span class="ucase_bold size">@lang('lang.Erevan')</span>
                            <span class="ucase_bold color" id="erevan"></span>
                        </div>
                        <div class="ucase_bold">
                            <span class="ucase_bold size">{{__('lang.border_width_georgia')}}</span>
                            <span class="ucase_bold color" id="georgia"></span>
                        </div>
                        <div class="ucase_bold">
                            <span class="ucase_bold size">@lang('lang.border_width_Iran')</span>
                            <span class="ucase_bold color color" id="iran"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="success">
                <div class="ucase_bold color bg-size">@lang('lang.success_caces')</div>
                <p id="success"></p>
            </div>
        </div>
        <div>
            <div class="spec">
                <div class="spec-title">
                    <div class="spec-left"></div>
                    <div class="ucase_bold color spec-right size-16">@lang('lang.specialization_of_the_region')</div>
                </div>
                <div>
                    <div class="spec-left"></div>
                    <p class="spec-right sm-size hash" id="specialization"></p>
                </div>
                <div class="cucanish">
                    <div class="spec-left">@lang('lang.Agriculture')</div>
                    <div class="spec-right">
                        <span id="agriculture"></span>
                        <span class="abs" id="val_agr"></span>
                    </div>
                    <div class="spec-left"></div>
                    <div class="spec-right info">
                        <span id="agriculture_comment"></span>
                    </div>
                </div>
                <div class="cucanish" id="retail_trade_id">
                    <div class="spec-left">@lang('lang.Retail_trade')</div>
                    <div class="spec-right">
                        <span id="retail"></span>
                        <span class="abs" id="val_retail"></span>
                    </div>
                    <div class="spec-left"></div>
                    <div class="spec-right info">
                        <span id="retail_comment"></span>
                    </div>
                </div>
                <div class="cucanish" id="construction_id">
                    <div class="spec-left">@lang('lang.Construction')</div>
                    <div class="spec-right">
                        <span id="construction"></span>
                        <span class="abs" id="val_construction"></span>
                    </div>
                    <div class="spec-left"></div>
                    <div class="spec-right info">
                        <span id="construction_comment"></span>
                    </div>
                </div>
                <div class="cucanish" id="industry_id">
                    <div class="spec-left">@lang('lang.Industry')</div>
                    <div class="spec-right">
                        <span id="industry"></span>
                        <span class="abs"></span>
                    </div>
                    <div class="spec-left"></div>
                    <div class="spec-right info">
                        <span id="industry_comment"></span>
                    </div>
                </div>
            </div>

            <div class="sectors">
                <div class="ucase_bold color size-20">@lang('lang.investment_potential')</div>
                <div>
                    <div class="pad_potential">
                        <div id="tourism"></div>
                    </div>
                    <div class="pad_potential">
                        <div id="cropproduction"></div>
                    </div>
                </div>
                <div>
                    <div class="pad_potential">
                        <div id="portable_energy"></div>
                    </div>
                    <div class="pad_potential">
                        <div id="food_processing"></div>
                    </div>
                </div>
                <div>
                    <div class="pad_potential">
                        <div id="beverage_production"></div>
                    </div>
                    <div class="pad_potential">
                        <div id="textile"></div>
                    </div>
                </div>
                <div>
                    <div class="pad_potential">
                        <div id="field_1"></div>
                    </div>
                    <div class="pad_potential">
                        <div id="field_2"></div>
                    </div>
                </div>
                <div>
                    <div class="pad_potential">
                        <div id="field_3"></div>
                    </div>
                    <div class="pad_potential">
                        <div id="field_4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="share">
        <div class="addthis_inline_share_toolbox_cs1s"></div>
    </div>

@endsection

@section('scripts')

@endsection

@section('footer')
    @include('site.includes.footer')
@endsection
