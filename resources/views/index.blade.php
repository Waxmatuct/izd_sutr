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

        </style>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
    </head>
    <body class="font-sans antialiased">
		<nav
			class="flex items-center bg-white justify-between flex-wrap p-3 sm:px-6 sm:py-3 fixed w-full z-10 top-0 shadow-lg"
			x-data="{ isOpen: false }"
			@keydown.escape="isOpen = false">
		<!--Logo etc-->
		<div class="flex items-center flex-shrink-1 text-white mr-6">
			<a class="flex title-font items-center text-gray-700" href="/">
				<img src="{{ asset('images/logo_ric.png') }}" alt="" class="w-16 h-16">
					<div class="hidden sm:flex flex-col ml-2">
						<h1 class="text-base font-extrabold md:text-lg leading-5 mb-2 md:mb-0">Редакционно-издательский центр</h1>
						<span class="text-xs md:text-sm leading-4">Информационно-справочный ресурс</span>
					</div>
			</a>
		</div>
  
		<!--Toggle button (hidden on large screens)-->
		<button
		  @click="isOpen = !isOpen"
		  type="button"
		  class="absolute sm:relative right-8 top-8 bg-white sm:top-0 sm:right-0 block lg:hidden px-2 text-gray-500 focus:outline-none"
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
		  <ul class="pt-6 lg:pt-0 list-reset lg:flex justify-center flex-1 items-center">
			<li class="mr-3">
				<a
					class="inline-block py-2 px-4 text-white bg-indigo-500 rounded-lg font-bold no-underline"
					href="#"
					@click="isOpen = true"
					>План издания 2021
				</a>
			</li>
			<li class="mr-3">
				<a
					class="inline-block py-2 px-4 text-gray-600 no-underline hover:text-white hover:bg-indigo-500 rounded-lg transition-all ease-in-out duration-300"
					href="#"
					@click="isOpen = false"
					>В помощь автору
				</a>
			</li>
			<li class="mr-3">
				<a
					class="inline-block py-2 px-4 text-gray-600 no-underline hover:text-white hover:bg-indigo-500 rounded-lg transition-all ease-in-out duration-300"
					href="#"
					@click="isOpen = false"
					>Платные услуги
				</a>
			</li>
			<li class="mr-3">
				<a
					class="inline-block py-2 px-4 text-gray-600 no-underline hover:text-white hover:bg-indigo-500 rounded-lg transition-all ease-in-out duration-300"
					href="#"
					@click="isOpen = false"
					>Контакты
				</a>
			</li>
			{{-- @if (Route::has('login'))
			<li class="mr-3">
			@auth
				<a
					href="{{ url('/dashboard') }}" 
					class="inline-block text-gray-600 no-underline hover:text-indigo-600 border-white border-b-2 hover:border-indigo-600 py-2 px-4">
					Dashboard
				</a>
			@else
				<a 
					href="{{ route('login') }}" 
					class="inline-block text-gray-600 no-underline hover:text-indigo-600 border-white border-b-2 hover:border-indigo-600 py-2 px-4">
					Log in
				</a>

				@if (Route::has('register'))
					<a 
						href="{{ route('register') }}" 
						class="inline-block text-gray-600 no-underline hover:text-indigo-600 border-white border-b-2 hover:border-indigo-600 py-2 px-4">
						Register
					</a>
				@endif
			@endauth
			</li>
			@endif --}}
		  </ul>
		</div>
	  </nav>
        <div class="flex flex-col container mx-auto mt-24 md:mt-32 md:px-10">
				
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
								class="py-2 px-3 rounded-md hover:bg-indigo-600 hover:text-white"
								href="#"
								>
								План издания 2021
							</a>
							<a 
								class="py-2 px-3 rounded-md hover:bg-indigo-600 hover:text-white"
								href="#"
								>
								План издания 2020
							</a>
							<a 
								class="py-2 px-3 rounded-md hover:bg-indigo-600 hover:text-white"
								href="#"
								>
								В помощь автору
							</a>
							<a 
								class="py-2 px-3 rounded-md hover:bg-indigo-600 hover:text-white"
								href="#"
								>
								Платные услуги
							</a>
							<a 
								class="py-2 px-3 rounded-md hover:bg-indigo-600 hover:text-white"
								href="#"
								>
								Контакты
							</a>
						</div>
					</nav>
                </div>
              </header> --}}
			<section class="text-gray-600 body-font">
					<div class="flex flex-col w-full mb-10">
						<h1 
							class="sm:text-4xl text-center text-3xl font-bold title-font mb-16 text-gray-700">
							План издания учебной и учебно-методической литературы на 2021 год
						</h1>
						<div class="entry-content space-y-4 lg:w-3/4 mx-auto text-left leading-normal text-lg">
							<p><a href="https://yadi.sk/i/geeidQdKwEt91Q" target="_blank" rel="noreferrer noopener">План издания учебной и учебно-методической литературы на 2021 год</a> утвержден и подписан ректором.</p>
							<p>Срок предоставления рукописи указан в плане издания. Последний рабочий день месяца является конечной датой сдачи рукописи с полным комплектом сопроводительных документов. </p>
							<p>Решение о приеме учебных и учебно-методических работ в производство принимается в течение семи рабочих дней со дня предоставления автором в РИЦ распечатки текста, его электронного варианта и сопроводительных документов в полном объеме.</p>
							<p>Список сопроводительных документов:</p>
							<ul><li>рецензия;</li><li>выписка из протокола заседания кафедры;</li><li><a href="/wp-content/uploads/2021/01/Spravka-VKR-VUZ.docx" target="_blank" rel="noreferrer noopener">справка о результатах проверки на наличие заимствований</a> (утверждена <a href="/wp-content/uploads/2021/02/Prikaz-1100-ot-16-12-2020.pdf" target="_blank" rel="noreferrer noopener">приказом № 1100</a> от 16.12.2020);</li><li><a href="/wp-content/uploads/2021/01/zayavka-na-uchebnie-planovie-izdaniya.pdf" target="_blank" rel="noreferrer noopener">заявка на учебное плановое издание</a>;</li><li>лицензионный договор (<a href="/wp-content/uploads/2021/01/Tipovaya-forma-Litsenzionnyj-dogovor.pdf" target="_blank" rel="noreferrer noopener">pdf</a>, <a href="/wp-content/uploads/2021/02/Tipovaya-forma-Litsenzionnyj-dogovor.doc" target="_blank" rel="noreferrer noopener">doc</a>) и акт приема-передачи экземпляра произведения (<a href="/wp-content/uploads/2021/01/Akt-priema-peredachi-proizvedeniya.pdf" target="_blank" rel="noreferrer noopener">pdf</a>, <a href="/wp-content/uploads/2021/02/Akt-priema-peredachi-proizvedeniya.docx" target="_blank" rel="noreferrer noopener">doc</a>). Договор и акт передаются в 2 экземплярах</li></ul>
						</div>
					</div>
					<div class="w-full mx-auto overflow-auto shadow-lg rounded-lg">
						<table class="table-auto w-full text-xs">
							<thead class="bg-gray-300 text-gray-800">
								<tr>
									<th class="text-center py-3 px-4">№ в плане</th>
									<th class="text-center py-3 px-4">Факультет</th>
									<th class="text-center py-3 px-4">Авторы</th>
									<th class="text-center py-3 px-4">Наименование рукописи</th>
									<th class="text-center py-3 px-4">Вид издания</th>
									<th class="text-center py-3 px-4">Дисциплина</th>
									<th class="text-center py-3 px-4">Объем, уч.изд. л</th>
									<th class="text-center py-3 px-4">Тираж</th>
									<th class="text-center py-3 px-4">Месяц сдачи</th>
									<th class="text-center py-3 px-4">Сдано</th>
									<th class="text-center py-3 px-4">Статус **</th>               
								</tr>
							</thead>
							<tbody>
								<tr>
									<th class="text-center py-3 px-4">1</th>
									<td class="text-center py-3 px-4">ЮФ</td>
									<td class="text-center py-3 px-4">Е.В. Ивнева, Л.Л. Кавшбая</td>
									<td>Гражданский процесс. Особенная часть</td>
									<td class="text-center py-3 px-4">Методическое пособие</td>
									<td class="text-center py-3 px-4">Гражданский процесс</td>
									<td class="text-center py-3 px-4">2.50</td>
									<td class="text-center py-3 px-4">30</td>
									<td class="text-center py-3 px-4">Июнь</td>
									<td class="text-center py-3 px-4">Июнь</td>
									<td class="text-center py-3 px-4">В печати</td>
								</tr>
								<tr class="bg-gray-100">
									<th class="text-center py-3 px-4">2</th>
									<td class="text-center py-3 px-4">ЮФ</td>
									<td class="text-center py-3 px-4">Е.В. Ивнева, Кдлян, Г.А. Магдесян, Л.Л. Кавшбая, М.Г. Князькова</td>
									<td>Организация консультационной работы юридическими</td>
									<td class="text-center py-3 px-4">Методические рекомендации</td>
									<td class="text-center py-3 px-4">-</td>
									<td class="text-center py-3 px-4">2.50</td>
									<td class="text-center py-3 px-4">30</td>
									<td class="text-center py-3 px-4">Июнь</td>
									<td class="text-center py-3 px-4">Июнь</td>
									<td class="text-center py-3 px-4">В печати</td>
								</tr>
								<tr>
									<th class="text-center py-3 px-4">3</th>
									<td class="text-center py-3 px-4">ЮФ</td>
									<td class="text-center py-3 px-4">Е.В. Ивнева, Л.Л. Кавшбая</td>
									<td>Методические рекомендации по  выполнению курсовых работ (проектов) для обучающихся очной, очно-заочной и заочной форм обучения по направлению подготовки  40.03.01 «Юриспруденция» (профили: гражданско-правовой, уголовно-правовой)</td>
									<td class="text-center py-3 px-4">Методические рекомендации</td>
									<td class="text-center py-3 px-4">-</td>
									<td class="text-center py-3 px-4">2.50</td>
									<td class="text-center py-3 px-4">30</td>
									<td class="text-center py-3 px-4">Июнь</td>
									<td class="text-center py-3 px-4">Июнь</td>
									<td class="text-center py-3 px-4">В печати</td>
								</tr>
								<tr class="bg-gray-100">
									<th class="text-center py-3 px-4">4</th>
									<td class="text-center py-3 px-4">ЮФ</td>
									<td class="text-center py-3 px-4">Л.Л. Кавшбая, Е.В. Ивнева</td>
									<td>Гражданское право зарубежных стран</td>
									<td class="text-center py-3 px-4">Методическое пособие</td>
									<td class="text-center py-3 px-4">Гражданское право зарубежных стран</td>
									<td class="text-center py-3 px-4">2.50</td>
									<td class="text-center py-3 px-4">30</td>
									<td class="text-center py-3 px-4">Июнь</td>
									<td class="text-center py-3 px-4">Июнь</td>
									<td class="text-center py-3 px-4">В печати</td>
								</tr>
								<tr>
									<th class="text-center py-3 px-4">5</th>
									<td class="text-center py-3 px-4">ЮФ</td>
									<td class="text-center py-3 px-4">Гражданское право зарубежных стран</td>
									<td>Римское право</td>
									<td class="text-center py-3 px-4">Методическое пособие</td>
									<td class="text-center py-3 px-4">Римское право</td>
									<td class="text-center py-3 px-4">2.50</td>
									<td class="text-center py-3 px-4">30</td>
									<td class="text-center py-3 px-4">Июнь</td>
									<td class="text-center py-3 px-4">Июнь</td>
									<td class="text-center py-3 px-4">В печати</td>
								</tr>
								<tr class="bg-gray-100">
									<th class="text-center py-3 px-4">6</th>
									<td class="text-center py-3 px-4">ЮФ</td>
									<td class="text-center py-3 px-4">Зимовец Л.Г.</td>
									<td>Религиоведение</td>
									<td class="text-center py-3 px-4">Учебное пособие</td>
									<td class="text-center py-3 px-4">Религиоведение</td>
									<td class="text-center py-3 px-4">5.00</td>
									<td class="text-center py-3 px-4">10</td>
									<td class="text-center py-3 px-4">Апрель</td>
									<td class="text-center py-3 px-4">-</td>
									<td class="text-center py-3 px-4">-</td>
								</tr>
								<tr>
									<th class="text-center py-3 px-4">7</th>
									<td class="text-center py-3 px-4">ЮФ</td>
									<td class="text-center py-3 px-4">Лисицына Е.С.</td>
									<td>Методические рекомендации по написанию курсовой работы по дисциплине Теория государства и права</td>
									<td class="text-center py-3 px-4">Методические рекомендации</td>
									<td class="text-center py-3 px-4">Теория государства и права</td>
									<td class="text-center py-3 px-4">3.00</td>
									<td class="text-center py-3 px-4">50</td>
									<td class="text-center py-3 px-4">Март</td>
									<td class="text-center py-3 px-4">-</td>
									<td class="text-center py-3 px-4">-</td>
								</tr>
								<tr class="bg-gray-100">
									<th class="text-center py-3 px-4">8</th>
									<td class="text-center py-3 px-4">ЮФ</td>
									<td class="text-center py-3 px-4">Петрова С.В., Фоменко В.А.</td>
									<td>Страноведение </td>
									<td class="text-center py-3 px-4">Учебное пособие</td>
									<td class="text-center py-3 px-4">Страноведение </td>
									<td class="text-center py-3 px-4">5.00</td>
									<td class="text-center py-3 px-4">50</td>
									<td class="text-center py-3 px-4">Апрель</td>
									<td class="text-center py-3 px-4">Июнь</td>
									<td class="text-center py-3 px-4">В работе</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
						<a class="text-indigo-600 inline-flex items-center md:mb-2 lg:mb-0">Learn More
						<svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
							<path d="M5 12h14M12 5l7 7-7 7"></path>
						</svg>
						</a>
						<button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
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
