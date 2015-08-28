             <!-- main col left -->
        <div class="col-sm-4 col-xs-12 col-md-3">
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
                </div>
            </div>
            @if($nextGame)
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4><i class="glyphicon glyphicon-star-empty"></i>Prochain match</h4></div>
                    <div class="panel-body">
                        <div class="list-group">
                            <a href="http://bootply.com/tagged/datatable" class="list-group-item">{{$nextGame->name_adverse}}</a>
                      </div>
                  </div>
                </div>
            @endif
            @if($gamesPast)
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