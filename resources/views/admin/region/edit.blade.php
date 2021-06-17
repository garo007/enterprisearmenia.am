@extends('layouts.admin')

@section('styles')
    <style>
        .wizard-step-icon>img{
            width: 20px;
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
                <div class="card-header border-bottom">
                    <!-- Wizard navigation-->
                    <div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard" id="cardTab" role="tablist">
                        <!-- Wizard navigation item 1-->
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                            <div class="wizard-step-icon"><img src="{{asset('admin_1/icons/armenia.png')}}" alt=""></div>
                            <div class="wizard-step-text">
                                <div class="wizard-step-text-name">Հայերեն</div>
                          </div>
                        </a>
                        <!-- Wizard navigation item 2-->
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">

                            <div class="wizard-step-icon"><img src="{{asset('admin_1/icons/English.png')}}" alt="" ></div>

                            <div class="wizard-step-text">
                                <div class="wizard-step-text-name">Անգլերեն</div>
                            </div>
                        </a>
                        <!-- Wizard navigation item 3-->
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                            <div class="wizard-step-icon"><img src="{{asset('admin_1/icons/Russia.png')}}" alt=""></div>

                            <div class="wizard-step-text">
                                <div class="wizard-step-text-name">Ռուսերեն</div>

                            </div>
                        </a>

                    </div>
                </div>
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $regionAm->name }}</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.region.update', [$regionAm->state_id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="form-group">
                            <label for="name_am">Մարզ</label>
                            <input type="text" name="name_am" id="name_am" value="{{ $regionAm->name }}" class="form-control">
                        </div>
                         <div class="form-group">

                            <label for="region_center_title_am">Մարզկենտրոն</label>
                            <input type="text" name="region_center_title_am" id="region_center_title_am" value="{{$MainPartAm->region_center_title}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="region_center_info_am">Մարզկենտրոն մասին</label>
                            <input type="text" name="region_center_info_am" id="region_center_info_am" value="{{$MainPartAm->region_center_info}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="region_center_other_am">Այլ տեղեկություն</label>
                            <input type="text" name="region_center_other_am" id="region_center_other_am" value="{{$MainPartAm->region_center_other}}" class="form-control">
                        </div>
                       <div class="form-group">
                            <label for="average_prices_am">միջին գները</label>
                            <input type="text" name="average_prices_am" id="average_prices_am" value="{{$MainPartAm->average_prices}}" class="form-control">
                        </div>
                         <div class="form-group">
                            <label for="weather_am">Եղանակ</label>
                            <input type="text" name="weather_am" id="weather_am" value="{{$MainPartAm->weather}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="average_other_am">Այլ տեղեկություներ</label>
                            <input type="text" name="average_other_am" id="average_other_am" value="{{$MainPartAm->average_other}}" class="form-control">
                        </div>
                       <div class="form-group">
                            <label for="georgia_am">Վրաստան</label>
                            <input type="text" name="georgia_am" id="georgia_am" value="{{$MainPartAm->Georgia}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="yerevan_am">Երևան</label>
                            <input type="text" name="yerevan_am" id="yerevan_am" value="{{$MainPartAm->Yerevan}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="iran_am">Իրան</label>
                            <input type="text" name="iran_am" id="iran_am" value="{{$MainPartAm->Iran}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="territory_am">Տերիտորյա</label>
                            <input type="text" name="territory_am" id="territory_am" value="{{$InformateAm['territory']}}" class="form-control">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agricultrual_land_am">Գյուղատնտեսական հողեր</label>
                                    <input type="text" name="agricultrual_land_am" id="agricultrual_land_am" value="{{$InformateAm['agricultrual_land']}}" class="form-control-file">
                                </div>
                            </div>

                        </div><!--row-->

                        <div class="form-group">
                            <label for="total_population_am">Ընդհանուր բնակչություն</label>
                            <input type="text" name="total_population_am" id="total_population_am" value="{{$InformateAm['total_population']}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="urban_am">Քաղաքային բնակչություն</label>
                            <input type="text" name="urban_am" id="urban_am" value="{{$InformateAm['urban']}}" class="form-control">
                        </div>
                         <div class="form-group">
                            <label for="rural_am">Գյուղական բնակչություն</label>
                            <input type="text" name="rural_am" id="rural_am" value="{{$InformateAm['rural']}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="total_workforce_am">Ընդհանուր աշխատուժ</label>
                            <input type="text" name="total_workforce_am" id="total_workforce_am" value="{{$InformateAm['total_workforce']}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="employed_am">Աշխատող</label>
                            <input type="text" name="employed_am" id="employed_am" value="{{$InformateAm['employed']}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="average_salary_am">Միջին աշխատավարձը</label>
                            <input type="text" name="average_salary_am" id="average_salary_am" value="{{$InformateAm['average_salary']}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="specialization_am">Մասնագիտացում</label>

                            <textarea  name="specialization_am" id="specialization_am"  class="form-control"  >{{$InformateAm['specialization']}}</textarea>
{{--                        </div>inputFields ncontent"--}}
                       <div class="form-group">
                            <label for="success_case_am">Հաջողության դեպք</label>
                            <input type="text" name="success_case_am" id="success_case_am" value="{{$InformateAm['success_case']}}" class="form-control">
                        </div>
                            <div class="form-group">
                                <label for="agriculture_am">Գյուղատնտեսություն</label>
                                <input type="number" step="0.1" name="agriculture_am" id="agriculture_am" value="{{$InformateAm['agriculture']}}" class="form-control">
                                <label for="agriculture_comments_am">Գյուղատնտեսություն նկարագրություն</label>
                                <input type="text"  name="agriculture_comments_am" id="agriculture_comments_am" value="{{$InformateAm['agriculture_comments']}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="retail_trade_am">Մանրածախ առեւտուր</label>
                                <input type="number" step="0.1" name="retail_trade_am" id="retail_trade_am" value="{{$InformateAm['retail_trade']}}" class="form-control">
                                <label for="retail_trade_comments_am">Մանրածախ առեւտուր նկարագրություն</label>
                                <input type="text"  name="retail_trade_comments_am" id="retail_trade_comments_am" value="{{$InformateAm['retail_trade_comments']}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="construction_am">Շինարարություն</label>
                                <input type="number" step="0.1" name="construction_am" id="construction_am" value="{{$InformateAm['construction']}}" class="form-control">
                                <label for="construction_comments_am">Շինարարություն նկարագրություն</label>
                                <input type="text"  name="construction_comments_am" id="construction_comments_am" value="{{$InformateAm['construction_comments']}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="industry_am">Արդյունաբերություն</label>
                                <input type="number" step="0.1" name="industry_am" id="industry_am" value="{{$InformateAm['industry']}}" class="form-control">
                                <label for="industry_comments_am">Արդյունաբերություն նկարագրություն</label>
                                <input type="text"  name="industry_comments_am" id="industry_comments_am" value="{{$InformateAm['industry_comments']}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <h6>ՆԵՐԴՐՈՒՄԱՅԻՆ ՆԵՐՈՒԺ / ԽՈՍՏՈՒՄՆԱԼԻՑ ՈԼՈՐՏՆԵՐ</h6>
                                <label for="industry_am">Դաշտ N1</label>
                                <input type="text" step="0.1" name="tourism_am" id="tourism_am" value="{{$InformateAm['tourism']}}" class="form-control">
                                <label for="industry_am">Դաշտ N2</label>
                                <input type="text" step="0.1" name="cropproduction_am" id="cropproduction_am" value="{{$InformateAm['cropproduction']}}" class="form-control">
                                <label for="industry_am">Դաշտ N3</label>
                                <input type="text" step="0.1" name="portable_energy_am" id="portable_energy_am" value="{{$InformateAm['portable_energy']}}" class="form-control">
                                <label for="industry_am">Դաշտ N4</label>
                                <input type="text" step="0.1" name="food_processing_am" id="food_processing_am" value="{{$InformateAm['food_processing']}}" class="form-control">
                                <label for="industry_am">Դաշտ N5</label>
                                <input type="text" step="0.1" name="beverage_production_am" id="beverage_production_am" value="{{$InformateAm['beverage_production']}}" class="form-control">
                                <label for="industry_am">Դաշտ N6</label>
                                <input type="text" step="0.1" name="textile_am" id="textile_am" value="{{$InformateAm['textile']}}" class="form-control">
                                <label for="industry_am">Դաշտ N7</label>
                                <input type="text" step="0.1" name="field_1_am" id="field_1_am" value="{{$InformateAm['field_1']}}" class="form-control">
                                <label for="industry_am">Դաշտ N8</label>
                                <input type="text" step="0.1" name="field_2_am" id="field_2_am" value="{{$InformateAm['field_2']}}" class="form-control">
                                <label for="industry_am">Դաշտ N9</label>
                                <input type="text" step="0.1" name="field_3_am" id="field_3_am" value="{{$InformateAm['field_3']}}" class="form-control">
                                <label for="industry_am">Դաշտ N10</label>
                                <input type="text" step="0.1" name="field_4_am" id="field_4_am" value="{{$InformateAm['field_4']}}" class="form-control">
                            </div>

                            </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="form-group">

                                    <label for="name_en">Մարզ</label>
                                    <input type="text" name="name_en" id="name_en" value="{{ $regionEn->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="region_center_title_en">Մարզկենտրոն</label>
                                    <input type="text" name="region_center_title_en" id="region_center_title_en" value="{{$MainPartEn['region_center_title']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="region_center_info_en">Մարզկենտրոն մասին</label>
                                    <input type="text" name="region_center_info_en" id="region_center_info_en" value="{{$MainPartEn['region_center_info']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="region_center_other_en">Այլ տեղեկություն</label>
                                    <input type="text" name="region_center_other_en" id="region_center_other_en" value="{{$MainPartEn['region_center_other']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="average_prices_en">միջին գները</label>
                                    <input type="text" name="average_prices_en" id="average_prices_en" value="{{$MainPartEn['average_prices']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="weather_en">Եղանակ</label>
                                    <input type="text" name="weather_en" id="weather_en" value="{{$MainPartEn->weather}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="average_other_en">Այլ տեղեկություներ</label>
                                    <input type="text" name="average_other_en" id="average_other_en" value="{{$MainPartEn['average_other']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="georgia_en">Վրաստան</label>
                                    <input type="text" name="georgia_en" id="georgia_en" value="{{$MainPartEn['Georgia']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="yerevan_en">Երևան</label>
                                    <input type="text" name="yerevan_en" id="yerevan_en" value="{{$MainPartEn['Yerevan']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="iran_en">Իրան</label>
                                    <input type="text" name="iran_en" id="iran_en" value="{{$MainPartEn['Iran']}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="territory_en">Տերիտորյա</label>
                                    <input type="text" name="territory_en" id="territory_en" value="{{$InformateEn['territory']}}" class="form-control">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="agricultrual_land_en">Գյուղատնտեսական հողեր</label>
                                            <input type="text" name="agricultrual_land_en" id="agricultrual_land_en" value="{{$InformateEn['agricultrual_land']}}" class="form-control-file">
                                        </div>
                                    </div>

                                </div><!--row-->

                                <div class="form-group">
                                    <label for="total_population_en">Ընդհանուր բնակչություն</label>
                                    <input type="text" name="total_population_en" id="total_population_en" value="{{$InformateEn['total_population']}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="urban_en">Քաղաքային բնակչություն</label>
                                    <input type="text" name="urban_en" id="urban_en" value="{{$InformateEn['urban']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="rural_en">Գյուղական բնակչություն</label>
                                    <input type="text" name="rural_en" id="rural_en" value="{{$InformateEn['rural']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="total_workforce_en">Ընդհանուր աշխատուժ</label>
                                    <input type="text" name="total_workforce_en" id="total_workforce_en" value="{{$InformateEn['total_workforce']}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="employed_en">Աշխատող</label>
                                    <input type="text" name="employed_en" id="employed_en" value="{{$InformateEn['employed']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="average_salary_en">Միջին աշխատավարձը</label>
                                    <input type="text" name="average_salary_en" id="average_salary_en" value="{{$InformateEn['average_salary']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="specialization_en">Մասնագիտացում</label>

                                    <textarea  name="specialization_en" id="specialization_en"  class="form-control"  >{{$InformateEn['specialization']}}</textarea>
                                    {{--                        </div>inputFields ncontent"--}}
                                    <div class="form-group">
                                        <label for="success_case_en">Հաջողության դեպք</label>
                                        <input type="text" name="success_case_en" id="success_case_en" value="{{$InformateEn['success_case']}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="agriculture_en">Գյուղատնտեսություն</label>
                                        <input type="number" step="0.1" name="agriculture_en" id="agriculture_en" value="{{$InformateEn['agriculture']}}" class="form-control">
                                        <label for="agriculture_comments_en">Գյուղատնտեսություն նկարագրություն</label>
                                        <input type="text"  name="agriculture_comments_en" id="agriculture_comments_en" value="{{$InformateEn['agriculture_comments']}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="retail_trade_en">Մանրածախ առեւտուր</label>
                                        <input type="number" step="0.1" name="retail_trade_en" id="retail_trade_en" value="{{$InformateEn['retail_trade']}}" class="form-control">
                                        <label for="retail_trade_comments_en">Մանրածախ առեւտուր նկարագրություն</label>
                                        <input type="text"  name="retail_trade_comments_en" id="retail_trade_comments_en" value="{{$InformateEn['retail_trade_comments']}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="construction_en">Շինարարություն</label>
                                        <input type="number" step="0.1" name="construction_en" id="construction_en" value="{{$InformateEn['construction']}}" class="form-control">
                                        <label for="construction_comments_en">Շինարարություն նկարագրություն</label>
                                        <input type="text"  name="construction_comments_en" id="construction_comments_en" value="{{$InformateEn['construction_comments']}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="industry_en">Արդյունաբերություն</label>
                                        <input type="number" step="0.1" name="industry_en" id="industry_en" value="{{$InformateEn['industry']}}" class="form-control">
                                        <label for="industry_comments_en">Արդյունաբերություն նկարագրություն</label>
                                        <input type="text"  name="industry_comments_en" id="industry_comments_en" value="{{$InformateEn['industry_comments']}}" class="form-control">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h6>ՆԵՐԴՐՈՒՄԱՅԻՆ ՆԵՐՈՒԺ / ԽՈՍՏՈՒՄՆԱԼԻՑ ՈԼՈՐՏՆԵՐ</h6>
                                        <label for="industry_am">Դաշտ N1</label>
                                        <input type="text" step="0.1" name="tourism_en" id="tourism_en" value="{{$InformateEn['tourism']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N2</label>
                                        <input type="text" step="0.1" name="cropproduction_en" id="cropproduction_en" value="{{$InformateEn['cropproduction']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N3</label>
                                        <input type="text" step="0.1" name="portable_energy_en" id="portable_energy_en" value="{{$InformateEn['portable_energy']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N4</label>
                                        <input type="text" step="0.1" name="food_processing_en" id="food_processing_en" value="{{$InformateEn['food_processing']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N5</label>
                                        <input type="text" step="0.1" name="beverage_production_en" id="beverage_production_en" value="{{$InformateEn['beverage_production']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N6</label>
                                        <input type="text" step="0.1" name="textile_en" id="textile_en" value="{{$InformateEn['textile']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N7</label>
                                        <input type="text" step="0.1" name="field_1_en" id="field_1_en" value="{{$InformateEn['field_1']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N8</label>
                                        <input type="text" step="0.1" name="field_2_en" id="field_2_en" value="{{$InformateEn['field_2']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N9</label>
                                        <input type="text" step="0.1" name="field_3_en" id="field_3_en" value="{{$InformateEn['field_3']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N10</label>
                                        <input type="text" step="0.1" name="field_4_en" id="field_4_en" value="{{$InformateEn['field_4']}}" class="form-control">
                                    </div>

                          </div>

                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="form-group">
                                    <label for="name_ru">Մարզ</label>
                                    <input type="text" name="name_ru" id="name_ru" value="{{ $regionRu->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="region_center_title_ru">Մարզկենտրոն</label>
                                    <input type="text" name="region_center_title_ru" id="region_center_title_ru" value="{{$MainPartRu['region_center_title']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="region_center_info_ru">Մարզկենտրոն մասին</label>
                                    <input type="text" name="region_center_info_ru" id="region_center_info_ru" value="{{$MainPartRu['region_center_info']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="region_center_other_ru">Այլ տեղեկություն</label>
                                    <input type="text" name="region_center_other_ru" id="region_center_other_ru" value="{{$MainPartRu['region_center_other']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="average_prices_ru">միջին գները</label>
                                    <input type="text" name="average_prices_ru" id="average_prices_ru" value="{{$MainPartRu['average_prices']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="weather_ru">Եղանակ</label>
                                    <input type="text" name="weather_ru" id="weather_ru" value="{{$MainPartRu->weather}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="average_other_ru">Այլ տեղեկություներ</label>
                                    <input type="text" name="average_other_ru" id="average_other_ru" value="{{$MainPartRu['average_other']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="georgia_ru">Վրաստան</label>
                                    <input type="text" name="georgia_ru" id="georgia_ru" value="{{$MainPartRu['Georgia']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="yerevan_ru">Երևան</label>
                                    <input type="text" name="yerevan_ru" id="yerevan_ru" value="{{$MainPartRu['Yerevan']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="iran_ru">Իրան</label>
                                    <input type="text" name="iran_ru" id="iran_ru" value="{{$MainPartRu['Iran']}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="territory_ru">Տերիտորյա</label>
                                    <input type="text" name="territory_ru" id="territory_ru" value="{{$InformateRu['territory']}}" class="form-control">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="agricultrual_land_ru">Գյուղատնտեսական հողեր</label>
                                            <input type="text" name="agricultrual_land_ru" id="agricultrual_land_ru" value="{{$InformateRu['agricultrual_land']}}" class="form-control-file">
                                        </div>
                                    </div>

                                </div><!--row-->

                                <div class="form-group">
                                    <label for="total_population_ru">Ընդհանուր բնակչություն</label>
                                    <input type="text" name="total_population_ru" id="total_population_ru" value="{{$InformateRu['total_population']}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="urban_ru">Քաղաքային բնակչություն</label>
                                    <input type="text" name="urban_ru" id="urban_ru" value="{{$InformateRu['urban']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="rural_ru">Գյուղական բնակչություն</label>
                                    <input type="text" name="rural_ru" id="rural_ru" value="{{$InformateRu['rural']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="total_workforce_ru">Ընդհանուր աշխատուժ</label>
                                    <input type="text" name="total_workforce_ru" id="total_workforce_ru" value="{{$InformateRu['total_workforce']}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="employed_ru">Աշխատող</label>
                                    <input type="text" name="employed_ru" id="employed_ru" value="{{$InformateRu['employed']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="average_salary_ru">Միջին աշխատավարձը</label>
                                    <input type="text" name="average_salary_ru" id="average_salary_ru" value="{{$InformateRu['average_salary']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="specialization_ru">Մասնագիտացում</label>

                                    <textarea  name="specialization_ru" id="specialization_ru"  class="form-control"  >{{$InformateRu['specialization']}}</textarea>
                                    {{--                        </div>inputFields ncontent"--}}
                                    <div class="form-group">
                                        <label for="success_case_ru">Հաջողության դեպք</label>
                                        <input type="text" name="success_case_ru" id="success_case_ru" value="{{$InformateRu['success_case']}}" class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <label for="agriculture_ru">Գյուղատնտեսություն</label>
                                        <input type="number" step="0.1" name="agriculture_ru" id="agriculture_ru" value="{{$InformateRu['agriculture']}}" class="form-control">
                                        <label for="agriculture_comments_ru">Գյուղատնտեսություն նկարագրություն</label>
                                        <input type="text"  name="agriculture_comments_ru" id="agriculture_comments_ru" value="{{$InformateRu['agriculture_comments']}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="retail_trade_ru">Մանրածախ առեւտուր</label>
                                        <input type="number" step="0.1" name="retail_trade_ru" id="retail_trade_ru" value="{{$InformateRu['retail_trade']}}" class="form-control">
                                        <label for="retail_trade_comments_ru">Մանրածախ առեւտուր նկարագրություն</label>
                                        <input type="text"  name="retail_trade_comments_ru" id="retail_trade_comments_ru" value="{{$InformateRu['retail_trade_comments']}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="construction_ru">Շինարարություն</label>
                                        <input type="number" step="0.1" name="construction_ru" id="construction_ru" value="{{$InformateRu['construction']}}" class="form-control">
                                        <label for="construction_comments_ru">Շինարարություն նկարագրություն</label>
                                        <input type="text"  name="construction_comments_ru" id="construction_comments_ru" value="{{$InformateRu['construction_comments']}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="industry_ru">Արդյունաբերություն</label>
                                        <input type="number" step="0.1" name="industry_ru" id="industry_ru" value="{{$InformateRu['industry']}}" class="form-control">
                                        <label for="industry_comments_ru">Արդյունաբերություն նկարագրություն</label>
                                        <input type="text"  name="industry_comments_ru" id="industry_comments_ru" value="{{$InformateRu['industry_comments']}}" class="form-control">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h6>ՆԵՐԴՐՈՒՄԱՅԻՆ ՆԵՐՈՒԺ / ԽՈՍՏՈՒՄՆԱԼԻՑ ՈԼՈՐՏՆԵՐ</h6>
                                        <label for="industry_am">Դաշտ N1</label>
                                        <input type="text" step="0.1" name="tourism_ru" id="tourism_ru" value="{{$InformateRu['tourism']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N2</label>
                                        <input type="text" step="0.1" name="cropproduction_ru" id="cropproduction_ru" value="{{$InformateRu['cropproduction']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N3</label>
                                        <input type="text" step="0.1" name="portable_energy_ru" id="portable_energy_ru" value="{{$InformateRu['portable_energy']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N4</label>
                                        <input type="text" step="0.1" name="food_processing_ru" id="food_processing_ru" value="{{$InformateRu['food_processing']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N5</label>
                                        <input type="text" step="0.1" name="beverage_production_ru" id="beverage_production_ru" value="{{$InformateRu['beverage_production']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N6</label>
                                        <input type="text" step="0.1" name="textile_ru" id="textile_ru" value="{{$InformateRu['textile']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N7</label>
                                        <input type="text" step="0.1" name="field_1_ru" id="field_1_ru" value="{{$InformateRu['field_1']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N8</label>
                                        <input type="text" step="0.1" name="field_2_ru" id="field_2_ru" value="{{$InformateRu['field_2']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N9</label>
                                        <input type="text" step="0.1" name="field_3_ru" id="field_3_ru" value="{{$InformateRu['field_3']}}" class="form-control">
                                        <label for="industry_am">Դաշտ N10</label>
                                        <input type="text" step="0.1" name="field_4_ru" id="field_4_ru" value="{{$InformateRu['field_4']}}" class="form-control">

                                    </div>












                            </div>
                            </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Հաստատել</button>
                        </div>




                    </form>



            </div>
            </div>

        </div>
    </main>


@endsection

@section('scripts')

{{--    <script  src="{{asset('admin_1/tinymce/tinymce.min.js')}}"></script>--}}
{{--    <script>--}}
{{--    $(function () {--}}
{{--    $("#date").datetime({value: '+1min'});--}}
{{--    $("#update_cmd").button();--}}
{{--    $("#status").buttonset();--}}
{{--    $("#top_fut").buttonset();--}}
{{--    $("#lang").buttonset();--}}
{{--    $("#catList").buttonset();--}}
{{--    });--}}
{{--    tinymce.init({--}}
{{--    selector: '.ncontent',--}}
{{--    menubar: false,--}}
{{--    plugins: [--}}
{{--    "advlist autolink link image lists charmap print preview hr anchor pagebreak fullscreen",--}}
{{--    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",--}}
{{--    "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"--}}
{{--    ],--}}
{{--    relative_urls: false,--}}
{{--    image_advtab: true,--}}
{{--    filemanager_title: "Responsive Filemanager",--}}
{{--    file_picker_types: 'file image media',--}}
{{--    external_filemanager_path: "/admin/filemanager/",--}}
{{--    toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent blockquote | formatselect removeformat | fullscreen",--}}
{{--    toolbar2: "undo redo | cut copy paste pastetext | forecolor backcolor | searchreplace  | responsivefilemanager | image | media | link unlink  | code",--}}
{{--    file_picker_callback: function (cb, value, meta) {--}}
{{--    var width = window.innerWidth - 30;--}}
{{--    var height = window.innerHeight - 60;--}}
{{--    if (width > 1800) width = 1800;--}}
{{--    if (height > 1200) height = 1200;--}}
{{--    if (width > 600) {--}}
{{--    var width_reduce = (width - 20) % 138;--}}
{{--    width = width - width_reduce + 10;--}}
{{--    }--}}
{{--    var urltype = 2;--}}
{{--    if (meta.filetype == 'image') {--}}
{{--    urltype = 1;--}}
{{--    }--}}
{{--    if (meta.filetype == 'media') {--}}
{{--    urltype = 3;--}}
{{--    }--}}
{{--    let title = "RESPONSIVE FileManager";--}}
{{--    if (typeof this.settings.filemanager_title !== "undefined" && this.settings.filemanager_title) {--}}
{{--    title = this.settings.filemanager_title;--}}
{{--    }--}}
{{--    let akey = "key";--}}
{{--    if (typeof this.settings.filemanager_access_key !== "undefined" && this.settings.filemanager_access_key) {--}}
{{--    akey = this.settings.filemanager_access_key;--}}
{{--    }--}}
{{--    let sort_by = "";--}}
{{--    if (typeof this.settings.filemanager_sort_by !== "undefined" && this.settings.filemanager_sort_by) {--}}
{{--    sort_by = "&sort_by=" + this.settings.filemanager_sort_by;--}}
{{--    }--}}
{{--    let descending = "false";--}}
{{--    if (typeof this.settings.filemanager_descending !== "undefined" && this.settings.filemanager_descending) {--}}
{{--    descending = this.settings.filemanager_descending;--}}
{{--    }--}}
{{--    let fldr = "";--}}
{{--    if (typeof this.settings.filemanager_subfolder !== "undefined" && this.settings.filemanager_subfolder) {--}}
{{--    fldr = "&fldr=" + this.settings.filemanager_subfolder;--}}
{{--    }--}}
{{--    let crossdomain = "";--}}
{{--    if (typeof this.settings.filemanager_crossdomain !== "undefined" && this.settings.filemanager_crossdomain) {--}}
{{--    crossdomain = "&crossdomain=1";--}}

{{--    // Add handler for a message from ResponsiveFilemanager--}}
{{--    if (window.addEventListener) {--}}
{{--    window.addEventListener('message', filemanager_onMessage, false);--}}
{{--    } else {--}}
{{--    window.attachEvent('onmessage', filemanager_onMessage);--}}
{{--    }--}}
{{--    }--}}
{{--    tinymce.activeEditor.windowManager.open({--}}
{{--    title: title,--}}
{{--    file: this.settings.external_filemanager_path + 'dialog.php?type=' + urltype + '&descending=' + descending + sort_by + fldr + crossdomain + '&lang=' + this.settings.language + '&akey=' + akey,--}}
{{--    width: width,--}}
{{--    height: height,--}}
{{--    resizable: true,--}}
{{--    maximizable: true,--}}
{{--    inline: 1--}}
{{--    }, {--}}
{{--    setUrl: function (url) {--}}
{{--    cb(url);--}}
{{--    }--}}
{{--    });--}}
{{--    },--}}
{{--    });--}}
{{--    </script>--}}

@endsection
