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
                <div class="panel-heading"> <h4>Tes matchs</h4></div>
                <div class="panel-body">
                	@foreach($user->game as $key => $game)
                		@if($game->domicile == 1)
		                    <div class="row">
		                    	<div class="col-md-2">{{ $game->date }}</div>
		                    	<div class="col-md-3 game-clubmine">{{ $user->club->nom }}</div>
								<div class="col-md-1">vs</div>
		                    	<div class="col-md-3">{{ $game->name_adverse }}</div>
		                    	<div class="col-md-3">
		                    		@if($game->date < date('Y-m-d'))
		                    			<a href="{{ URL::action('GameController@analyse', array($game->id, $user->id)) }}"><button class="homepage-btn">Analyser mon match</button></a>
		                    		@else
		                    			<a href="#"><button style="background-color:#CCC;cursor:initial" class="homepage-btn">Analyser mon match</button></a>
		                    		@endif
		                    	</div>
		                    </div>
		                    <br>
		                @else
							<div class="row">
		                    	<div class="col-md-2">{{ $game->date }}</div>
		                    	<div class="col-md-3">{{ $game->name_adverse }}</div>
		                    	<div class="col-md-1">vs</div>
		                    	<div class="col-md-3 game-clubmine">{{ $user->club->nom }}</div>
		                    	<div class="col-md-3">
		                    		@if($game->date < date('Y-m-d'))
		                    			<a href="{{ URL::action('GameController@analyse', array($game->id, $user->id)) }}"><button class="homepage-btn">Analyser mon match</button></a>
		                    		@else
		                    			<a href="#"><button style="background-color:#CCC;cursor:initial" class="homepage-btn">Analyser mon match</button></a>
		                    		@endif
		                    	</div>
		                    </div>
		                    <br>
		                @endif
	                @endforeach
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