<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vocabulary;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VocabularyController extends Controller
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

    public function getNotesByUser($user_id)
    {
        $data = DB::table('note_word')
            ->join('users', 'note_word.user_id', '=', 'users.id')
            ->where('users.id', $user_id)
            ->get();
        return response()->json($data);
    }

    public function addNotesWordByUser($user_id, $word_id)
    {
        DB::table('note_word')->insert(['user_id' => $user_id, 'word_id' => $word_id]);
    }

    public function addNotesIrregularByUser($user_id, $irregular_id)
    {
        DB::table('note_word')->insert(['user_id' => $user_id, 'irregular_id' => $irregular_id]);
    }

    public function wordEnglish()
    {
        $data = DB::table('word_english')->get()->toArray();
        $data = array_map(function ($element) {
            return $element->word;
        }, $data);
        $data = array_filter($data, function ($element) {
            return !strpos($element, "'s");
        });
        $result = [];
        foreach ($data as $key => $value) {
            array_push($result, $value);
        }
        return response()->json(array_slice($result, 00, 100));
    }
}