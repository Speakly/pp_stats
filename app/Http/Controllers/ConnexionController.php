<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Input;
use Hash;
use Auth;
use Redirect;

class ConnexionController extends Controller
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

    public function inscription()
    {
        $data = Input::all();

        $pwd = Hash::make($data['password_inscription']);
        $dataUser = array(
          "name" => $data['name'],
          "surname" => $data['surname'],
          "email" => $data['email_inscription'],
          "password" => $pwd,
          "email_inscription" => $data['email_inscription'],
          "password_inscription" => $pwd
        );

        $validator = Validator::make($data, User::$rulesInscription);
		    if($validator->fails())
          return Redirect::action('PageController@index')->withInput()->withErrors($validator);

        $data = array(
          "name" => $dataUser['name'],
          "surname" => $dataUser['surname'],
          "email" => $dataUser['email_inscription'],
          "password" => $pwd
        );


        $user = User::create($data);

        return view('connexions.profile', compact('user'));

    }

    public function profile()
    {
        return view('connexions.profile', compact('user'));
    }

    public function updateProfile()
    {
        $data = Input::all();
        $birthday = Input::get('year').'-'.Input::get('month').'-'.Input::get('number');
        $data = array_add($data, 'birthday', $birthday);
        $id = $data['id'];
        $user = User::find($id);

        $validator = Validator::make($data, User::$rulesUpdate);
        if($validator->fails())
            return view('connexions.profile', compact('user')->withInput()->withErrors($validator));

        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->email = $data['email'];
        $user->taille = $data['taille'];
        $user->club_id = $data['club_id'];
        $user->poste = $data['poste'];
        $user->birthday = $data['birthday'];
        $user->save();

        $new = 'new';
        $identification = Auth::loginUsingId($user->id);
        return Redirect::action('PageController@timeline', compact('id', 'identification', 'new'));
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
    public function connexion(){
        $data = Input::all();
        $validator = Validator::make($data, User::$rules);
        if($validator->fails())
          return Redirect::action('PageController@index')->withInput()->withErrors($validator);


        if(Auth::attempt(array('email' => $data['email'], 'password' => $data['password']))){
            $user = User::find(Auth::id());
            $name = $user->name;
            $surname = $user->surname;
            return Redirect::action('PageController@timeline', compact('name', 'surname'));
        }
        else return Redirect::action('PageController@index')->withInput();
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
