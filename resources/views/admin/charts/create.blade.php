@extends('layouts.admin')

@section('styles')
    <style>
        canvas{
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
        .colorp>img{
            display: none;
        }
    </style>
@endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('content')
    @include('admin.includes.info-box')

    <main>

        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="filter"></i></div>
                                {{-- {{ $title }}--}}
                                Նոր գրաֆիկ
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main page content-->
        <div class="container mt-n10">
            <div class="card mb-4">
                @can('charts-create')
                    <div class="card-body">
                        <p><a class="btn btn-primary" href="{{ route('admin.charts.index') }}">Վերադառնալ</a></p>
                    </div><!--row-->
                @endcan
                <div class="card-header"></div>
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="col-md-12 mx-auto">
                            <form action="{{route('admin.charts.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label>Ընտրեք լեզուն</label>
                                        <div class="form-group">
                                            <select name="lang" class="form-control">
                                                <option value="hy">Հայերեն</option>
                                                <option value="en">Անգլերեն</option>
                                                <option value="ru">Ռուսերեն</option>
                                            </select>
                                        </div>
                                        <label>Գրաֆիկի վերնագիր</label>
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control" required value="@if(old('name')){{old('name')}}@else  @endif">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Գրաֆիկի տեսակը</label>
                                            <select name="type" class="form-control charttype" value="">
                                                <option value="bar-and-line" @if(old('type')=='bar-and-line') selected @else  @endif>Սանդղակ և Գծային</option>
                                                <option value="sorted-bar-chart" @if(old('type')=='sorted-bar-chart') selected @else  @endif>Հորիզոնական սանդղակ</option>
                                                <option value="column-with-rotated-series" @if(old('type')=='column-with-rotated-series') selected @else  @endif>Սանդղակ</option>
                                                <option value="clustered-column-chart" @if(old('type')=='clustered-column-chart') selected @else  @endif>Սանդղակների խումբ</option>
                                                <option value="stacked-column-chart-100" @if(old('type')=='stacked-column-chart-100') selected @else  @endif>Կուտակված սանդղակ</option>
                                                <option value="simple-pie-chart" @if(old('type')=='simple-pie-chart') selected @else  @endif>Կլոր</option>
                                                <option value="pie-chart-3d" @if(old('type')=='pie-chart-3d') selected @else  @endif>Կլոր 3d</option>
                                                <option value="pie-chart-with-legend" @if(old('type')=='pie-chart-with-legend') selected @else  @endif>Դոնաթային</option>
                                                <option value="live-radar" @if(old('type')=='live-radar') selected @else  @endif>Ռադարներ</option>
                                                <option value="scatter-chart" @if(old('type')=='scatter-chart') selected @else  @endif>Ցրման գծապատկեր</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 typ" >
                                        <!--<div class="form-group">
                                            <label>X արժեք</label>
                                            <p class="float-right text-info">(կարող եք օգտագործել և թվեր և բառեր)</p>
                                            <textarea class="form-control" name="data" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Y արժեք</label>
                                            <label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>
                                            <textarea class="form-control" name="value" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Գիծ</label>
                                            <label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>
                                            <textarea class="form-control" name="expenses" required></textarea>
                                        </div>-->
                                    </div>
                                    <div class="col-md-6 col-sm-12 aft" >
                                        <!--    <div class="form-group">
                                                <label>Y-ի անվանում</label>
                                                <input class="form-control" name="series" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Գիծ անվանում</label>
                                                <input class="form-control" name="line" required>
                                            </div>-->
                                    </div>
                                </div>
                                <button class="btn btn-primary">Ստեղծել</button>
                            </form>
                        </div>
                    </div>
                </div>
                {{--Search end--}}
            </div>
        </div>
    </main>


@endsection

@section('scripts')
    <script>
        /*if($('.charttype').val()=='bar-and-line'){
            $('.typ').html(
                '<div class="form-group">\n'+
                '<label>X արժեք</label>\n'+
                '<label class="float-right text-info">(կարող եք օգտագործել և թվեր և բառեր)</label>\n'+
                '<textarea class="form-control" name="data" required></textarea>'+
                '</div>'+
                '<div class="form-group">'+
                '<label>Y արժեք</label>\n'+
                '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                '<textarea class="form-control" name="value" required></textarea>'+
                '</div>'+
                '<div class="form-group">'+
                '<label>Գիծ</label>\n'+
                '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                '<textarea class="form-control" name="expenses" required></textarea>'+
                '</div>'
            )
            $('.aft').html(
                '<div class="form-group">'+
                '<label>Y-ի անվանում</label>\n'+
                '<input class="form-control" name="series" required>'+
                '</div>'+
                '<div class="form-group">'+
                '<label>Գիծ անվանում</label>\n'+
                '<input class="form-control" name="line" required>'+
                '</div>'
            )
        }*/
        $('.charttype').change(function (){
            $('.aft').html('')
            let type1 = $('.charttype').val();
            if(type1=='sorted-bar-chart' || type1=='column-with-rotated-series' || type1=='simple-pie-chart' ||  type1=='pie-chart-3d' || type1=='pie-chart-with-legend' || type1=='live-radar'){
                $('.typ').html(
                    '<div class="form-group">\n' +
                    '<label>X Արժեք</label>\n'+
                    '<label class="float-right text-info">(կարող եք օգտագործել և թվեր և բառեր)</label>\n'+
                    '  <textarea class="form-control xarj" name="data" required></textarea>\n' +
                    '</div>\n' +
                    '<div class="form-group">\n' +
                    '<label>Y Արժեք</label>\n'+
                    '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                    '  <textarea class="form-control" name="value" required></textarea>\n' +
                    '</div>'
                )
                /*$('.aft').html(
                    '<div class="cc row"></div>\n'
                )
                $('.xarj').change(function(){

                    $('.cc').html('')
                    let xarjval = $('.xarj').val().trim()
                    console.log(xarjval)
                    let res = xarjval.split(" ");
                    let mek =0;

                    for(let i=0;i<res.length;i++){
                        mek++;
                        $('.cc').append(
                            '<div class="form-group">\n' +
                            '<labele>&nbsp&nbsp'+res[i]+'&nbsp&nbsp</labele>'+
                            '<div class="col-md-3">\n' +
                            ' <input type="color" name="color[]" required>\n' +
                            '</div>\n'+
                            '</div>\n'
                        )
                    }
                })*/

            }
            else if($('.charttype').val()=='bar-and-line'){
                $('.typ').html(
                    '<div class="form-group">\n'+
                    '<label>X արժեք</label>\n'+
                    '<label class="float-right text-info">(կարող եք օգտագործել և թվեր և բառեր)</label>\n'+
                    '<textarea class="form-control" name="data" required></textarea>'+
                    '</label>'+
                    '<div class="form-group">'+
                    '<label>Y արժեք</label>\n'+
                    '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                    '<textarea class="form-control" name="value" required></textarea>'+
                    '</div>'+
                    '<div class="form-group">'+
                    '<label>Գիծ</label>\n'+
                    '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                    '<textarea class="form-control" name="expenses" required></textarea>'+
                    '</div>'
                )
                $('.aft').html(
                    '<div class="form-group">'+
                    '<label>Y-ի անվանում</label>\n'+
                    '<input class="form-control" name="series" required>'+
                    '</div>'+
                    '<div class="form-group">'+
                    '<label>Գիծ անվանում</label>\n'+
                    '<input class="form-control" name="line" required>'+
                    '</div>'
                )
            }
            else if(type1=='scatter-chart'){
                $('.aft').html('')
                $('.typ').html(
                    '<div class="form-group">\n' +
                    '<label>AX Արժեք</label>\n'+
                    '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                    '  <textarea class="form-control" name="data" required></textarea>\n' +
                    '</div>\n' +
                    '<div class="form-group">\n' +
                    '<label>AY Արժեք</label>\n'+
                    '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                    '  <textarea class="form-control" name="value1" required></textarea>\n' +
                    '</div>\n' +
                    '<div class="form-group">\n' +
                    '<label>BX Արժեք</label>\n'+
                    '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                    '  <textarea class="form-control" name="value2" required></textarea>\n' +
                    '</div>\n'+
                    '<div class="form-group">\n' +
                    '<label>BY Արժեք</label>\n'+
                    '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                    '  <textarea class="form-control" name="value3" required></textarea>\n' +
                    '</div>'
                )
            }
            else if(type1=='clustered-column-chart' || type1=='stacked-column-chart-100'){
                $('.typ').html(

                    '<div class="form-group">\n' +
                    '<label>X Արժեք</label>\n'+
                    '<label class="float-right text-info">(կարող եք օգտագործել և թվեր և բառեր)</label>\n'+
                    '  <textarea class="form-control ccc" name="data" required></textarea>\n' +
                    '</div>\n'+
                    '<div class="cc"></div>\n'

                )
                $('.ccc').change(function(){
                    $('.cc').html('')
                    let ccval = $('.ccc').val().trim()
                    let res = ccval.split("/");
                    let mek =0;
                    for(let i=0;i<res.length;i++){
                        mek++;
                        $('.cc').append(
                            '<div class="form-group">\n' +
                            '<label>'+res[i]+'</label>\n'+
                            '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                            '  <textarea class="form-control" name="value'+mek+'" required></textarea>\n' +
                            '</div>\n'
                        )
                    }
                    $('.aft').html('')
                    $('.aft').html(
                        '<div class="form-group">\n' +
                        '<label>Անվանումներ</label>\n'+
                        '<label class="float-right text-info">(կարող եք օգտագործել և թվեր և բառեր)</label>\n'+
                        '<textarea class="form-control" name="series" required></textarea>\n' +
                        '</div>\n'
                    )
                })
            }
        })
        let type1 = $('.charttype').val();
        if(type1=='sorted-bar-chart' || type1=='column-with-rotated-series' || type1=='simple-pie-chart' ||  type1=='pie-chart-3d' || type1=='pie-chart-with-legend' || type1=='live-radar'){
            $('.typ').html(
                '<div class="form-group">\n' +
                '<label>X Արժեք</label>\n'+
                '<label class="float-right text-info">(կարող եք օգտագործել և թվեր և բառեր)</label>\n'+
                '  <textarea class="form-control" name="data" required>{{old('data')}}</textarea>\n' +
                '</div>\n' +
                '<div class="form-group">\n' +
                '<label>Y Արժեք</label>\n'+
                '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                '  <textarea class="form-control" name="value" required>{{old('value')}}</textarea>\n' +
                '</div>'
            )
            $('.aft').html(
                '<div class="form-group">'+
                '<label>Գույներ</label>\n'+
                '<input class="form-control" type="color">'+
                '</div>'+
                '<div class="form-group">'+
                '<label>Գրեք ընտրված գույներ</label>\n'+
                '<textarea class="form-control" name="color" required>{{old('color')}}</textarea>'+
                '</div>'
            )
        }
        else if(type1=='bar-and-line'){
            $('.typ').html(
                '<div class="form-group">\n'+
                '<label>Y արժեք</label>\n'+
                '<label class="float-right text-info">(կարող եք օգտագործել և թվեր և բառեր)</label>\n'+
                '<textarea class="form-control" name="data" required>{{old('data')}}</textarea>'+
                '</label>'+
                '<div class="form-group">'+
                '<label>X արժեք</label>\n'+
                '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                '<textarea class="form-control" name="value" required>{{old('value')}}</textarea>'+
                '</div>'+
                '<div class="form-group">'+
                '<label>Գիծ</label>\n'+
                '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                '<textarea class="form-control" name="expenses" required>{{old('expenses')}}</textarea>'+
                '</div>'
            )
            $('.aft').html(
                '<div class="form-group">'+
                '<label>Y-ի անվանում</label>\n'+
                '<input class="form-control" name="series" required value="{{old('series')}}">'+
                '</div>'+
                '<div class="form-group">'+
                '<label>Գիծ անվանում</label>\n'+
                '<input class="form-control" name="line" required value="{{old('line')}}">'+
                '</div>'
            )
        }
        else if(type1=='scatter-chart'){
            $('.aft').html('')
            $('.typ').html(
                '<div class="form-group">\n' +
                '<label>AX Արժեք</label>\n'+
                '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                '  <textarea class="form-control" name="data" required>{{old('data')}}</textarea>\n' +
                '</div>\n' +
                '<div class="form-group">\n' +
                '<label>AY Արժեք</label>\n'+
                '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                '  <textarea class="form-control" name="value1" required>{{old('value1')}}</textarea>\n' +
                '</div>\n' +
                '<div class="form-group">\n' +
                '<label>BX Արժեք</label>\n'+
                '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                '  <textarea class="form-control" name="value2" required>{{old('value2')}}</textarea>\n' +
                '</div>\n'+
                '<div class="form-group">\n' +
                '<label>BY Արժեք</label>\n'+
                '<label class="float-right text-info">(կարող եք օգտագործել միայն թվեր)</label>\n'+
                '  <textarea class="form-control" name="value3" required>{{old('value3')}}</textarea>\n' +
                '</div>'
            )
        }
    </script>
@endsection
