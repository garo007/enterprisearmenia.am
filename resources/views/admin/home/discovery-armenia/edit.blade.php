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
                    <form method="post" action="{{ route('admin.home.discovery-armenia.update', $post->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        {{--Post image--}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="img">Նկար</label>
                                    <input type="file" name="img" id="img" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    @if($post->img)
                                        <img style="max-width: 118px" src="{{ $imagePath }}/{{ $post->img }}" alt="">
                                    @else
                                        {{--no-image.jpg--}}
                                        <img style="max-width: 118px" src="{{ $imagesServe }}/page_no_image.jpg" alt="">
                                    @endif
                                </div>
                            </div>

                            @if(isset($post->img))
                                <div class="col-md-2">
                                    <label for="delete_img">Ջնջել նկարը</label>
                                    <input type="checkbox" id="delete_img" name="delete_img">
                                </div>
                            @endif
                        </div><!--row-->
                        {{--End Post image--}}


                        {{--Post image--}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="file">PDF ֆայլը</label>
                                    <input type="file" name="file" id="file" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    @if($post->file)
                                        <p>{{ $post->file }}</p>
                                    @else
                                        <p>Չկա կցված PDF ֆայլ</p>
                                    @endif
                                </div>
                            </div>

                            @if(isset($post->file))
                                <div class="col-md-2">
                                    <label for="delete_file">Ջնջել ֆայլը</label>
                                    <input type="checkbox" id="delete_file" name="delete_file">
                                </div>
                            @endif
                        </div><!--row-->
                        {{--End Post image--}}

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="en">
                                <a class="nav-link {{ (App::getLocale() ==  "en") ? 'active' : ''}}" id="pills-home-tab" data-toggle="pill" href="#tab_en" aria-controls="en" aria-selected="true">English</a>
                            </li>
                            <li class="nav-item" role="en">
                                <a class="nav-link {{ (App::getLocale() ==  "ru") ? 'active' : ''}}" id="pills-home-tab" data-toggle="pill" href="#tab_ru" aria-controls="ru" aria-selected="true">Русский</a>
                            </li>
                            <li class="nav-item" role="en">
                                <a class="nav-link {{ (App::getLocale() ==  "hy") ? 'active' : ''}}" id="pills-home-tab" data-toggle="pill" href="#tab_hy" aria-controls="hy" aria-selected="true">Հայերեն</a>
                            </li>
                        </ul>
{{--                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">--}}
{{--                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--                                --}}
{{--                                <li class="nav-item" role="{{$localeCode}}">--}}
{{--                                    <a class="nav-link {{ (App::getLocale() ==  $localeCode) ? 'active' : ''}}" id="pills-home-tab" data-toggle="pill" href="#tab_{{$localeCode}}" aria-controls="{{$localeCode}}" aria-selected="true">{{ $properties['native'] }}</a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
                        <div class="tab-content" id="pills-tabContent">
{{--                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--                                <div class="tab-pane fade show {{ (App::getLocale() ==  $localeCode) ? 'active' : ''}}" id="tab_{{$localeCode}}" role="{{$localeCode}}" aria-labelledby="pills-home-tab">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="name[{{$localeCode}}]">Վերնագիր</label>--}}
{{--                                        <input type="text" name="name[{{$localeCode}}]" id="name[{{$localeCode}}]" value="{{ $post->getTranslation('name', $localeCode) }}" class="form-control">--}}
{{--                                    </div>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-sm-12">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="{{$localeCode}}[desc]">Կարճ տեքստ</label>--}}
{{--                                                <textarea name="desc[{{$localeCode}}]" id="{{$localeCode}}[desc]" cols="15" rows=4" class="form-control">{{ $post->getTranslation('desc', $localeCode) }}</textarea>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div><!--row-->--}}

{{--                                    <div class="form-group">--}}
{{--                                        <button type="submit" class="btn btn-primary">Թարմացնել</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
                                <div class="tab-pane fade show {{ (App::getLocale() ==  'en') ? 'active' : ''}}" id="tab_en" role="en" aria-labelledby="pills-home-tab">
                                    <div class="form-group">
                                        <label for="name[en]">Վերնագիր</label>
                                        <input type="text" name="name[en]" id="name[en]" value="{{ $post->getTranslation('name', "en") }}" class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="en[desc]">Կարճ տեքստ</label>
                                                <textarea name="desc[en]" id="en[desc]" cols="15" rows=4" class="form-control">{{ $post->getTranslation('desc', 'en') }}</textarea>
                                            </div>
                                        </div>
                                    </div><!--row-->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Թարմացնել</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade show {{ (App::getLocale() ==  "ru") ? 'active' : ''}}" id="tab_ru" role="ru" aria-labelledby="pills-home-tab">
                                    <div class="form-group">
                                        <label for="name[ru]">Վերնագիր</label>
                                        <input type="text" name="name[ru]" id="name[ru]" value="{{ $post->getTranslation('name', "ru") }}" class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="ru[desc]">Կարճ տեքստ</label>
                                                <textarea name="desc[ru]" id="ru[desc]" cols="15" rows=4" class="form-control">{{ $post->getTranslation('desc', "ru") }}</textarea>
                                            </div>
                                        </div>
                                    </div><!--row-->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Թարմացնել</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade show {{ (App::getLocale() ==  "hy") ? 'active' : ''}}" id="tab_hy" role="hy" aria-labelledby="pills-home-tab">
                                    <div class="form-group">
                                        <label for="name[hy]">Վերնագիր</label>
                                        <input type="text" name="name[hy]" id="name[hy]" value="{{ $post->getTranslation('name', 'hy') }}" class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="hy[desc]">Կարճ տեքստ</label>
                                                <textarea name="desc[hy]" id="hy[desc]" cols="15" rows=4" class="form-control">{{ $post->getTranslation('desc', 'hy') }}</textarea>
                                            </div>
                                        </div>
                                    </div><!--row-->

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Թարմացնել</button>
                                    </div>
                                </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </main>


@endsection

@section('scripts')
<script>

</script>
@endsection
