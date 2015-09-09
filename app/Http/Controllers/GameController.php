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
        $statistiques = Statistiques::with('game')->where('user_id', $user['id'])->get();
        $gamesPast = Game::where('club_id', $user['club_id'])->whereRaw('date < Now()')->get();
        $nextGame = Game::where('club_id', $user['club_id'])->whereRaw('date > Now()')->orderBy('created_at', 'DESC')->take(1)->first();

        $victoire = array(
          'victoire' => ''
        );
        $c = count($gamesPast);
        // count victoire
        for($i=0;$i<$c;$i++)
        {
          $victoire['victoire'] += $gamesPast[$i]['victoire'];
        }

        return view('game.showGame', compact('user', 'stats', 'games', 'victoire', 'gamesPast', 'nextGame'));
    }

    public function analyse($id, $userId){
        $user = User::with('club')->find($userId);
        $game = Game::find($id);
        $games = count($user->game);
        $victory = 1;
        $gamesPast = Game::where('club_id', $user['club_id'])->whereRaw('date < Now()')->get();
        $nextGame = Game::where('club_id', $user['club_id'])->whereRaw('date > Now()')->orderBy('created_at', 'DESC')->take(1)->first();
        $victoire = array(
          'victoire' => ''
        );
        $c = count($gamesPast);
        // count victoire
        for($i=0;$i<$c;$i++)
        {
          $victoire['victoire'] += $gamesPast[$i]['victoire'];
        }


        return view('game.addAnalyse', compact('user', 'game', 'games', 'victoire', 'gamesPast', 'nextGame'));
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

        // Calcul de l'évaluation
        $poste = $data['poste'];
        $note = 0;
            // Si meneur
            if($poste = "Meneur"){

                // Victoire
                if($victoire = 1) $note = $note + 5;

                // Minutes joués
                if($data['minutes'] <= 10) $note = $note + 1;
                if($data['minutes'] > 10 && $data['minutes'] <= 20) $note = $note + 2;
                if($data['minutes'] > 20 && $data['minutes'] <= 30) $note = $note + 3;
                if($data['minutes'] > 30 && $data['minutes'] <= 40) $note = $note + 4;

                // Points
                if($data['points'] <= 10) $note = $note + 1;
                if($data['points'] > 10 && $data['points'] <= 15) $note = $note + 2;
                if($data['points'] > 15 && $data['points'] <= 20) $note = $note + 3;
                if($data['points'] > 20) $note = $note + 4;

                // 3 points
                if($data['trois_points'] > 0 && $data['trois_points'] <= 5) $note = $note + 1;
                if($data['trois_points'] > 5 && $data['trois_points'] <= 10) $note = $note + 2;
                if($data['trois_points'] > 10) $note = $note + 5;

                // cinq majeur
                if($data['cinq_majeur'] == 1) $note = $note + 1;

                // lancer franc
                if($data['lancer_franc'] == 1) $note = $note + 0.25;
                if($data['lancer_franc'] == 2) $note = $note + 0.50;
                if($data['lancer_franc'] == 3) $note = $note + 1;
                if($data['lancer_franc'] > 3) $note = $note + 2;

                // Rebonds
                if($data['rebonds'] > 0 && $data['rebonds'] < 10) $note = $note + 2;
                if($data['rebonds'] > 10) $note = $note + 2;

                // Interceptions
                if($data['interceptions'] > 0 && $data['interceptions'] < 10) $note = $note + 1;
                if($data['interceptions'] >= 10 && $data['interceptions'] < 15) $note = $note + 2;
                if($data['interceptions'] > 15) $note = $note + 3;

                // Fautes
                if($data['fautes'] > 0 && $data['fautes'] <= 3) $note = $note - 0.5;
                if($data['fautes'] == 4) $note = $note - 1;
                if($data['fautes'] > 4) $note = $note - 4;

                // Passes
                if($data['passe'] > 0 && $data['passe'] <= 5) $note = $note + 2;
                if($data['passe'] > 5 && $data['passe'] <= 10) $note = $note + 3;
                if($data['passe'] > 10 && $data['passe'] <= 15) $note = $note + 4;
                if($data['passe'] > 15) $note = $note + 5;

                $data = array_add($data, 'evaluation', $note);

            }
            // Si arriere
            elseif($poste = "Arriere") {
                 // Victoire
                if($victoire = 1) $note = $note + 5;

                // Minutes joués
                if($data['minutes'] <= 10) $note = $note + 1;
                if($data['minutes'] > 10 && $data['minutes'] <= 20) $note = $note + 2;
                if($data['minutes'] > 20 && $data['minutes'] <= 30) $note = $note + 3;
                if($data['minutes'] > 30 && $data['minutes'] <= 40) $note = $note + 4;

                // Points
                if($data['points'] <= 10) $note = $note + 1;
                if($data['points'] > 10 && $data['points'] <= 15) $note = $note + 2.5;
                if($data['points'] > 15 && $data['points'] <= 20) $note = $note + 3.5;
                if($data['points'] > 20) $note = $note + 4;

                // 3 points
                if($data['trois_points'] > 0 && $data['trois_points'] <= 5) $note = $note + 1.5;
                if($data['trois_points'] > 5 && $data['trois_points'] <= 10) $note = $note + 2.5;
                if($data['trois_points'] > 10) $note = $note + 6;

                // cinq majeur
                if($data['cinq_majeur'] == 1) $note = $note + 1;

                // lancer franc
                if($data['lancer_franc'] == 1) $note = $note + 0.25;
                if($data['lancer_franc'] == 2) $note = $note + 0.50;
                if($data['lancer_franc'] == 3) $note = $note + 1;
                if($data['lancer_franc'] > 3) $note = $note + 2;

                // Rebonds
                if($data['rebonds'] > 0 && $data['rebonds'] < 10) $note = $note + 2;
                if($data['rebonds'] > 10) $note = $note + 2;

                // Interceptions
                if($data['interceptions'] > 0 && $data['interceptions'] < 10) $note = $note + 1;
                if($data['interceptions'] >= 10 && $data['interceptions'] < 15) $note = $note + 2;
                if($data['interceptions'] > 15) $note = $note + 3;

                // Fautes
                if($data['fautes'] > 0 && $data['fautes'] <= 3) $note = $note - 0.5;
                if($data['fautes'] == 4) $note = $note - 1;
                if($data['fautes'] > 4) $note = $note - 4;

                // Passes
                if($data['passe'] > 0 && $data['passe'] <= 5) $note = $note + 2;
                if($data['passe'] > 5 && $data['passe'] <= 10) $note = $note + 3;
                if($data['passe'] > 10 && $data['passe'] <= 15) $note = $note + 4;
                if($data['passe'] > 15) $note = $note + 5;

                $data = array_add($data, 'evaluation', $note);
            }
            // Si pivot
            elseif($poste = "Pivot") {
                 // Victoire
                if($victoire = 1) $note = $note + 5;

                // Minutes joués
                if($data['minutes'] <= 10) $note = $note + 1;
                if($data['minutes'] > 10 && $data['minutes'] <= 20) $note = $note + 2;
                if($data['minutes'] > 20 && $data['minutes'] <= 30) $note = $note + 3;
                if($data['minutes'] > 30 && $data['minutes'] <= 40) $note = $note + 4;

                // Points
                if($data['points'] <= 10) $note = $note + 1;
                if($data['points'] > 10 && $data['points'] <= 15) $note = $note + 2;
                if($data['points'] > 15 && $data['points'] <= 20) $note = $note + 3;
                if($data['points'] > 20) $note = $note + 4;

                // 3 points
                if($data['trois_points'] > 0 && $data['trois_points'] <= 5) $note = $note + 1;
                if($data['trois_points'] > 5 && $data['trois_points'] <= 10) $note = $note + 2;
                if($data['trois_points'] > 10) $note = $note + 5;

                // cinq majeur
                if($data['cinq_majeur'] == 1) $note = $note + 1;

                // lancer franc
                if($data['lancer_franc'] == 1) $note = $note + 0.25;
                if($data['lancer_franc'] == 2) $note = $note + 0.50;
                if($data['lancer_franc'] == 3) $note = $note + 1;
                if($data['lancer_franc'] > 3) $note = $note + 2;

                // Rebonds
                if($data['rebonds'] > 0 && $data['rebonds'] < 10) $note = $note + 2.5;
                if($data['rebonds'] > 10) $note = $note + 3.5;

                // Interceptions
                if($data['interceptions'] > 0 && $data['interceptions'] < 10) $note = $note + 1;
                if($data['interceptions'] >= 10 && $data['interceptions'] < 15) $note = $note + 2;
                if($data['interceptions'] > 15) $note = $note + 3;

                // Fautes
                if($data['fautes'] > 0 && $data['fautes'] <= 3) $note = $note - 0.5;
                if($data['fautes'] == 4) $note = $note - 1;
                if($data['fautes'] > 4) $note = $note - 4;

                // Passes
                if($data['passe'] > 0 && $data['passe'] <= 5) $note = $note + 2;
                if($data['passe'] > 5 && $data['passe'] <= 10) $note = $note + 3;
                if($data['passe'] > 10 && $data['passe'] <= 15) $note = $note + 4;
                if($data['passe'] > 15) $note = $note + 5;

                $data = array_add($data, 'evaluation', $note);
            }
            // Si ailier || ailier fort
            else {
                 // Victoire
                if($victoire = 1) $note = $note + 5;

                // Minutes joués
                if($data['minutes'] <= 10) $note = $note + 1;
                if($data['minutes'] > 10 && $data['minutes'] <= 20) $note = $note + 2;
                if($data['minutes'] > 20 && $data['minutes'] <= 30) $note = $note + 3;
                if($data['minutes'] > 30 && $data['minutes'] <= 40) $note = $note + 4;

                // Points
                if($data['points'] <= 10) $note = $note + 1;
                if($data['points'] > 10 && $data['points'] <= 15) $note = $note + 2;
                if($data['points'] > 15 && $data['points'] <= 20) $note = $note + 3;
                if($data['points'] > 20) $note = $note + 4;

                // 3 points
                if($data['trois_points'] > 0 && $data['trois_points'] <= 5) $note = $note + 1;
                if($data['trois_points'] > 5 && $data['trois_points'] <= 10) $note = $note + 2;
                if($data['trois_points'] > 10) $note = $note + 5;

                // cinq majeur
                if($data['cinq_majeur'] == 1) $note = $note + 1;

                // lancer franc
                if($data['lancer_franc'] == 1) $note = $note + 0.25;
                if($data['lancer_franc'] == 2) $note = $note + 0.50;
                if($data['lancer_franc'] == 3) $note = $note + 1;
                if($data['lancer_franc'] > 3) $note = $note + 2;

                // Rebonds
                if($data['rebonds'] > 0 && $data['rebonds'] < 10) $note = $note + 2.5;
                if($data['rebonds'] > 10) $note = $note + 3.5;

                // Interceptions
                if($data['interceptions'] > 0 && $data['interceptions'] < 10) $note = $note + 1;
                if($data['interceptions'] >= 10 && $data['interceptions'] < 15) $note = $note + 2;
                if($data['interceptions'] > 15) $note = $note + 3;

                // Fautes
                if($data['fautes'] > 0 && $data['fautes'] <= 3) $note = $note - 0.5;
                if($data['fautes'] == 4) $note = $note - 1;
                if($data['fautes'] > 4) $note = $note - 4;

                // Passes
                if($data['passe'] > 0 && $data['passe'] <= 5) $note = $note + 2;
                if($data['passe'] > 5 && $data['passe'] <= 10) $note = $note + 3;
                if($data['passe'] > 10 && $data['passe'] <= 15) $note = $note + 4;
                if($data['passe'] > 15) $note = $note + 5;

                $data = array_add($data, 'evaluation', $note);
            }



        $analyse = Statistiques::create($data);

        // Si stats remplis game done vaut 1
        if($analyse){
            $game = Game::find($data['game_id']);
            $game->score_adverse = $data['score_adverse'];
            $game->score_user = $data['score_user'];
            $game->victoire = $victoire;
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
