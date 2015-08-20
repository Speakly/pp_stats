@extends('layouts.inscription')

@section('css')
    <link href="{{ URL::asset('assets/css/app.css')}}" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" href="{{ URL::asset('assets/css/skin-orange.css') }}" type="text/css">
@stop

@section('content')
<div class="st-container">
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
                    <li class="hidden-xs">
                        <a href="#sidebar-chat" data-toggle="sidebar-menu" data-effect="st-effect-1">
                            <i class="fa fa-comments"></i>
                        </a>
                    </li>
                    <!-- User -->
                    <li class="dropdown">
                        <a href="#" class="homepage-nav-user dropdown-toggle user" data-toggle="dropdown">
                            <img src="{{ URL::asset('assets/images/guy.jpg') }}" alt="profile-picture" class="img-circle" width="40" /> {{ $user->surname }} <span class="caret"></span>
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

    <div class="sidebar left sidebar-size-2 sidebar-offset-0 sidebar-visible-desktop sidebar-visible-mobile sidebar-skin-dark" id="sidebar-menu">
        <div data-scrollable>
            <div class="sidebar-block">
                <div class="profile">
                    <img src="{{ URL::asset('assets/images/guy.jpg') }}" alt="people" class="img-circle" />
                    <h4>{{$user->surname}} <br> {{ $user->name }}</h4>
                </div>
            </div>
            <div class="category">Statistiques Saison</div>
            <div class="sidebar-block">
                <ul class="list-about">
                    <li><i class="fa fa-map-marker"></i> 110min</li>
                    <li><i class="fa fa-link"></i> <a href="#">11pts</a></li>
                    <li><i class="fa fa-twitter"></i> <a href="#">3 victoires</a></li>
                </ul>
            </div>
            <div class="category">Next game</div>
            <div class="sidebar-block">
                <div class="sidebar-photos">
                    <ul>
                        @for($i=0;$i<=3;$i++)
                            <li>
                                <a href="#">Lakers vs Miami Heat</a>
                            </li>
                        @endfor
                    </ul>
                    <a href="#" class="btn btn-primary btn-xs">view all</a>
                </div>
            </div>
            <div class="category">Last game</div>
            <div class="sidebar-block">
                <ul class="sidebar-feed">
                    <li class="media">
                        <div class="media-left">
                            <span class="media-object">
                                <i class="fa fa-fw fa-bell"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <a href="" class="text-white">Lakers vs Orlando (110 - 99)</a> 
                            
                            <span class="time">25min</span>
                            <span class="time">5/10</span>
                            <span class="time">4pts</span>
                            <span class="time">2 passes</span>
                            <span class="time">3 rebonds</span>
                            <span class="time">5 fautes</span>
                        </div>
                        <div class="media-right">
                            <span class="news-item-success"><i class="fa fa-circle"></i></span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
	<div class="st-pusher" id="content" style="">
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner">
                <nav class="navbar navbar-subnav navbar-static-top margin-bottom-none" role="navigation">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subnav">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="fa fa-ellipsis-h"></span>
                            </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="subnav">
                            <ul class="nav navbar-nav ">
                                <li class="active"><a href="index.html"><i class="fa fa-fw icon-ship-wheel"></i> Timeline</a></li>
                                <li><a href="user-public-profile.html"><i class="fa fa-fw icon-user-1"></i> About</a></li>
                                <li><a href="user-public-users.html"><i class="fa fa-fw fa-users"></i> Friends</a></li>
                            </ul>
                            <ul class="nav navbar-nav hidden-xs navbar-right ">
                                <li><a href="#" data-toggle="chat-box">Chat <i class="fa fa-fw fa-comment-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="cover overlay cover-image-full height-300-lg">
                    <img id="homepage-cover" src="{{ URL::asset('assets/images/profile-cover.png') }}" alt="cover" />
                    <div class="overlay overlay-full">
                        <div class="v-top">
                            <a href="#" class="btn btn-cover"><i class="fa fa-pencil"></i></a>
                        </div>
                    </div>
                </div>
                <h1 class="text-center">Tes matchs sur Profilplayers Basket</h1>
                <div class="container">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-gray">
                            <!--<a href="#" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil"></i></a>-->
                            <i class="fa fa-fw fa-info-circle"></i> Game
                        </div>
                        <br>
                        <div class="panel-body text-center">
                            <div class="row">
                            
                        	@foreach($user->game as $key => $game)
                            <!-- 1 = domicile -->
                                @if($game->domicile == 1)
    	                            <div class="row">
                                        <div class="col-md-2">
                                            {{ $game->date }}
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-5 game-clubmine">{{ $user->club->nom }}</div>
                                                <div class="col-md-2">vs</div>
                                                <div class="col-md-5">{{ $game->name_adverse }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            @if($game->date < date('Y-m-d'))
                                                <a href="#"><button class="homepage-btn">Analyser mon match</button></a>
                                            @endif
                                        </div>	                            	
    	                            </div>
                                    <br>
                                    
                                    
                                @elseif($game->domicile == 0)
                                    <div class="row">
                                        <div class="col-md-2">
                                            {{ $game->date }}
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-5">{{ $game->name_adverse }}</div>
                                                <div class="col-md-2">vs</div>
                                                <div class="col-md-5 game-clubmine">{{ $user->club->nom }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            @if($game->date < date('Y-m-d'))
                                                <a href="#"><button class="homepage-btn">Analyser mon match</button></a>
                                            @endif
                                        </div>                                  
                                    </div>
                                    <br>
                                @endif
	                        @endforeach

                        </div>
                    </div>
                    <p class="text-center">Une fois ton / tes matchs passés, tu pourras faire ton analyse de match (score, passe, rebond, paniers, min joués...)</p>
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
