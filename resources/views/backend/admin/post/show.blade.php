@extends('frontend.layouts.app')
@section('mytitle', 'Preview | ')
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
                                <div class="row" style="padding: 0; margin:0;">
                                    <div class="post-view">
                                        <div class="pageTitle" >
                                            <h3>Home Page Post View</h3>
                                        </div>
                                        <div class="post-card">
                                            <div class="post-img d-flex align-items-center justify-content-center">
                                                @if ($userPostPic)
                                                <img src="{{asset($showpost->image)}}" style="width: 100%;height: 400px;" alt="" />
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
                                                        <span><i class="fa fa-tag"></i>Category: {{$showpost->category->name}}</span>
                                                        <span><i class="fa fa-calendar"> {{$showpost->created_at->format('Y-m-d')}}</i>

                                                        </span>
                                                        <span><i class="fa fa-comments"></i>Comments </span>
                                                        <span><i class="fa fa-eye"></i>Views </span>
                                                    </div>
                                                </div>
                                                <div class="author-info">
                                                    <ul>
                                                        <li><i class="fa fa-user" style="color: #808080/*#F7941D*/;"></i>
                                                             Post by {{$showpost->created_by}}
                                                        </li>
                                                    </ul>
                                                </div>
                                                {{-- <div class="addthis_inline_share_toolbox_bztn"></div> --}}
                                                <div class="post-description">
                                                    {!! \Illuminate\Support\Str::words($showpost->body, 60)  !!}
                                                </div>
                                                <div class="post-view-link">
                                                    <a href="#">
                                                        <span class="btn btnpost" >Read More <i class="fa fa-long-arrow-right"></i></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div><br>
                                    </div>
                                </div>
                                <!-- post view section begin -->
                                <div class="row" style="padding: 0; margin:0;">
                                    <div class="post-view">
                                        <div class="pageTitle">
                                            <h3>Post Details Page View</h3>
                                        </div>
                                        <div class="post-card">
                                            <div class="post-img d-flex align-items-center justify-content-center">
                                                @if ($userPostPic)
                                                <img src="{{asset($showpost->image)}}" style="width: 100%;height: 400px;" alt="" />
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
                                                        <span><i class="fa fa-tag"></i>Category: {{$showpost->category->name}}</span>
                                                        <span><i class="fa fa-calendar"> {{$showpost->created_at->format('Y-m-d')}}</i>

                                                        </span>
                                                        <span><i class="fa fa-comments"></i>Comments </span>
                                                        <span><i class="fa fa-eye"></i>Views </span>
                                                    </div>
                                                </div>
                                                <div class="author-info">
                                                    <ul>
                                                        <li><i class="fa fa-user" style="color: #808080/*#F7941D*/;"></i>
                                                             Post by {{$showpost->created_by}}
                                                        </li>
                                                    </ul>
                                                </div>
                                                {{-- <div class="addthis_inline_share_toolbox_bztn"></div> --}}
                                                <div class="post-description">
                                                    {!! $showpost->body !!}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- post view section end -->
                            </div>
                        </div>
                        <!-- left side of the body end -->
                        <!-- right side of the body begin -->
                        <div class="col-lg-4 pt-5 pt-lg-0">
                            <div class="right-side">
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
                                                    <a href="">{{$category->name}}<span></span></a>
                                                </li>
                                                @empty
                                                    <p>No category to display</p>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- category list view end -->
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
