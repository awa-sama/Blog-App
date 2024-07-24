@extends('admin.layout')

@section('content')
    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
          <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Daftar Kategori</h2>
          </div>
      
          <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <a href="#" class="flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
              <img class="h-5" style="margin-right: 0.5rem;" src="https://www.svgrepo.com/show/448455/government.svg" alt="Politik">
              <span class="text-sm font-medium text-gray-900 dark:text-white">Politik</span>
            </a>
            <a href="#" class="flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
              <img class="h-5" style="margin-right: 0.5rem;" src="https://www.svgrepo.com/show/488989/health.svg" alt="Kesehatan">
              <span class="text-sm font-medium text-gray-900 dark:text-white">Kesehatan</span>
            </a>
            <a href="#" class="flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="h-5" style="margin-right: 0.5rem;" src="https://www.svgrepo.com/show/504045/technology-pc-computer-microchip-processor-chipset.svg" alt="Teknologi">
              <span class="text-sm font-medium text-gray-900 dark:text-white">Teknologi</span>
            </a>
            <a href="#" class="flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="h-5" style="margin-right: 0.5rem;" src="https://www.svgrepo.com/show/231780/childhood-entertainment.svg" alt="Hiburan">
              <span class="text-sm font-medium text-gray-900 dark:text-white">Hiburan</span>
            </a>
            <a href="#" class="flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="h-5" style="margin-right: 0.5rem;" src="https://www.svgrepo.com/show/318130/sport-soccer-field.svg" alt="Olahraga">
              <span class="text-sm font-medium text-gray-900 dark:text-white">Olahraga</span>
            </a>
        </div>
        </div>
      </section>
@endsection
