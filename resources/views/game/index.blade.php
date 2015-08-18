@extends('layouts.inscription')

@section('css')
    <link href="{{ URL::asset('assets/css/app.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/skin-orange.css') }}" type="text/css">
@stop

@section('content')
	<div class="navbar navbar-main navbar-primary navbar-fixed-top" role="navigation">
      	<div class="container-fluid">
        	<div class="navbar-header">
          		<a href="#sidebar-menu" data-effect="st-effect-1" data-toggle="sidebar-menu" class="toggle pull-left visible-xs"><i class="fa fa-ellipsis-v"></i></a>
		        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		        </button>
          		<a href="#sidebar-chat" data-toggle="sidebar-menu" data-effect="st-effect-1" class="toggle pull-right visible-xs"><i class="fa fa-comments"></i></a>
          		<a class="navbar-brand" href="index.html">Profilplayers</a>
        	</div>
        	<div class="collapse navbar-collapse" id="main-nav">
          		<ul class="nav navbar-nav"></ul>
          		<ul class="nav navbar-nav navbar-right">
            		
            		<!-- User -->
		            <li class="dropdown">
		              	<a href="#" class="homepage-nav-user dropdown-toggle user" data-toggle="dropdown">
		              		
		              		@if(File::exists(public_path().'/images/logos/'.$user->id.'.png'))
		                		<img src="{{ URL::asset('images/logos/' . $user->id .'.png') }}" alt="profile-picture" class="img-circle" width="40" /> {{ $user->surname }} <span class="caret"></span>
		                	@elseif(File::exists(public_path().'/images/logos/'.$user->id.'.jpg'))
		                		<img src="{{ URL::asset('images/logos/' . $user->id .'.jpg') }}" alt="profile-picture" class="img-circle" width="40" /> {{ $user->surname }} <span class="caret"></span>
		              		@endif
		              	</a>
		              	<ul class="dropdown-menu" role="menu">
			                <li><a href="user-private-profile.html">Profile</a></li>
			                <li><a href="user-private-messages.html">Messages</a></li>
			                <li><a href="{{ URL::action('PageController@logout') }}">Logout</a></li>
		              	</ul>
		            </li>
		        </ul>
        	</div>
      	</div>
    </div>
	<div class="st-pusher" id="content" style="margin-top:50px;margin-left:0px !important">
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner">
                <h1 class="text-center">Renseigne ton prochain sur Profilplayers Basket</h1>
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
                                'action' => 'ConnexionController@updateProfile',
                                'enctype' => 'multipart/form-data'
                                ])
                            !!}
                                
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
@stop

@section('scripts')
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
        $(function()
        {
            $( "#q" ).autocomplete({
                source: "search/club",
                minLength: 3,
                select: function(event, ui) {
                    $('#q').val(ui.item.value);
                    $('#i').val(ui.item.id);
                }
            });
        });
    </script>
@stop
