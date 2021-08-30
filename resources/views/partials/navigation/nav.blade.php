<nav id="navbar"
    class="flex items-center bg-white justify-between flex-wrap p-3 sm:px-6 sm:py-3 fixed w-full z-10 top-0 shadow-lg"
    x-data="{ isOpen: false }" @keydown.escape="isOpen = false">
    <!--Logo etc-->
    <div class="flex items-center flex-shrink-1 text-white mr-6">
        <a class="flex title-font items-center text-gray-700" href="{{ route('index') }}">
            <img src="{{ asset('images/logo_ric.png') }}" alt="" class="w-16 h-16">
            <div class="hidden sm:flex flex-col ml-2">
                <h1 class="text-base font-extrabold md:text-lg leading-5 mb-2 md:mb-0">Редакционно-издательский центр
                    СГУ
                </h1>
                <span class="text-xs md:text-sm leading-4">Информационно-справочный ресурс</span>
            </div>
        </a>
    </div>

    <!--Toggle button (hidden on large screens)-->
    <button @click="isOpen = !isOpen" type="button"
        class="absolute sm:relative right-8 top-8 bg-white sm:top-0 sm:right-0 block lg:hidden px-2 text-gray-500 focus:outline-none"
        :class="{ 'transition transform-180': isOpen }">
        <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path x-show="isOpen" fill-rule="evenodd" clip-rule="evenodd"
                d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z" />
            <path x-show="!isOpen" fill-rule="evenodd"
                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" />
        </svg>
    </button>

    <!--Menu-->
    <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto"
        :class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }" @click.away="isOpen = false"
        x-show.transition="true">
        <ul class="pt-6 lg:pt-0 list-reset lg:flex justify-center flex-1 items-center text-gray-600">
            <li class="ml-auto mr-3">
                <a class="{{ request()->is('plan-*') ? 'bg-primary-500 text-white' : null }} inline-block py-2 px-4 no-underline hover:text-white hover:bg-primary-500 rounded-lg transition-all ease-in-out duration-300"
                    href="/plan-2021" @click="isOpen = false">План издания 2021
                </a>
            </li>
            <li class="relative mr-3" x-data="{ open: false }" @click="open = !open" @mouseover="open = true"
                @mouseover.away="open = false" @click.away="open = false">
                <button
                    class="{{ request()->is('help') || request()->is('blanks') || request()->is('types') ? 'bg-primary-500 text-white' : null }} flex flex-row justify-between items-center py-2 px-4 no-underline focus:bg-primary-500 focus:text-white hover:text-white hover:bg-primary-500 rounded-lg transition-all ease-in-out duration-300">
                    <div>В помощь автору</div>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute z-50 mt-2 min-w-max rounded-md shadow-lg origin-top-left" style="display: none;">
                    <div
                        class="bg-white rounded-md ring-1 ring-black ring-opacity-5 flex flex-col py-2 px-5 space-y-3 white-space-nowrap ">
                        <a href="{{ route('help') }}" class="hover:text-primary-500">Авторская
                            редакция. Требования к оформлению</a>
                        <a href="{{ route('blanks') }}" class="hover:text-primary-500">Формы заявок на
                            тиражирование</a>
                        <a href="{{ route('types') }}" class="hover:text-primary-500">Виды вузовского
                            учебно-методического обеспечения</a>

                    </div>
                </div>
            </li>
            <li class="mr-3">
                <a class="{{ request()->is('paid-services') ? 'bg-primary-500 text-white' : null }} inline-block py-2 px-4 no-underline hover:text-white hover:bg-primary-500 rounded-lg transition-all ease-in-out duration-300"
                    href="{{ route('paid-services') }}" @click="isOpen = false">Платные услуги
                </a>
            </li>
            <li class="mr-3">
                <a class="{{ request()->is('about') ? 'bg-primary-500 text-white' : null }} inline-block py-2 px-4 no-underline hover:text-white hover:bg-primary-500 rounded-lg transition-all ease-in-out duration-300"
                    href="{{ route('about') }}" @click="isOpen = false">О нас
                </a>
            </li>
            <li class="mr-3">
                <a class="{{ request()->is('contacts') ? 'bg-primary-500 text-white' : null }} inline-block py-2 px-4 no-underline hover:text-white hover:bg-primary-500 rounded-lg transition-all ease-in-out duration-300"
                    href="{{ route('contacts') }}" @click="isOpen = false">Контакты
                </a>
            </li>
            @if (Route::has('login'))
                <li class="ml-auto mr-3">
                    @auth
                        <a href="{{ route('dashboard.index') }}"
                            class="inline-block py-2 px-4 no-underline hover:text-white hover:bg-primary-500 rounded-lg transition-all ease-in-out duration-300">
                            Админка
                        </a>
                        {{-- @else
                        <a href="{{ route('login') }}"
                            class="inline-block py-2 px-4 no-underline hover:text-white hover:bg-primary-500 rounded-lg transition-all ease-in-out duration-300">
                            Вход
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-block py-2 px-4 no-underline hover:text-white hover:bg-primary-500 rounded-lg">
                                Регистрация
                            </a>
                        @endif --}}
                    @endauth
                </li>
            @endif
        </ul>
    </div>
</nav>
