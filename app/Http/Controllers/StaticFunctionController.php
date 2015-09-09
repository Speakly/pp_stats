<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StaticFunctionController extends Controller
{

    public function stats()
    {
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

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
