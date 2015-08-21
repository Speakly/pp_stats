@extends('layouts.default')

@section('css')
	
@stop

@section('content')
    	<div class="st-content">
            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner">
                
                @include('layouts.navbar')
    			
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

        @include('layouts.footer')
@stop
@section('script')
	
@stop
