<footer class="p-4 bg-white md:p-8 lg:p-10 dark:bg-gray-800 rounded-lg">
    <div class="mx-auto max-w-screen-xl text-center">
        <a href="{{ url('/') }}" class="flex justify-center  py-2 items-center text-2xl font-semibold text-gray-900 dark:text-white">
                <img src="https://img.logoipsum.com/249.svg" class="h-6 md:h-8" alt="Logoipsum" />
                <span class="self-center lg:text-xl md:text-lg sm:text-sm font-semibold whitespace-nowrap dark:text-white">Blog Apps</span>
        </a>
        <p class="my-6 py-2 text-gray-500 dark:text-gray-400">A version pinnacle sea snare pinnacle transvaluation. Truth noble strong morality.</p>
        <ul class="flex justify-center  py-2 items-center mb-6 text-gray-900 dark:text-white">
            <li class="px-2">
                <a href="{{ url('/') }}" class="mr-4 hover:underline md:mr-6 ">Home</a>
            </li>
            @foreach ($categories->take(3) as $category)
                    <li class="px-2">
                        <a href="{{ route('category', ['category' => strtolower($category->name)]) }}" class="mr-4 hover:underline md:mr-6">{{ $category->name }}</a>
                    </li>
                @endforeach
        </ul>
        <span class="text-sm  py-2 text-gray-500 sm:text-center dark:text-gray-400">© 2021-2022 <a href="{{ url('/') }}" class="hover:underline">Blog Apps™</a>. All Rights Reserved.</span>
    </div>
  </footer>