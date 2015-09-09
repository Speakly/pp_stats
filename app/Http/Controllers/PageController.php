<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use App\User;
use App\Game;
use App\Post;
use App\Statistiques;
use Input;
use Validator;
use Response;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('index');
    }
    public function home()
    {
        return view('home');
    }

    public function timeline($name, $surname) {

        if(Auth::id()){
            $user = User::with('game')->find(Auth::id());
            if(isset($user->game)){

                $games = count($user->game);
                $gamesPast = Game::where('club_id', $user['club_id'])->whereRaw('date < Now()')->orderBy('created_at', 'DESC')->get();
                $nextGame = Game::where('club_id', $user['club_id'])->whereRaw('date > Now()')->orderBy('created_at', 'DESC')->take(1)->first();
                $statistiques = Statistiques::where('user_id', $user['id'])->get();
                $statsLastGame = Statistiques::where('user_id', $user['id'])->orderBy('created_at', 'DESC')->take(1)->first();
                $post = Post::where('user_id', $user['id'])->orderBy('created_at', 'DESC')->get();

                // construction tableau games passés
                $g = array();
                $a = count($gamesPast);
                for($i=0;$i<$a;$i++)
                {
                  $g[$i]['name_adverse'] = $gamesPast[$i]['name_adverse'];
                  $g[$i]['domicile'] = $gamesPast[$i]['domicile'];
                  $g[$i]['score_user'] = $gamesPast[$i]['score_user'];
                  $g[$i]['score_adverse'] = $gamesPast[$i]['score_adverse'];
                  $g[$i]['date'] = $gamesPast[$i]['date'];
                  $g[$i]['victoire'] = $gamesPast[$i]['victoire'];
                  $g[$i]['done'] = $gamesPast[$i]['done'];
                  $g[$i]['created_at'] = $gamesPast[$i]['created_at']->getTimestamp();
                }

                // construction d'un tableau des posts pour merger avec les ajouts d'analyse de match
                $p = array();
                $c = count($post);
                for($i=0;$i<$c;$i++)
                {
                  $p[$i]['user_id'] = $post[$i]['user_id'];
                  $p[$i]['message'] = $post[$i]['message'];
                  $p[$i]['picture_url'] = $post[$i]['picture_url'];
                  $p[$i]['created_at'] = $post[$i]['created_at']->getTimestamp();
                }


                // merge des 2 tableaux
                $x = array_merge($g, $p);
                // trie par date décroissante
                usort($x, function($a, $b) {
                    return $b['created_at'] - $a['created_at'] ;
                });

                $stats = array(
                    'minutes' => '',
                    'passes' => '',
                    'points' => '',
                    'trois_points' => '',
                    'titulaire' => '',
                    'lancer_franc' => '',
                    'rebonds' => '',
                    'interceptions' => '',
                    'fautes' => '',
                    'victoire' => '',
                    'evaluation' => ''
                    );
                $count = count($statistiques);

                if($count == 0 && empty($statistiques)){
                    $stats['minutes'] = $statistiques[0]['minutes'];
                    $stats['passes'] = $statistiques[0]['passe'];
                    $stats['points'] = $statistiques[0]['points'];
                    $stats['trois_points'] = $statistiques[0]['trois_points'];
                    $stats['titulaire'] = $statistiques[0]['titulaire'];
                    $stats['lancer_franc'] = $statistiques[0]['lancer_franc'];
                    $stats['rebonds'] = $statistiques[0]['rebonds'];
                    $stats['interceptions'] = $statistiques[0]['insterceptions'];
                    $stats['fautes'] = $statistiques[0]['fautes'];
                    $stats['victoire'] = $statistiques[0]['victoire'];
                }

                else {
                    for($i=0;$i<$count;$i++){
                        $stats['minutes'] += $statistiques[$i]['minutes'];
                        $stats['passes'] += $statistiques[$i]['passe'];
                        $stats['points'] += $statistiques[$i]['points'];
                        $stats['trois_points'] += $statistiques[$i]['trois_points'];
                        $stats['titulaire'] += $statistiques[$i]['titulaire'];
                        $stats['lancer_franc'] += $statistiques[$i]['lancer_franc'];
                        $stats['rebonds'] += $statistiques[$i]['rebonds'];
                        $stats['interceptions'] += $statistiques[$i]['insterceptions'];
                        $stats['fautes'] += $statistiques[$i]['fautes'];
                        $stats['victoire'] += $statistiques[$i]['victoire'];
                    }
                }

            }
            else {
                $user = User::find(Auth::id());
                $games = null;
                $gamesPast = null;
                $nextGame = null;
            }
            $victory = $stats['victoire'];
            return view ('timeline.home', compact('user', 'x', 'games', 'post', 'stats', 'statsLastGame', 'victory', 'gamesPast', 'nextGame'));
        }
        else return Redirect::action('PageController@index');

    }

    public function addGame($id, $page = 'game'){
        $user = User::with('Club')->find($id);

        return view ('game.index', compact('user', 'page'));
    }

    public function logout() {
	   Auth::logout();
	   return Redirect::action('PageController@index');
    }

    public function postUpload(){
        $input = Input::all();
        $user = User::find($input['id']);
        //logo
        if(isset($input['logo'])){
            $rules = array(
                'logo' => 'image|max:3000',
            );
            $validation = Validator::make($input, $rules);

            if ($validation->fails())
            {
                return Response::make($validation->errors->first(), 400);
            }
            $file = Input::file('logo');
            $extension =$file->getClientOriginalExtension();
            $directory = public_path().'/images/logos/';
            $filename = $user->id.".{$extension}";

        }

        //photo
        elseif(isset($input['photo1']) || isset($input['photo2']) || isset($input['photo3']) || isset($input['photo4'])){
            $file = Input::file('photo'.$input['id_photo']);
            $extension =$file->getClientOriginalExtension();
            $directory = public_path().'/photos/';
            $filename = $user->id."_".$input['id_photo'].".{$extension}";

        }



            $upload_success = $file->move($directory, $filename);
            if( $upload_success ) {
                return Response::json('success', 200);
            } else {
                return Response::json('error', 400);
            }

    }

    public function statistiques($id)
    {

        if(Auth::id()){
            $user = User::with('game')->find(Auth::id());
            if(isset($user->game)){
                $games = count($user->game);
                $gamesPast = Game::where('club_id', $user['club_id'])->whereRaw('date < Now()')->get();
                $nextGame = Game::where('club_id', $user['club_id'])->whereRaw('date > Now()')->orderBy('created_at', 'DESC')->take(1)->first();
                $statistiques = Statistiques::with('game')->where('user_id', $user['id'])->get();
                $statsLastGame = Statistiques::where('user_id', $user['id'])->orderBy('created_at', 'DESC')->take(1)->first();

                $victoire = array(
                  'victoire' => ''
                );
                $c = count($gamesPast);
                // count victoire
                for($i=0;$i<$c;$i++)
                {
                  $victoire['victoire'] += $gamesPast[$i]['victoire'];
                }

                $stats = array(
                    'minutes' => '',
                    'passes' => '',
                    'points' => '',
                    'trois_points' => '',
                    'titulaire' => '',
                    'lancer_franc' => '',
                    'rebonds' => '',
                    'interceptions' => '',
                    'fautes' => '',
                    'victoire' => '',
                    'evaluation' => ''
                    );

                $count = count($statistiques);
                if(empty($statistiques)) {
                    if($count == 0 ){
                        $stats['minutes'] = $statistiques[0]['minutes'];
                        $stats['passes'] = $statistiques[0]['passe'];
                        $stats['points'] = $statistiques[0]['points'];
                        $stats['trois_points'] = $statistiques[0]['trois_points'];
                        $stats['titulaire'] = $statistiques[0]['titulaire'];
                        $stats['lancer_franc'] = $statistiques[0]['lancer_franc'];
                        $stats['rebonds'] = $statistiques[0]['rebonds'];
                        $stats['interceptions'] = $statistiques[0]['insterceptions'];
                        $stats['fautes'] = $statistiques[0]['fautes'];
                        $stats['victoire'] = $statistiques[0]['victoire'];
                        $stats['evaluation'] = $statistiques[0]['evaluation'];
                    }

              }
              else {
                for($i=0;$i<$count;$i++){
                  $stats['minutes'] += $statistiques[$i]['minutes'];
                  $stats['passes'] += $statistiques[$i]['passe'];
                  $stats['points'] += $statistiques[$i]['points'];
                  $stats['trois_points'] += $statistiques[$i]['trois_points'];
                  $stats['titulaire'] += $statistiques[$i]['titulaire'];
                  $stats['lancer_franc'] += $statistiques[$i]['lancer_franc'];
                  $stats['rebonds'] += $statistiques[$i]['rebonds'];
                  $stats['interceptions'] += $statistiques[$i]['insterceptions'];
                  $stats['fautes'] += $statistiques[$i]['fautes'];
                  $stats['victoire'] += $statistiques[$i]['victoire'];
                  $stats['evaluation'] += $statistiques[$i]['evaluation'];
                }
                $stats['evaluation'] = round($stats['evaluation'] / $count, 1);
              }
            }
            else {
                $user = User::find(Auth::id());
                $games = null;
                $gamesPast = null;
                $nextGame = null;
            }
            return view ('statistiques.index', compact('user', 'games', 'victoire', 'statistiques', 'stats', 'statsLastGame', 'gamesPast', 'nextGame'));
        }
        else return Redirect::action('PageController@index');

    }

    public function post()
    {
      $data = Input::all();
      $post = Post::create($data);

      return Redirect::action('PageController@timeline');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
        //
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
