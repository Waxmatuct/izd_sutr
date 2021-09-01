<li class="relative mr-3" x-data="{ open: false }" @click="open = !open" @mouseover="open = true"
    @mouseover.away="open = false" @click.away="open = false">
    <button
        {{ $attributes->merge(['class' => 'flex flex-row justify-between items-center py-2 px-4 no-underline focus:bg-primary-500 focus:text-white hover:text-white hover:bg-primary-500 rounded-lg transition-all ease-in-out duration-300']) }}>
        <span>{{ $title }}</span>
        <div class="ml-1">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </div>
    </button>
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute z-50 min-w-max rounded-md shadow-lg origin-top-left" style="display: none;">
        <div
            class="bg-white rounded-md ring-1 ring-black ring-opacity-5 flex flex-col py-2 px-5 space-y-3 white-space-nowrap ">
            {{ $content }}
        </div>
    </div>
</li>
