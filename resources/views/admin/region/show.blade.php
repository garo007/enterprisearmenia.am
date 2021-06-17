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
                                {{ $regionAm->name }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main page content-->
        <div class="container mt-n10">
            <div class="card mb-4">
                <div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard" id="cardTab" role="tablist">
                    <!-- Wizard navigation item 1-->
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                       aria-controls="nav-home" aria-selected="true">
                        <div class="wizard-step-icon"><img src="{{asset('admin_1/icons/armenia.png')}}" alt=""></div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Հայերեն</div>
                        </div>
                    </a>
                    <!-- Wizard navigation item 2-->
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                       aria-controls="nav-profile" aria-selected="false">

                        <div class="wizard-step-icon"><img src="{{asset('admin_1/icons/English.png')}}" alt=""></div>

                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Անգլերեն</div>
                        </div>
                    </a>
                    <!-- Wizard navigation item 3-->
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                       aria-controls="nav-contact" aria-selected="false">
                        <div class="wizard-step-icon"><img src="{{asset('admin_1/icons/Russia.png')}}" alt="" style="width:25px;"></div>

                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Ռուսերեն</div>

                        </div>
                    </a>

                </div>
                <div class="card-header">     {{ $regionAm->name }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                 aria-labelledby="nav-home-tab">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Մարզ:</strong>
                                        {{ $regionAm->name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Մարզկենտրոն:</strong>
                                        {{$MainPartAm->region_center_title}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Մարզկենտրոն մասին:</strong>
                                        {{$MainPartAm->region_center_info}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Այլ տեղեկություն:</strong>
                                        {{$MainPartAm->region_center_other}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>միջին գները:</strong>
                                        {{$MainPartAm->average_prices}}
                                    </div>
                                </div>





                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Եղանակ</strong>
                                        {{$MainPartAm->weather}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Այլ տեղեկություն:</strong>
                                        {{$MainPartAm->average_other}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Վրաստան:</strong>
                                        {{$MainPartAm->Georgia}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Երևան</strong>
                                        {{$MainPartAm->Yerevan}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Իրան:</strong>
                                        {{$MainPartAm->Iran}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Տերիտորյա:</strong>
                                        {{$InformateAm['territory']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Գյուղատնտեսական հողեր:</strong>
                                        {{$InformateAm['agricultrual_land']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Ընդհանուր բնակչություն:</strong>
                                        {{$InformateAm['total_population']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Քաղաքային բնակչություն:</strong>
                                        {{$InformateAm['urban']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Գյուղական բնակչություն:</strong>
                                        {{$InformateAm['rural']}}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Ընդհանուր աշխատուժ:</strong>
                                        {{$InformateAm['total_workforce']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Աշխատող:</strong>
                                        {{$InformateAm['employed']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Միջին աշխատավարձը:</strong>
                                        {{$InformateAm['average_salary']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Մասնագիտացում:</strong>
                                        {{$InformateAm['specialization']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Մասնագիտացում:</strong>
                                        {{$InformateAm['success_case']}}
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Մարզ:</strong>
                                        {{ $regionEn->name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Մարզկենտրոն:</strong>
                                        {{$MainPartEn->region_center_title}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Մարզկենտրոն մասին:</strong>
                                        {{$MainPartEn->region_center_info}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Այլ տեղեկություն:</strong>
                                        {{$MainPartEn->region_center_other}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>միջին գները:</strong>
                                        {{$MainPartEn->average_prices}}
                                    </div>
                                </div>





                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Եղանակ</strong>
                                        {{$MainPartEn->weather}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Այլ տեղեկություն:</strong>
                                        {{$MainPartEn->average_other}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Վրաստան:</strong>
                                        {{$MainPartEn->Georgia}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Երևան</strong>
                                        {{$MainPartEn->Yerevan}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Իրան:</strong>
                                        {{$MainPartEn->Iran}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Տերիտորյա:</strong>
                                        {{$InformateEn['territory']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Գյուղատնտեսական հողեր:</strong>
                                        {{$InformateEn['agricultrual_land']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Ընդհանուր բնակչություն:</strong>
                                        {{$InformateEn['total_population']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Քաղաքային բնակչություն:</strong>
                                        {{$InformateEn['urban']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Գյուղական բնակչություն:</strong>
                                        {{$InformateEn['rural']}}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Ընդհանուր աշխատուժ:</strong>
                                        {{$InformateEn['total_workforce']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Աշխատող:</strong>
                                        {{$InformateEn['employed']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Միջին աշխատավարձը:</strong>
                                        {{$InformateEn['average_salary']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Մասնագիտացում:</strong>
                                        {{$InformateEn['specialization']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Մասնագիտացում:</strong>
                                        {{$InformateEn['success_case']}}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Մարզ:</strong>
                                        {{ $regionRu->name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Մարզկենտրոն:</strong>
                                        {{$MainPartRu->region_center_title}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Մարզկենտրոն մասին:</strong>
                                        {{$MainPartRu->region_center_info}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Այլ տեղեկություն:</strong>
                                        {{$MainPartRu->region_center_other}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>միջին գները:</strong>
                                        {{$MainPartRu->average_prices}}
                                    </div>
                                </div>





                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Եղանակ</strong>
                                        {{$MainPartRu->weather}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Այլ տեղեկություն:</strong>
                                        {{$MainPartRu->average_other}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Վրաստան:</strong>
                                        {{$MainPartRu->Georgia}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Երևան</strong>
                                        {{$MainPartRu->Yerevan}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Իրան:</strong>
                                        {{$MainPartRu->Iran}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Տերիտորյա:</strong>
                                        {{$InformateRu['territory']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Գյուղատնտեսական հողեր:</strong>
                                        {{$InformateRu['agricultrual_land']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Ընդհանուր բնակչություն:</strong>
                                        {{$InformateRu['total_population']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Քաղաքային բնակչություն:</strong>
                                        {{$InformateRu['urban']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Գյուղական բնակչություն:</strong>
                                        {{$InformateRu['rural']}}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Ընդհանուր աշխատուժ:</strong>
                                        {{$InformateRu['total_workforce']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Աշխատող:</strong>
                                        {{$InformateRu['employed']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Միջին աշխատավարձը:</strong>
                                        {{$InformateRu['average_salary']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Մասնագիտացում:</strong>
                                        {{$InformateRu['specialization']}}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Մասնագիտացում:</strong>
                                        {{$InformateRu['success_case']}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </main>


@endsection

@section('scripts')

@endsection
