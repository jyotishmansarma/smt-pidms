<div>
    {{-- The whole world belongs to you. --}}
    <style>
        .grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

    </style>
    <section class="section main-section">
        @if (session('success'))
            <div class="notification green">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                    <div>
                        <span class="icon"><i class="mdi mdi-buffer"></i></span>
                        {{ session('success') }}
                    </div>
                    <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
                </div>
            </div>
        @endif
        {{--        @foreach ($errors->all() as $error)--}}
        {{--            <div class="alert alert-danger">{{ $error }}</div>--}}
        {{--        @endforeach--}}

        <div class="card mb-6">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-ballot"></i></span>
                    Forms
                </p>
            </header>
            <div class="card-content">
                <form method="post" action="{{route('issue.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="field">
                        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6" style="margin-bottom: 2px">
                            <label class="label"> Issue Related to <span style="color:red">&#42;</span></label>
                            <label class="label">Issue Type<span style="color:red">&#42;</span></label>
                        </div>
                        <div class="field-body">
                            <div class="field ">

                                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
                                    {{-- <label class="label">Issue Related to</label> --}}
                                    <div class="select">
                                        <select name="issue_related_to" id="issue_related_to"
                                                wire:model="issue_related_to">

                                            <option value="">Select issue related to</option>
                                            @foreach ($issue_types as $issue_types)
                                                <option
                                                    value="{{ $issue_types->id }}">{{ $issue_types->name }} </option>
                                            @endforeach
                                        </select>
                                        @error('issue_related_to')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="select control" id="issue_type_description">
                                        @if( $issue_related_to!=4 )
                                            <select name="sub_issue_type" id="issue_type">
                                                @if ($issue_related_to )

                                                    @foreach ($sub_issueTypes as $sub_issueType)
                                                        <option
                                                            value="{{ $sub_issueType->id }}">{{ $sub_issueType->name }}
                                                        </option>
                                                    @endforeach
                                                @endif

                                                @else
                                                    <input class="input" type="text" name="contact_number"
                                                           placeholder="Enter issue type"
                                                           value="">
                                                @endif

                                            </select>
                                            @error('sub_issue_type')
                                            <span style="color: red">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>


                    <hr>

                    <div class="field">
                        <label class="label">Descriptiono <span style="color:red">&#42;</span></label>
                        <div class="control">
{{--                        <textarea name="description" class="textarea" placeholder="Explain Your issue"--}}
{{--                                  wire:model.debounce.300ms="description"--}}
{{--                        ></textarea>--}}

                            <textarea name="description" class="textarea" placeholder="Explain Your issue"
                            ></textarea>

                            @error('description') <span style="color: red">{{ $message }}</span>

                            @enderror
                        </div>
                    </div>
                    <ul>
                        @foreach ($results as $result)
                            <div class="card has-table">
                                <header class="card-header">
                                    <p class="card-header-title">
                                        {{--                                        <span class="icon"><i class="mdi mdi-account-multiple"></i></span>--}}

                                    </p>
                                    <button type="button" class="card-header-icon" wire:click="clearSearch">
                                        <span class="icon"><i class="mdi mdi-close"></i></span>
                                    </button>
                                </header>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>{{ $result->description }}</td>
                                        <td style="text-align: right">
                                            <a href="{{route('get_search_issue_details',$result->id)}}" class="button small green --jb-modal"     data-toggle="modal"  data-target="#exampleModalCenter"
                                                    data-target="sample-modal-2" title="view">
                                                <span class="icon"><i class="mdi mdi-eye"></i></span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </ul>
                    <hr>
            </div>
        </div>
        <div class="card mb-6">
            <header class="card-header">
                <p class="card-header-title"><span class="icon"><i class="mdi mdi-ballot"></i></span>
                    Upload Document
                </p>
            </header>
            <div class="card-content">

                <div class="field">
                    <div class="grid grid-cols-3 gap-6 lg:grid-cols-2 mb-6" style="margin-bottom: 2px">
                        <label class="label">Select Documet Type</label>
                        <label class="label">Upload file</label>
                        <div class="mb-6">
                            <button type="button" style="float: left" wire:click="addDiv"
                                    class="button small blue --jb-modal">
                                <span class="icon"><i class="mdi mdi-plus"></i></span>
                            </button>
                        </div>
                    </div>
                    @php
                        $index=0;
                    @endphp
                    <div class="field-body">

                        <div class="field ">


                            <div class="grid grid-cols-3 gap-6 lg:grid-cols-2 mb-6">
                                <div class="select">
                                    <select name="documents_type[]" id="documents" wire:model="documents.0">

                                        <option>Select Documernt type</option>
                                        @foreach($document_type as $documents)
                                            <option value="{{$documents->id}}">{{$documents->title}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <input class="upload control button blue" name="path_name[]" type="file"
                                       id="files.{{ $index}}"
                                       placeholder="e.g. Partnership opportunity"
                                       style="background-color: #c6c6c6;border:#c6c6c6" multiple>
                            </div>


                        </div>
                        @foreach ($divs as $index => $div)
                            <div class="field " wire:key="div-{{ $index }}">


                                <div class="grid grid-cols-3 gap-6 lg:grid-cols-2 mb-6">
                                    {{-- <label class="label">Issue Related to</label> --}}
                                    <div class="select">
                                        <select name="documents_type[]" id="documents.{{$index+1}}"
                                                wire:model="documents.{{$index+1}}">
                                            <option>Select Document type</option>
                                            @foreach($document_type as $documents)
                                                <option
                                                    value="{{$documents->id}}">{{$documents->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="select">
                                        <input class="upload control button blue" name="path_name[]"
                                               id="files.{{$index+1}}" type="file"
                                               placeholder="e.g. Partnership opportunity"
                                               style="background-color: #c6c6c6;border:#c6c6c6">
                                    </div>

                                    <div class="mb-6">
                                        <button type="button" style="float: left" wire:click="removeDiv({{ $index}})"
                                                class="button small red --jb-modal">
                                            <span class="icon"><i class="mdi mdi-plus"></i></span>
                                        </button>
                                    </div>


                                </div>


                            </div>
                        @endforeach

                    </div>
                </div>
                {{--                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6" style="margin-bottom: 2px">--}}
                {{--                        <label>Audio (Optional)</label>--}}
                {{--                        <label>Document (Optional)</label>--}}
                {{--                    </div>--}}
                {{--                    <div class="field-body">--}}
                {{--                        <div class="field ">--}}


                {{--                            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">--}}
                {{--                                --}}{{-- <label class="label">Issue Related to</label> --}}

                {{--                                <input class="upload control button blue" type="file" wire:model="audio"--}}
                {{--                                    placeholder="e.g. Partnership opportunity"--}}
                {{--                                    style="background-color: #c6c6c6;border:#c6c6c6">--}}

                {{--                                <input class="upload control button blue" type="file" wire:model="document"--}}
                {{--                                    placeholder="e.g. Partnership opportunity"--}}
                {{--                                    style="background-color: #c6c6c6;border:#c6c6c6">--}}
                {{--                            </div>--}}





                {{--                        </div>--}}

                {{--                    </div>--}}
                {{--                </div>--}}


                <div class="field grouped" style="float: right">
                    <div class="control">
                        <button type="submit" class="button green">
                            Submit
                        </button>
                    </div>
                    <div class="control">
                        <button type="reset" class="button red">
                            Reset
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>


    </section>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('showModal', function () {
                console.log('modal should display');
                $('#relatedMessagesModal').modal('show');
            });


            Livewire.on('closeModal', function () {
                $('#relatedMessagesModal').modal('hide');
                $('#AssignModal').modal('hide');
                $('#AssignCodealerModal').modal('hide');
            });
        });
    </script>
</div>
