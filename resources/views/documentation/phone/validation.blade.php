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
                  <a href="{{ route('documentation.show', ['phone','index']) }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">Phone</a>
                </div>
              </li>
            </ol>
          </nav>
        <div class="px-6 py-16 mx-auto max-w-7xl sm:py-24 lg:px-8">
            <div class="text-center">
                <p class="text-lg font-semibold text-indigo-600">Phone API</p>
                <h1 class="mt-1 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl">
                    Validation
                </h1>
                <p class="max-w-xl mx-auto mt-5 text-xl text-gray-500">
                    Formata e Valida números de telefone
                </p>
            </div>
        </div>
    </div>

    <div class="px-6 py-16 mx-auto space-y-8 max-w-7xl sm:py-24 lg:px-8">
        <section>
            <div>
                <h3 class="text-lg font-medium leading-6 text-gray-900">Informações da API</h3>
                <p class="max-w-2xl mt-1 text-sm text-gray-500">
                    Leia a documentação com atenção e evite problemas com o uso da API.
                </p>
            </div>
            <div class="p-4 mt-5 bg-white border-gray-200 shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <dl class="divide-y divide-gray-200">
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5">
                        <dt class="text-sm font-medium text-gray-900">Endpoint</dt>
                        <dd class="flex mt-1 text-base text-gray-900 sm:col-span-2 sm:mt-0">
                            <span class="flex-grow font-mono">{{ env('APP_URL') }}/api/v1/phone/validation</span>
                        </dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5">
                        <dt class="text-sm font-medium text-gray-900">Método HTTP</dt>
                        <dd class="flex mt-1 font-mono text-base text-gray-900 sm:col-span-2 sm:mt-0">
                            <span class="flex-grow">GET</span>
                        </dd>
                    </div>
                </dl>
            </div>
        </section>

        <section>
            <div>
                <h3 class="text-lg font-medium leading-6 text-gray-900">Parâmetros da API</h3>
            </div>
            <div class="flex flex-col mt-8">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr class="divide-x divide-gray-200">
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                            phone</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Tipo</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Valor /
                                            Padrão</th>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">
                                            Descrição
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="divide-x divide-gray-200">
                                        <td
                                            class="py-4 pl-4 pr-4 font-mono text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                            phone
                                        </td>
                                        <td class="p-4 font-mono text-sm text-gray-500 whitespace-nowrap">string</td>
                                        <td class="p-4 text-sm text-gray-500 whitespace-nowrap">
                                        </td>
                                        <td class="py-4 pl-4 pr-4 text-sm text-gray-500 whitespace-nowrap sm:pr-6">
                                            Número de Telefone que será validado.
                                        </td>
                                    </tr>
                                    <tr class="divide-x divide-gray-200">
                                        <td
                                            class="py-4 pl-4 pr-4 font-mono text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                            country
                                        </td>
                                        <td class="p-4 font-mono text-sm text-gray-500 whitespace-nowrap">string</td>
                                        <td class="p-4 text-sm text-gray-500 whitespace-nowrap">
                                        </td>
                                        <td class="py-4 pl-4 pr-4 text-sm text-gray-500 whitespace-nowrap sm:pr-6">
                                            Código do País que será validado. <a class="text-blue-500 underline" href="https://www.iban.com/country-codes" target="_blank">(saiba mais)</a>
                                        </td>
                                    </tr>

                                    <!-- More people... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div>
                <h3 class="text-lg font-medium leading-6 text-gray-900">Resposta da API</h3>
                <p class="max-w-2xl mt-1 text-sm text-gray-500">
                    Em caso de sucesso (200 OK) a API retornará um JSON com os dados formatados e normalizados:
                </p>
            </div>
            <div class="p-4 mt-5 bg-white border-gray-200 shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
<x-markdown>
```json
{
    "success": true,
    "input": {
        "phone": "12 99244-2286",
        "country": "BR"
    },
    "output": {
        "valid_format": true,
        "e164": "+5512992442286",
        "international": "+55 12 99244-2286",
        "rfc3966": "tel:+55-12-99244-2286",
        "national": "(12) 99244-2286",
        "country": "BR",
        "type": "mobile",
        "numbers": "5512992442286",
        "length": 13
    }
}
```
</x-markdown>
            </div>
        </section>

    </div>

</x-documentation-layout>
