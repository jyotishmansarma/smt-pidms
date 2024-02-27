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
                SL No.
            </th>
            <th scope="col"   class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                District
            <th  scope="col" class="sort px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Division
            </th>
            <th scope="col" style="word-break: break-word" class="px-3 py-3 bg-gray-50 text-left text-s font-large text-gray-500 uppercase tracking-wider ">
                No of village that were proposed to be allotted to CLFs
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-s font-large text-gray-500 uppercase tracking-wider">
                No of village actually allotted to CLFs
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-s font-large text-gray-500 uppercase tracking-wider">
                No of CLFs allotted
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Training Conducted for CLF(Y/N)
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                No of Water User Committee formed by CLF
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Water User Committee Bank a/c opened by CLF
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                No of HHs for which IPC has been done by CLF
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                No of Skilled manpower listed  by CLF
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Date of Which W/o issued
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Remarks
            </th>


            {{--                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">--}}

            {{--                                    </th>--}}
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($clf_activities as $clf_activitie)
            <tr>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $clf_activitie->id }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $clf_activitie->district->district_name }}
                </td>

                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $clf_activitie->division->division_name }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $clf_activitie->proposed_villages }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $clf_activitie->actually_alloted_village }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $clf_activitie->clf_alloted }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                   @if($clf_activitie->is_training_conducted==1)Y @endif @if($clf_activitie->is_training_conducted==0) N @endif
                </td>

                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $clf_activitie->water_user_committee }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $clf_activitie->water_user_committee_bank_ac }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $clf_activitie->hh_ipc_done }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $clf_activitie->skilled_manpower_listed }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $clf_activitie->issued_date }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">
                    {{ $clf_activitie->remarks }}
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
