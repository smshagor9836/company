<header id="header">
    <div class="header-area">
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 notify">
                        <p id="header_left_notify">{{ content('header','header_left_notify') }}</p>
                        </a>
                    </div>
                    <div class="col-lg-7">
                        <div class="header-top-bar-right f-right">
                            <a href="tel:01765287">
                                <i class="fa fa-phone"></i>
                                <span id="header_phone_number">{{ content('header','header_phone_number') }}</span>
                            </a>
                            <div class="item-info address mr-2">
                                <i class="fa fa-map-marker-alt"></i>
                                <span class="info-text" id="header_address">{{ content('header','header_address') }}</span>
                            </div>
                            <div class="item-info">
                                <div class="select-language">
                                    @php 
                                     $get_data = LpOption('langlist',true);
                                    @endphp
                                    <i class="fas fa-globe"></i>
                                    <select id="select_language">
                                        @foreach($get_data as $key=>$data)
                                        <option {{ Session::get('locale') == $data ? 'selected' : ''  }} value="{{ $data }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" value="{{ route('language.set') }}" id="select_lang_url">            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo-area">
                            <a href="{{ url('/') }}"><img id="header_logo" src="{{ asset(content('header','header_logo')) }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        @if(Amcoders\Plugin\Plugin::is_active('ecommerce'))
                        <div class="header-bag-area f-right">
                            <a href="{{ route('cart.index') }}">
                                <img src="{{ theme_asset('monkey/public/img/bag.png') }}" alt="">
                                <div id="load_cart_count">
                                <span id="cart_count">{{ Cart::count() }}</span>
                                </div>
                            </a>
                        </div>
                        @endif
                        <div class="main-menu f-right">
                            <nav id="mobile-menu">
                                <ul>

                                    <?php echo Menu('Header','submenu','','','right',true); ?>
                                </ul>
                            </nav>
                        </div>
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>