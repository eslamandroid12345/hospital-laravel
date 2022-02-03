<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{__('navbar.home')}}
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul style="padding: 20px;" class="navbar-nav me-auto">
                    @auth

                        <li class="nav-link"><a  href="{{route('medicans.index')}}">{{__('navbar.doctors')}}</a></li>
                        <li class="nav-link"><a  href="{{route('medicans.create')}}">{{__('navbar.doctor')}}</a></li>
                        <li class="nav-link"><a  href="{{route('profile.create')}}">{{__('navbar.hospital_edit')}}</a></li>
                        <li class="nav-link"><a href="{{route('profile.index')}}">{{__('navbar.hospitals')}}</a></li>
                        <li class="nav-link"><a href="{{route('add')}}">{{__('navbar.service')}}</a></li>
                        <li class="nav-link"><a  href="{{route('data')}}">{{__('navbar.booking')}}</a></li>
                        <li class="nav-link"><a href="{{route('users.data')}}">{{__('navbar.users')}}</a></li>
                        <li class="nav-link"><a  href="{{route('admin.register.data')}}">{{__('navbar.admin')}}</a></li>


                    @endauth
                </ul>

                @auth

                    <li class="dropdown dropdown-notification nav-item  dropdown-notifications">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                            <i class="fa fa-bell"> </i>
                            <span
                                class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow   notif-count" data-count="0">0</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0 text-center">
                                    <span class="grey darken-2 text-center"> الرسائل</span>
                                </h6>
                            </li>
                            <li class="scrollable-container ps-container ps-active-y media-list w-100">
                                <a href="">
                                    <div class="media">
                                        <div class="media-body">
                                            {{-- start push notification--}}
                                        </div>
                                    </div>
                                </a>

                            </li>
                            <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                                                href=""> جميع الاشعارات </a>
                            </li>
                        </ul>
                    </li>

            @endauth


                <!-- start div of languages -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{__('navbar.language')}}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <ul>
                                    <li class="dropdown-item">
                                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                </ul>
                            @endforeach

                        </div>
                    </li>
                </ul>
                <!-- end div of languages -->




                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('تسجيل حساب') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{__('navbar.welcome')}}
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('navbar.logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>


            </div>
        </div>
    </nav>
</div>
