@extends('frontend.layouts.app')
@section('mytitle', 'About Us | ')
@section('content')
<!-- ======= About Section ======= -->
        <!-- ============== Hero Section Begin ============== -->
        <section id="hero" class="d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 pagetitle">
                        <h1>India's No. 1 Platfrom for Blogging and Compare Mobile Phone</h1>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img">
                        <img src="{{asset('assets/img/feature-image/feature-2.png')}}" class="img-fluid" alt="" style="width:70%">
                    </div>
                </div>
            </div>
        </section>
        <!-- ============== Hero Section End ============== -->
        <!-- =================== Main Section Begin =================== -->
        <main id="main">
            <!-- ============== Rental Services Section Begin ============== -->
            <section class="rental">
                <div class="container">
                    <!-- 1st one -->
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-5 d-flex align-items-center justify-content-center rental-img">
                            <img src="assets/img/feature-image/feature-6.png" class="img-fluid" alt="" data-aos="zoom-in">
                        </div>
                        <div class="col-lg-6 pt-5 pt-lg-0">
                            <!-- <h3 data-aos="fade-up">About</h3> -->
                            <p data-aos="fade-up" data-aos-delay="100">
                                About BlogBus was Launched in 2022, BlogBus.com is the largest gadget discovery site in India, focused on smartphones and blogging on upcoming technologies , education , travel , lifestyles. It provides information and interactive tools to help people decide which phone to buy and where to buy it from.is visited by over 25 million gadget enthusiasts every month, and ranks among the top 200 websites in India. BlogBus.com has a team of 5 people based out of kolkata(HO).
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- 2nd one -->
            <section class="rental">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-6 pt-5 pt-lg-0">
                            <!-- <h3 data-aos="fade-up">About</h3> -->
                            <p data-aos="fade-up" data-aos-delay="100">
                                BlogBus.com works with most of the leading electronics and telecom brands (Samsung, Nokia, Oppo, Vivo, etc.), as well as leading e-tailers (Amazon, Flipkart,...), to provide them with innovative ways to reach BlogBus.com’s gadget enthusiast community for promoting their products and offers.
                            </p>
                            <p data-aos="fade-up" data-aos-delay="200">
                                India first blogging site were people can share their knowledge respected their field / categories.
                            </p>
                            <p data-aos="fade-up" data-aos-delay="300">
                                In which people can easily get the information from the BlogBus.com, regarding Education, Lifestyle, Travel, technologies... etc, or   people can can comment on their respected fields / categories.
                            </p>
                        </div>
                        <div class="col-lg-5 d-flex align-items-center justify-content-center rental-img">
                            <img src="assets/img/feature-image/feature-5.png" class="img-fluid" alt="" data-aos="zoom-in">

                        </div>
                    </div>
                </div>

            </section>
            <!-- ============== Rental Services Section End ============== -->
        </main>
        <!-- =================== Main Section End =================== -->
        <!-- End About Section -->
@endsection
