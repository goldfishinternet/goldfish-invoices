<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <div class="d-flex flex-column flex-sm-row justify-content-between">
            <p class="text-muted pt-2">Goldfish Invoices by <a href="https://www.goldfishinternet.com">Goldfish Internet</a>. Copyright © {{ date('Y') }}</p>
            <ul class="nav">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @if(file_exists(app_path('Http/Controllers/Auth/UserTeamController.php')))
                                <a class="dropdown-item" href="{{ route("team.show") }}">
                                    <i class="fa-fw fas fa-user-friends mt-1 mr-1"></i>
                                    {{ trans('global.my_team') }}
                                </a>
                            @endif
                            @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                                @can('auth_profile_edit')
                                    <a class="dropdown-item" href="{{ route("profile.show") }}">
                                        <i class="fa-fw fas fa-user-circle mt-1 mr-1"></i>
                                        {{ trans('global.my_profile') }}
                                    </a>
                                @endcan
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
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
</footer>
