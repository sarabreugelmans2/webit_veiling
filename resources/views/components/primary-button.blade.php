<button {{ $attributes->merge(['type' => 'submit', 'class' => 'leading-10 pl-4 mb-4 mt-3 inline-block bg-gray-100 no-underline font-normal hover:bg-gray-200 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 flex items-center justify-center h-9']) }}>
    <span>{{ $slot }}</span>
    <div class="inline-block w-9 text-center bg-webit flex text-white h-full items-center justify-center ml-5">
        <x-heroicon-o-chevron-right class="w-5"/>
    </div>
</button>
