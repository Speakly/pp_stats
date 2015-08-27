<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Game;
use App\User;
use App\Statistiques;
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
        $games = count($user->game);
        $victory = 1;
        $gamesPast = Game::where('club_id', $user['club_id'])->whereRaw('date < Now()')->get();
        $nextGame = Game::where('club_id', $user['club_id'])->whereRaw('date > Now()')->orderBy('created_at', 'DESC')->take(1)->first();
        
        return view('game.showGame', compact('user', 'games', 'victory', 'gamesPast', 'nextGame'));
    }

    public function analyse($id, $userId){
        $user = User::with('club')->find($userId);
        $game = Game::find($id);
        $games = count($user->game);
        $victory = 1;
        $gamesPast = Game::where('club_id', $user['club_id'])->whereRaw('date < Now()')->get();
        $nextGame = Game::where('club_id', $user['club_id'])->whereRaw('date > Now()')->orderBy('created_at', 'DESC')->take(1)->first();
        return view('game.addAnalyse', compact('user', 'game', 'games', 'victory', 'gamesPast', 'nextGame'));
    }

    public function addAnalyse(){
        $data = Input::all();

        // Victoire ou pas
        if($data['score_user'] > $data['score_adverse'])
            $victoire = 1;
        elseif($data['score_user'] < $data['score_adverse']) 
            $victoire = 0;
        else
        $victoire = 3;

        // Titulaire ou pas
        if($data['cinq_majeur'] == 1)
            $titulaire = 1;
        else $titulaire = 0;

        // Ajout des data précédentes pour BDD
        $data = array_add($data, 'victoire', $victoire);
        $data = array_add($data, 'titulaire', $titulaire);

        $analyse = Statistiques::create($data);
        
        // Si stats remplis game done vaut 1
        if($analyse){
            $game = Game::find($data['game_id']);
            $game->done = 1;
            $game->save();
        }
        

        // Pour redirection timeline with param name / surname
        $name = $data['name'];
        $surname = $data['surname'];

        return Redirect::action('PageController@timeline', compact('name', 'surname'));
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
