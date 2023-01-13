<x-documentation-layout>

    <div class="bg-white">
        <nav class="flex px-6 py-4 mx-auto max-w-7xl lg:px-8" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4">
              <li>
                <div>
                  <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-gray-500">
                    <!-- Heroicon name: mini/home -->
                    <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Dashboard</span>
                  </a>
                </div>
              </li>

              <li>
                <div class="flex items-center">
                  <!-- Heroicon name: mini/chevron-right -->
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                  </svg>
                  <a href="{{ route('documentation.index') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Documentação</a>
                </div>
              </li>

              <li>
                <div class="flex items-center">
                  <!-- Heroicon name: mini/chevron-right -->
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                  </svg>
                  <a href="{{ route('documentation.show', ['email','index']) }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">Email</a>
                </div>
              </li>
            </ol>
          </nav>
        <div class="px-6 py-16 mx-auto max-w-7xl sm:py-24 lg:px-8">
            <div class="text-center">
                <p class="text-lg font-semibold text-indigo-600">API</p>
                <h1 class="mt-1 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl">
                    E-mail API
                </h1>
                <p class="max-w-xl mx-auto mt-5 text-xl text-gray-500">
                    Recursos para gerenciar endereço de e-mail.
                </p>
            </div>
        </div>
    </div>


    <div class="px-6 py-16 mx-auto max-w-7xl sm:py-24 lg:px-8">
        <div class="grid flex-wrap gap-8 sm:grid-cols-3">

            <a href="{{ route('documentation.show', ['email', 'basic-validation']) }}" class="block p-6 bg-white border border-gray-200 rounded-lg">
                <div
                    class="inline-flex items-center justify-center w-10 h-10 mb-4 text-indigo-500 bg-indigo-100 rounded-full">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                    </svg>

                </div>
                <h2 class="mb-2 text-lg font-medium text-gray-900 title-font">Basic Validation</h2>
                <p class="text-base leading-relaxed">
                    Validação Básica de E-mail
                </p>
            </a>

        </div>
    </div>

</x-documentation-layout>
