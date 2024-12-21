<div>
    {{-- The whole world belongs to you. --}}

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

        <div class="card mb-6">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-ballot"></i></span>
                    User Create Form
                </p>
            </header>
            <div class="card-content">
                {{-- <form method="post" action="{{ route('issue.store') }}"> --}}
                @csrf
                <div class="field">
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6" style="margin-bottom: 2px">
                        <label class="label">Name<span style="color:red">&#42;</span></label>
                        <label class="label">Email<span style="color:red">&#42;</span></label>
                    </div>
                    <div class="field-body">
                        <div class="field ">


                            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">

                                <div class="select">
                                    <input class="input" type="text" placeholder="Name Full Name" value="">
                                    @error('issue_related_to')
                                        <span>{{ $issue_related_to }}</span>
                                    @enderror
                                </div>
                                <div class="select control" id="issue_type_description">
                                    <input class="input" type="email" placeholder="Name Email Address"
                                        value="">

                                    @error('sub_issue_type')
                                        <span>{{ $sub_issue_type }}</span>
                                    @enderror
                                </div>
                            </div>





                        </div>

                    </div>
                </div>


                <hr>

                <div class="field">
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6" style="margin-bottom: 2px">
                        <label class="label">Mobile Number<span style="color:red">&#42;</span></label>
                        <label class="label">Role<span style="color:red">&#42;</span></label>
                    </div>
                    <div class="field-body">
                        <div class="field ">


                            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">

                                <div class="select">
                                    <input class="input" type="number" placeholder="Enter Mobile Number"
                                        value="">
                                    @error('issue_related_to')
                                        <span>{{ $issue_related_to }}</span>
                                    @enderror
                                </div>
                                <div class="select control" id="issue_type_description">
                                    <select name="user_role" id="user_role" wire:model="user_role">

                                        <option>Select Role </option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->title }} </option>
                                        @endforeach
                                    </select>
                                    @error('issue_related_to')
                                        <span>{{ $issue_related_to }}</span>
                                    @enderror

                                    @error('sub_issue_type')
                                        <span>{{ $sub_issue_type }}</span>
                                    @enderror
                                </div>
                            </div>





                        </div>

                    </div>
                </div>


                <div class="field grouped" style="float: right">
                    <div class="control">
                        <button type="submit" wire:click="submitForm" class="button green">
                            Submit
                        </button>
                    </div>
                    <div class="control">
                        <button type="reset" class="button red">
                            Reset
                        </button>
                    </div>
                </div>
                {{-- </form> --}}
            </div>
        </div>


    </section>
</div>
