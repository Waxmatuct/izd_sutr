<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet"> 

        <!-- Styles -->
        <style>
            .shadow-lg {
                box-shadow: 0 1rem 3rem rgba(0,0,0,.175) !important;
            }
            /* .transform-minus-100 {
                    display: none;
                    transform: translateX(-100vW);
                }
                
            @media (min-width: 640px) { 
                .transform-nav {
                    display: flex;
                    transform: translateX(0);
                }
            } */
        </style>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
    </head>
    <body class="font-sans antialiased">
		<nav
		class="flex items-center bg-white justify-between flex-wrap p-3 sm:p-6 fixed w-full z-10 top-0 shadow-xl"
		x-data="{ isOpen: false }"
		@keydown.escape="isOpen = false"
		{{-- :class="{ 'shadow-xl ' : isOpen , 'bg-white' : !isOpen}" --}}
	  >
		<!--Logo etc-->
		<div class="flex items-center flex-shrink-1 text-white mr-6">
			<a class="flex title-font items-center text-gray-700" href="#">
				<img src="{{ asset('images/logo_ric.png') }}" alt="" class="w-12 h-12">
					<div class="flex flex-col ml-2">
						<h1 class="text-base font-extrabold md:text-lg leading-5 mb-2 md:mb-0">Редакционно-издательский центр</h1>
						<span class="text-xs md:text-sm leading-4">Информационно-справочный ресурс</span>
					</div>
			</a>
		</div>
  
		<!--Toggle button (hidden on large screens)-->
		<button
		  @click="isOpen = !isOpen"
		  type="button"
		  class="absolute sm:relative right-6 top-6 bg-white sm:top-0 sm:right-0 block lg:hidden px-2 text-gray-500 focus:outline-none"
		  :class="{ 'transition transform-180': isOpen }"
		>
		  <svg
			class="h-6 w-6 fill-current"
			xmlns="http://www.w3.org/2000/svg"
			viewBox="0 0 24 24"
		  >
			<path
			  x-show="isOpen"
			  fill-rule="evenodd"
			  clip-rule="evenodd"
			  d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"
			/>
			<path
			  x-show="!isOpen"
			  fill-rule="evenodd"
			  d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
			/>
		  </svg>
		</button>
  
		<!--Menu-->
		<div
		  class="w-full flex-grow lg:flex lg:items-center lg:w-auto"
		  :class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }"
		  @click.away="isOpen = false"
		  x-show.transition="true"
		>
		  <ul
			class="pt-6 lg:pt-0 list-reset lg:flex justify-center flex-1 items-center"
		  >
			<li class="mr-3">
			  <a
				class="inline-block py-2 px-4 text-gray-800 font-bold no-underline"
				href="#"
				@click="isOpen = false"
				>План изданий 2021
			  </a>
			</li>
			<li class="mr-3">
			  <a
				class="inline-block text-gray-600 no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
				href="#"
				@click="isOpen = false"
				>В помощь автору
			  </a>
			</li>
			<li class="mr-3">
			  <a
				class="inline-block text-gray-600 no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
				href="#"
				@click="isOpen = false"
				>Платные услуги
			  </a>
			</li>
			<li class="mr-3">
			  <a
				class="inline-block text-gray-600 no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
				href="#"
				@click="isOpen = false"
				>Контакты
			  </a>
			</li>
		  </ul>
		</div>
	  </nav>
        <div class="flex flex-col container mx-auto mt-24 md:mt-40 md:px-10">
				
            {{-- <header class="text-gray-600 body-font">
                <div class="container mx-auto flex flex-wrap p-5 flex-col items-center">
					<a class="flex title-font items-center text-gray-700 mb-6" href="#">
						<img src="{{ asset('images/logo_ric.png') }}" alt="" class="w-20 h-20 p-2">
							<div class="flex flex-col ml-3">
								<h1 class="text-2xl font-extrabold md:text-3xl leading-6 mb-2 md:mb-0">Редакционно-издательский центр</h1>
								<span class="text-sm md:text-base leading-5">Информационно-справочный ресурс</span>
							</div>
					</a>
					<nav x-data="{ isOpen: false }">
						<button @click="isOpen = !isOpen" class="absolute right-3 top-3 px-2 py-2 sm:hidden text-black dark:text-white focus:outline-none">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
							</svg>
						</button>

						<div
							id="menu"
							class="mx-auto flex flex-col sm:flex-row flex-wrap items-center text-base font-bold text-gray-700 justify-center space-y-3 sm:space-x-5 sm:space-y-0"
							
							@click.away="isOpen = false"
							x-show="isOpen"
							x-transition:enter="transition ease-out duration-300"
							x-transition:enter-start="opacity-0 transform scale-90"
							x-transition:enter-end="opacity-100 transform scale-100"
							x-transition:leave="transition ease-in duration-300"
							x-transition:leave-start="opacity-100 transform scale-100"
							x-transition:leave-end="opacity-0 transform scale-90">
							<a 
								class="py-2 px-3 rounded-md hover:bg-indigo-500 hover:text-white"
								href="#"
								>
								План издания 2021
							</a>
							<a 
								class="py-2 px-3 rounded-md hover:bg-indigo-500 hover:text-white"
								href="#"
								>
								План издания 2020
							</a>
							<a 
								class="py-2 px-3 rounded-md hover:bg-indigo-500 hover:text-white"
								href="#"
								>
								В помощь автору
							</a>
							<a 
								class="py-2 px-3 rounded-md hover:bg-indigo-500 hover:text-white"
								href="#"
								>
								Платные услуги
							</a>
							<a 
								class="py-2 px-3 rounded-md hover:bg-indigo-500 hover:text-white"
								href="#"
								>
								Контакты
							</a>
						</div>
					</nav>
                </div>
              </header> --}}
              <section class="text-gray-600 body-font">
                <div class="container px-5 py-5 mx-auto">
                  <div class="flex flex-col text-center w-full mb-20">
                    <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Pricing</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Banh mi cornhole echo park skateboard authentic crucifix neutra tilde lyft biodiesel artisan direct trade mumblecore 3 wolf moon twee</p>
                  </div>
                  <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                      <thead>
                        <tr>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Plan</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Speed</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Storage</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Price</th>
                          <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="px-4 py-3">Start</td>
                          <td class="px-4 py-3">5 Mb/s</td>
                          <td class="px-4 py-3">15 GB</td>
                          <td class="px-4 py-3 text-lg text-gray-900">Free</td>
                          <td class="w-10 text-center">
                            <input name="plan" type="radio">
                          </td>
                        </tr>
                        <tr>
                          <td class="border-t-2 border-gray-200 px-4 py-3">Pro</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3">25 Mb/s</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3">25 GB</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900">$24</td>
                          <td class="border-t-2 border-gray-200 w-10 text-center">
                            <input name="plan" type="radio">
                          </td>
                        </tr>
                        <tr>
                          <td class="border-t-2 border-gray-200 px-4 py-3">Business</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3">36 Mb/s</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3">40 GB</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900">$50</td>
                          <td class="border-t-2 border-gray-200 w-10 text-center">
                            <input name="plan" type="radio">
                          </td>
                        </tr>
                        <tr>
                          <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">Exclusive</td>
                          <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">48 Mb/s</td>
                          <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">120 GB</td>
                          <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3 text-lg text-gray-900">$72</td>
                          <td class="border-t-2 border-b-2 border-gray-200 w-10 text-center">
                            <input name="plan" type="radio">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                    <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                      </svg>
                    </a>
                    <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
                  </div>
                </div>
              </section>
            {{-- <div id="sidebar" class="w-14 lg:w-96 flex-shrink lg:flex flex-col items-center bg-gray-800">
                <img 
                    src="https://dummyimage.com/150/1cbd4f/0011ff.png&text=%D0%9B%D0%BE%D0%B3%D0%BE"
                    width="150" height="150"
                    alt=""
                    class="block rounded-full p-2">
                <h1 class="hidden lg:block text-3xl font-extrabold text-white text-center p-2">
                    Редакционно-издательский центр
                </h1>
                <small class="hidden lg:block text-white text-center">Информационно-справочный ресурс</small>
            </div>
            <div class="flex-1 bg-gray-300"></div> --}}
        </div>
		{{-- <script>
			document.getElementById('showNav').addEventListener('click', function() {

				var menu = document.getElementById('menu').classList;

				if (menu.contains('transform-minus-100')) {

				menu.remove('transform-minus-100');

				} else {

				menu.add('transform-nav');

				}

			});
		</script>         --}}
    </body>
</html>
