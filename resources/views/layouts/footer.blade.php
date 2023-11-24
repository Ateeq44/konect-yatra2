
<footer id="colophon" class="site-footer footer-primary pt-0">
    <div class="buttom-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                   <div class="footer-menu">
                      <a href="#"><img style="width:200px;" src="{{asset('assets\images2/newwhitelogo.png')}}" alt=""></a>
                  </div>
              </div>

              <div class="col-md-2">
                <div class="header-social social-links">
                    <ul>
                       <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                       <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                       <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                       <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                   </ul>
               </div>
           </div>
           <div class="col-md-2">
            <div class="header-btn">
              <a href="#" class="button-primary">Join Now</a>
          </div>                
      </div>

  </div>
</div>
</div>
<div class="top-footer " style="margin-top:80px;">
    <div class="container">
        <div class="row">
         <div class="col-lg-5 col-md-12">
           <aside class="widget widget_newslatter">
              <h3 class="widget-title">Sign Up For A Newsletter</h3>
              <div class="widget-text">
                  Weekly Breaking news analysis and cutting edge advices on job searching.
              </div>

              <form class="newslatter-form">

                 <div class="input-group">
                    <input name="email" required="required" style="padding: 26px!important;border-radius: 10px 0px 0px 10px;"  class="form-control" placeholder="Your Email Address" type="email">
                    <span class="input-group-btn">
                        <button name="submit" value="Submit" type="submit" class="btn button-primary"><i class="fa fa-arrow-right"></i></button>
                    </span>
                </div>

            </form>
        </aside>
    </div>
    <div class="col-lg-2 col-md-6">
        <aside class="widget widget_text">
            <h3 class="widget-title">
                Company
            </h3>
            <div class="textwidget widget-text">
                <ul>
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/aboutus') }}">About</a></li>
                    <li><a href="{{ url('/contactus') }}">Contact</a></li>
                </ul>
            </div>

        </aside>
    </div>
    <div class="col-lg-2 col-md-6">
        <aside class="widget widget_text">
            <h3 class="widget-title">About</h3>
            <div class="textwidget widget-text">
                <ul>
                    <li><a href="{{ url('/packages') }}">Packages</a></li>
                    <li><a href="{{ url('/itinerary') }}">Itinerary</a></li>
                    <li><a href="{{ url('/gurdwaras') }}">Gurdwaras</a></li>
                </ul>
            </div>
        </aside>
    </div>
    <div class="col-lg-3 col-md-12">
       <aside class="widget widget_recent_post">
          <h3 class="widget-title">Our Gallery</h3>
          <div class="widget widget_gallery gallery-grid-4">

            <ul class="magnific-image">
                <li><a href="{{asset('assets/images2/ga1.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images2/ga1.jpg')}}" alt=""></a></li>
                <li><a href="{{asset('assets/images2/ga2.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images2/ga2.jpg')}}" alt=""></a></li>
                <li><a href="{{asset('assets/images2/ga3.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images2/ga3.jpg')}}" alt=""></a></li>
                <li><a href="{{asset('assets/images2/ga4.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images2/ga4.jpg')}}" alt=""></a></li>
                <li><a href="{{asset('assets/images2/ga5.png')}}" class="magnific-anchor"><img src="{{asset('assets/images2/ga5.png')}}" alt=""></a></li>
                <li><a href="{{asset('assets/images2/ga6.png')}}" class="magnific-anchor"><img src="{{asset('assets/images2/ga6.png')}}" alt=""></a></li>
                <li><a href="{{asset('assets/images2/ga7.png')}}" class="magnific-anchor"><img src="{{asset('assets/images2/ga7.png')}}" alt=""></a></li>
                <li><a href="{{asset('assets/images2/ga8.jpg')}}" class="magnific-anchor"><img src="{{asset('assets/images2/ga8.jpg')}}" alt=""></a></li>
            </ul>
        </div>
    </aside>
</div>
</div>
</div>
</div>

</footer>
<button class="back-to-top fa fa-chevron-up" ></button>
</div>
<!-- new theme -->
<script data-cfasync="false" src="{{asset('../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
<script src="{{asset('new-assets/js/jquery.js')}}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js'></script>
<script>
    $(document).ready(function () {
      $("#news-slider").owlCarousel({
        items: 2,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [980, 2],
        itemsMobile: [600, 1],
        navigation: true,
        navigationText: ["", ""],
        pagination: true,
        autoPlay: true
    });
  });
</script>
<script src="{{asset('../../../cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js')}}"></script>
<script src="{{asset('new-assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('new-assets/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('new-assets/vendors/countdown-date-loop-counter/loopcounter.js')}}"></script>
<script src="{{asset('new-assets/js/jquery.counterup.js')}}"></script>
<script src="{{asset('new-assets/vendors/modal-video/jquery-modal-video.min.js')}}"></script>
<script src="{{asset('new-assets/vendors/masonry/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('new-assets/vendors/lightbox/dist/js/lightbox.min.js')}}"></script>
<script src="{{asset('new-assets/vendors/slick/slick.min.js')}}"></script>
<script src="{{asset('new-assets/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('new-assets/js/custom.min.js')}}"></script>


{{-- Slick Slider --}}
<script src='https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js'></script>

<script>

    $(".slick-slider").slick({
        slidesToShow: 3,
     infinite:false,
     slidesToScroll: 1,
     autoplay: true,
     autoplaySpeed: 2000
     // dots: false, Boolean
    // arrows: false, Boolean
 });

</script>
{{-- Slick Slider End --}}
<!-- new theme end -->



</body>

</html>
