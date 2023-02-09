<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ItemsController extends Controller
{
    public function index()
    {   
        return view('item/welcome',[
            'items' => DB::table('items')
            ->orderBy('id','desc')
            ->get()
        ]);
    }

    public function create()
    {
        return view('item/create');
    }

    public function store(Request $request)
    {
        // Set up the form validation
        $validator = Validator::make(
            request()->all(),
            array(
                'name' => 'required|unique:items|string|max:255',
                'itemIconUrl' => 'required|string|max:255',
                'gameId' => 'required|exists:games,id|integer',
            )
        );
        if ($validator->fails()){
          return back()->withErrors($validator->errors())->withInput();
        }

        $item = new Item;
        $item->name = $request->input('name');
        $item->itemIconUrl = $request->input('itemIconUrl');
        $item->gameId = $request->input('gameId');
        $item->save();

        return redirect()
            ->route('item.index')
            ->with('success','Item created');
    }

    public function edit($id)
    {
        $item = DB::table('items')->find($id);

        return view('item/edit',['item' => $item]);
    }

    public function update(Request $request, $id)
    {
        // Set up the form validation
        $validator = Validator::make(
            request()->all(),
            array(
                'name' => 'required|string|max:255',
                'itemIconUrl' => 'required|string|max:255',
                'gameId' => 'required|exists:games,id|integer',
            )
        );
        if ($validator->fails()){
          return back()->withErrors($validator->errors())->withInput();
        }

        $item = Item::find($id);
        if ($item->name !== $request->name) {
            $existingItemWithName = Item::where('name', $request->input('name'))->first();
            if (!empty($existingItemWithName)) {
                $validator->getMessageBag()->add('name', 'The name has already been taken.');
                return back()->withErrors($validator->errors())->withInput();
            }
        }

        $item->name = $request->name;
        $item->itemIconUrl = $request->itemIconUrl;
        $item->gameId = $request->gameId;
        $item->save();

        return redirect()
            ->route('item.index')
            ->with('success','Item updated');
    }

    // not used for now
    // public function show($id)
    // {
    //     $item = DB::table('items')->find($id);

    //     return view('show',['item' => $item]);
    // }

    public function destroy($id)
    {
        DB::table('items')->where('id',$id)->delete();

        return redirect()
            ->route('item.index')
            ->with('success','Item deleted');
    }
}
