<nav x-data="{ open: false }" class="bg-gradient-to-r from-yellow-400 to-yellow-500 shadow-lg border-b border-yellow-600">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo JAKE -->
                <div class="shrink-0 flex items-center">
                    <img src="{{ asset('images/Logo.png')}}" alt="Logo JAKE" class="h-10 w-10 rounded-lg shadow-md"   href="{{ route('dashboard') }}" class="ml-3 text-xl font-bold text-gray-800 hover:text-gray-900 transition-colors duration-200">
                    
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-1 ml-8">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" 
                               class="flex items-center px-4 py-2 rounded-lg transition-all duration-200 hover:bg-yellow-300 hover:shadow-md mx-1">
                        <i class="fas fa-home mr-2 text-gray-700"></i>
                        <span class="text-gray-800 font-medium">{{ __('Inicio') }}</span>
                    </x-nav-link>
                    
                    <x-nav-link href="{{ route('usuario.index') }}" :active="request()->routeIs('usuario.*')"
                               class="flex items-center px-4 py-2 rounded-lg transition-all duration-200 hover:bg-yellow-300 hover:shadow-md mx-1">
                        <i class="fas fa-users mr-2 text-gray-700"></i>
                        <span class="text-gray-800 font-medium">{{ __('Usuario') }}</span>
                    </x-nav-link>
                    
                    <x-nav-link href="{{ route('cronograma.index') }}" :active="request()->routeIs('cronograma.*')"
                               class="flex items-center px-4 py-2 rounded-lg transition-all duration-200 hover:bg-yellow-300 hover:shadow-md mx-1">
                        <i class="fas fa-calendar-alt mr-2 text-gray-700"></i>
                        <span class="text-gray-800 font-medium">{{ __('Cronograma') }}</span>
                    </x-nav-link>
                    
                    <x-nav-link href="{{ route('finanzas.index') }}" :active="request()->routeIs('finanzas.*')"
                               class="flex items-center px-4 py-2 rounded-lg transition-all duration-200 hover:bg-yellow-300 hover:shadow-md mx-1">
                        <i class="fas fa-chart-line mr-2 text-gray-700"></i>
                        <span class="text-gray-800 font-medium">{{ __('Finanzas') }}</span>
                    </x-nav-link>
                    
                    <x-nav-link href="{{ route('actividades.index') }}" :active="request()->routeIs('actividades.*')"
                               class="flex items-center px-4 py-2 rounded-lg transition-all duration-200 hover:bg-yellow-300 hover:shadow-md mx-1">
                        <i class="fas fa-tasks mr-2 text-gray-700"></i>
                        <span class="text-gray-800 font-medium">{{ __('Actividades') }}</span>
                    </x-nav-link>
                    
                    <x-nav-link href="{{ route('seguimiento.index') }}" :active="request()->routeIs('seguimiento.*')"
                               class="flex items-center px-4 py-2 rounded-lg transition-all duration-200 hover:bg-yellow-300 hover:shadow-md mx-1">
                        <i class="fas fa-hands-helping mr-2 text-gray-700"></i>
                        <span class="text-gray-800 font-medium">{{ __('Seguimiento') }}</span>
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Side Of Navbar -->
            <div class="hidden md:flex items-center space-x-4">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-800 bg-yellow-300 hover:bg-yellow-400 focus:outline-none focus:bg-yellow-400 transition-all duration-200 shadow-sm">
                                        <i class="fas fa-users mr-2"></i>
                                        {{ Auth::user()->currentTeam->name }}
                                        <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" class="flex items-center">
                                        <i class="fas fa-cog mr-2 text-gray-400"></i>
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}" class="flex items-center">
                                            <i class="fas fa-plus mr-2 text-gray-400"></i>
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200 my-2"></div>
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>
                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-yellow-300 rounded-full focus:outline-none focus:border-yellow-400 transition-all duration-200 shadow-md hover:shadow-lg">
                                    <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-800 bg-yellow-300 hover:bg-yellow-400 focus:outline-none focus:bg-yellow-400 transition-all duration-200 shadow-sm">
                                        <i class="fas fa-user-circle mr-2"></i>
                                        {{ Auth::user()->name }}
                                        <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}" class="flex items-center">
                                <i class="fas fa-user mr-2 text-gray-400"></i>
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}" class="flex items-center">
                                    <i class="fas fa-key mr-2 text-gray-400"></i>
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200 my-2"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="flex items-center text-red-600 hover:text-red-700">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-800 hover:text-gray-900 hover:bg-yellow-300 focus:outline-none focus:bg-yellow-300 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden bg-yellow-400 shadow-lg">
        <div class="pt-2 pb-3 space-y-1">
            <!-- Mobile Navigation Links -->
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="flex items-center px-4 py-3">
                <i class="fas fa-home mr-3 text-gray-700"></i>
                {{ __('Inicio') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="{{ route('usuario.index') }}" :active="request()->routeIs('usuario.*')" class="flex items-center px-4 py-3">
                <i class="fas fa-users mr-3 text-gray-700"></i>
                {{ __('Usuario') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="{{ route('cronograma.index') }}" :active="request()->routeIs('cronograma.*')" class="flex items-center px-4 py-3">
                <i class="fas fa-calendar-alt mr-3 text-gray-700"></i>
                {{ __('Cronograma') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="{{ route('finanzas.index') }}" :active="request()->routeIs('finanzas.*')" class="flex items-center px-4 py-3">
                <i class="fas fa-chart-line mr-3 text-gray-700"></i>
                {{ __('Finanzas') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="{{ route('actividades.index') }}" :active="request()->routeIs('actividades.*')" class="flex items-center px-4 py-3">
                <i class="fas fa-tasks mr-3 text-gray-700"></i>
                {{ __('Actividades') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="{{ route('seguimiento.index') }}" :active="request()->routeIs('seguimiento.*')" class="flex items-center px-4 py-3">
                <i class="fas fa-hands-helping mr-3 text-gray-700"></i>
                {{ __('Seguimiento') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-yellow-500">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="size-10 rounded-full object-cover border-2 border-yellow-300" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-600">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="flex items-center">
                    <i class="fas fa-user mr-3 text-gray-400"></i>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')" class="flex items-center">
                        <i class="fas fa-key mr-3 text-gray-400"></i>
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="flex items-center text-red-600">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-yellow-500 my-2"></div>
                    <div class="block px-4 py-2 text-xs text-gray-600">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')" class="flex items-center">
                        <i class="fas fa-cog mr-3 text-gray-400"></i>
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')" class="flex items-center">
                            <i class="fas fa-plus mr-3 text-gray-400"></i>
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-yellow-500 my-2"></div>
                        <div class="block px-4 py-2 text-xs text-gray-600">
                            {{ __('Switch Teams') }}
                        </div>
                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>