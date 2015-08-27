@extends('layouts.index')

@section('css')
@stop

@section('content')
	<!-- content -->                     
    <div class="row">
        

            @include('layouts.game-nav')

        </div>

        <!-- main col right -->
        <div id="main-center" class="col-sm-5 col-xs-5 col-md-9 col-lg-7">
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
                    	<div id="analyse-content" class="row text-center">
                            <div class="col-md-3">
                                <div id="analyse-stats">
                                    <div class="form-group row">
                                        <label class="col-sm-6 control-label" for="minutes">Minutes joués</label>
                                        <div class="col-sm-5 col-lg-4">
                                            {!! Form::text('minutes', null, ['class' => 'form-control', 'id' => 'minutes']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 control-label">Points</label>
                                        <div class="col-sm-5 col-lg-4">
                                            {!! Form::text('points', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 control-label">3 Points</label>
                                        <div class="col-sm-5 col-lg-4">
                                            {!! Form::text('threepoints', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 control-label">Lancers francs</label>
                                        <div class="col-sm-5 col-lg-4">
                                            {!! Form::text('lancerfrancs', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    
                                    

                                </div>

                            </div>
                            <div class="col-md-6"><img class="basket-ground" src="{{ URL::asset('assets/images/basket_ground.jpg')}}"></div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <div class="col-sm-5 col-lg-4">
                                            {!! Form::text('passes', null, ['class' => 'form-control']) !!}
                                        </div>
                                        <label class="col-sm-6 control-label">Passes décisives</label>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-5 col-lg-4">
                                            {!! Form::text('rebonds', null, ['class' => 'form-control']) !!}
                                        </div>
                                        <label class="col-sm-6 control-label">Rebonds</label>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-5 col-lg-4">
                                            {!! Form::text('interceptions', null, ['class' => 'form-control']) !!}
                                        </div>
                                        <label class="col-sm-6 control-label">Interceptions</label>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-5 col-lg-4">
                                            {!! Form::text('fautes', null, ['class' => 'form-control']) !!}
                                        </div>
                                        <label class="col-sm-6 control-label">Fautes</label>
                                    </div>
                            </div>
                        </div>
                        <div class="row text-center form-group" id="analyse-button">
                            <div class="col-sm-12">
                                <a href="{{ URL::action('GameController@addAnalyse', array($game->id, $user->id)) }}">
                                    <button class="homepage-btn">Analyser mon match</button>
                                </a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div><!--/row-->

@stop

@section('scripts')
     
@stop