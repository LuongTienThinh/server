<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Games;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = Games::find($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getListGame()
    {
        $data = Games::all();
        return response()->json($data);
    }

    public function getScoresByUser($user_id, $game_id)
    {
        $data = DB::table('user_game')
        ->join('users', 'users.id', '=', 'user_game.user_id')
        ->join('games', 'games.id', '=', 'user_game.game_id')
        ->where('users.id', $user_id)
        ->where('games.id', $game_id)
        ->get();
        return response()->json($data);
    }

    public function getSccoresOfAllUsers($game_id)
    {
        $data = DB::table('user_game')
        ->join('games', 'games.id', '=', 'user_game.game_id')
        ->where('games.id', $game_id)
        ->orderBy('score')
        ->take(10)
        ->get();
        return response()->json($data);
    }
}