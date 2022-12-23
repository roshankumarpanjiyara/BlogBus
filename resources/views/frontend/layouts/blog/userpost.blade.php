@extends('frontend.layouts.app')
@section('mytitle')
    {!! $user->name !!} |
@endsection
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
                <div class="container">
                    <div class="row "><!-- justify-content-between -->
                        <!-- left side of the body begin -->
                        <div class="col-lg-8 align-items-center justify-content-center">
                            <div class="left-side">
                                <!-- post view section begin -->
                                @if(count($posts)>0)
                                @foreach($posts as $key=>$post)
                                <div class="row" style="padding: 0; margin:0;">
                                    <div class="post-view">
                                        <div class="post-card">
                                            <div class="post-img d-flex align-items-center justify-content-center">
                                                @if ($post->image)
                                                <img class="align-center" src="{{asset($post->image)}}" loading="lazy" style="width: 100%;height: 400px;">
                                                @else
                                                    <img src="">
                                                @endif
                                            </div>
                                            <div class="post-title">
                                                <h1><strong>{{$post->title}}</strong></h1>
                                            </div>
                                            <div class="post-detail">
                                                <div class="blog-meta">
                                                    <div class="post-info">
                                                        <span><i class="fa fa-tag"></i>Category: <a href="{{route('allcategorypost.list',[$post->category->slug])}}">{{$post->category->name}}</a></span>
                                                        <span><i class="fa fa-calendar"> {{$post->created_at->format('Y-m-d')}}</i></span>
                                                        @if (App\Models\Comment::where('post_id',$post->id)->get()->count()==0)
                                                            <span><i class="fa fa-comments"></i>Join the discussion</span>
                                                        @elseif (App\Models\Comment::where('post_id',$post->id)->get()->count()==1)
                                                            <span><i class="fa fa-comments"></i>{{App\Models\Comment::where('post_id',$post->id)->get()->count()}} Comment</span>
                                                        @else
                                                        <span><i class="fa fa-comments"></i>{{App\Models\Comment::where('post_id',$post->id)->get()->count()}} Comments</span>
                                                        @endif
                                                        <span><i class="fa fa-eye"></i>Views ({{$post->reads}})</span>
                                                    </div>
                                                </div>
                                                <div class="author-info">
                                                    <ul>
                                                        <li><i class="fa fa-user" style="color: #808080/*#F7941D*/;"></i>
                                                             Post by <a href="{{route('alluserpost.list',[$post->user->name,$post->user->id,$post->user->username])}}?authorid={{$post->user->id}}&username={{$post->user->username}}">{{$post->created_by}}</a>
                                                        </li>
                                                        <li class="rightside share">
                                                            <i class="fa fa-share-alt" style="color: #808080/*#F7941D*/;"></i>
                                                            Share
                                                            <span style="padding-right: 0px;"><a href="https://www.facebook.com/sharer/sharer.php?u={{route('post.show',[$post->id,$post->slug])}}?id={{$post->id}}&category={{$post->category->name}}&author={{$post->created_by}}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;" target="_blank" rel="noopener" title="Share on Facebook" ><i class="fa fa-facebook"></i></a></span>
                                                            &nbsp;
                                                            <span class="pull-right"><a href="whatsapp://send?text={{route('post.show',[$post->id,$post->slug])}}?id={{$post->id}}&category={{$post->category->name}}&author={{$post->created_by}}" data-action="share/whatsapp/share" title="Share on whatsapp"><i class="fa fa-whatsapp"></i></a></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="post-description">
                                                    {!! Str::words(strip_tags($post->body), 40) !!}
                                                </div>
                                                <div class="post-view-link">
                                                        <a href="{{route('post.show',[$post->id,$post->slug])}}?category={{$post->category->name}}&author={{$post->created_by}}"><span class="btn btnpost">Read More <i class="fa fa-long-arrow-right"></i></span></a>
                                                </div>
                                            </div>
                                        </div><br>

                                    </div>
                                </div>
                                @endforeach
                                 <!-- pagination begin -->
                                <div class="row" style="padding: 0; margin:0;">
                                    <div class="paginationBody">
                                        <nav aria-label="Page navigation">
                                            {{$posts->links()}}
                                        </nav>
                                    </div>
                                </div>
                                <!-- pagination end -->
                                @else
                                    <p>No posts to display</p>
                                @endif
                                <!-- post view section end -->
                            </div>
                        </div>
                        <!-- left side of the body end -->
                        <!-- right side of the body begin -->
                        <div class="col-lg-4 pt-5 pt-lg-0">
                            <div class="right-side">
                                <!-- author view section begin -->
                                <div class="row" style="padding: 0; margin:0;">
                                    <div class="post-view">
                                        <div class="pageTitle" style="margin-top: -2px;">
                                            <h3>About Author</h3>
                                        </div>
                                        <div class="post-card">
                                            <div class="post-detail">
                                                <div class="post-description" style="margin-top: 10px;">
                                                    <p>
                                                        <strong>{{$user->name}}</strong><br>
                                                            Profession: <br><span style="padding-left: 25px;">{{$user->designation}}</span><br>
                                                            Mail Id: <br><span style="padding-left: 25px;">{{$user->email}}</span><br>
                                                    </p>
                                                        <p style="padding-top: 5px;">{{$user->experience}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- author view section end -->
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
                                                            <a href="{{route('post.show',[$recent->id,$recent->slug])}}?category={{$recent->category->name}}&author={{$recent->created_by}}">
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
                                <!-- recent question list view begin -->
                                {{-- <div class="row" style="padding: 0; margin:0;
                                    display:">
                                    <div class="view-recent-post">
                                        <div class="header-title">
                                            <h4 class="title">Recent Question</h4>
                                        </div>
                                        <div class="view-list">

                                        </div>
                                    </div>
                                </div> --}}
                                <!-- recent question list view end -->
                            </div>
                        </div>
                        <!-- right side of the body begin -->
                    </div>
                </div>
            </section>
            <!-- ============== Post list Section End ============== -->
        </main>
        <!-- =================== Main Section End =================== -->
@endsection
