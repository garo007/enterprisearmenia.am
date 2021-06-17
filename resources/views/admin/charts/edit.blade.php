@extends('layouts.admin')

@section('styles')
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }

        .colorp > img {
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
                                {{ $title }}
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
                    <form action="{{route('admin.charts.update', ["chart" => $id])}}" method="POST">
                        <div class="tab-content" id="pills-tabContent">
                            @method("PATCH")
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Փոփոխել լեզուն</label>
                                    <div class="form-group">
                                        <select name="lang" class="form-control">
                                            <option value="hy">Հայերեն</option>
                                            <option value="en">Անգլերեն</option>
                                            <option value="ru">Ռուսերեն</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Գրաֆիկի տեսակը</label>
                                        @if ($type =='sorted-bar-chart' || $type =='column-with-rotated-series' || $type =='simple-pie-chart' ||  $type =='pie-chart-3d' || $type =='pie-chart-with-legend' || $type =='live-radar')
                                            <select name="type" class="form-control charttype">
                                                <option value="sorted-bar-chart">Հորիզոնական սանդղակ</option>
                                                <option value="column-with-rotated-series">Սանդղակ</option>
                                                <option value="simple-pie-chart">Կլոր</option>
                                                <option value="pie-chart-3d">Կլոր 3d</option>
                                                <option value="pie-chart-with-legend">Դոնաթային</option>
                                                <option value="live-radar">Ռադարներ</option>
                                            </select>
                                        @elseif ($type =='clustered-column-chart' || $type =='stacked-column-chart-100')
                                            <select name="type" class="form-control charttype">
                                                <option value="clustered-column-chart">Սանդղակների խումբ</option>
                                                <option value="stacked-column-chart-100">Կուտակված սանդղակ</option>
                                            </select>
                                        @elseif ($type =='bar-and-line')
                                            <select name="type" class="form-control charttype">
                                                <option value="bar-and-line">Սանդղակ և Գծային</option>
                                            </select>
                                        @else
                                            <select name="type" class="form-control charttype">
                                                <option value="scatter-chart">Ցրման գծապատկեր</option>
                                            </select>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Գրաֆիկի վերնագիր</label>
                                    <div class="form-group">
                                        <input name="name" type="text" class="form-control"
                                               aria-describedby="basic-addon1" value="{{$name}}" required>
                                    </div>
                                </div>
                            </div>
                            @if ($type=='sorted-bar-chart' || $type=='column-with-rotated-series' || $type=='simple-pie-chart' || $type=='pie-chart-3d' || $type=='pie-chart-with-legend' || $type=='live-radar')
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>X Արժեք</label>
                                            <textarea class="form-control" name="data"
                                                      required>{{ implode("/", $data) }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Y Արժեք</label>
                                            <textarea class="form-control" name="value"
                                                      required>{{ implode("/", $labels) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($type=='scatter-chart')
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>AX Արժեք</label>
                                            <textarea class="form-control" name="data"
                                                      required>@foreach($data as $value){{ $value."/"}}@endforeach</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>AY Արժեք</label>
                                            <textarea class="form-control" name="value1"
                                                      required>@foreach($value1 as $value){{ $value."/"}}@endforeach</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>BX Արժեք</label>
                                            <textarea class="form-control" name="value2"
                                                      required>@foreach($value2 as $value){{ $value."/"}}@endforeach</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>BY Արժեք</label>
                                            <textarea class="form-control" name="value3"
                                                      required>@foreach($value3 as $value){{ $value."/"}}@endforeach</textarea>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($type=='clustered-column-chart' || $type=='stacked-column-chart-100')
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <lable>X Արժեք</lable>
                                            <textarea class="form-control ccc" name="data"
                                                      required>{{ implode("/", $data) }}</textarea>
                                        </div>
                                        @php
                                            $index = 0;
                                        @endphp
                                        <div class="cc">
                                            @foreach($datajson as $key => $value)
                                                {{ $data[$index++] }}
                                                <div class="form-group">
                                                        <textarea class="form-control" name="{{$key}}"
                                                                  required>{{ implode("/", $value) }}</textarea>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <lable>Անվանումներ</lable>
                                            <textarea class="form-control" name="series"
                                                      required>{{ $series }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>X արժեք</label>
                                            <textarea class="form-control" name="data"
                                                      required>{{ implode("/", $data) }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Y արժեք</label>
                                            <textarea class="form-control" name="value"
                                                      required>{{ implode("/", $income) }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Գիծ</label>
                                            <textarea class="form-control" name="expenses"
                                                      required>{{ implode("/", $expenses) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Y-ի անվանում</label>
                                            <input class="form-control" name="series" required value="{{ $series }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Գիծ անվանում</label>
                                            <input class="form-control" name="line" required value="{{ $line }}">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <button class="btn btn-primary">Թարմացնել</button>
                        </div>
                    </form>
                </div>
                <iframe src="{{ url()->to('/') }}/admin123/charts/{{ $id }}" frameborder="0"
                        style="width: 100%;height:690px"></iframe>

            </div>
        </div>
        {{--Search end--}}
        </div>
        </div>
    </main>


@endsection

@section('scripts')
    <script>
        let type = '{{ $type }}';
        $('.charttype option[value=' + type + ']').attr('selected', 'selected');
        $('.ccc').change(function () {
            let type1 = $('.charttype').val();
            if (type1 == 'clustered-column-chart' || type1 == 'stacked-column-chart-100') {
                $('.cc').html('')
                let ccval = $('.ccc').val()
                let res = ccval.split("/");
                let mek = 0;
                for (let i = 0; i < res.length; i++) {
                    mek++;
                    $('.cc').append(
                        '<div class="form-group">\n' +
                        '<label>' + res[i] + '</label>\n' +
                        '  <textarea class="form-control" name="value' + mek + '"></textarea>\n' +
                        '</div>\n'
                    )
                }
            }
        })
        if ($('.charttype').val() == 'bar-and-line') {
            $('.typ').html(
                '<div class="form-group">\n' +
                '<label>X արժեք</label>\n' +
                '<textarea class="form-control" name="data"></textarea>' +
                '</div>'+
                '<div class="form-group">' +
                '<label>Y արժեք</label>\n' +
                '<textarea class="form-control" name="value"></textarea>' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Գիծ</label>\n' +
                '<textarea class="form-control" name="expenses"></textarea>' +
                '</div>'
            )
        }
        $('.charttype').change(function () {
            let type1 = $('.charttype').val();
            if (type1 == 'sorted-bar-chart' || type1 == 'column-with-rotated-series' || type1 == 'simple-pie-chart' || type1 == 'pie-chart-3d' || type1 == 'pie-chart-with-legend' || type1 == 'live-radar') {
                $('.typ').html(
                    '<div class="form-group">\n' +
                    '<label>Անվանում</label>\n' +
                    '  <textarea class="form-control" name="data"></textarea>\n' +
                    '</div>\n' +
                    '<div class="form-group">\n' +
                    '<label>Արժեք</label>\n' +
                    '  <textarea class="form-control" name="value"></textarea>\n' +
                    '</div>'
                )
            } else if (type1 == 'scatter-chart') {
                $('.typ').html(
                    '<div class="form-group">\n' +
                    '  <textarea class="form-control" name="data"></textarea>\n' +
                    '</div>\n' +
                    '<div class="form-group">\n' +
                    '  <textarea class="form-control" name="value1"></textarea>\n' +
                    '</div>\n' +
                    '<div class="form-group">\n' +
                    '  <textarea class="form-control" name="value2"></textarea>\n' +
                    '</div>\n' +
                    '<div class="form-group">\n' +
                    '  <textarea class="form-control" name="value3"></textarea>\n' +
                    '</div>'
                )
            } else if (type1 == 'clustered-column-chart' || type1 == 'stacked-column-chart-100') {
                $('.typ').html(
                    '<div class="form-group">\n' +
                    '<label>Անվանում</label>\n' +
                    '  <textarea class="form-control ccc" name="data"></textarea>\n' +
                    '</div>\n' +
                    '<div class="cc"></div>\n'
                )
                $('.ccc').change(function () {
                    $('.cc').html('')
                    let ccval = $('.ccc').val()
                    let res = ccval.split("/");
                    let mek = 0;
                    for (let i = 0; i < res.length; i++) {
                        mek++;
                        $('.cc').append(
                            '<div class="form-group">\n' +
                            '<label>' + res[i] + '</label>\n' +
                            '  <textarea class="form-control" name="value' + mek + '"></textarea>\n' +
                            '</div>\n'
                        )
                    }

                })
            }
        })
    </script>
@endsection
