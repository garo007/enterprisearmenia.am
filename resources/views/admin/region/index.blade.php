@extends('layouts.admin')

@section('styles')

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


                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main page content-->
        <div class="container mt-n10">
            <div class="card mb-4">
                <div class="card-header">Բոլոր մարզկենտրոները</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Համար</th>
                            <th>Մարզ</th>
                            <th>Քաղաք</th>
                            <th>Կայքում</th>
                            <th width="280px">Գործողություններ</th>
                        </tr>
                        @foreach($region as $regions)
                        <tr>
                            <td>{{$regions->id}}</td>
                            <td>{{$regions->name}}</td>
                            <td>{{$regions->MainPartAdmin->region_center_title ?? ' '}}</td>
                            <td>      <a href="{{route('site.region',$regions->id)}}"  target="_blank" class="badge badge-primary">Կայքում</a></td>
                            <td>
                                <a class="btn btn-info" href="{{ route('admin.region.show',$regions->state_id) }}">Դիտել</a>
                                <a class="btn btn-primary" href="{{ route('admin.region.edit',$regions->state_id) }}">Փոփոխել</a>

                            </td>
                        </tr>
                        @endforeach


                    </table>


                </div>
            </div>

        </div>
    </main>


@endsection

@section('scripts')

@endsection
