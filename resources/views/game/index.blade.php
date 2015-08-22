@extends('layouts.default')

@section('css')
    <link href="{{ URL::asset('assets/css/app.css')}}" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" href="{{ URL::asset('assets/css/skin-orange.css') }}" type="text/css">
@stop

@section('content')
	
	<div class="st-pusher" id="content" style="margin-left:0px !important">
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner">

                @include('layouts.navbar')

                <h1 class="text-center">Renseigne ton prochain match sur Profilplayers Basket</h1>
                <div class="container">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-gray">
                            <!--<a href="#" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil"></i></a>-->
                            <i class="fa fa-fw fa-info-circle"></i> Game
                        </div>
                        <br>
                        <p class="text-center inscription-txt">Renseigne les champs suivant afin de renseigner ta prochaine rencontre. <br>Tu pourra ensuite, une fois le match passé, renseigner ton analyse de match et suivre tes statisitques de jeu.</p>
                        <br>
                        <div class="panel-body">
                            {!! Form::open([
                                'method' => 'POST',
                                'action' => 'GameController@create',
                                'enctype' => 'multipart/form-data'
                                ])
                            !!}
                                {!! Form::hidden('user_id', $user->id) !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::text('club', $user->club->nom, array('placeholder' => 'Votre club*', 'class' => 'form-control inscription-placeholder form-control-default required')) !!}
                                            {!! Form::hidden('club_id_user', $user->club->id) !!}
                                            {!! $errors->first('club', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group inscription-select">
                                            {!! Form::text('club_adverse', null, array('placeholder' => 'Le club adverse*', 'id' => 'q', 'class' => 'form-control inscription-placeholder form-control-default required')) !!}
                                            {!! Form::hidden('club_id', null, array('id' => 'i')) !!}
                                            {!! $errors->first('club_adverse', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> 
                                		<p>Date: <input type="text" id="datepicker" name="date"></p>
                                	</div>
                                	<div class='col-md-6'>
                                		<p> Match à domicile ?</p>
                                		Oui {!! Form::radio('domicile', 1, 'oui') !!}
										Non {!! Form::radio('domicile', 0, 'non') !!}
                                	</div>
                                </div>
                                <div class="text-center inscription-btn btn-submit-form">
                                    {!! Form::submit('Renseigner mon match', ['class' => 'btn btn-skin']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	@include('layouts.footer')
    
@stop

@section('scripts')
    
    <script type="text/javascript">
        $(function()
        {
            $( "#q" ).autocomplete({
                source: BASE_URL + "search/club",
                minLength: 3,
                select: function(event, ui) {
                    $('#q').val(ui.item.value);
                    $('#i').val(ui.item.id);
                }
            });
        });
          $(function() {
		    $( "#datepicker" ).datepicker();
		  });
    </script>
@stop
