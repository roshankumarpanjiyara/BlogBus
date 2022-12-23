        <!-- =================== Footer Section Begin =================== -->
        <footer id="footer">
            <!-- <div class="footer-newsletter" data-aos="fade-up">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <h4>Join Our 24 Webinfo</h4>
                            <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>
                            <form action="" method="post">
                                <input type="email" name="email"><input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 footer-contact" data-aos="fade-up" data-aos-delay="100">
                            <!-- <h3>24 Webinfo</h3> -->
                            <div style="padding-bottom: 10px; width: 150px">
                                <a href="/">
                                    <img src="{{asset('logos/img/blogbus-2.png')}}" alt="blogbus" class="img-fluid">
                                </a>
                            </div>
                            <p>
                                About BlogBus was Launched in 2022, BlogBus.com is the largest gadget discovery site in India, focused on smartphones and blogging on upcoming technologies, education, travel, lifestyles.
                            </p><br>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="https://www.facebook.com/247webinfo/?ref=settings" class="facebook" target="_blank" rel="noopener" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="200">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="/about">About Us</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="/contact">Contact Us</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="/admin/login" target="_blank" rel="noopener">Admin Login</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="300">
                            <h4>Information</h4>
                            <p>
                                Muragacha (Near HP Petrol Pump) <br>
                                Sodepur, Kolkata <br>
                                West Bengal - 700110<br><br>
                                {{-- <strong>Phone:</strong> <a href="tel:+91 6290972763">+91 6290972763</a><br> --}}
                                <strong>Email:</strong> <a href="mailto:roshanpanjiyara055@gmail.com">roshanpanjiyara055@gmail.com</a><br>
                            </p>
                        </div>
                        <div class="col-lg-4 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="400">
                            <h4>Get In Touch</h4>
                            <p>
                            <form action="{{route('contacts.store')}}" enctype="multipart/form-data" method="post" role="form" class="contact-form">@csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user" style="padding: 0 1px 0 2px;"></i></span>
                                        </div>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" required=""/>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" required=""/>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="comment">Message</label> -->
                                    <textarea class="form-control  @error('body') is-invalid @enderror" name="body" rows="3" cols="30" placeholder="Message(less than 500 characters)..."></textarea>
                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div style="float: right;">
                                    <button type="submit" name="Send" class="btn btn-secondary">
                                        Send &nbsp;
                                    <i class="fa fa-send-o"></i></button>
                                </div><br><br>
                            </form>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-4">
                <div class="copyright">
                    &copy; 2022 &nbsp; <strong>BlogBus</strong>. &nbsp; All Rights Reserved
                </div>
                <div class="credits">
                    Developed by Roshan Kumar
                </div>
            </div>
        </footer>
        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
        <!-- =================== Footer Section End =================== -->
        <!-- =================== JS Files Begin ===================-->
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        {{-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-609fcd3324873022"></script> --}}
        <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
        <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
        <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
        <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
        <script src="{{asset('assets/vendor/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
        <!-- <script src="assets/texteditor/main.js')}}" type="text/javascript"></script>  -->
        <!-- Template Main JS File -->
        <script src="{{asset('assets/js/main.js')}}"></script>
        <!-- <script type="text/javascript">
            var str = "Apple, Banana, Kiwi";
            var res = str.slice(7,13);
            document.getElementById("demo").innerHTML = res;
        </script> -->
        {{-- <script>
            $(document).ready(function(){
            $("#hide").click(function(){
                $("#hidesumary").hide();
            });
            $("#show").click(function(){
                $("#hidesumary").show();
            });
            });
        </script> --}}
        {{-- <script>
            function toggle_it(itemID){
                // Toggle visibility between none and ''
                if ((document.getElementById(itemID).style.display == '')) {
                        document.getElementById(itemID).style.display = 'none' ;
                        event.preventDefault();
                } else {
                        document.getElementById(itemID).style.display = '';
                        event.preventDefault();
                }
            }
        </script> --}}
        {{-- <script type="text/javascript">
            function onSignIn(googleUser) {
              var profile = googleUser.getBasicProfile();
              // console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
              $(".g-signin2").css("display","none");
              $(".data").css("display","block");

              var mailname = (profile.getName());
              console.log(mailname);
              document.getElementById("name").value = mailname;

              var mailimg = (profile.getImageUrl());
              console.log(mailimg);
              document.getElementById("img").value = mailimg;

              var gmail = (profile.getEmail()); // This is null if the 'email' scope is not present.
              console.log(gmail);
              document.getElementById("mail").value = gmail;

            }
        </script> --}}
        {{-- <script>
            function toggle_guest(itemID){
                // Toggle visibility between none and ''
                if ((document.getElementById(itemID).style.display == 'none')) {
                        document.getElementById(itemID).style.display = '' ;
                        event.preventDefault();
                } else {
                        document.getElementById(itemID).style.display = 'none';
                        event.preventDefault();
                }
            }
        </script> --}}
        <!-- user panel navbar -->
        <script>
            function myFunction() {
                var x = document.getElementById("userTopnav");
                if (x.className === "userNavBar") {
                    x.className += " responsive";
                } else {
                    x.className = "userNavBar";
                }
            }
        </script>

        <script>
            function myFunction() {
              var x = document.getElementById("myTopnav");
              if (x.className === "topnav") {
                x.className += " responsive";
              } else {
                x.className = "topnav";
              }
            }
        </script>
        <style>
            .top-add{
                margin:5px 0;
                padding-bottom:10px;
            }
            .top-add img{
                width:100%;
                height:auto;
            }
            .add{
                margin:10px 0;
                margin-bottom: -5%;
            }
            .add img{
                width:100%;
                height:100px;
            }
            .sidebar-add{
                margin:5px 0;
            }
            .sidebar-add img{
                width:100%;
                height:auto;
            }
        </style>
        <!-- =================== JS Files End ===================-->
    </body>
</html>

