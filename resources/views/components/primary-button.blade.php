<button {{ $attributes->merge(['type' => 'submit', 'class' => 'leading-10 pl-4 mb-4 mt-3 inline-block bg-gray-200 no-underline font-normal mt-8 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 after:inline-block after:w-9 after:text-center after:bg-webit after:text-white after:ml-5 after:content-[">"] ']) }}>
    {{ $slot }}
</button>
