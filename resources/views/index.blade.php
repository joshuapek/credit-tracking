<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="refresh" content="600" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Credit Tracking</title>
    </head>
    <body>
        <!-- @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/edit') }}" class="text-sm text-gray-700 underline">Admin</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endif
            </div>
        @endif -->
        <div class="container mx-auto pt-5">
            <div>  
                <table class="table-auto w-full">
                    <thead>
                        <tr class="border">
                            <th class="px-4 py-2">Company Name</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Sales Person</th>
                            <th class="px-4 py-2">Credit Term</th>
                            <th class="px-4 py-2">Credit Limit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($companies->sortBy('companyName') as $company)
                            <tr class="border {{ $loop->iteration%2==1 ? 'bg-gray-300' : 'bg-white-500' }}">
                                <td class="px-4 py-1">{{ strToUpper($company->companyName) }}</td>
                                @if(trim(strToUpper($company['status'])) == "GREEN") 
                                    <td class="px-4 py-1">
                                        <div class="rounded-full h-4 w-4 flex bg-green-400 items-center justify-center mx-auto"></div>
                                    </td>
                                @elseif(trim(strToUpper($company['status'])) == "YELLOW") 
                                    <td class="px-4 py-1 bg">
                                        <div class="rounded-full h-4 w-4 flex bg-yellow-300 items-center justify-center mx-auto"></div>
                                    </td>
                                @else
                                    <td class="px-4 py-1">
                                        <div class="rounded-full h-4 w-4 flex bg-red-600 items-center justify-center mx-auto"></div>
                                    </td>
                                @endif
                                <td class="px-4 py-1 text-center">{{ strToUpper($company->salesPerson) }}</td>
                                <td class="px-4 py-1 text-center">{{ $company->creditTerm }}</td>
                                <td class="px-4 py-1 text-center">$ {{ number_format($company->creditLimit, 2, '.', ',') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="">No records yet..</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
