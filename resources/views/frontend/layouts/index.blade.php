@extends('frontend.layouts.app')

@section('content')
@php
	$horizontal = DB::table('advertisements')->where('type',2)->first();
@endphp
        <!-- ============== Hero Section Begin ============== -->
        <!-- <section id="hero" class="d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1">
                        <h1>Bettter blogging experience with 24webinfo</h1>
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
                        {{-- ads start --}}
                        <div class="col-lg-12 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                            <div class="top-add">
                                @if($horizontal == NULL)
                                @else
                                <a href="{{ $horizontal->link }}" target="_blank" rel="noopener"><img src=" {{ asset($horizontal->image) }}" loading="lazy" alt="" /></a>
                                @endif
                            </div>
                        </div>
                        {{-- ads end --}}
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
                                                            {{-- {{ strip_tags($post->text) }} --}}
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
                                    <h4>No Data Found</h4>
                                @endif
                                <!-- post view section end -->
                            </div>
                        </div>
                        <!-- left side of the body end -->
                        <!-- right side of the body begin -->
                        <div class="col-lg-4 pt-5 pt-lg-0">
                            <div class="right-side">
                                <!-- search option -->
                                <div class="row" style="padding: 0; margin:0;">
                                    <div class="searchbox">
                                        <form action="{{route('post.search')}}" enctype="multipart/form-data" method="post" role="form" class="form">@csrf
                                            <input type="text" class="view" onfocus="search_result_show()" onblur="search_result_hide()" id="postSearch" name="search" placeholder="Search Here..." autocomplete="off">
                                            <button class="button" type="submit" ><i class="fa fa-search"></i></button>
                                            <div class="answersearch" id="blogPostSearch"></div>
                                            <script type="text/javascript">
                                                $("body").on("keyup", "#postSearch", function(){
                                                    let text = $("#postSearch").val();
                                                    // console.log(text);
                                                    if (text.length > 0) {
                                                        $.ajax({
                                                            data: {search: text},
                                                            url : "search-post",
                                                            method : 'post',
                                                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                                            success:function(result){
                                                                $("#blogPostSearch").html(result);
                                                            }
                                                        }); // end ajax
                                                        $(document).on('click','p',function(){
                                                            $("#postSearch").val($(this).text());
                                                            $("#blogPostSearch").html('');
                                                        });
                                                    } // end if
                                                    if (text.length < 1 ) $("#blogPostSearch").html("");
                                                });

                                                function search_result_hide(){
                                                    $("#blogPostSearch").slideUp();
                                                }

                                                function search_result_show(){
                                                    $("#blogPostSearch").slideDown();
                                                }
                                            </script>
                                        </form>
                                    </div>
                                </div>
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
                                                    <h2>No Data Found</h2>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- category list view end -->
                                <!-- Ads begin -->
                                <div class="col-md-12 col-sm-12">
                                    @php
                                        $vertical = DB::table('advertisements')->where('type',1)->first();
                                    @endphp
                                    <div class="sidebar-add">
                                        @if($vertical == NULL)

                                        @else
                                            <a href="{{ $vertical->link }}" target="_blank" rel="noopener"><img src=" {{ asset($vertical->image) }}" loading="lazy" alt="" /></a>
                                        @endif
                                    </div>
                                </div>
                                <!-- Ads end -->
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
                                                            <img src="{{asset($recent->image)}}" loading="lazy" class="img-fluid" style="width: 55%;" alt="Post Image">
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
                                                    <h2>No Data Found</h2>
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
                                <br>

                                <!-- Ads begin -->
                                <div class="col-md-12 col-sm-12">
                                    @php
                                        $vertical = DB::table('advertisements')->where('type',1)->skip(1)->first();
                                    @endphp
                                    <div class="sidebar-add">
                                        @if($vertical == NULL)

                                        @else
                                            <a href="{{ $vertical->link }}" target="_blank" rel="noopener"><img src=" {{ asset($vertical->image) }}" loading="lazy" alt="" /></a>
                                        @endif
                                    </div>
                                </div>
                                <!-- Ads end -->
                            </div>
                        </div>
                        <!-- right side of the body begin -->
                        <!-- add-start -->
                        <div class="row">
                            @php
                                $horizontal = DB::table('advertisements')->where('type',2)->skip(2)->first();
                            @endphp
                            <div class="col-md-6 col-sm-6">
                                <div class="add">
                                    @if($horizontal == NULL)

                                    @else
                                    <a href="{{ $horizontal->link }}" target="_blank" rel="noopener"><img src=" {{ asset($horizontal->image) }}" loading="lazy" alt="" /></a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                @php
                                    $horizontal = DB::table('advertisements')->where('type',2)->skip(3)->first();
                                @endphp
                                <div class="add">

                                    @if($horizontal == NULL)

                                    @else
                                        <a href="{{ $horizontal->link }}" target="_blank" rel="noopener"><img src=" {{ asset($horizontal->image) }}" loading="lazy" alt="" /></a>
                                    @endif


                                </div>
                            </div>
                        </div><!-- /.add-close -->
                    </div>
                </div>
            </section>
            <!-- ============== Post list Section End ============== -->
        </main>
        <!-- =================== Main Section End =================== -->
@endsection
