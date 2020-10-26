<form method="POST" action="{{ route('company.new') }}">
    @csrf
        <td class="px-4 py-1">
        <input class="uppercase appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
            name="companyName" 
            placeholder="Company Name">
    </td>
    <td class="px-4 py-1">
        <select name="salesPerson" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
            <option value="JESS TAN">JESS TAN</option>
            <option value="CHEO YONG HAI">CHEO YONG HAI</option>
            <option value="GINA NG">GINA NG</option>
        </select>
    </td>
    <td class="px-4 py-1">
        <select name="creditTerm" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
            <option value="COD">COD</option>
            <option value="14D">14D</option>
            <option value="30D">30D</option>
            <option value="60D">60D</option>
        </select>
    </td>
    <td class="px-4 py-1">
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
            name="creditLimit" 
            type="number"
            placeholder="Credit Limit">
    </td>
    <td class="px-4 py-1">
        <select name="status" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
            <option value="GREEN">GREEN</option>
            <option value="YELLOW">YELLOW</option>
            <option value="RED">RED</option>
        </select>
    </td>
    <td class="px-4 py-1">
            @csrf
            <button class="border border-blue-400 hover:bg-blue-400 px-2 py-1 rounded" type="submit" value="submit">Submit</button>
    </td>
    </form>