@extends('frontend.layouts.app')
@section('mytitle', 'Top Views | ')
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
                    <!-- top list blog view begin -->
                    <div class="row "><!-- justify-content-between -->
                        @foreach($topview as $post)
                        <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                            <div class="postcard">
                                <div class="postcard-img d-flex align-items-center justify-content-center">
                                    @if ($post->image)
                                        <img src="{{asset($post->image)}}" loading="lazy" class="img-fluid">
                                    @else
                                        <img src="{{asset('logos/img/blogbusbg.png')}}" loading="lazy" class="img-fluid">
                                    @endif
                                </div>
                                <h2 class="postcard-title">
                                    <a href="{{route('post.show',[$post->id,$post->slug])}}?category={{$post->category->name}}&author={{$post->created_by}}">
                                        {!! (Str::limit($post->title,40)) !!}
                                    </a>
                                </h2>
                                <div class="share">
                                    <i class="fa fa-share-alt" style="color: #808080/*#F7941D*/;"></i>
                                    Share
                                    <span style="padding-right: 0px;"><a href="https://www.facebook.com/sharer/sharer.php?u={{route('post.show',[$post->id,$post->slug])}}?id={{$post->id}}&category={{$post->category->name}}&author={{$post->created_by}}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;" target="_blank" rel="noopener" title="Share on Facebook" ><i class="fa fa-facebook"></i></a></span>
                                    &nbsp;
                                    <span class="pull-right"><a href="whatsapp://send?text={{route('post.show',[$post->id,$post->slug])}}?id={{$post->id}}&category={{$post->category->name}}&author={{$post->created_by}}" data-action="share/whatsapp/share" title="Share on whatsapp"><i class="fa fa-whatsapp"></i></a></span>
                                </div>
                                <div class="postcard-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i>
                                            {{$post->created_at->format('Y-m-d')}}
                                        </li>
                                        <li class="d-flex align-items-center">
                                            @if (App\Models\Comment::where('post_id',$post->id)->get()->count()==0)
                                                <span><i class="fa fa-comments"></i>Join the discussion</span>
                                            @elseif (App\Models\Comment::where('post_id',$post->id)->get()->count()==1)
                                                <span><i class="fa fa-comments"></i>{{App\Models\Comment::where('post_id',$post->id)->get()->count()}} Comment</span>
                                            @else
                                            <span><i class="fa fa-comments"></i>{{App\Models\Comment::where('post_id',$post->id)->get()->count()}} Comments</span>
                                            @endif
                                        </li>
                                        <li class="d-flex align-items-center"><i class="fa fa-eye"></i> {{$post->reads}}</li>
                                        <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="{{route('alluserpost.list',[$post->user->name,$post->user->id,$post->user->username])}}?authorid={{$post->user->id}}&username={{$post->user->username}}" style="color: #fc8902">{{$post->created_by}}</a></li>
                                        <li class="d-flex align-items-center"><i class="fa fa-tag"></i><a href="{{route('allcategorypost.list',[$post->category->slug])}}" style="color: #fc8902">{{$post->category->name}}</a></li>
                                    </ul>
                                </div>
                                <div class="postcard-content">

                                    <p>{!! (Str::limit($post->body,55)) !!}</p>
                                    <div class="read-more">
                                        <a href="{{route('post.show',[$post->id,$post->slug])}}?category={{$post->category->name}}&author={{$post->created_by}}">Read More <i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- top list blog view end -->
                </div>
            </section>
            <!-- ============== Post list Section End ============== -->
        </main>
        <!-- =================== Main Section End =================== -->
@endsection
