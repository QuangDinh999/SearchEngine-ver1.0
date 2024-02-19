<?php

namespace App\Http\Controllers;

use App\Models\HistoryChat;
use App\Http\Requests\StoreHistoryChatRequest;
use App\Http\Requests\UpdateHistoryChatRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HistoryChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search_word = $request->input('search_word');
        $content = $request->input('history');
        $history = Session::get('history', []);
        $array = [];
        $array =Arr::add($array, 'search_word', $search_word);
        $array =Arr::add($array, 'content', $content);

        $history[] = $array;
        Session::put('history', $history);
        $items = Session::get('history');
        if (Session::has('history')) {
            return response()->json($items);
        }else{
            return response()->json(['success' => false]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHistoryChatRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(HistoryChat $historyChat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistoryChat $historyChat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHistoryChatRequest $request, HistoryChat $historyChat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistoryChat $historyChat)
    {
        Session::flush();
        return Redirect::back();
    }
}
