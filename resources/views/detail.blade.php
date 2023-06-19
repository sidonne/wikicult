@include("frontlayout")
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WikiCulTurE</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="/frontend/css/style.css" rel="stylesheet">
        <link href="/frontend/css/comment.css" rel="stylesheet">

        <!-- Styles -->

    </head>
    <body>
        <div class="wrapAll clearfix">
			<div class="sidebar">
				<div class="navigation">
					<ul>
						<li><a href="{{ url('/') }}">Main page</a></li>
						<li><a href="#">Contents</a></li>
						<li><a href="#">Featured content</a></li>
                        <li><a href="#">Random Article</a></li>
                        <li><a href="#">About WikiCulture</a></li>
                        <li><a href="#">Contact Us</a></li>
					</ul>
					<h3>Contribute</h3>
					<ul>
						<li><a href="#">Help</a></li>
						<li><a href="#">Learn to Edit</a></li>
						<li><a href="#">Community Portal</a></li>
                        <li><a href="#">Recent Changes</a></li>
                        <li><a href="#">Upload files</a></li>
					</ul>
					<h3>Interaction</h3>
					<ul>
						<li><a href="#">Help</a></li>
						<li><a href="{{ url('/login') }}">About</a></li>
						<li><a href="#">Portal</a></li>
					</ul>
				</div>


			</div>
			<div class="mainsection">
				<div class="headerLinks">
					<span class="user">Not logged in</span>
                    @auth
                    <a href="{{url('edit')}}">Talk</a>
                    <a href="#">Contributions</a>
                    <!--<a href="#">Login</a>
                    <a href="#">Create Account</a>-->
                    @if (Route::has('login'))


                        <a href="{{ url('/') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth

                    @endif

				</div>
				<div class="tabs clearfix">
					<div class="tabsLeft">
						<ul>
							<li><a href="#" class="active">Article</a></li>
                            @auth
							<li><a href="{{url('edit')}}">Talk</a></li>
                            @endauth
						</ul>
					</div>
					<div id="simpleSearch">
						<input type="text" name="searchInput" id="searchInput" placeholder="Search Wikipedia" size="12" />
						<div id="submitSearch"></div>
					</div>
					<div class="tabsRight">
						<ul>
							<li><a href="#" class="active">Read</a></li>
                            @auth
                            <li><a href="{{url('wikiculture/post/'.$detail->id.'/update')}}" >Edit</a></li>
                            @endauth
							<li><a href="#">View source</a></li>
							<li><a href="#">View history</a></li>
						</ul>
					</div>

				</div>
                @if(Session::has('success'))
					<p class="text-success">{{session('success')}}</p>
				@endif
				<div class="article">
					<h1>{{$detail->title}}</h1>

					<p>{!! $detail->detail !!}</p>

		
                    <!-- @auth -->
					<!-- Add Comment -->
					<!-- <div class="container">
						<h5>Add Comment</h5>
						<div>
							<form method="post" action="{{url('save-comment/'.Str::slug($detail->title).'/'.$detail->id)}}">
							@csrf
								<textarea name="comment" class="form-control"></textarea>
								<input type="submit" class="btn btn-dark mt-2" />
							</form>
						</div>
					</div> -->
					<!-- @endauth -->
					<!-- Fetch Comments -->
					<!-- <div class="card my-4">
						<h5 class="card-header">Comments <span class="badge badge-dark">{{count($detail->comments)}}</span></h5>
						<div class="card-body">
							@if($detail->comments)
								@foreach($detail->comments as $comment)
									<blockquote class="blockquote">
									<p class="mb-0">{{$comment->comment}}</p>
									@if($comment->user_id==0)
									<footer class="blockquote-footer">Admin</footer>
									@else
									<footer class="blockquote-footer">{{$comment->user->name}}</footer>
									@endif
									</blockquote>
									<hr/>
								@endforeach
							@endif
						</div>
					</div> -->
				</div>
                <br>
                <div class="container">
                    <div class="row bootstrap snippets bootdeys">
                        <div class="col-md-8 col-sm-12">
                            <div class="comment-wrapper">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Comment <span class="badge badge-blue">{{count($detail->comments)}}</span>
                                    </div>
                                    <div class="panel-body">
                                        <form method="post" action="{{url('save-comment/'.Str::slug($detail->title).'/'.$detail->id)}}">
                                        @csrf
                                            <textarea name="comment" class="form-control" placeholder="write a comment..." rows="3"></textarea>
                                            <input type="submit" class="btn btn-info pull-right" />
                                        </form>

                                        <div class="clearfix"></div>
                                        <hr>
                                        <ul class="media-list">
                                            <li class="media">

                                                <div class="media-body">
                                                    @if($detail->comments)
                                                        @foreach($detail->comments as $comment)
                                                            <span class="text-muted pull-right">
                                                                <small class="text-muted">{{$comment->created_at->format('h:i A')}}</small>
                                                            </span>
                                                            @if($comment->user_id==0)
                                                                <strong class="text-success">Admin</strong>
                                                            @else
                                                                <strong class="text-success">{{$comment->user->name}}</strong>
                                                            @endif
                                                            <p>
                                                                {{$comment->comment}}
                                                            </p>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="pagefooter">
					This page was last edited on {{$detail->updated_at->format('D, d M Y')}} |
					<div class="footerlinks">
						<a href="#">Privacy policy</a> <a href="#">About</a> <a href="#">Terms and conditions</a> <a href="#">Cookie statement</a> <a href="#">Developers</a>
					</div>
				</div>
			</div>
		</div>

    </body>
</html>
