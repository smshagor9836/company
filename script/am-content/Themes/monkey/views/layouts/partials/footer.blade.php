<footer id="footer">
    <div class="footer-area">
        <div class="footer-main-area pt-50 pb-50" id="footer_bg_image" style="background-image: url({{ asset(content('footer','footer_bg_image')) }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-left-side">
                            <div class="footer-left-info">
                                <div class="footer-logo">
                                    <img id="footer_logo" src="{{ asset(content('footer','footer_logo')) }}" alt="">
                                </div>
                            </div>
                            <div class="footer-left-des">
                                <p id="footer_des">{{ content('footer','footer_des') }}</p>
                            </div>
                            <div class="footer-social-menu">
                                <nav>
                                    <ul class="footer-social">
                                        @php
                                        $fb=content('footer','footer_fb_link');
                                        $footer_instagram_link=content('footer','footer_instagram_link');
                                        $footer_twitter_link=content('footer','footer_twitter_link');
                                        $footer_google_link=content('footer','footer_google_link');
                                        
                                        $footer_linkedin_link=content('footer','footer_linkedin_link');
                                        @endphp
                                        @if(!empty($fb))
                                        <li>
                                            <a id="footer_fb_link" target="_blank" href="{{ url($fb) }}"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        @endif
                                        
                                        
                                        @if(!empty($footer_twitter_link))

                                        <li>
                                            <a id="footer_twitter_link" target="_blank" href="{{ url($footer_twitter_link) }}"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        @endif
                                        @if(!empty($footer_google_link))

                                        <li>
                                            <a id="footer_google_link" target="_blank" href="{{ url($footer_google_link) }}"><i class="fab fa-google"></i></a>
                                        </li>
                                        @endif
                                        
                                         @if(!empty($footer_linkedin_link))

                                        <li>
                                            <a id="footer_linkedin_link" target="_blank" href="{{ url($footer_linkedin_link) }}"><i class="fab fa-linkedin"></i></a>
                                        </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-content ml-25">
                            <h2>{{ __('Support') }}</h2>
                            <ul>
                                <?php echo Menu('footer_left','','','','left',true); ?>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-content fml-15">
                            <h2>{{ __('Quick Links') }}</h2>
                            <ul>
                                <?php echo Menu('footer_right','','','','left',true); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-content fml-15 fml-20">
                            <h2 id="footer_right_title">{{ content('footer','footer_right_title','footer_right') }}</h2>
                            <ul>
                                <li>
                                    <a href="tel:{{ content('footer','footer_right_phone','footer_right') }}"><i class="fas fa-angle-right"></i> <span id="footer_right_phone">{{ content('footer','footer_right_phone','footer_right') }}</span></a>
                                </li>
                                <li>
                                    <a href="tel:{{ content('footer','footer_right_contact_number','footer_right') }}"><i class="fas fa-angle-right"></i> <span id="footer_right_contact_number">{{ content('footer','footer_right_contact_number','footer_right') }}</span></a>
                                </li>
                                <li>
                                    <a href="mailto:{{ content('footer','footer_right_email','footer_right') }}"><i class="fas fa-angle-right"></i> <span id="footer_right_email">{{ content('footer','footer_right_email','footer_right') }}</span></a>
                                </li>
                                <li>
                                    <a href="mailto:{{ content('footer','footer_right_support_email','footer_right') }}"><i class="fas fa-angle-right"></i> <span id="footer_right_support_email">{{ content('footer','footer_right_support_email','footer_right') }}</span></a>
                                </li>
                                <li>
                                    <i class="fas fa-angle-right"></i> <span id="footer_right_address">{{ content('footer','footer_right_address','footer_right') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area pt-20 pb-20">
            <div class="footer-bottom-content text-center">
                <span id="footer_copyright">{{ content('footer','footer_copyright') }}</span>
            </div>
        </div>
    </div>
</footer>
