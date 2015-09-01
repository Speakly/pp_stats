<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use App\User;
use App\Game;
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
                $gamesPast = Game::where('club_id', $user['club_id'])->whereRaw('date < Now()')->get();
                $nextGame = Game::where('club_id', $user['club_id'])->whereRaw('date > Now()')->orderBy('created_at', 'DESC')->take(1)->first();
                $statistiques = Statistiques::where('user_id', $user['id'])->get();
                $statsLastGame = Statistiques::where('user_id', $user['id'])->orderBy('created_at', 'DESC')->take(1)->first();

                $x = 1;
                $stats = array();
                $count = count($statistiques) -1;

                if($count == 0){
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
                        $stats['minutes'] = $statistiques[$i]['minutes'] + $statistiques[$x]['minutes'];
                        $stats['passes'] = $statistiques[$i]['passe'] + $statistiques[$x]['passe'];
                        $stats['points'] = $statistiques[$i]['points'] + $statistiques[$x]['points'];
                        $stats['trois_points'] = $statistiques[$i]['trois_points'] + $statistiques[$x]['trois_points'];
                        $stats['titulaire'] = $statistiques[$i]['titulaire'] + $statistiques[$x]['titulaire'];
                        $stats['lancer_franc'] = $statistiques[$i]['lancer_franc'] + $statistiques[$x]['lancer_franc'];
                        $stats['rebonds'] = $statistiques[$i]['rebonds'] + $statistiques[$x]['rebonds'];
                        $stats['interceptions'] = $statistiques[$i]['insterceptions'] + $statistiques[$x]['insterceptions'];
                        $stats['fautes'] = $statistiques[$i]['fautes'] + $statistiques[$x]['fautes'];
                        $stats['victoire'] = $statistiques[$i]['victoire'] + $statistiques[$x]['victoire'];
                        $x ++;
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
            dd($victory);
            return view ('timeline.home', compact('user', 'games', 'stats', 'statsLastGame', 'victory', 'gamesPast', 'nextGame'));
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

                $x = 1;
                $stats = array();
                $count = count($statistiques) -1;
                
                if($count == 0){
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
                
                
                else {
                    $s = 1;
                    for($i=0;$i<$count;$i++){
                        $stats['minutes'] = $statistiques[$i]['minutes'] + $statistiques[$x]['minutes'];
                        $stats['passes'] = $statistiques[$i]['passe'] + $statistiques[$x]['passe'];
                        $stats['points'] = $statistiques[$i]['points'] + $statistiques[$x]['points'];
                        $stats['trois_points'] = $statistiques[$i]['trois_points'] + $statistiques[$x]['trois_points'];
                        $stats['titulaire'] = $statistiques[$i]['titulaire'] + $statistiques[$x]['titulaire'];
                        $stats['lancer_franc'] = $statistiques[$i]['lancer_franc'] + $statistiques[$x]['lancer_franc'];
                        $stats['rebonds'] = $statistiques[$i]['rebonds'] + $statistiques[$x]['rebonds'];
                        $stats['interceptions'] = $statistiques[$i]['insterceptions'] + $statistiques[$x]['insterceptions'];
                        $stats['fautes'] = $statistiques[$i]['fautes'] + $statistiques[$x]['fautes'];
                        $stats['victoire'] = $statistiques[$i]['victoire'] + $statistiques[$x]['victoire'];
                        $evalSomme = $statistiques[$i]['evaluation'] + $statistiques[$x]['evaluation'];
                        $evalTotal = $s + 1;
                        $stats['evaluation'] = $evalSomme / $evalTotal;
                        $x ++;
                    }
                }
            } 
            else {
                $user = User::find(Auth::id());
                $games = null;
                $gamesPast = null;
                $nextGame = null;
            }
            $victory = 1;
            return view ('statistiques.index', compact('user', 'games', 'statistiques', 'stats', 'statsLastGame', 'victory', 'gamesPast', 'nextGame'));
        }
        else return Redirect::action('PageController@index');

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
