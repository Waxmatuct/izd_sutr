<form action="{{ route('dashboard.book.destroy', $book) }}" method="POST">
    @csrf
    @method('DELETE')

    <div x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>
        <button class="delete-btn text-red-300 hover:text-red-600" title="Удалить запись" @click="showModal = true" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
        </button>

        <!--Overlay-->
        <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal" :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModal }">
            <!--Dialog-->
            <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">

                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Удалить пост?</p>
                    <div class="cursor-pointer z-50" @click="showModal = false">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <!-- content -->
                {{-- <p>Удалить пост?</p> --}}

                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <button class="text-base px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2" type="submit">Удалить</button>
                    <button class="text-base modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400" type="button" @click="showModal = false">Нет</button>
                </div>
            </div>
            <!--/Dialog -->
        </div><!-- /Overlay -->
    </div>
</form>