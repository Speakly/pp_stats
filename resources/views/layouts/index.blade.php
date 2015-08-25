<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Profilplayers Basket - Suis tes performances</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="{{ URL::asset('assets/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
	</head>
	<body>
<div class="wrapper">
    <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">
          
            <!-- main right col -->
            <div class="column col-sm-12 col-xs-12" id="main">
                
                <!-- top nav -->
              	<div class="navbar navbar-blue navbar-static-top">  
                    <div class="navbar-header">
                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
          				<span class="icon-bar"></span>
          				<span class="icon-bar"></span>
                      </button>
                      <a href="/" class="navbar-brand logo">Pp</a>
                  	</div>
                  	<nav class="collapse navbar-collapse" role="navigation">
                    <form class="navbar-form navbar-left">
                        <div class="input-group input-group-sm" style="max-width:360px;">
                          <input type="text" class="form-control" placeholder="Rechercher" name="srch-term" id="srch-term">
                          <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav">
                      <li>
                        <a href="#"><i class="glyphicon glyphicon-home"></i> Accueil</a>
                      </li>
                      <li>
                        <a href="#"><i class="glyphicon glyphicon-signal"></i> Statistiques</a>
                      </li>
                      <li>
                        <a href="#"><i class="glyphicon glyphicon-star-empty"></i> Matchs</a>
                      </li>
                      <li>
                        <a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Ajouter match</a>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
                        <ul class="dropdown-menu">
                          <li><a href="">Profil</a></li>
                          <li><a href="">Se déconnecter</a></li>
                        </ul>
                      </li>
                    </ul>
                  	</nav>
                </div>
                <!-- /top nav -->
              
                <div class="padding">
                    <div class="full col-sm-9">
                      
                      @yield('content')
                        
                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
          
        </div>
    </div>
</div>


<!--post modal-->
<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>Ajoutes ton match
        </div>
        {!! Form::open([
            'method' => 'POST',
            'action' => 'GameController@create',
            'enctype' => 'multipart/form-data'
            ])
        !!}
          <div class="modal-body">
            {!! Form::hidden('club_id_user', $user->club->id) !!}
            {!! Form::hidden('club_id', null, array('id' => 'i')) !!}
            {!! Form::hidden('user_id', $user->id) !!}
            <div class="form-group row">
              <div class="col-md-3">
                <label class="control-label">Club adverse</label>
              </div>
              <div class="col-md-9">
                {!! Form::text('club_adverse', null, array('placeholder' => 'Le club adverse*', 'id' => 'q', 'class' => 'form-control inscription-placeholder form-control-default required')) !!}
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3">
                <label class="control-label">Date</label>
              </div>
              <div class="col-md-9">
                <input type="text" id="datepicker" name="date">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-3">
                <label class="control-label">A domicile ?</label>
              </div>
              <div class="col-md-9">
                Oui {!! Form::radio('domicile', 1, 'oui') !!}
                Non {!! Form::radio('domicile', 0, 'non') !!}
              </div>
            </div>    
          </div>
          <div class="modal-footer text-center">
            <div>
              <div class="text-center inscription-btn btn-submit-form">
                {!! Form::submit('Ajouter', ['class' => 'btn btn-color-site']) !!}
              </div>
              </div>  
          </div>
        {!! Form::close() !!}
      </div>
  </div>
</div>


	<!-- script references -->
    <script>BASE_URL = '{{ URL::to("/") }}/' </script>
    
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/scripts.js') }}"></script>
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
	</body>
</html>