@extends('layouts.admin')

@section('styles')
    <style>
        canvas{
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
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
                        <p><a class="btn btn-primary" href="{{ route('admin.charts.create') }}">Նոր գրաֆիկ</a></p>
                    </div><!--row-->
                @endcan
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="col-md-10 mx-auto">
                           <table class="table table-hover">
                               <thead>
                               <tr>
                                   <th>#Իդ</th>
                                   <th>Անվանում</th>
                                   <th>Տեսնել</th>
                                   <th>Գործողություններ</th>
                               </tr>
                               </thead>
                               <tbody>
                               @foreach($chart as $item)
                                   <tr>
                                       <td>{{ $item->id }}</td>
                                       <td>{{ $item->name }}</td>
                                       <td>
                                            <button class="btn btn-primary view_iframe" id="{{route('href', $item->id) }}">Դիտել</button>
                                       </td>
                                       <td class='float-left'>
                                           <div class="btn-group btn-group-toggle float-right">
                                               <a class="btn btn-warning" href="{{route('edit-chart', $item->id) }}">Փոփոխել</a>
                                               <a class="btn btn-danger" onclick="return confirm('Համոզվա՞ծ եք որ ցանկանւմ եք ջնջել')" href="{{route('delete-chart', $item->id)}}">Ջնջել</a>
                                           </div>
                                       </td>
                                   </tr>
                               @endforeach
                               </tbody>
                           </table>
                        </div>
                    </div>
                </div>
                {{--Search end--}}
            </div>
            <div class="alert">
                <iframe class="iframe_charts" src="" frameborder="0" style="width:100%;height: 600px"></iframe>
            </div>
        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="delete_chart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Փակել</button>
                    <button type="button" class="btn btn-danger delete_yes" >Ջնջել</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ $assetPath }}/js/custom-charts.js"></script>
    <script>
        $('.view_iframe').click(function (){
            var src_iframe = $(this).attr('id');
            $('.iframe_charts').attr('src', src_iframe)
        })
        $('.delete_chart').click(function (){
            var delete_chart = $(this).attr('id');
            $('.delete_yes').attr('id', delete_chart)
        })

    </script>
@endsection
