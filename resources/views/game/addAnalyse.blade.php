@extends('layouts.index')

@section('css')
@stop

@section('content')
	<!-- content -->                     
    <div class="row">
        <!-- main col left -->
        <div class="col-sm-4 col-xs-4 col-md-3 col-lg-2">
            <div class="qw rd aof alt">
                <div class="qy"></div>
                <div class="qx dj text-center">
                    <a href="/application/profile/">
                        <img src="{{ URL::asset('images/logos/51.jpg') }}" class="aog">
                    </a>
                    <h5 class="qz">
                        <a href="/application/profile/" class="akt">Amaury Leproux</a>
                    </h5>
                    <p class="alt">{{ $user->poste }}, {{ $user->taille }}cm, joue au club <span style="font-weight:bold;">{{ $user->club->nom }}</span></p>
                    <ul class="aoh">
                        <li class="aoi">
                            <a data-toggle="modal" class="akt" href="#userModal">
                                Matchs
                                <h5 class="alh">{{ $games }}</h5>
                            </a>
                        </li>
                        <li class="aoi">
                            <a data-toggle="modal" class="akt" href="#userModal">
                                Victoires
                                <h5 class="alh">{{ $victory }}</h5>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4><i class="glyphicon glyphicon-star-empty"></i>Prochain match</h4></div>
                <div class="panel-body">
                    <div class="list-group">
                        <a href="http://bootply.com/tagged/datatable" class="list-group-item">{{$nextGame->name_adverse}}</a>
                  </div>
              </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4><i class="glyphicon glyphicon-star-empty"></i>Derniers matchs</h4></div>
                <div class="panel-body">
                    <div class="list-group">
                        @foreach($gamesPast as $gamePast)
                            <a href="#" class="list-group-item">{{$gamePast->name_adverse}}</a>
                        @endforeach
                  </div>
              </div>
            </div>
        </div>

        <!-- main col right -->
        <div id="main-center" class="col-sm-5 col-xs-5 col-md-6 col-lg-7">
            <div class="panel panel-default">
                <div class="panel-heading"> <h4>Analyse ton match</h4></div>
                <div class="panel-body">
                    {!! Form::open([
                        'method' => 'POST',
                        'action' => ['GameController@addAnalyse']
                        ]) 
                    !!}
                    <div id="analyse-score" class="row text-center form-group">
                        @if($game->domicile == 1)
                            <div class="col-md-4 game-clubmine">
                                {{ $user->club->nom }}
                            </div> 
                            <div class="col-md-2">
                                {!! Form::text('score_user', null, ['class' => 'form-control analyse-score', 'style' => 'float:right; width:40px']) !!}
                            </div>
                            
                            <div class="col-md-2">
                                {!! Form::text('score_adverse', null, ['class' => 'form-control analyse-score', 'style' => 'float:left; width:40px']) !!}
                            </div>
                            <div class="col-md-4 ">
                                {{ $game->name_adverse }}
                            </div>
                        @else
                            <div class="col-md-4">
                                {{ $game->name_adverse }}
                            </div> 
                            <div class="col-md-2">
                                {!! Form::text('score_adverse', null, ['class' => 'form-control analyse-score', 'style' => 'float:right; width:40px']) !!}
                            </div>
                            
                            <div class="col-md-2">
                                {!! Form::text('score_user', null, ['class' => 'form-control analyse-score', 'style' => 'float:left; width:40px']) !!}
                            </div>
                            <div class="col-md-4 game-clubmine">
                                {{ $user->club->nom }}
                            </div>
                        @endif
                    </div>
                    	<div class="row text-center">
                            <div class="col-md-3">
                                <div id="analyse-stats">
                                    <div class="form-group row">
                                        <label class="col-sm-6 control-label" for="minutes">Minutes joués</label>
                                        <div class="col-sm-4">
                                            {!! Form::text('minutes', null, ['class' => 'form-control', 'id' => 'minutes']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 control-label">Points</label>
                                        <div class="col-sm-4">
                                            {!! Form::text('points', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 control-label">3 Points</label>
                                        <div class="col-sm-4">
                                            {!! Form::text('threepoints', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 control-label">Lancers francs</label>
                                        <div class="col-sm-4">
                                            {!! Form::text('lancerfrancs', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    
                                    

                                </div>

                            </div>
                            <div class="col-md-6"><img class="basket-ground" src="{{ URL::asset('assets/images/basket_ground.jpg')}}"></div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                            {!! Form::text('passes', null, ['class' => 'form-control']) !!}
                                        </div>
                                        <label class="col-sm-6 control-label">Passes décisives</label>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {!! Form::text('rebonds', null, ['class' => 'form-control']) !!}
                                        </div>
                                        <label class="col-sm-6 control-label">Rebonds</label>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {!! Form::text('interceptions', null, ['class' => 'form-control']) !!}
                                        </div>
                                        <label class="col-sm-6 control-label">Interceptions</label>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {!! Form::text('fautes', null, ['class' => 'form-control']) !!}
                                        </div>
                                        <label class="col-sm-6 control-label">Fautes</label>
                                    </div>
                            </div>
                        </div>
                        <div class="row text-center form-group" id="analyse-button">
                            <div class="col-sm-12">
                                <a href="{{ URL::action('GameController@analyse', array($game->id, $user->id)) }}">
                                    <button class="homepage-btn">Analyser mon match</button>
                                </a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Statistiques</h4></div>
                <div class="panel-body">
                    <p>120 minutes<br>13 points<br>8 rebonds<br> 3 passes</p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Statistiques dernier match</h4></div>
                <div class="panel-body">
                    <div class="list-group">
                        <a href="http://bootply.com/tagged/modal" class="list-group-item">Minutes : </a>
                        <a href="http://bootply.com/tagged/datetime" class="list-group-item">Points :</a>
                        <a href="http://bootply.com/tagged/datatable" class="list-group-item">Passe :</a>
                        <a href="http://bootply.com/tagged/datatable" class="list-group-item">Rebonds :</a>
                        <a href="http://bootply.com/tagged/datatable" class="list-group-item">Résultat :</a>
                  </div>
              </div>
            </div>
        </div>
    </div><!--/row-->

@stop

@section('scripts')
     
@stop