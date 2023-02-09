<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserItem;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserItemsController extends Controller
{
    /**
     * getList
     */
    public function getList(Request $request): View
    {
        $user = auth()->user();
        $userItems = DB::table('user_items')
         ->leftJoin('items', 'user_items.itemId', '=', 'items.id')
         ->leftJoin('games', 'items.gameId', '=', 'games.id')
         ->where('userId', $user->id)
         ->get();

        return view('index', [
             'userItems' => $userItems,
         ]);
    }

    /**
     * grantItems
     */
    public function grantItems(Request $request): View
    {
        return view('grant-items', [
         ]);
    }

    /**
     * store
     */
    public function store(Request $request)
    {
        // Set up the form validation
        $validator = Validator::make(
            request()->all(),
            array(
                "userId" => "required|exists:users,id",
                "itemId" => "required|exists:items,id",
                "amount" => "required|integer|between:1,10"
            )
        );
        if ($validator->fails()){
          return back()->withErrors($validator->errors())->withInput();
        }

        $userItem = UserItem::where('userId', $request->input('userId'))->where('itemId', $request->input('itemId'))->first();
        if (!empty($userItem)) {
            $userItem->amount = $userItem->amount + $request->input('amount');
        } else {
            $userItem = new UserItem;
            $userItem->userId = $request->input('userId');
            $userItem->itemId = $request->input('itemId');
            $userItem->amount = $request->input('amount');
        }

        if ($userItem->amount > 10) {
            $validator->getMessageBag()->add('amount', 'Limit is 10');
            return back()->withErrors($validator->errors())->withInput();
        }

        $userItem->save();

        return redirect()->route('user-items.get-list');
    }

    /**
     * consume
     */
    public function consume(Request $request)
    {
        // Set up the form validation
        $validator = Validator::make(
            request()->all(),
            array(
                "userId" => "required|exists:users,id",
                "itemId" => "required|exists:items,id",
                "amount" => "required|integer|between:1,10"
            )
        );
        if ($validator->fails()){
          return back()->withErrors($validator->errors())->withInput();
        }

        $userItem = UserItem::where('userId', $request->input('userId'))->where('itemId', $request->input('itemId'))->first();
        $amount = $userItem->amount - $request->input('amount');
        if ($amount <= 0) {
            $userItem->delete();
        } else {
            $userItem->amount = $amount;
            $userItem->save();
        }

        return redirect()->route('user-items.get-list');
    }

    /**
     * consumeItems
     */
    public function consumeItems(Request $request): View
    {
        return view('consume-items', [
         ]);
    }
}
