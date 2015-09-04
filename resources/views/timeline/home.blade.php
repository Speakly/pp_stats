@extends('layouts.index')

@section('css')
@stop

@section('content')

	<!-- content -->
    <div class="row">
        <!-- main col left -->
        @include('layouts.nav-left')

        <!-- main col right -->
        <div id="main-center" class="col-sm-5 col-xs-5 col-md-6">

            <div class="well">
              {!! Form::open([
                  'method' => 'POST',
                  'action' => ['PageController@post'],
                  'class' => 'from-horizontal'
                  ])
              !!}
                {!! Form::token() !!}
                {!! Form::hidden('user_id', $user->id) !!}
                <h4>Publier quelque chose</h4>
                <div class="form-group" style="padding:14px;">
                  <textarea class="form-control" name="message" placeholder="Exprimez-vous"></textarea>
                </div>
                {!! Form::submit('Poster', ['class' => 'btn btn-color-site pull-right', 'type' => 'button']) !!}
                <ul class="list-inline"><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li>
                {!! Form::close() !!}
            </div>
            @if($gamesPast)
                @foreach($gamesPast as $gamePast)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>
                                <i class="glyphicon glyphicon-star-empty"></i>
                                @if($gamePast->victoire = 1)
                                    <span style="color:green">Victoire</span>
                                @elseif($gamePast->victoire = 0)
                                    <span style="color:red">Défaite</span>
                                @else
                                    <span>Nul</span>
                                @endif

                                contre
                                {{$gamePast->name_adverse}}
                            </h4></div>
                        <div class="panel-body">
                            <p class="text-center">
                                <a href="#"></a>
                                @if($gamePast->domicile == 1)
                                    {{$user->club->nom}} <span>{{$gamePast->score_user}} - {{$gamePast->score_adverse}} </span>{{$gamePast->name_adverse}}
                                @else
                                    {{$gamePast->score_adverse}} - {{$gamePast->score_user}}
                                @endif
                            </p>
                            <div class="clearfix"></div>
                            <hr>
                            Design, build, test, and prototype using Bootstrap in real-time from your Web browser. Bootply combines the power of hand-coded HTML, CSS and JavaScript with the benefits of responsive design using Bootstrap. Find and showcase Bootstrap-ready snippets in the 100% free Bootply.com code repository.
                        </div>
                    </div>
                @endforeach
            @endif

            <!-- POST  -->
            @foreach($post as $value)
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4>
                          <i class="glyphicon glyphicon-list-alt"></i>
                          {{$user->surname}} {{$user->name}} vient de publier :
                      </h4></div>
                  <div class="panel-body">
                      <p class="text-center">
                          <a href="#"></a>
                          {{$value->message}}
                      </p>
                      <div class="clearfix"></div>
                      <hr>
                      Design, build, test, and prototype using Bootstrap in real-time from your Web browser. Bootply combines the power of hand-coded HTML, CSS and JavaScript with the benefits of responsive design using Bootstrap. Find and showcase Bootstrap-ready snippets in the 100% free Bootply.com code repository.
                  </div>
              </div>
            @endforeach

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
                <div class="panel-heading"><a href="{{ URL::action('PageController@statistiques', $user->id)}}" class="pull-right">Toutes les stats</a> <h4>Statistiques</h4></div>
                <div class="panel-body">
                    @if(empty($stats))
                        <div class="list-group">
                            <a href="http://bootply.com/tagged/modal" class="list-group-item">Minutes : {{$stats['minutes']}}</a>
                            <a href="http://bootply.com/tagged/datetime" class="list-group-item">Point(s) : {{$stats['points']}}</a>
                            <a href="http://bootply.com/tagged/datatable" class="list-group-item">Passe(s) : {{$stats['passes']}}</a>
                            <a href="http://bootply.com/tagged/datatable" class="list-group-item">3 Point(s) : {{$stats['trois_points']}}</a>
                            <a href="http://bootply.com/tagged/datatable" class="list-group-item">Cinq majeur : {{$stats['titulaire']}}</a>
                            <a href="http://bootply.com/tagged/datatable" class="list-group-item">Rebond(s) : {{$stats['rebonds']}}</a>
                             <a href="http://bootply.com/tagged/datatable" class="list-group-item">Interception(s) : {{$stats['interceptions']}}</a>
                            <a href="http://bootply.com/tagged/datatable" class="list-group-item">Victoire(s) : {{$stats['victoire']}}</a>
                        </div>
                    @else
                        <p> Pas encore de statistiques</p>
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ URL::action('PageController@statistiques', $user->id)}}" class="pull-right">Toutes les stats</a> <h4>Statistiques dernier match</h4></div>
                <div class="panel-body">
                    @if($statsLastGame)
                        <div class="list-group">
                            <a href="http://bootply.com/tagged/modal" class="list-group-item">Minutes : {{$statsLastGame->minutes}}</a>
                            <a href="http://bootply.com/tagged/datetime" class="list-group-item">Point(s) : {{$statsLastGame->points}}</a>
                            <a href="http://bootply.com/tagged/datatable" class="list-group-item">Passe(s) : {{$statsLastGame->passe}}</a>
                            <a href="http://bootply.com/tagged/datatable" class="list-group-item">3 Point(s) : {{$statsLastGame->trois_points}}</a>
                            <a href="http://bootply.com/tagged/datatable" class="list-group-item">Cinq majeur : {{$statsLastGame->titulaire}}</a>
                            <a href="http://bootply.com/tagged/datatable" class="list-group-item">Rebond(s) : {{$statsLastGame->rebonds}}</a>
                            <a href="http://bootply.com/tagged/datatable" class="list-group-item">Interception(s) : {{$statsLastGame->interceptions}}</a>
                            <a href="http://bootply.com/tagged/datatable" class="list-group-item">Victoire : {{$statsLastGame->victoire}}</a>
                        </div>
                    @else
                        <p> Pas encore de statistiques</p>
                    @endif
              </div>
            </div>
        </div>
    </div><!--/row-->


@stop

@section('scripts')


@stop
