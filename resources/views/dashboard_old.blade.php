<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} - Session {{$session}}
        </h2>
    </x-slot>

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">--}}
{{--                <x-jet-welcome />--}}

{{--                <h2 style="padding: 10px;">Scheme Progress ---}}
{{--                    Last updated at: {{$lastUpdated}}</h2>--}}

{{--                <table class="min-w-full divide-y divide-gray-200 w-full">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}

{{--                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                            Total No. Of Completed Schemes--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                            No. Of FHTCs in completed Schemes--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                            No. Of completed schemes handed over to PRI--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                            Balance No. Of schemes  to be handed over to PRI--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                            No. of WUC formed against completed schemes--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                            No. of WUC not formed against completed schemes--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                            No. of Jal Mitra Trained--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                            No. of Jal Mitras handed over engagement letter--}}
{{--                        </th>--}}


{{--                        --}}{{--                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">--}}

{{--                        --}}{{--                                    </th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{$completed_schemes}}</td>--}}
{{--                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{$fhtc_in_completed_schemes}}</td>--}}
{{--                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{$completed_schemes_handed_pri}}</td>--}}
{{--                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{$balance_schemes_handed_pri}}</td>--}}
{{--                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{$wuc_formed_againts_completed_schemes}}</td>--}}
{{--                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{$wuc_not_formed_againts_completed_schemes}}</td>--}}
{{--                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{$no_of_jal_mitra_trained}}</td>--}}
{{--                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{$no_of_jal_mitra_eng_letter}}</td>--}}
{{--                    </tr>--}}

{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="margin-top: 40px">--}}
{{--            <h2 style="padding: 10px;" >Land Finalization stats</h2>--}}
{{--            <table class="min-w-full divide-y divide-gray-200 w-full">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}

{{--                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                            Total Sanctioned Schemes--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                            No. Of Schemes District AA (Upto 10 Cr)--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                            AA Obtained Distict AA (Upto 10 Cr)--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                            Balance for AA--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                            Land Finalized--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                            Balance for Land Finalization--}}
{{--                        </th>--}}



{{--                        --}}{{--                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">--}}

{{--                        --}}{{--                                    </th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody class="bg-white divide-y divide-gray-200">--}}
{{--                        <tr>--}}

{{--                            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">--}}
{{--                                {{ $sanctioned_schemes }}--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">--}}
{{--                                {{ $no_of_schemes_district_aa }}--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">--}}
{{--                                {{ $aa_obtained_district_aa }}--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">--}}
{{--                                {{ $balance_aa }}--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">--}}
{{--                                {{ $land_finalized }}--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">--}}
{{--                                {{ $balance_for_land_finalized }}--}}
{{--                            </td>--}}


{{--                        </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}



{{--            </div>--}}
{{--            <div id="piechart_3d" style="width: 900px; height: 500px; margin-top: 20px;"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
</x-app-layout>
{{--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>--}}
{{--<script type="text/javascript">--}}
{{--    google.charts.load("current", {packages:["corechart"]});--}}
{{--    google.charts.setOnLoadCallback(drawChart);--}}
{{--    function drawChart() {--}}

{{--        var data = google.visualization.arrayToDataTable({{ Js::from($result) }});--}}

{{--        var options = {--}}
{{--            title: 'Village Physical Progress',--}}
{{--            is3D: true,--}}
{{--        };--}}

{{--        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));--}}
{{--        chart.draw(data, options);--}}
{{--    }--}}
{{--</script>--}}
