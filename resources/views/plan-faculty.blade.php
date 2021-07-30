@extends('layouts.base')

@section('title', 'РИЦ :: План издания 2021')

@section('main')

	<section class="text-gray-600 body-font">
		<div class="flex flex-col w-full mb-10">
			<h1 
				class="sm:text-4xl text-center text-3xl font-bold title-font mb-6 sm:mb-12 text-gray-700">
				{{ $title }}. Статистика на {{ $year }} год
			</h1>
			<div class="entry-content space-y-4 lg:w-3/4 mx-auto text-left leading-normal sm:text-lg">
				<p>
                    {{ $title }}
                </p>
                <div>
					<h2 class="text-2xl sm:text-3xl font-bold text-gray-700 mt-10">Статистика выполнения</h2>
					<div class="count">
						<p>Всего работ по плану: <strong>{{ $count }}</strong>. Общий объем: <strong>{{ $total }}</strong> уч. изд. л.<br>Сдано в РИЦ <strong>{{ $sdano }}</strong> работ, что составляет <strong>{{ $proc }}%</strong> от общего количества за выбранный период.</p>
					</div>
					<p class="text-muted" style="font-size: 0.9rem">* Таблица обновлена {{ $date->updated_at->diffForHumans() }}</p>
					<p class="text-muted" style="font-size: 0.9rem">** Литература приобретает статус «издано» после передачи на склад материально-технического снабжения.</p>
                    
					<div class="overflow-auto p-7 rounded-lg shadow-2xl mt-7">
						<canvas id="myChart" data-values="{{ $counts }}" data-handed="{{ $is_handed }}" width="400" height="200"></canvas>
					</div>
						<script>
							var ctx = document.getElementById('myChart').getContext('2d');
							var values = document.getElementById('myChart').getAttribute('data-values').split(',');
							var is_handed = document.getElementById('myChart').getAttribute('data-handed').split(',');
							var myChart = new Chart(ctx, {
								type: 'bar',
								data: {
									labels: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Cентябрь'],
									datasets: [
										{
											label: 'Запланировано',
											data: values,
											backgroundColor: [
												'rgba(99, 102, 241, 0.5)',
											],
											borderColor: [
												'rgba(99, 102, 241, 1)',
											],
											borderWidth: 0
										},
										{
											label: 'Сдано',
											data: is_handed,
											backgroundColor: [
												'rgba(75, 192, 192, 0.2)',
											],
											borderColor: [
												'rgba(75, 192, 192, 1)',
											],
											borderWidth: 0
										},
									]
								},
								options: {
									scales: {
										y: {
											beginAtZero: true
										}
									}
								}
							});
						</script>

				</div>

			</div>
		</div>

		@if ($books->isNotEmpty())
		<div class="w-full mx-auto overflow-auto rounded-lg shadow-2xl">
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
						<th class="text-center py-3 px-4 whitespace-nowrap">Статус **</th>               
					</tr>
				</thead>
				<tbody>

					@foreach ($books as $book)
					
					<tr class="@if ($loop->even) bg-gray-100 @endif hover:bg-indigo-100">
						<th class="text-center py-3 px-4">{{ $book->item }}</th>
						<td class="text-center py-3 px-4">{{ $book->faculty->short_title }}</td>
						<td class="text-center py-3 px-4">{{ $book->author }}</td>
						<td class="text-center py-3 px-4">{{ $book->title }}</td>
						<td class="text-center py-3 px-4">{{ $book->type->title }}</td>
						<td class="text-center py-3 px-4">{{ $book->disciple }}</td>
						<td class="text-center py-3 px-4">{{ $book->size }}</td>
						<td class="text-center py-3 px-4">{{ $book->amount }}</td>
						<td class="text-center py-3 px-4">{{ $book->month->name }}</td>
						<td class="text-center py-3 px-4">{{ $book->is_handed }}</td>
						<td class="text-center py-3 px-4">{{ $book->status }}</td>
					</tr>
					
					@endforeach

				</tbody>
			</table>
		</div>
		@else
			<span>Нет данных</span>
		@endif


	</section>
@endsection

@push('chartjs')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js" integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush