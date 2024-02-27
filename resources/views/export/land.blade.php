<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Land Finalization Report</title>
</head>
<body>


<table class="min-w-full divide-y divide-gray-200 w-full">
    <thead>
    <tr>
        <th   scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            SL No.
        </th>
        <th wire:click="sortOrder('district_name')" scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            District
        </th>
        <th wire:click="sortOrder('division_name')" scope="col" class="sort px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Division
        </th>
        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Total Sanctioned Schemes
        </th>
        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            No. Of Schemes District AA (Upto 10 Cr)
        </th>
        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            AA Obtained Distict AA (Upto 10 Cr)
        </th>
        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Balance for AA
        </th>
        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Land Finalized
        </th>
        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Balance for Land Finalization
        </th>



        {{--                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">--}}

        {{--                                    </th>--}}
    </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach ($sanctionedSchemes as $sanctionedScheme)
        <tr>
            <td width="auto" class=" whitespace-nowrap text-sm text-gray-900">
                {{ $sanctionedScheme->id }}
            </td>
            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                {{ $sanctionedScheme->district->district_name }}
            </td>

            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                {{ $sanctionedScheme->division_name }}
            </td>
            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                {{ $sanctionedScheme->sanctioned_schemes }}
            </td>
            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                {{ $sanctionedScheme->no_of_schemes_district_aa }}
            </td>
            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                {{ $sanctionedScheme->aa_obtained_district_aa }}
            </td>
            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                {{ $sanctionedScheme->balance_aa }}
            </td>
            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                {{ $sanctionedScheme->land_finalized }}
            </td>
            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                {{ $sanctionedScheme->balance_for_land_finalized }}
            </td>


        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
