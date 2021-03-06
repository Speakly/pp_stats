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
                <li class="active"><a href="{{ URL::action('PageController@timeline', [$user->surname, $user->name])}}"><i class="fa fa-fw icon-ship-wheel"></i> Timeline</a></li>
                <li><a href="user-public-profile.html"><i class="fa fa-fw icon-user-1"></i> About</a></li>
                <li><a href="user-public-users.html"><i class="fa fa-fw fa-users"></i> Friends</a></li>
                <li><a href="{{ URL::action('GameController@show', $user->id) }}"><i class="fa fa-fw icon-basketball-court"></i> Game</a></li>
            </ul>
        </div>
    </div> 
</nav>