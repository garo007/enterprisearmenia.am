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

                @can('tags-create')
                    <div class="card-body">
                        <p><a class="btn btn-primary" href="{{ route('admin.tweets.create') }}">Նոր թվիթ</a></p>
                    </div>
                @endcan

                <div class="card-header">{{ $card_header }}</div>
                <div class="card-body">

                    <div class="tab-content" id="pills-tabContent">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#Համար</th>
                                <th>Անվանում</th>
                                <th>Կոդ</th>
                                <th>Գործողություններ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tweets as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->status ? 'ակտիվ' : 'պասիվ' }}</td>
                                    <td style="max-width: 200px">{!!$item->embed!!}</td>
                                    <td>
                                        <a href="{{ route('admin.tweets.edit', ['tweet' => $item] ) }}" class="btn btn-primary py-1 px-2">Փոփոխել</a>
                                        <form method="post" action="{{ route('admin.tweets.destroy', $item->id) }}" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger py-1 px-2">Ջնջել</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--Search end--}}
            </div>

        </div>
    </main>


@endsection

@section('scripts')

@endsection
