<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheme Report</title>
</head>
<body>


    <table class="min-w-full divide-y divide-gray-200 w-full">
        <thead>
        <tr>
            <th   scope="col" width="auto" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
               <b> SL No.</b>
            </th>
            <th  scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <b>  District</b>
            </th>
            <th  scope="col" class="sort px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <b> Division</b>
            </th>
            <th scope="col"  class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <b>  Total No. Of Completed Schemes</b>
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <b> No. Of FHTCs in completed Schemes</b>
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            <b> No. Of completed schemes handed over to PRI</b>
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              <b> Balance No. Of schemes  to be handed over to PRI</b>
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <b> No. of WUC formed against completed schemes</b>
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <b>  No. of WUC not formed against completed schemes </b>
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <b>  No. of Jal Mitra Trained</b>
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <b> No. of Jal Mitras handed over engagement letter </b>
            </th>


            {{--                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">--}}

            {{--                                    </th>--}}
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($tasks as $task)
            <tr>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $task->id }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $task->district->district_name }}
                </td>

                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $task->division_name }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $task->completed_schemes }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $task->fhtc_in_completed_schemes }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $task->completed_schemes_handed_pri }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $task->balance_schemes_handed_pri }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $task->wuc_formed_againts_completed_schemes }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $task->wuc_not_formed_againts_completed_schemes }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $task->no_of_jal_mitra_trained }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $task->no_of_jal_mitra_eng_letter }}
                </td>

                {{--                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">--}}
                {{--                                            <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>--}}
                {{--                                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>--}}
                {{--                                            <form class="inline-block" action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">--}}
                {{--                                                <input type="hidden" name="_method" value="DELETE">--}}
                {{--                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                {{--                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">--}}
                {{--                                            </form>--}}
                {{--                                        </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>


</body>
</html>
