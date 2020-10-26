<form method="POST" action="{{ route('company.update', $company->id) }}">
@method('PATCH') 
@csrf
<td class="px-4 py-1">
    <input class="uppercase appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
        name="companyName" disabled 
        placeholder="Company Name" value="{{ $company->companyName }}">
</td>
<td class="px-4 py-1">
    <select value="{{ $company->salesPerson }}" name="salesPerson" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
        <option value="JESS TAN" {{ $company->salesPerson == "JESS TAN" ? 'selected' : '' }}>JESS TAN</option>
        <option value="CHEO YONG HAI" {{ $company->salesPerson == "CHEO YONG HAI" ? 'selected' : '' }}>CHEO YONG HAI</option>
        <option value="GINA NG" {{ $company->salesPerson == "GINA NG" ? 'selected' : '' }}>GINA NG</option>
    </select>
</td>
<td class="px-4 py-1">
    <select name="creditTerm" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
        <option value="COD" {{ $company->creditTerm == "COD" ? 'selected' : '' }}>COD</option>
        <option value="14D" {{ $company->creditTerm == "14D" ? 'selected' : '' }}>14D</option>
        <option value="30D" {{ $company->creditTerm == "30D" ? 'selected' : '' }}>30D</option>
        <option value="60D" {{ $company->creditTerm == "60D" ? 'selected' : '' }}>60D</option>
    </select>
</td>
<td class="px-4 py-1">
    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
        name="creditLimit" 
            type="number"
        placeholder="Credit Limit" value={{ $company-> creditLimit }}>
</td>
<td class="px-4 py-1">
    <select name="status" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
        <option value="GREEN" {{ $company->status == "GREEN" ? 'selected' : '' }}>GREEN</option>
        <option value="YELLOW" {{ $company->status == "YELLOW" ? 'selected' : '' }}>YELLOW</option>
        <option value="RED" {{ $company->status == "RED" ? 'selected' : '' }}>RED</option>
    </select>
</td>
<td class="px-4 py-1">
        @csrf
        <button class="border border-blue-400 hover:bg-blue-400 px-2 py-1 rounded" type="submit" value="submit">Submit</button>
</td>
</form>