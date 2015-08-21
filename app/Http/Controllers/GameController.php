<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Game;
use App\User;
use Input;
use Redirect;
use Auth;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Auth::
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = Input::all();
        $id = $data['user_id'];
        $date = date("Y-m-d", strtotime($data['date']));
        $data = array(
                "club_id" => $data['club_id_user'],
                "domicile" => $data['domicile'],
                "game_team_id_1" => $data['club_id_user'],
                "game_team_id_2" => $data['club_id'],
                "name_adverse" => $data['club_adverse'],
                "date" => $date        
        );
        $game = Game::create($data);

        return Redirect::action('GameController@show', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::with(array('Game' => function($query)
        {
            $query->orderBy('date', 'ASC');
        }))->find($id);
        
        return view('game.show', compact('user'));
    }

    public function analyse($id, $userId){
        $user = User::with('club')->find($userId);
        $game = Game::find($id);
        return view('game.analyse', compact('user', 'game'));
    }

    public function addAnalyse(){
        $data = Input::all();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
