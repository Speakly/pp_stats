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
                            @if(File::exists(public_path().'/images/logos/'.$user->id.'.png'))
                                <img src="{{ URL::asset('images/logos/' . $user->id .'.png') }}" alt="profile-picture" class="img-circle" width="40" /> {{ $user->surname }} <span class="caret"></span>
                            @elseif(File::exists(public_path().'/images/logos/'.$user->id.'.jpg'))
                                <img src="{{ URL::asset('images/logos/' . $user->id .'.jpg') }}" alt="profile-picture" class="img-circle" width="40" /> {{ $user->surname }} <span class="caret"></span>
                            @endif 
                            @if(isset($user))
                                {{ $user->surname }}
                            @endif 
                            <span class="caret"></span>
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
		              		@if(isset($user))
    		              		@if(File::exists(public_path().'/images/logos/'.$user->id.'.png'))
    		                		<img src="{{ URL::asset('images/logos/' . $user->id .'.png') }}" alt="profile-picture" class="img-circle" width="40" /> {{ $user->surname }} <span class="caret"></span>
    		                	@elseif(File::exists(public_path().'/images/logos/'.$user->id.'.jpg'))
    		                		<img src="{{ URL::asset('images/logos/' . $user->id .'.jpg') }}" alt="profile-picture" class="img-circle" width="40" /> {{ $user->surname }} <span class="caret"></span>
    		              		@endif
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
                    @if(File::exists(public_path().'/images/logos/'.$user->id.'.png'))
                        <img src="{{ URL::asset('images/logos/' . $user->id .'.png') }}" alt="profile-picture" class="img-circle" width="100"/> 
                    @elseif(File::exists(public_path().'/images/logos/'.$user->id.'.jpg'))
                        <img src="{{ URL::asset('images/logos/' . $user->id .'.jpg') }}" alt="profile-picture" class="img-circle" width="100"/> 
                    @endif 
                    
                    <h4>
                        @if(isset($user))
                            {{$user->surname}} <br> {{ $user->name }}</h4>
                        @endif
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
                        @if(isset($user))
                            @foreach($user->game as $key => $game)
                                <li>
                                    <a href="{{ URL::action('GameController@show', $user->id) }}">{{ $game->name_adverse }}</a>
                                </li><br><br>
                            @endforeach
                        @endif
                    </ul>
                    <!--<a href="#" class="btn btn-primary btn-xs">view all</a>-->
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