
 <section>
    <div class="navbar-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 logo-area">
                    <div class="logo text-center">
                        <h4><a href="{{ route('admin.dashboard') }}">{{ config('app.name') }}</a></h4>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-2 hamburger-width">
                            <div class="hamburger">
                                <i class="fas fa-bars"></i>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="navbar-right f-right">
                                <a href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(empty(Auth::user()->avatar) || !file_exists(Auth::user()->avatar))
                                    <img src="{{ asset('admin/img/profile/profile.jpg') }}" alt="">
                                    @else
                                    <img src="{{ asset(Auth::user()->avatar) }}" alt="">
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right mt-20">
                                    <a href="{{ route('admin.admin.mysettings') }}" class="dropdown-item" type="button">Account Settings</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</section>