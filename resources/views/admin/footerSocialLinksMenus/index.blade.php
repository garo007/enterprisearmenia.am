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

                {{--Search--}}
                <div class="card-header">Մենյու</div>
                <div class="card-body">

                    <form method="post" action="{{ route('admin.footerSocialLinksMenus.index') }}">
                        @csrf
                        <div class="form-group">
                            <label for="linkedin_link">linkedin հղում</label>
                            <input type="text" name="linkedin_link" id="linkedin_link" value="{{ settings()->group('social_links')->get('linkedin_link') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="facebook_link">Facebook հղում</label>
                            <input type="text" name="facebook_link" id="facebook_link" value="{{ settings()->group('social_links')->get('facebook_link') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="twitter_link">Twitter հղում</label>
                            <input type="text" name="twitter_link" id="twitter_link" value="{{ settings()->group('social_links')->get('twitter_link') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="instagram_link">instagram հղում</label>
                            <input type="text" name="instagram_link" id="instagram_link" value="{{ settings()->group('social_links')->get('instagram_link') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Թարմացնել</button>
                        </div>
                    </form>


                </div>
                {{--Search end--}}
            </div>

        </div>
    </main>


@endsection

@section('scripts')

@endsection
