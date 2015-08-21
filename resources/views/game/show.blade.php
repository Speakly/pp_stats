@extends('layouts.default')

@section('css')
    
@stop

@section('content')

	
        <div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner">

                @include('layouts.navbar')
                
                <div class="game-container">
                            <div class="panel panel-default game-panel-default">
                                <div class="panel-heading panel-heading-gray">
                                    <div class="pull-right">
                                        <a class="btn btn-skin btn-xs" href="{{ URL::action('PageController@addGame', $user->id) }}">Ajouter un match <i class="fa fa-plus"></i></a>
                                    </div>
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
                                            <br><br>
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
                                            <br><br>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
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
