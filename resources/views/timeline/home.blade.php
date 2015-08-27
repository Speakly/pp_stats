@extends('layouts.index')

@section('css')
@stop

@section('content')

	<!-- content -->                     
    <div class="row">
        <!-- main col left -->
        <div class="col-sm-4 col-xs-4 col-md-3 col-lg-2">
            <div class="qw rd aof alt">
                <div class="qy"></div>
                <div class="qx dj text-center">
                    <a href="/application/profile/">
                        <img src="{{ URL::asset('images/logos/51.jpg') }}" class="aog">
                    </a>
                    <h5 class="qz">
                        <a href="/application/profile/" class="akt">Amaury Leproux</a>
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
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4><i class="glyphicon glyphicon-star-empty"></i>Prochain match</h4></div>
                    <div class="panel-body">
                        <div class="list-group">
                            <a href="http://bootply.com/tagged/datatable" class="list-group-item">{{$nextGame->name_adverse}}</a>
                      </div>
                  </div>
                </div>
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

        <!-- main col right -->
        <div id="main-center" class="col-sm-5 col-xs-5 col-md-6 col-lg-7">

            <div class="well"> 
                <form class="form-horizontal" role="form">
                    <h4>Publier quelque chose</h4>
                    <div class="form-group" style="padding:14px;">
                        <textarea class="form-control" placeholder="Exprimez-vous"></textarea>
                    </div>
                    <button class="btn btn-color-site pull-right" type="button">Poster</button><ul class="list-inline"><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li>
                </form>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Bootply Editor &amp; Code Library</h4></div>
                <div class="panel-body">
                    <p><img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">The Bootstrap Playground</a></p>
                    <div class="clearfix"></div>
                    <hr>
                    Design, build, test, and prototype using Bootstrap in real-time from your Web browser. Bootply combines the power of hand-coded HTML, CSS and JavaScript with the benefits of responsive design using Bootstrap. Find and showcase Bootstrap-ready snippets in the 100% free Bootply.com code repository.
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Stackoverflow</h4></div>
                <div class="panel-body">
                    <img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Keyword: Bootstrap</a>
                    <div class="clearfix"></div>
                    <hr>

                    <p>If you're looking for help with Bootstrap code, the <code>twitter-bootstrap</code> tag at <a href="http://stackoverflow.com/questions/tagged/twitter-bootstrap">Stackoverflow</a> is a good place to find answers.</p>

                    <hr>
                    <form>
                        <div class="input-group">
                          <div class="input-group-btn">
                              <button class="btn btn-default">+1</button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
                          </div>
                          <input type="text" class="form-control" placeholder="Add a comment..">
                      </div>
                  </form>

                </div>
            </div>
        </div>
        <div class="col-sm-3 col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Statistiques</h4></div>
                <div class="panel-body">
                    <p>120 minutes<br>13 points<br>8 rebonds<br> 3 passes</p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Statistiques dernier match</h4></div>
                <div class="panel-body">
                    <div class="list-group">
                        <a href="http://bootply.com/tagged/modal" class="list-group-item">Minutes : </a>
                        <a href="http://bootply.com/tagged/datetime" class="list-group-item">Points :</a>
                        <a href="http://bootply.com/tagged/datatable" class="list-group-item">Passe :</a>
                        <a href="http://bootply.com/tagged/datatable" class="list-group-item">Rebonds :</a>
                        <a href="http://bootply.com/tagged/datatable" class="list-group-item">Résultat :</a>
                  </div>
              </div>
            </div>
        </div>
    </div><!--/row-->

    

    


                      

    
@stop

@section('scripts')
    
    
@stop
