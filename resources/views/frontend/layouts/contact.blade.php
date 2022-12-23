@extends('frontend.layouts.app')
@section('mytitle', 'Contact Us | ')
@section('content')
<!-- ======= Contact Us Section ======= -->
<main id="main">
    <!-- ============== Contact Us Section Begin ============== -->
    <section class="contact">
        <div class="msg">
        </div>
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2 style="color: #fff;">Contact Us</h2>
                <p style="color: #fff;">Get In Touch</p>
            </div>
            <div class="row">
                <div class="col-md-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="info">
                        <div class="row infospace">
                            <div class="col-md-6 info-left">
                                <div class="space">
                                    <div class="spaceicon"><i class="fa fa-code"></i></div>
                                    <div class="spacetitle">
                                        <h3>Bautiful, Customized Webpage</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 info-right">
                                <div class="space">
                                    <div class="spaceicon"><i class="fa fa-cubes"></i></div>
                                    <div class="spacetitle">
                                        <h3>Computer & CCTV Peripherals</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row infospace">
                            <div class="col-md-6 info-left">
                                <div class="space">
                                    <div class="spaceicon"><i class="fa fa-desktop"></i></div>
                                    <div class="spacetitle">
                                        <h3>Computer & CCTV Rental Services</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 info-right">
                                <div class="space">
                                    <div class="spaceicon"><i class="fa fa-magic"></i></div>
                                    <div class="spacetitle">
                                        <h3>Graphic Design & Digital Marketing</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <form action="{{route('contacts.store')}}" enctype="multipart/form-data" method="post" role="form" class="contact-form">@csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Your Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Please enter your name" required=""/>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Your Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Please enter your email" required=""/>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Message</label>
                            <textarea class="form-control  @error('body') is-invalid @enderror" name="body" rows="10" placeholder="Please write something for us (less than 500 characters)..."></textarea>
                            @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="text-center"><button type="submit" name="Send">Send Message</button></div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class=" contact-detail">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="contact-text">
                                    <p>
                                        Need to reach us? No problem. Just fill out the form above and we'll make sure your message reaches the right person.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="contact-mail">
                                    <a href="mailto:roshanpanjiyara055@gmail.com" style="font-size: 1.2rem">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp; roshanpanjiyara055@gmail.com
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- view map begin -->
    <div class="view-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14724.076460255592!2d88.41509033909324!3d22.690332326895835!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8c062b5d0bd61a0f!2sMARKET%20CLAP!5e0!3m2!1sen!2sin!4v1577532476175!5m2!1sen!2sin" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
    <!-- view map end -->
    <!-- ============== Contact Us Section End ============== -->
</main><!-- End Contact Us Section -->

@endsection
