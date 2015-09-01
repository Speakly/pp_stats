@extends('layouts.index')

@section('css')
@stop

@section('content')

	<!-- content -->                     
    <div class="row">
        <!-- main col left -->
        <div class="col-sm-5 col-xs-4 col-md-3">
            <div class="qw rd aof alt">
                <div class="qy"></div>
                <div class="qx dj text-center">
                    <a href="/application/profile/">
                        
                        @if(File::exists(public_path().'/images/logos/'.$user->id.'.png'))
                            <img src="{{ URL::asset('images/logos/' . $user->id.'.png') }}" class="aog">
                            
                        @elseif(File::exists(public_path().'.images/logos/'.$user->id.'.jpg'))
                            <img src="{{ URL::asset('images/logos/' . $user->id.'.jpg') }}" class="aog">
                        @endif
                    </a>
                    <h5 class="qz">
                        <a href="/application/profile/" class="akt">{{$user->surname}} {{$user->name}} </a>
                    </h5>

                    <p class="alt">{{ $user->poste }}, {{ $user->taille }}cm, joue au club <span style="font-weight:bold;">{{ $user->club->nom }}</span></p>
                    @if($games != null)
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
                    @endif
                </div>
            </div>
            @if($games != null)
                @if($nextGame != null)
                    <div class="panel panel-default">
                        <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4><i class="glyphicon glyphicon-star-empty"></i>Prochain match</h4></div>
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="http://bootply.com/tagged/datatable" class="list-group-item">{{$nextGame->name_adverse}}</a>
                          </div>
                      </div>
                    </div>
                @endif
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
            @endif
        </div>
        <div class="col-md-9">
            <div class="DataTables_Table_0_wrapper">
                <p class="text-center stats-title">Stats Saison actuelle</p>
                <table data-toggle="data-table" class="table dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        @include('statistiques.colonne')
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        @include('statistiques.colonne')
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($statistiques as $statsGame)
                        <tr>
                            <td>{{$statsGame->game->name_adverse}}</td>
                            <td>{{$statsGame->minutes}}</td>
                            <td>{{$statsGame->points}}</td>
                            <td>{{$statsGame->passe}}</td>
                            <td>{{$statsGame->trois_points}}</td>
                            <td>{{$statsGame->titulaire}}</td>
                            <td>{{$statsGame->lancer_franc}}</td>
                            <td>{{$statsGame->rebonds}}</td>
                            <td>{{$statsGame->interceptions}}</td>
                            <td>{{$statsGame->fautes}}</td>
                            <td>{{$statsGame->victoire}}</td>
                            <td>{{$statsGame->evaluation}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            



            <!-- Data table -->
            <div class="DataTables_Table_0_wrapper">
                <p class="text-center stats-title">Stats Saisons cumulés</p>
                <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            @include('statistiques.colonne')
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            @include('statistiques.colonne')
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>{{$games}}</td>
                            <td>{{$stats['minutes']}}</td>
                            <td>{{$stats['points']}}</td>
                            <td>{{$stats['passes']}}</td>
                            <td>{{$stats['trois_points']}}</td>
                            <td>{{$stats['titulaire']}}</td>
                            <td>{{$stats['lancer_franc']}}</td>
                            <td>{{$stats['rebonds']}}</td>
                            <td>{{$stats['interceptions']}}</td>
                            <td>{{$stats['fautes']}}</td>
                            <td>{{$stats['victoire']}}</td>
                            <td>{{$stats['evaluation']}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- // Data table -->
        </div>
    </div><!--/row-->

    

    


                      

    
@stop

@section('scripts')
    
    
@stop
