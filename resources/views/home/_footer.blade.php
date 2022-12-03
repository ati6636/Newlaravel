@php
    $setting = \App\Http\Controllers\HomeController::getSetting()
@endphp

    <!-- FOOTER -->
<footer id="footer" class="section section-grey">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <!-- footer logo -->
                    <div class="footer-logo">
                        <a class="logo" href="{{route('home')}}">
                            <img src="{{asset('front/')}}/img/logo.png" alt="">
                        </a>
                    </div>
                    <!-- /footer logo -->

                    <h4>Address</h4>
                    {{$setting->company}}<br>
                    {{$setting->address}}<br>
                    <strong>Phone :</strong> {{$setting->phone}}<br>
                    <strong>Email :</strong> {{$setting->email}}<br>
                    <strong>Fax :</strong> {{$setting->fax}}<br>

                    <!-- footer social -->
                    <ul class="footer-social">
                        @if($setting->facebook !=null) <li><a href="{{ $setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li> @endif
                        @if($setting->twitter !=null)<li><a href="{{$setting->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li> @endif
                        @if($setting->instagram !=null)<li><a href="{{$setting->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li> @endif
                        @if($setting->youtube !=null)<li><a href="{{$setting->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a></li> @endif
                    </ul>
                    <!-- /footer social -->
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">My Account</h3>
                    <ul class="list-links">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">My Wishlist</a></li>
                        <li><a href="#">Compare</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="{{route('login')}}">Login</a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer widget -->

            <div class="clearfix visible-sm visible-xs"></div>

            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">Customer Service</h3>
                    <ul class="list-links">
                        <li><a href="{{route('about')}}">About Us</a></li>
                        <li><a href="#">Shiping & Return</a></li>
                        <li><a href="#">Shiping Guide</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer subscribe -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">Stay Connected</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                    <form>
                        <div class="form-group">
                            <input class="input" placeholder="Enter Email Address">
                        </div>
                        <button class="primary-btn">Join Newslatter</button>
                    </form>
                </div>
            </div>
            <!-- /footer subscribe -->
        </div>
        <!-- /row -->
        <hr>
        <!-- row -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <!-- footer copyright -->
                <div class="footer-copyright">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | {{ $setting->company }} <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://fibrika.com.tr" target="_blank">fibrika</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
                <!-- /footer copyright -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="{{asset('front/')}}/js/jquery.min.js"></script>
<script src="{{asset('front/')}}/js/bootstrap.min.js"></script>
<script src="{{asset('front/')}}/js/slick.min.js"></script>
<script src="{{asset('front/')}}/js/nouislider.min.js"></script>
<script src="{{asset('front/')}}/js/jquery.zoom.min.js"></script>
<script src="{{asset('front/')}}/js/main.js"></script>
