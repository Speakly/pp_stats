@extends('layouts.default')

@section('css')
    
@stop

@section('content')

	
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner">

                @include('layouts.navbar')
                <div class="game-container">
                    <div class="panel panel-default analyse-panel-default">
                        <div class="row text-center">
                            <div class="col-md-8">
                                {!! Form::open([
                                    'method' => 'POST',
                                    'action' => ['GameController@addAnalyse']
                                    ]) 
                                !!}
                                    <div class="row form-group">
                                        @if($game->domicile == 1)
                                            <div class="col-md-5 game-clubmine">
                                                {{ $user->club->nom }}
                                                {!! Form::text('score_user', null, ['class' => 'form-control analyse-score', 'style' => 'float:right']) !!}
                                            </div>
                                            <div class="col-md-2">vs</div>
                                            <div class="col-md-5">
                                                {{ $game->name_adverse }}
                                                {!! Form::text('score_adverse', null, ['class' => 'form-control analyse-score', 'style' => 'float:left']) !!}
                                            </div>
                                        @else
                                            <div class="col-md-5">
                                                {{ $game->name_adverse }}
                                                {!! Form::text('score_adverse', null, ['class' => 'form-control analyse-score', 'style' => 'float:right']) !!}
                                            </div>
                                            <div class="col-md-2">vs</div>
                                            <div class="col-md-5 game-clubmine">
                                                {{ $user->club->nom }}
                                                {!! Form::text('score_user', null, ['class' => 'form-control analyse-score', 'style' => 'float:left']) !!}
                                            </div>
                                        @endif
                                    </div>
                                    <div id="analyse-stats">
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label" for="minutes">Minutes joués</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('minutes', null, ['class' => 'form-control', 'id' => 'minutes']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label">Points</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('points', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label">Rebonds</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('rebonds', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label">Passes décisives</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('passes', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label">Interceptions</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('interceptions', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label">Fautes</label>
                                            <div class="col-sm-9">
                                                {!! Form::text('fautes', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-4 analyse-playground">
                                <img src="{{ URL::asset('assets/images/basket_ground.jpg') }}">
                            </div>
                        </div>

                        <div class="container">
                            <div class="row text-center">
                            
                        </div>
                        </div>
                        
                        <div class="row text-center analyse">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 analyse-playground">
                                
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footer')
 
@stop

@section('scripts')

@stop
