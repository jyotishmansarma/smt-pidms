<div>
    <br>
    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                Document
            </p>
            <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
        </header>
        <div class="card-content">
            <table>
                <thead>
                <th>#</th>
                <th>Document type</th>
                <th>Action</th>
                @foreach($documents as $key=>$document)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$document->document_types->title}}</td>

                        <td> <a class="button small green --jb-modal" data-target="sample-modal-2"
                                href="{{ Storage::url( $document->image_path) }}"
                                type="button">
                                <span class="icon"><i class="mdi mdi-eye"></i></span>
                            </a></td>

                    </tr>
                @endforeach
                </thead>
                <tbody>


                </tbody>
            </table>


        </div>
    </div>
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
    @can('update_issue')
        <br>
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    User Details
                </p>
                <a href="#" class="card-header-icon">
                    <span class="icon"><i class="mdi mdi-reload"></i></span>
                </a>
            </header>
            <div class="card-content">
                <table>
                    <thead>
                    <th>Name</th>
                    <td>{{$issue_tracking->user_details->name}}</td>
                    <th>Email</th>
                    <td>{{$issue_tracking->user_details->email}}</td>
                    <th>Contact Number</th>
                    <td>{{$issue_tracking->user_details->contact_number ??'N/A'}}</td>
                    </thead>
                    <tbody>


                    </tbody>
                </table>


            </div>
        </div>
        <div class="section main-section">
            <div class="card mb-6">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-ballot"></i></span>
                        Status Update
                    </p>
                </header>
                <div class="card-content">
                    {{--                <form method="post" action="{{ route('issue_update') }}">--}}
                    @csrf

                    <div class="field">
                        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6" style="margin-bottom: 2px">
                            <label class="label">Status<span style="color:red">&#42;</span></label>
                            @if($status==2)
                                <label class="label">Forward To<span style="color:red">&#42;</span></label>
                            @endif
                        </div>
                        <div class="field-body">
                            <div class="field ">


                                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">

                                    <div class="select">
                                        <select name="status" id="status" wire:model="status">
                                            <option>Select Status</option>
                                            @foreach($status_name as $status_names)
                                                <option
                                                    value="{{$status_names->id}}">{{$status_names->name}} </option>
                                            @endforeach
                                        </select>

                                        @error('status')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if($status==2)
                                        <div class="select control" id="role">
                                            <select name="forward_to" id="forward_to" wire:model="forward_to">
                                                <option>Select user</option>
                                                @foreach($role as $roles)
                                                    <option value="{{$roles->id}}">{{$roles->name}} </option>
                                                @endforeach
                                            </select>

                                            @error('forward_to')
                                            <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    @endif
                                </div>


                            </div>

                        </div>
                    </div>
                    <input type="hidden" name="issue_id" value="{{$issueId}}" wire:model="issue_id">
                    <div class="field">
                        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6" style="margin-bottom: 2px">
                            <label class="label">Remarks<span style="color:red">&#42;</span></label>
                        </div>
                        <div class="field-body">
                            <div class="field ">


                                <div class="grid grid-cols-1 gap-6 lg:grid-cols-1 mb-6">

                                    <div class="select">
                                        <textarea class="textarea" name="remarks" placeholder="Remarks"
                                                  wire:model="remarks"></textarea>
                                        @error('remarks')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror

                                    </div>

                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="field">


                        <div class="field ">

                            <div class="field grouped">
                                <div class="control">
                                    <button type="submit" wire:click="submitForm" class="button green">
                                        Submit
                                    </button>

                                </div>
                            </div>


                        </div>


                    </div>
                    {{--                </form>--}}
                </div>
            </div>
        </div>
    @endcan

</div>
