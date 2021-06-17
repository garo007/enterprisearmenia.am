<?php

namespace App\Http\Controllers\Admin;

use App\Enums\FooterMenusEnum;
use App\Http\Controllers\Controller;
use App\Models\Footermenu;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class FooterTopMenusController extends AdminController
{
    public function __construct()
    {

        $this->middleware('permission:menu-list');
        $this->middleware('permission:menu-create', ['only' => ['create','store']]);
        $this->middleware('permission:menu-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:menu-delete', ['only' => ['destroy']]);

        parent::__construct();
    }

    public function index()
    {
        $menus = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties){
            $rows = Footermenu::getMenus($localeCode, FooterMenusEnum::top());
            $menus[$localeCode] = $rows;
        }

        return view('admin.footerTopmenus.index')
            ->with([
                'title' => 'Ներքևի մենյույի վերևի հատված',
                'menus' => $menus,
            ]);

    }


    public function selectLanguage()
    {
        $title = 'Ընտրել լեզուն մենյուի համար';
        return view('admin.footerTopmenus.selectLanguage', compact('title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        $lang = $request->lang;
        //  $this->vars = array_add($this->vars, 'lang', $lang);

        if($lang == null){
            return redirect()->route('admin.footerTopmenus.selectLanguage');
        }
        $data = [];

        $rows = Footermenu::getMenus($lang,FooterMenusEnum::top());

        $title = 'Ավելացնել հղում ներքևի մենյուի վերևի հատվածում';

        return  view('admin.footerTopmenus.create', compact('title','lang','data'));

        //   return parent::renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'path' => 'required|url',
            'type' => FooterMenusEnum::top(),
        ]);

        Footermenu::storeTopMenu($request);
        // return redirect()->route('admin.footerTopmenus.index')->with(['success' => 'Добавлен']);
        return back()->with(['success' => 'Ավելացվեց']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Footermenu::findOrFail($id);

        $lang = $post->lang;
        return view('admin.footerTopmenus.edit')->with([
            'title' => 'Փոփոխել',
            'post' => $post,
            'lang' => $lang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'path' => 'required|url',
        ]);
        $input = $request->all();
        $item = Footermenu::findOrFail($id);
        $item->update($input);
        return redirect()->route('admin.footerTopmenus.index')->with(['success' => 'Обновлен']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Footermenu::find($id);
        $item->delete();
        return redirect()->route('admin.footerTopmenus.index')->with(['success' => 'Ջնջվեց']);
    }
}
