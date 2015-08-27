@extends('layouts.index')

@section('css')
@stop

@section('content')
	<!-- content -->                     
    <div class="row">
       

            @include('layouts.game-nav')
            
        </div>

        <!-- main col right -->
        <div id="main-center" class="col-sm-8 col-xs-12 col-md-9 col-lg-7">
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
		                    		@if($game->date < date('Y-m-d') && $game->done != 1)
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
		                    		@if($game->date < date('Y-m-d') && $game->done != 1)
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
        
    </div><!--/row-->

@stop

@section('scripts')
     
@stop