@extends('frontend.layouts.app')
@section('mytitle')
    {!! $showpost->title !!} |
@endsection
@section('metatag'){!! $showpost->slug !!}@endsection
@section('content')



        <!-- ============== Hero Section Begin ============== -->
        <!-- <section id="hero" class="d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1">
                        <h1>Bettter digital experience with Ninestars</h1>
                        <h2>We are team of talanted designers making websites with Bootstrap</h2>
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img">
                        <img src="assets/img/hero-img.svg" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>
        </section> -->
        <!-- ============== Hero Section End ============== -->
        <!-- =================== Main Section Begin =================== -->
        <main id="main">
            <!-- ============== Post list Section Begin ============== -->
            <section class="homepost">
                <div class="msg">

                </div>
                <div class="container">
                    <div class="row "><!-- justify-content-between -->
                        <!-- left side of the body begin -->
                        <div class="col-lg-8 align-items-center justify-content-center">
                            <div class="left-side">
                                <!-- post view section begin -->
                                <div class="row" style="padding: 0; margin:0;">
                                    <div class="post-view">
                                        <div class="post-card">
                                            <div class="post-img d-flex align-items-center justify-content-center">
                                                @if ($userPostPic)
                                                    <img src="{{asset($showpost->image)}}" loading="lazy" style="width: 100%;height: 400px;" alt="" />
                                                @else
                                                    <img src="">
                                                @endif
                                            </div>
                                            <div class="post-title">
                                                <h1><strong>{{$showpost->title}}</strong></h1>
                                            </div>
                                            <div class="post-detail">
                                                <div class="blog-meta">
                                                    <div class="post-info">
                                                        <span><i class="fa fa-tag"></i>Category: <a href="{{route('allcategorypost.list',[$showpost->category->slug])}}">{{$showpost->category->name}}</a></span>
                                                        <span><i class="fa fa-calendar"> {{$showpost->created_at->format('Y-m-d')}}</i>                                    </span>
                                                        @if (App\Models\Comment::where('post_id',$showpost->id)->get()->count()==0)
                                                            <span><i class="fa fa-comments"></i>Join the discussion</span>
                                                        @elseif (App\Models\Comment::where('post_id',$showpost->id)->get()->count()==1)
                                                            <span><i class="fa fa-comments"></i>{{App\Models\Comment::where('post_id',$showpost->id)->get()->count()}} Comment</span>
                                                        @else
                                                            <span><i class="fa fa-comments"></i>{{App\Models\Comment::where('post_id',$showpost->id)->get()->count()}} Comments</span>
                                                        @endif
                                                        <span><i class="fa fa-eye"></i>Views ({{$showpost->reads}})</span>
                                                    </div>
                                                </div>
                                                <div class="author-info">
                                                    <ul>
                                                        <li><i class="fa fa-user" style="color: #808080/*#F7941D*/;"></i>
                                                             Post by  <a href="{{route('alluserpost.list',[$showpost->user->name,$showpost->user->id,$showpost->user->username])}}?authorid={{$showpost->user->id}}&username={{$showpost->user->username}}">{{$showpost->created_by}}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62b41c1efb8320a8"></script>
                                                <div class="addthis_inline_share_toolbox_bztn"></div>
                                                <div class="post-description">
                                                    {!! $showpost->body !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @php
                                        $horizontal = DB::table('advertisements')->where('type',2)->inRandomOrder()->first();
                                    @endphp
                                    <div class="add">
                                        @if($horizontal == NULL)
                                        @else
                                        <br>
                                        <a href="{{ $horizontal->link }}" target="_blank" rel="noopener"><img src=" {{ asset($horizontal->ads) }}" loading="lazy" alt="" /></a>
                                        <br>
                                        @endif
                                    </div>
                                </div>

                                <!-- post view section end -->
                                <!-- comment view and comment form begin -->
                                <div class="row" style="padding: 0; margin:0;">
                                    <div class="comment-section">
                                        <div class="comment-head" >
                                            <h3><small class="pull-right"><i class="fa fa-comments"></i> {{App\Models\Comment::where('post_id',$showpost->id)->get()->count()}} Comment</small> Comments </h3>
                                        </div>
                                        <!-- Single Comment -->
                                        @forelse ($commentsshow as $comment)
                                            <div style="font-size: 13px">
                                                <div class="mar-btm">
                                                    <h6>{{$comment->name}} <p class="text-muted text-sm pull-right"> - {{$comment->created_at->diffForHumans()}}</p></h6>
                                                </div>
                                                <p>{{$comment->body}}</p>
                                                {{-- <div class="pad-ver">
                                                    <div class="btn-group">
                                                        <button type="submit" class="btn btn-sm" value="{{$comment->upvotes++}}"><i class="fa fa-thumbs-up" style="color:rgb(53, 161, 53)"></i></button>{{$comment->upvotes+1}}
                                                        <button type="submit" class="btn btn-sm" value="{{$comment->incrementDownVoteCount()}}"><i class="fa fa-thumbs-down" style="color:rgb(231, 76, 76)"></i></button>{{$comment->incrementDownVoteCount()}}
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <hr>
                                        @empty
                                            <h5 style="font-size: 16px; color: #666; margin-bottom: 50px;">No comment is available in this post...</h5>
                                        @endforelse
                                        <!-- End Single Comment -->
                                        <!-- post comment form begin -->
                                        <div class="col-12" style="padding: 0; margin: 0;">
                                            <div class="reply">
                                                <div class="reply-head">
                                                    <h2 class="reply-title">Leave a Comment</h2>
                                                    <form action="{{route('comments.store')}}" enctype="multipart/form-data" method="post">@csrf
                                                        <div class="form-row">
                                                            @if(Auth::check())
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <div class="form-group fl_icon">
                                                                        <div class="icon"><i class="fa fa-user"></i></div>

                                                                        <input type="text" name="name" class="form-control form-input @error('name') is-invalid @enderror" value="{{auth()->user()->name}}" readonly required=""/>
                                                                        @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12 fl_icon">
                                                                    <div class="form-group fl_icon">
                                                                        <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                                                        <input type="email" class="form-control form-input @error('email') is-invalid @enderror" name="email" id="email" value="{{auth()->user()->email}}" readonly required=""/>
                                                                        @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <div class="form-group fl_icon">
                                                                        <div class="icon"><i class="fa fa-user"></i></div>

                                                                        <input type="text" name="name" class="form-control form-input @error('name') is-invalid @enderror" placeholder="Name" required=""/>
                                                                        @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12 fl_icon">
                                                                    <div class="form-group fl_icon">
                                                                        <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                                                        <input type="email" class="form-control form-input @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" required=""/>
                                                                        @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control form-input  @error('body') is-invalid @enderror" name="body" rows="10" placeholder="Your Views"></textarea>
                                                                    @error('body')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group" hidden>
                                                                <input type="text" name="post_id"  class="form-control" value="{{$showpost->id}}" readonly required="">
                                                                <input type="text" name="username"  class="form-control" value="{{$showpost->username}}" readonly required="">
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group button">
                                                                    <button type="submit" class="btn">Post comment</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- post comment form end -->
                                    </div>
                                </div>
                                <!-- comment view and comment form end -->
                            </div>
                        </div>
                        <!-- left side of the body end -->
                        <!-- right side of the body begin -->
                        <div class="col-lg-4 pt-5 pt-lg-0">
                            <div class="right-side">
                                <!-- search option -->
                                {{-- <div class="row" style="padding: 0; margin:0;">
                                    <div class="searchbox">
                                        <form action="index.php" class="form">
                                            <input type="text" class="view" id="postSearch" name="Search" placeholder="Search Here...">
                                            <button class="button" name="SearchButton" ><i class="fa fa-search"></i></button>
                                            <div class="answersearch" id="blogPostSearch"></div>

                                        </form>
                                    </div>
                                </div> --}}
                                <!-- search option -->
                                <!-- category list view begin -->
                                <div class="row" style="padding: 0; margin:0;">
                                    <div class="view-category">
                                        <div class="category-title">
                                            <h4 class="ctitle">Categories</h4>
                                        </div>
                                        <div class="category-list-view">
                                            <ul class="category-list">
                                                @forelse ($categories as $category)
                                                    <li>
                                                        <a href="{{route('allcategorypost.list',[$category->slug])}}">{{$category->name}} <span>({{App\Models\Post::where('category_id',$category->id)->where('status',1)->get()->count()}})</span></a>
                                                    </li>
                                                @empty
                                                    <p>No category to display</p>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- category list view end -->
                                <!-- recent post list view begin -->
                                <div class="row" style="padding: 0; margin:0;">
                                    <div class="view-recent-post">
                                        <div class="header-title">
                                            <h4 class="title">Recent Posts</h4>
                                        </div>
                                        <div class="view-list">
                                            <div class="postmedia">
                                                @forelse ($recentposts as $recent)
                                                    <div class="postmedia-img">
                                                        @if ($recent->image)
                                                            <img src="{{asset($recent->image)}}" loading="lazy" class="img-fluid" style="width: 55%" alt="Post Image">
                                                        @else
                                                            <img src="{{asset('logos/img/blogbusbg.png')}}" loading="lazy" class="img-fluid" style="width: 55%" alt="Post Image">
                                                        @endif
                                                    </div>
                                                    <div class="postmedia-body ">
                                                        <h5>
                                                            <a href="{{route('post.show',[$recent->id,$recent->slug])}}">
                                                                {!! Str::limit($recent->title, 40)  !!}
                                                            </a>
                                                        </h5>
                                                        <ul class="postView">
                                                            <li>
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                {{$recent->created_at->format('Y-m-d')}}
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                                {{$recent->reads}}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @empty
                                                    <p>No post to display</p>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- recent post list view end -->
                                <!-- Top views of post slider begin -->
                                @if ($topviewpost->count() != 0)
                                    <div class="row" style="padding: 0; margin:0;">
                                        <div class="topView">
                                            <div class="topView-title">
                                                <h4 class="title">
                                                    Trending Views
                                                </h4>
                                            </div>
                                            <div class="view-list">
                                                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        @foreach($topviewpost as $toppost)
                                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                                <div class="cardView">
                                                                    <a href="{{route('topviewblog')}}" target="_blank" rel="noopener">
                                                                        <div class="cBody" >
                                                                            <div class="imgView d-flex align-items-center justify-content-center">
                                                                                @if ($toppost->image)
                                                                                    <img src="{{asset($toppost->image)}}" loading="lazy" height="170" style="width: 100%">
                                                                                @else
                                                                                    <img src="{{asset('logos/img/blogbusbg.png')}}" loading="lazy" height="170" style="width: 100%">
                                                                                @endif
                                                                            </div>
                                                                            <div class="bodyContent">
                                                                                <h4>
                                                                                    {!! (Str::limit($toppost->title,40)) !!}
                                                                                </h4>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                                        <span class="fa fa-angle-left topViewIcon" aria-hidden="true" ></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                                        <span class="fa fa-angle-right topViewIcon" aria-hidden="true" ></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <!-- Top views of post slider end -->
                                <!-- Ads begin -->
                                <div class="col-md-12 col-sm-12">
                                    @php
                                        $vertical = DB::table('advertisements')->where('type',1)->inRandomOrder()->first();
                                    @endphp
                                    <div class="sidebar-add">
                                        @if($vertical == NULL)

                                        @else
                                            <a href="{{ $vertical->link }}" target="_blank" ><img src=" {{ asset($vertical->ads) }}" loading="lazy" alt="" /></a>
                                        @endif
                                    </div>
                                </div>
                                <!-- Ads end -->
                            </div>
                        </div>
                        <!-- right side of the body begin -->
                        {{-- trending post --}}
                        @if ($postFromSameCategories->count() != 0)
                            <div class="col-lg-12 align-items-center justify-content-center">
                                <div class="row" style="padding: 0; margin:0;">
                                    <div class="topView">
                                        <div class="topView-title">
                                            <h4 class="title">
                                                Trending Post
                                            </h4>
                                        </div>
                                        <div class="view-list">
                                            <div id="carouselExampleCaptions1" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <div class="row">
                                                            @foreach($postFromSameCategories as $post)
                                                                <div class="col-3" style="height: 350px;">
                                                                    <div class="card mb-3 shadow-sm">
                                                                        @if ($post->image)
                                                                            <img src="{{asset($post->image)}}" loading="lazy" height="170" style="width: 100%">
                                                                        @else
                                                                            <img src="{{asset('logos/img/blogbusbg.png')}}" loading="lazy" height="170" style="width: 100%">
                                                                        @endif
                                                                        <div class="card-body post-title">
                                                                            <a href="{{route('post.show',[$post->id,$post->slug])}}">
                                                                                <div class="myCard">
                                                                                    <p><b>{!! (Str::limit($post->title,40)) !!}</b></p>
                                                                                </div>
                                                                            </a>
                                                                            <div class="post-detail small">
                                                                                <div class="blog-meta">
                                                                                    <div class="post-info">
                                                                                        <span><i class="fa fa-tag"></i> Category: <a href="{{route('allcategorypost.list',[$post->category->slug])}}" style="color: #fc8902">{{$post->category->name}}</a></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="author-info">
                                                                                    <i class="fa fa-user" style="color: #808080/*#F7941D*/;"></i>
                                                                                    Post by <a href="{{route('alluserpost.list',[$post->user->name,$post->user->id,$post->user->username])}}?authorid={{$post->user->id}}&username={{$post->user->username}}" style="color: #fc8902">{{$post->created_by}}</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    @if ($randomItemPosts->count() != 0)
                                                        <div class="carousel-item ">
                                                            <div class="row">
                                                                @foreach($randomItemPosts as $post)
                                                                    <div class="col-3" style="height: 350px;">
                                                                        <div class="card mb-3 shadow-sm">
                                                                            @if ($post->image)
                                                                                <img src="{{asset($post->image)}}" loading="lazy" height="170" style="width: 100%">
                                                                            @else
                                                                                <img src="{{asset('logos/img/blogbusbg.png')}}" loading="lazy" height="170" style="width: 100%">
                                                                            @endif
                                                                            <div class="card-body post-title">
                                                                                <div class="myCard">
                                                                                    <p><b>{!! (Str::limit($post->title,40)) !!}</b></p>
                                                                                </div>
                                                                                <div class="post-detail small">
                                                                                    <div class="blog-meta">
                                                                                        <div class="post-info">
                                                                                            <span><i class="fa fa-tag"></i> Category: <a href="{{route('allcategorypost.list',[$post->category->slug])}}" style="color: #fc8902">{{$post->category->name}}</a></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="author-info">
                                                                                        <i class="fa fa-user" style="color: #808080/*#F7941D*/;"></i>
                                                                                        Post by <a href="{{route('alluserpost.list',[$post->user->name,$post->user->id,$post->user->username])}}?authorid={{$post->user->id}}&username={{$post->user->username}}" style="color: #fc8902">{{$post->created_by}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleCaptions1" role="button" data-slide="prev" style="left: -110px">
                                                    <span class="fa fa-angle-left topViewIcon" aria-hidden="true" ></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleCaptions1" role="button" data-slide="next" style="right: -110px">
                                                    <span class="fa fa-angle-right topViewIcon" aria-hidden="true" ></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
            <!-- ============== Post list Section End ============== -->
        </main>
        <!-- =================== Main Section End =================== -->

        <style>
            .myCard p{
                color: #232f3e;
                transition: 0.3s;
            }
            .myCard p:hover{
                color: #F7941D;
                transition: 0.3s;
            }
            .display-comment .display-comment {
                margin-left: 40px
            }
            /* leave a comment */
            .be-comment-name {
                font-size: 13px;
                font-family: 'Conv_helveticaneuecyr-bold';
            }
            .be-comment-time {
                text-align: right;
            }

            .be-comment-time {
                font-size: 11px;
                color: #b4b7c1;
            }
            .form-group.fl_icon .icon {
                position: absolute;
                top: 0px;
                left: -1px;
                width: 45px;
                height: 40px;
                background: #c9c9c900;
                color: black;
                text-align: center;
                line-height: 44px;
                -webkit-border-top-left-radius: 2px;
                -webkit-border-bottom-left-radius: 2px;
                -moz-border-radius-topleft: 2px;
                -moz-border-radius-bottomleft: 2px;
                border-top-left-radius: 2px;
                border-bottom-left-radius: 2px;
            }

            .form-group .form-input {
                font-size: 13px;
                line-height: 50px;
                font-weight: 400;
                color: #b4b7c1;
                text-align: center;
                width: 100%;
                height: 50px;
                padding-left: 20px;
                padding-right: 20px;
                border: 1px solid #edeff2;
                border-radius: 3px;
            }

            .form-group.fl_icon .form-input {
                padding-left: 20px;
            }

            .form-group textarea.form-input {
                height: 150px;
            }

            /* single comment */
            .media-block .media-left {
                display: block;
                float: left
            }

            .media-block .media-right {
                float: right
            }

            .media-block .media-body {
                display: block;
                overflow: hidden;
                width: auto
            }

            .middle .media-left,
            .middle .media-right,
            .middle .media-body {
                vertical-align: middle
            }

            .btn-trans {
                background-color: transparent;
                border-color: transparent;
                color: #929292;
            }

            .btn-icon {
                padding-left: 9px;
                padding-right: 9px;
            }

            .btn-sm, .btn-group-sm>.btn, .btn-icon.btn-sm {
                padding: 0px 10px !important;
            }
        </style>
@endsection
