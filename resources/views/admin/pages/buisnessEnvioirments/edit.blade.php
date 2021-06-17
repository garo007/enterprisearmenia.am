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
                    <form method="post" action="{{ route('admin.pages.buisnessEnvioirments.update', $post->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        {{--Common data--}}



                        {{--Page image--}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="page_img">Էջի մեծ Նկար</label>
                                    <input type="file" name="page_img" id="page_img" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    @if($post->page_img)

                                        <img  style="max-width: 118px" src="{{ showForAdminPageImage($post->page_img) }}" alt="">
                                    @else
                                        {{--no-image.jpg--}}
                                        <img  style="max-width: 118px" src="{{ $imagesServe }}/page_no_image.jpg" alt="">
                                    @endif
                                </div>
                            </div>

                            @if(isset($post->page_img))
                                <div class="col-md-2">
                                    <label for="delete_page_img">Ջնջել նկարը</label>
                                    <input type="checkbox" id="delete_page_img" name="delete_page_img">
                                </div>
                            @endif
                        </div><!--row-->

                        {{--Page image--}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="page_img_mini">Էջի փոքր Նկար</label>
                                    <input type="file" name="page_img_mini" id="page_img_mini" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    @if($post->page_img_mini)

                                        <img  style="max-width: 118px" src="{{ showForAdminPageImage($post->page_img_mini) }}" alt="">
                                    @else
                                        {{--no-image.jpg--}}
                                        <img  style="max-width: 118px" src="{{ $imagesServe }}/page_no_image.jpg" alt="">
                                    @endif
                                </div>
                            </div>

                            @if(isset($post->page_img_mini))
                                <div class="col-md-2">
                                    <label for="delete_page_img_mini">Ջնջել նկարը</label>
                                    <input type="checkbox" id="delete_page_img_mini" name="delete_page_img_mini">
                                </div>
                            @endif
                        </div><!--row-->




                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li class="nav-item" role="{{$localeCode}}">
                                    <a class="nav-link {{ (App::getLocale() ==  $localeCode) ? 'active' : ''}}" id="pills-home-tab" data-toggle="pill" href="#tab_{{$localeCode}}" aria-controls="{{$localeCode}}" aria-selected="true">{{ $properties['native'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <div class="tab-pane fade show {{ (App::getLocale() ==  $localeCode) ? 'active' : ''}}" id="tab_{{$localeCode}}" role="{{$localeCode}}" aria-labelledby="pills-home-tab">
                                    <div class="form-group">
                                        <label >Գրաֆիկ վերևի տեքստի տակ</label>
                                        <select style="width: 500px" name="chart_text_top_id[{{$localeCode}}]" class="form-control select2">
                                            <option value="">Ընտրել</option>
                                            @foreach($charts[$localeCode] as $item)
                                                @if($post->getTranslation('chart_text_top_id',$localeCode) == $item->id)
                                                    <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Գրաֆիկ ներքևի տեքստի տակ</label>
                                        <select style="width: 500px" name="chart_text_bottom_id[{{$localeCode}}]" class="form-control  select2">
                                            <option value="">Ընտրել</option>
                                            @foreach($charts[$localeCode] as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @if($post->getTranslation('chart_text_bottom_id',$localeCode) == $item->id)
                                                    <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="name[{{$localeCode}}]">Վերնագիր</label>
                                        <input type="text" name="name[{{$localeCode}}]" id="name[{{$localeCode}}]" value="{{ $post->getTranslation('name', $localeCode) }}" class="form-control" required />
                                    </div>


                                    <label for="my-editor-text_top-{{$localeCode}}">Վերևի տեքստ</label>
                                    <x-forms.ckeditor name="text_top[{{$localeCode}}]" value="{!! $post->getTranslation('text_top', $localeCode) !!}"/>


                                    <label for="my-editor-text_bottom-{{$localeCode}}">Ներքևի տեքստ</label>
                                    <x-forms.ckeditor name="text_bottom[{{$localeCode}}]" value="{!! $post->getTranslation('text_bottom', $localeCode) !!}"/>


                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="meta_desc[{{$localeCode}}]">Մետա տեքստ</label>
                                            <textarea name="meta_desc[{{$localeCode}}]" id="meta_desc[{{$localeCode}}]" cols="15" rows=4" class="form-control">{{ $post->getTranslation('meta_desc', $localeCode) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="keywords[{{$localeCode}}]">Բանալի բառեր</label>
                                            <textarea name="keywords[{{$localeCode}}]" id="keywords[{{$localeCode}}]" cols="15" rows="4" class="form-control">{{ $post->getTranslation('keywords', $localeCode) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Թարմացնել</button>
                                    </div>

                                </div>

                            @endforeach
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </main>


@endsection

@section('scripts')

@endsection
