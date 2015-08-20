@extends('layouts.default')

@section('css')
	
@stop

@section('content')
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
    			
    			<div class="timeline row" data-toggle="isotope">
    				<div class="col-xs-12 col-md-6 col-lg-4 item">
    					<div class="timeline-block">
    						<div class="panel panel-default share clearfix-xs">
    							<div class="panel-heading panel-heading-gray title">
    								What&acute;s new
    							</div>
    							<div class="panel-body">
    								<textarea name="status" class="form-control share-text" rows="3" placeholder="Share your status..."></textarea>
    							</div>
    							<div class="panel-footer share-buttons">
    								<a href="#"><i class="fa fa-map-marker"></i></a>
    								<a href="#"><i class="fa fa-photo"></i></a>
    								<a href="#"><i class="fa fa-video-camera"></i></a>
    								<button type="submit" class="btn btn-primary btn-xs pull-right display-none" href="#">Post</button>
    							</div>
    						</div>
    					</div>
    				</div>
    				<div class="col-xs-12 col-md-6 col-lg-4 item">
    					<div class="timeline-block">
    						<div class="panel panel-default relative">
    							<img src="images/place2-full.jpg" alt="place" class="img-responsive">
    							<div class="panel-body panel-boxed text-center">
    								<div class="rating">
    									<span class="star"></span>
    									<span class="star filled"></span>
    									<span class="star filled"></span>
    									<span class="star filled"></span>
    									<span class="star filled"></span>
    								</div>
    							</div>
    							<div class="panel-body">
    								<img src="images/people/50/guy-2.jpg" alt="people" class="img-circle" />
    								<img src="images/people/50/woman-2.jpg" alt="people" class="img-circle" />
    								<img src="images/people/50/guy-3.jpg" alt="people" class="img-circle" />
    								<img src="images/people/50/woman-3.jpg" alt="people" class="img-circle" />
    								<a href="#" class="user-count-circle">12+</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
		</div>
@stop
@section('script')
	
@stop
