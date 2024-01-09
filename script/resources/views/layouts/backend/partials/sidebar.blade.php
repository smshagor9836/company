<section>
    <div class="main-area">
        <div class="container-fluid">
            <div class="row">
                <div class="sidebar">
                    <div class="main-menu-area">
                        <div class="main-menu">
                            <nav>
                                <div id="accordionExample">
                                   @if(Auth::User()->role->id == 1)
                                    <ul>
                                        <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                                            <a href="{{ url('admin/dashboard') }}">
                                                <span class="flaticon-home"></span> {{ __('Dashboard') }}
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('admin/media') ? 'active' : '' }}"><a href="{{ route('admin.media.index') }}"><span class="flaticon-photo"></span> {{ __('Media') }}</a></li>
                                        <li class="{{ Request::is('admin/page*') ? 'active' : '' }}"><a href="{{ route('admin.page.index') }}"><span class="flaticon-clipboard"></span> {{ __('Pages') }}</a></li>
                                        <li class="sub {{ Request::is('admin/blog*') ? 'active' : '' }}">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                                                <span class="flaticon-writing"></span> {{ __('Blog') }}
                                            </a>
                                        </li>
                                        <div class="collapse {{ Request::is('admin/blog*') ? 'show' : '' }}" id="collapseExample1" data-parent="#accordionExample">
                                            <div class="submenu">
                                                <div class="nav">
                                                    <ul>
                                                        <li><a href="{{ route('admin.post.index') }}">{{ __('Post') }}</a></li>
                                                        <li><a href="{{ route('admin.category.index') }}">{{ __('Categories') }}</a></li>
                                                        <li><a href="{{ route('admin.comment.index') }}">{{ __('Comments') }}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        @if (file_exists(base_path().'/am-content/Plugins/menuregister.php'))
                                        @php 
                                        include_once(base_path().'/am-content/Plugins/menuregister.php');
                                        @endphp 
                                        @if(function_exists('RegisterAdminMenuBar'))
                                        @foreach(RegisterAdminMenuBar() as $key => $adminmenus)
                                       @if(isset($adminmenus['child']))

                                        <li class="sub {{ Request::is('admin/$key*') ? 'active' : '' }}">
                                            <a class="collapsed" data-toggle="collapse" href="#{{ $key }}" role="button" aria-expanded="false" aria-controls="{{ $key }}">
                                                <span class="{{ $adminmenus['icon'] }}"></span> {{ $adminmenus['name'] }}
                                            </a>
                                        </li>
                                        <div class="collapse {{ Request::is('admin/$key*') ? 'show' : '' }}" id="{{ $key }}" data-parent="#accordionExample">
                                            <div class="submenu">
                                                <div class="nav">
                                                    <ul>
                                                        @foreach($adminmenus['child'] as $ch_key => $adminmenuChild)
                                                        <li><a href="{{ url($adminmenuChild) }}">{{ $ch_key }}</a></li>
                                                       @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                        @else
                                        <li class="{{ Request::is('admin/$key') ? 'active' : '' }}"><a href="{{ url($adminmenus['url']) }}"><span class="flaticon-plugin"></span> {{ $adminmenus['name'] }}</a></li>
                                        @endif
                                        @endforeach

                                        @endif
                                        @endif
                                        <li class="sub {{ Request::is('admin/appearance*') ? 'active' : '' }}">
                                            <a class="collapsed" data-toggle="collapse" href="#appearance" role="button" aria-expanded="false" aria-controls="appearance">
                                                <span class="flaticon-menu-1"></span> {{ __('Appearance') }}
                                            </a>
                                        </li>
                                        <div class="collapse {{ Request::is('admin/appearance*') ? 'show' : '' }}" id="appearance" data-parent="#accordionExample">
                                            <div class="submenu">
                                                <div class="nav">
                                                    <ul>

                                                        @if(file_exists(GetThemeRoot().'functions.php'))
                                                        @php
                                                        include_once(GetThemeRoot().'functions.php');
                                                        @endphp
                                                        @if(function_exists('RegisterThemeOption'))
                                                        @foreach(RegisterThemeOption() as $ke=>$ro)
                                                        <li><a href="{{ url($ro['url']) }}">{{ $ro['title'] }}</a></li>
                                                        @endforeach
                                                        @endif
                                                        @endif
                                                        <li><a href="{{ route('admin.theme.index') }}">{{ __('Theme') }}</a></li>
                                                        <li><a href="{{ route('admin.menu.index') }}">{{ __('Menu') }}</a></li>
                                                        <!-- <li><a href="{{ route('admin.script.index') }}">{{ __('Custom css js') }}</a></li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <li class="{{ Request::is('admin/plugin') ? 'active' : '' }}"><a href="{{ route('admin.plugin.index') }}"><span class="flaticon-plugin"></span> {{ __('Plugins') }}</a></li>
                                        <li class="sub {{ Request::is('admin/setting*') ? 'active' : '' }}">
                                            <a class="collapsed" data-toggle="collapse" href="#settings" role="button" aria-expanded="false" aria-controls="settings">
                                                <span class="flaticon-chip"></span> {{ __('Settings') }}
                                            </a>
                                        </li>
                                        <div class="collapse {{ Request::is('admin/setting*') ? 'show' : '' }}" id="settings" data-parent="#accordionExample">
                                            <div class="submenu">
                                                <div class="nav">
                                                    <ul>
                                                        <li><a href="{{ route('admin.seo.index') }}">{{ __('Seo') }}</a></li>
                                                       {{--  <li><a href="{{ route('admin.performance.index') }}">{{ __('performance') }}</a></li> --}}
                                                        <li><a href="{{ route('admin.filesystem.index') }}">{{ __('Filesystem') }}</a></li>
                                                        {{-- <li><a href="{{ route('admin.general.index') }}">{{ __('General Setting') }}</a></li> --}}
                                                        <li><a href="{{ route('admin.env.index') }}">{{ __('System Settings') }}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <li class="sub {{ Request::is('admin/language*') ? 'active' : '' }}">
                                            <a class="collapsed" data-toggle="collapse" href="#langauge" role="button" aria-expanded="false" aria-controls="langauge">
                                                <span class="flaticon-internet"></span> {{ __('Language') }}
                                            </a>
                                        </li>
                                        <div class="collapse {{ Request::is('admin/language*') ? 'show' : '' }}" id="langauge" data-parent="#accordionExample">
                                            <div class="submenu">
                                                <div class="nav">
                                                    <ul>
                                                        <li><a href="{{ route('admin.language.create') }}">{{ __('Create Language') }}</a></li>
                                                        <li><a href="{{ route('admin.language.index') }}">{{ __('Language Settings') }}</a></li>
                                                    </div>
                                                </div>
                                            </div>

                                            <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                            document.getElementById('logout-bar').submit();"><span class="flaticon-feedback"></span> {{ __('Logout') }}</a></li>
                                            <form id="logout-bar" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                   @endif
                                   @if(Auth::User()->role->id == 2)
                                    <ul>
                                        @if(Amcoders\Plugin\Plugin::is_active('zoom'))
                                        <li class="{{ Request::is('author/zoom/type/started') ? 'active' : '' }}">
                                            <a href="{{ route('zoom.user.index','started') }}">
                                                <span class="flaticon-view"></span> {{ __('Live Meeting') }}
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('author/zoom/type/waiting') ? 'active' : '' }}">
                                            <a href="{{ route('zoom.user.index','waiting') }}">
                                                <span class="flaticon-support"></span> {{ __('Upcoming Meeting') }}
                                            </a>
                                        </li>
                                        @endif
                                        <li class="{{ Request::is('mysettings') ? 'active' : '' }}">
                                            <a href="{{ route('admin.admin.mysettings') }}">
                                                <span class="flaticon-chip"></span> {{ __('User Settings') }}
                                            </a>
                                        </li>
                                        <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                            document.getElementById('logout-bar').submit();"><span class="flaticon-feedback"></span> {{ __('Logout') }}</a>
                                        </li>
                                        <form id="logout-bar" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                   @endif

                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
