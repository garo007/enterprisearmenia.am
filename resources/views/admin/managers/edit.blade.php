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
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.managers.update', [$item->id]) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Անուն</label>
                            <input type="text" name="f_name" id="name" value="{{ $item->f_name }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="name">Ազգանուն</label>
                            <input type="text" name="l_name" id="l_name" value="{{ $item->l_name }}" class="form-control">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="img">Նկար</label>
                                    <input type="file" name="img" id="img" value="" class="form-control-file">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    @if($item->img)
                                        <img style="max-width: 118px" src="{{ $imagePath }}/{{ $item->img }}" alt="">
                                    @else
                                        {{--no-image.jpg--}}
                                        <img style="max-width: 118px" src="{{ $imagesServe }}/page_no_image.jpg" alt="">
                                    @endif
                                </div>
                            </div>
                        </div><!--row-->


                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" name="email" id="email" value="{{ $item->email }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="name">Հեռաղոսահամար 1</label>
                            <input type="tel" name="phone_1" id="phone_1" value="{{ $item->phone_1 }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="phone_2">Հեռաղոսահամար_2</label>
                            <input type="tel" name="phone_2" id="phone_2" value="{{ $item->phone_2 }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="viber">Viber</label>
                            <input type="text" name="viber" id="phone_2" value="{{ $item->viber }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="whatsapp">Whatsapp</label>
                            <input type="text" name="whatsapp" id="whatsapp" value="{{ $item->whatsapp }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Թարմացնել</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </main>


@endsection

@section('scripts')

@endsection
