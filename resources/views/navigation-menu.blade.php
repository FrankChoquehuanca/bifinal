<div class="bg-gray-100 border-gray-200 py-2.5">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto my-2">

        <!-- Logo y Menú Móvil -->
        <div class="flex items-center justify-between w-full lg:w-auto">
            <a href="#" class="flex items-center">
                <img src="https://www.svgrepo.com/show/366855/aeur.svg" class="h-6 mr-3 sm:h-9" alt="Landwind Logo">
                <span class="self-center text-xl font-semibold whitespace-nowrap text-black">Franchescas</span>
            </a>

            <!-- Botón Móvil -->
            <button data-collapse-toggle="mobile-menu" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only">Abrir menú</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <!-- Menú Navegación -->
        <div class="hidden w-full lg:flex lg:w-auto" id="mobile-menu">
            <ul class="flex flex-col mt-4 font-sans lg:flex-row lg:space-x-8 lg:mt-0">
                <li>
                    <x-responsive-nav-link href="{{ route('inicio') }}" :active="request()->routeIs('inicio')">
                        {{ __('Inicio') }}
                    </x-responsive-nav-link>
                </li>
                @auth
                    <li>
                        <x-responsive-nav-link href="{{ route('inicio') }}" :active="request()->routeIs('inicio', 'inicio')">
                            {{ __('Favoritos') }}
                        </x-responsive-nav-link>
                    </li>
                    <li>
                        <x-responsive-nav-link href="{{ route('recoment') }}" :active="request()->routeIs('recoment')">
                            {{ __('Recomendaciones') }}
                        </x-responsive-nav-link>
                    </li>
                @endauth
            </ul>
        </div>

        <!-- Botones de Sesión -->
        <div class="flex items-center gap-3">
            @auth
                <!-- Menú Dropdown Usuario -->
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button aria-label="user"
                                class="px-3 py-1 flex items-center gap-2 rounded-lg border border-black active:bg-gray-700 active:text-white">
                                <i class="fa-solid fa-user"></i>
                                {{ Auth::user()->name }}
                                <i class="fa-solid fa-chevron-down fa-xs ml-2 -mr-0.5"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-2 bg-gray-100 text-center">
                                <div class="font-medium text-sm text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="font-medium text-xs text-gray-500">{{ Auth::user()->email }}</div>
                            </div>
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Cerrar Sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <a href="/login"
                    class="px-3 py-1 flex items-center gap-2 rounded-lg border border-black active:bg-gray-700 active:text-white">
                    <i class="fa-solid fa-user"></i> Iniciar sesión
                </a>
                <a href="/register"
                    class="px-3 py-1 flex items-center gap-2 rounded-lg border border-black active:bg-gray-700 active:text-white">
                    <i class="fa-solid fa-user-plus"></i> Registrarse
                </a>
            @endauth
        </div>
    </div>
</div>
