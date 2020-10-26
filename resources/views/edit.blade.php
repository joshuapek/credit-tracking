<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Company Credit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->get('success'))
                <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>{{ session()->get('success') }}</p>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="border">
                            <th class="px-4 py-2">Company Name</th>
                            <th class="px-4 py-2">Sales Person</th>
                            <th class="px-4 py-2">Credit Term</th>
                            <th class="px-4 py-2">Credit Limit</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border">
                            @if(isset($company))
                                @include('_companyedit')
                            @else
                                @include('_companynew')
                            @endif
                        </tr>
                            
                        @foreach($companies as $company)
                            <tr class="border">
                                <td class="px-4 py-2">{{ strToUpper($company->companyName) }}</td>
                                <td class="px-4 py-2">{{ $company->salesPerson }}</td>
                                <td class="px-4 py-2">{{ $company->creditTerm }}</td>
                                <td class="px-4 py-2">$ {{ number_format($company->creditLimit, 2, '.', ',') }}</td>
                                <td class="px-4 py-2">{{ strToUpper($company->status) }}</td>
                                <td class="px-4 py-2">
                                    <form action="{{ route('company.destroy', $company->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-white border border-red-500 hover:bg-red-500 py-1 px-2 rounded" type="submit">Delete</button>
                                    </form>
                                    <form action="{{ route('company.edit', $company->id)}}" method="get">
                                        @csrf
                                        <button class="bg-white border border-green-500 hover:bg-green-500 py-1 px-2 rounded" type="submit">Edit</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>


