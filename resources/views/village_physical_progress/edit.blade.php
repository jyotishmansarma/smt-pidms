<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Physical Progress - Session {{ $session }}
        </h2>
    </x-slot>

    <div>

        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">


                        {{--                        <div class="columns-2 "> --}}

                        {{--                            <div class="px-4 py-5 bg-white sm:p-6 "> --}}
                        {{--                                <label for="description" class="block font-medium text-sm text-gray-700">No. Of House holds <strong></strong></label> --}}
                        {{--                                <input   readonly type="number" name="house_holds" id="house_holds"  class="form-input rounded-md shadow-sm mt-1 block w-full " --}}
                        {{--                                       value="{{ old('house_holds', $task->house_holds) }}" /> --}}
                        {{--                                @error('house_holds') --}}
                        {{--                                <p class="text-sm text-red-600">{{ $message }}</p> --}}
                        {{--                                @enderror --}}
                        {{--                            </div> --}}
                        {{--                            <div class="px-4 py-5 bg-white sm:p-6 "> --}}
                        {{--                                <label for="description" class="block font-medium text-sm text-gray-700">No. Of completed Schemes <strong></strong></label> --}}
                        {{--                                <input type="number" name="house_connection" id="house_connection"  class="form-input rounded-md shadow-sm mt-1 block w-full " --}}
                        {{--                                       value="{{ old('house_connection', $task->house_connection) }}" /> --}}
                        {{--                                @error('house_connection') --}}
                        {{--                                <p class="text-sm text-red-600">{{ $message }}</p> --}}
                        {{--                                @enderror --}}
                        {{--                            </div> --}}

                        {{--                        </div> --}}

                        {{--                        <div class="px-4 py-5 bg-white sm:p-6 "> --}}
                        {{--                            <label for="description" class="block font-medium text-sm text-gray-700">No. Of completed Schemes <strong></strong></label> --}}
                        {{--                            <p id="fhtc_coverage">{{ ($task->house_connection / $task->house_holds )*100  }}%</p> --}}
                        {{--                        </div> --}}
                        {{--                        <div class="columns-2"> --}}

                        {{--                            <div class="px-4 py-5 bg-white sm:p-6 "> --}}
                        {{--                                <label for="description" class="block font-medium text-sm text-gray-700">Exp. date of saturation<strong></strong></label> --}}
                        {{--                                <input   type="date" name="exp_date_of_saturation" id="exp_date_of_saturation"  class="form-input rounded-md shadow-sm mt-1 block w-full " --}}
                        {{--                                        value="{{ old('exp_date_of_saturation', '') }}" /> --}}
                        {{--                                @error('exp_date_of_saturation') --}}
                        {{--                                <p class="text-sm text-red-600">{{ $message }}</p> --}}
                        {{--                                @enderror --}}
                        {{--                            </div> --}}
                        {{--                            <div class="px-4 py-5 bg-white sm:p-6 "> --}}
                        {{--                                <label for="description" class="block font-medium text-sm text-gray-700">Exp. date of Har Ghar Jal<strong></strong></label> --}}
                        {{--                                <input   type="date" name="exp_date_of_har_ghar_jal" id="exp_date_of_har_ghar_jal"  class="form-input rounded-md shadow-sm mt-1 block w-full " --}}
                        {{--                                        value="{{ old('exp_date_of_har_ghar_jal', '') }}" /> --}}
                        {{--                                @error('exp_date_of_har_ghar_jal') --}}
                        {{--                                <p class="text-sm text-red-600">{{ $message }}</p> --}}
                        {{--                                @enderror --}}
                        {{--                            </div> --}}
                        {{--                        </div> --}}

{{--                        @livewire('village-physical-progess')--}}

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            {{-- <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Submit
                            </button> --}}
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                    <tr>
                                        <th scope="col" width="50"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            SL No.
                                        </th>
                                        <th wire:click="sortOrder('district_name')" scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            District
                                        </th>
                                        <th wire:click="sortOrder('district_name')" scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Block
                                        </th>
                                        <th wire:click="sortOrder('district_name')" scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Panchayat
                                        </th>
                                        <th wire:click="sortOrder('district_name')" scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Village
                                        </th>
                                        <th wire:click="sortOrder('district_name')" scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            House holds
                                        </th>
                                        <th wire:click="sortOrder('division_name')" scope="col"
                                            class="sort px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            House Connection
                                        </th>
                                        <th wire:click="sortOrder('division_name')" scope="col"
                                            class="sort px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            % of FHTC Coverage
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Exp date of saturation
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Exp date of harghar jal
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action
                                        </th>


                                        {{--                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50"> --}}

                                        {{--                                    </th> --}}
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200" id="table_data" >
                                @foreach($task as $key=>$t)
<?php
    $fhtc = round((($t->house_connection/$t->house_holds) * 100),2);
    $is_pending = $t->exp_date_of_saturation == null ? "#e43221" : '';

?>
                                    <tr   class="table_row"><td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{$key}}</td>
                                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{$t->village->panchayat->block->district->district_name}}</td>
                                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{$t->village->panchayat->block->block_name}}</td>
                                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{$t->village->panchayat->panchayat_name}}</td>
                                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{$t->village->village_name}}</td>
                                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{$t->house_holds}}</td>
                                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{$t->house_connection}}</td>
                                        <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-900">{{$fhtc}}%</td>
                                        <td> <input style="color:{{$is_pending}}" type="date" name="exp_date_of_saturation" id="exp_date_of_saturation{{$t->id}}"  class="form-input"
                                                    value="{{$t->exp_date_of_saturation}}" required /><input type="hidden" name="id" id="id"  class="form-input"
                                                                                                              value="{{$t->id}}" /></td>
                                        <td> <input style="color:{{$is_pending}}" type="date" name="exp_date_of_saturation" id="exp_date_of_har_ghar_jal{{$t->id}}"  class="form-input"
                                                    value="{{$t->exp_date_of_har_ghar_jal}}" required /></td>
                                        <td><button style="background:{{$is_pending}}" type="button" onclick="updatevill({{$t->id}})" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                                Update
                                            </button></td></tr>
                                @endforeach






                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
@include('js.village_physical_progress')
