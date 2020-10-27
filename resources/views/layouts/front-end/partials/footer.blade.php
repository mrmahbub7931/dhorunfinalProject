<!--newsletter area start-->
<div class="newsletter_area_start">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                   <h2>Get <span>20% Off</span> Your Next Order</h2>
                </div>
                <div class="newsletter_container">
                     <div class="subscribe_form">
                        <form id="mc-form" class="mc-form footer-newsletter" >
                            <input id="mc-email" type="email" autocomplete="off" placeholder="Enter you email" />
                            <button id="mc-submit">Subscribe</button>
                            <div class="email_icon">
                                <i class="icon-mail"></i>
                            </div>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div><!-- mailchimp-alerts end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--newsletter area end-->
<!--footer area start-->
<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container contact_us">
                        <h3>Opening Time</h3>
                        <p><span>Mon - Fri:</span> 8AM - 10PM</p>
                        <p><span>Sat:</span> 9AM-8PM</p>
                        <p><span>Suns:</span> 14hPM-18hPM</p>
                        <p><b>We Work All The Holidays</b></p>
                    </div>          
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="faq.html">Frequently Questions</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="widgets_container widget_app">
                        <div class="footer_logo">
                           <a href="index.html"><img src="{{asset('assets/front-end/img/logo/logo.png')}}" alt=""></a>
                       </div>
                       <div class="footer_widgetnav_menu">
                           <ul>
                               <li><a href="#">Payment</a></li>
                               <li><a href="#">Affiliates</a></li>
                               <li><a href="#">Contact</a></li>
                               <li><a href="#">Internet</a></li>
                           </ul>
                       </div>
                        <div class="footer_social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="footer_app">
                            <ul>
                                <li><a href="#"><img src="{{asset('assets/front-end/img/icon/icon-app.jpg')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('assets/front-end/img/icon/icon1-app.jpg')}}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>My Account</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="cart.html">Shopping cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="#">Order History</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Customer Service</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="#">Terms of use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="contact.html">Site Map</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="#">Returns</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <p>Copyright &copy; 2019 <a href="#">Lukani</a>  All Right Reserved.</p>
                    </div>
                </div>    
                <div class="col-lg-6 col-md-6">    
                    <div class="footer_payment">
                        <a href="#"><img src="{{asset('assets/front-end/img/icon/payment.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</footer>
<!--footer area end-->

{{-- 
 <!--news letter popup start-->
 <div class="newletter-popup">
    <div id="boxes" class="newletter-container">
        <div id="dialog" class="window">
            <div id="popup2">
                <span class="b-close"><span>close</span></span>
            </div>
            <div class="box">
                <div class="newletter-title">
                    <h2>Newsletter</h2>
                </div>
                <div class="box-content newleter-content">
                    <label class="newletter-label">Enter your email address to subscribe our notification of our new post &amp; features by email.</label>
                    <div id="frm_subscribe">
                        <form name="subscribe" id="subscribe_popup">
                                <!-- <span class="required">*</span><span>Enter you email address here...</span>-->
                                <input type="text" value="" name="subscribe_pemail" id="subscribe_pemail" placeholder="Enter you email address here...">
                                <input type="hidden" value="" name="subscribe_pname" id="subscribe_pname">
                                <div id="notification"></div>
                                <a class="theme-btn-outlined" onclick="email_subscribepopup()"><span>Subscribe</span></a>
                        </form>
                        <div class="subscribe-bottom">
                            <input type="checkbox" id="newsletter_popup_dont_show_again">
                            <label for="newsletter_popup_dont_show_again">Don't show this popup again</label>
                        </div>
                    </div>
                    <!-- /#frm_subscribe -->
                </div>
                <!-- /.box-content -->
            </div>
        </div>

    </div>
    <!-- /.box -->
</div>
<!--news letter popup start--> --}}