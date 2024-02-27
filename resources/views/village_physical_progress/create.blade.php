<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Physical Progress - Session {{$session}}
        </h2>
    </x-slot>

    <div>

        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('vphysical.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                            @livewire('village-select',[
                            'selectedPanchayat' =>1,
                            'selectedVillage' =>1
                            ])

                        <div class="columns-2 ">

                        <div class="px-4 py-5 bg-white sm:p-6 ">
                                <label for="description" class="block font-medium text-sm text-gray-700">No. Of House holds <strong></strong></label>
                                <input type="number" name="house_holds" id="house_holds"  class="form-input rounded-md shadow-sm mt-1 block w-full "
                                       value="{{ old('house_holds', '0') }}" />
                                @error('house_holds')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6 ">
                                <label for="description" class="block font-medium text-sm text-gray-700">No. Of completed Schemes <strong></strong></label>
                                <input type="number" name="house_connection" id="house_connection"  class="form-input rounded-md shadow-sm mt-1 block w-full "
                                       value="{{ old('house_connection', '0') }}" />
                                @error('house_connection')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                        </div>

                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6 ">
                            <label for="description" class="block font-medium text-sm text-gray-700">No. Of completed Schemes <strong></strong></label>
                            <p id="fhtc_coverage">100%</p>
                        </div>



                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
    <script type="text/javascript">
        $(function() {
            console.log($("#house_connection").val());

            $("#house_connection, #house_holds").keyup(function() { // input on change
                console.log($("#house_connection").val());
                var result = parseFloat(parseInt($("#house_connection").val(), 10) * 100)/ parseInt($("#house_holds").val(), 10);
                $('#fhtc_coverage').text(result||''); //shows value in "#rate"
            })
        });
    </script>
