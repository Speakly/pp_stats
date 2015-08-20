@extends('layouts.inscription')

@section('css')
    
@stop

@section('content')
<div class="st-container game-content">
    @include('layouts.sidebar')
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
                                <li><a href="{{ URL::action('GameController@show', $user->id) }}"><i class="fa fa-fw icon-basketball-court"></i> Game</a></li>
                            </ul>
                            <ul class="nav navbar-nav hidden-xs navbar-right ">
                                <li><a href="#" data-toggle="chat-box">Chat <i class="fa fa-fw fa-comment-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                
                <div class="game-container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default game-panel-default">
                                <div class="panel-heading panel-heading-gray">
                                    <i class="fa fa-fw fa-info-circle"></i> Game
                                </div>
                                <br>
                                <div class="panel-body text-center">
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
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default game-panel-default">
                                <div class="panel-heading panel-heading-gray">
                                    <!--<a href="#" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil"></i></a>-->
                                    <a href="#"><i class="fa fa-fw fa-info-circle"></i> Statistiques</a>
                                </div>
                                
                                <div class="panel-body game-panel-body">
                                    <div class="row">
                                        <div class="panel panel-default game-panel">  
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <div class="media v-middle">
                                                        <div class="media-body">
                                                            Matchs joués
                                                        </div>
                                                        <div class="media-right">
                                                            <div class="text-subhead">&dollar;12,201</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media v-middle">
                                                        <div class="media-body">
                                                            Minutes joués
                                                        </div>
                                                        <div class="media-right">
                                                          <div class="text-subhead">&dollar;11,546</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media v-middle">
                                                        <div class="media-body">
                                                            Points
                                                        </div>
                                                        <div class="media-right">
                                                            <div class="text-subhead">&dollar;8,732</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media v-middle">
                                                        <div class="media-body">
                                                            Rebonds
                                                        </div>
                                                        <div class="media-right">
                                                          <div class="text-subhead">&dollar;6,732</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media v-middle">
                                                        <div class="media-body">
                                                            Passes décisives
                                                        </div>
                                                        <div class="media-right">
                                                          <div class="text-subhead">&dollar;6,732</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media v-middle">
                                                        <div class="media-body">
                                                            Interceptions
                                                        </div>
                                                        <div class="media-right">
                                                          <div class="text-subhead">&dollar;6,732</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media v-middle">
                                                        <div class="media-body">
                                                            Fautes
                                                        </div>
                                                        <div class="media-right">
                                                          <div class="text-subhead">&dollar;6,732</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media v-middle">
                                                        <div class="media-body">
                                                            Evaluation
                                                        </div>
                                                        <div class="media-right">
                                                          <div class="text-subhead">&dollar;6,732</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
        <strong>ThemeKit</strong> v4.0.0 &copy; Copyright 2015
        </footer>
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
