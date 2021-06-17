<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tweet;

class TwitterController extends AdminController
{
    function __construct()
    {
        $this->middleware('permission:posts-list');
        $this->middleware('permission:posts-create', ['only' => ['create','store']]);
        $this->middleware('permission:posts-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:posts-delete', ['only' => ['destroy']]);
        parent::__construct();
    }

    public function index(Request $request) {
        $tweets = Tweet::get();
        $title= 'Թվիթեր';
        $card_header = 'Բոլորը';
        return view('admin.tweets.index', compact('tweets', 'title', 'card_header'));
    }

    public function edit(Tweet $tweet)
    {
        $title = "Թվիթ №-{$tweet->id}";
        return view('admin.tweets.edit', compact('title', 'tweet'));
    }

    public function update(Request $request, Tweet $tweet)
    {
        $tweet->status = intval($request->status);
        $tweet->embed = $request->embed;
        $tweet->save();

        return redirect()->route('admin.tweets.index')->with(['success' => 'Թվիթը հաջողությամբ թարմացվեց։']);
    }

    public function create()
    { $title= 'Նոր Թվիթ';
        return view('admin.tweets.create', compact('title'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'status' => 'required|boolean',
            'embed' => 'required|string',
        ]);

        Tweet::create($request->all());
        return redirect()->route('admin.tweets.index')->with(['success' => 'Թվիթը հաջողությամբ ավելացվեց։']);
    }

    public function destroy($id)
    {
        Tweet::findOrFail($id)->delete();
        return redirect()->route('admin.tweets.index')
            ->with(['success' => "Թվիթ №-{$id} հաջողությամբ ջնջվեց։"]);
    }
}
