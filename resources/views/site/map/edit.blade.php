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
                                Քարտեզ
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main page content-->
        <div class="container mt-n10">
            <div class="card mb-4">
                @can('maps-create')
                    <div class="card-body">
                        <p><a class="btn btn-primary" href="{{ route('admin.map.index') }}">Վերադառնալ</a></p>
                    </div>
                @endcan

                <div class="card-header"></div>
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="col-md-12 mx-auto">
                            <form action="{{route('admin.map.update', ["map" => $id])}}" method="POST">
                                @method("PATCH")
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 typ" >
                                        <label>Քարտեզի վերնագիր</label>
                                        <div class="form-group">
                                            <input name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label>Ընտրեք լեզուն</label>
                                        <div class="form-group">
                                            <select name="lang" class="form-control langg">
                                                <option value="hy">Հայերեն</option>
                                                <option value="en">Անգլերեն</option>
                                                <option value="ru">Ռուսերեն</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 typ" >
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Անվանում</th>
                                                <th>latitude</th>
                                                <th>longitude</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody class="tbody">
                                                @foreach($datajson as $value)
                                                    <tr>
                                                        <td><input name="title[]" class="form-control" required value="{{ $value['title'] }}"> </td>
                                                        <td><input name="latitude[]" class="form-control" required value="{{ $value['latitude'] }}"></td>
                                                        <td><input name="longitude[]" class="form-control" required value="{{ $value['longitude'] }}"></td>
                                                        <td><button type="button" class="btn btn-danger del_tr float-right p-2">Ջնջել</button></td>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-warning add_tr float-right rounded-circle">+</button>
                                    </div>
                                </div>
                                <button class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script>
        let lang = '{{ $lang }}';
        $('.langg option[value=' + lang + ']').attr('selected', 'selected')

        $('.add_tr').click(function (){
            alert()
        })



        $('.add_tr').click(function (){
            $('.tbody').append(
                '<tr>\n' +
                '<td><input name="title[]" class="form-control" required></td>\n' +
                '<td><input name="latitude[]" class="form-control" required></td>\n' +
                '<td><input name="longitude[]" class="form-control" required></td>\n' +
                '<td><button type="button" class="btn btn-danger del_tr float-right p-2">Ջնջել</button></td>\n' +
                '</tr>'
            )
            $('.del_tr').click(function (){
                $(this).parents('tr').remove()
            })
        })
        $('.del_tr').click(function (){
            $(this).parents('tr').remove()
        })
    </script>
@endsection

