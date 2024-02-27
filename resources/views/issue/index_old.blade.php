@extends('layouts_old.master')

@section('main-body')
    {{-- The whole world belongs to you. --}}
    <style>
        .grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

    </style>
    <div class="card mb-6">
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
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-ballot"></i></span>
                Search
            </p>
        </header>
        <div class="card-content">
            <form method="GET" action="">
                <div class="field">
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6" style="margin-bottom: 2px">
                        <label class="label"> Issue related to <span style="color:red">&#42;</span></label>
                        <label class="label">Status<span style="color:red">&#42;</span></label>
                    </div>
                    <div class="field-body">
                        <div class="field ">
                            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">

                                <div class="select">
                                    <select name="issue_type"
                                    >

                                        <option value="">Select issue related to</option>
                                        @foreach ($issue_type as $issue_types)
                                            <option
                                                value="{{ $issue_types->id }}" {{ old('issue_type') == $issue_types->id ? 'selected' : '' }}>{{ $issue_types->name }} </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="select control" id="issue_type_description">
                                    <select name="status" id="issue_related_to">

                                        <option value="">Select status</option>
                                        @foreach ($status as $statues)
                                            <option
                                                value="{{ $statues->id }}">{{ $statues->name }} </option>
                                        @endforeach
                                    </select>


                                </div>
                            </div>
                            <div class="control">
                                <button type="submit" class="button green">
                                    Search
                                </button>
                                <a href="{{route('issue.index')}}" class="button red">
                                    Reset
                                </a>
                            </div>

                        </div>
                        <div class="field grouped" style="float: right">


                        </div>

                    </div>

                </div>

            </form>
        </div>
    </div>
    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                List
            </p>
            <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
        </header>
        <div class="card-content">
            <table>
                <thead>
                <tr>
                    <th>Sl no</th>
                    <th>Issue no</th>
                    <th>Issue Related to</th>
                    <th>Issue type</th>
                    <th>Assign to</th>
                    <th>Submission Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($issue_tracking as $key=>$issue_trackings)
                        <td data-label="Name">{{++$key}}</td>
                        <td data-label="Name">{{$issue_trackings->serial_no}}</td>
                        <td data-label="Name">{{$issue_trackings->issue_relato_to->name}}</td>

                        <td data-label="Company">{{$issue_trackings->issue_types->name ?? 'NA'}}</td>

                        <td>{{$issue_trackings->assign_histroty->assign_to->name ?? 'NA'}}</td>
                        <td>{{$issue_trackings->assign_histroty->sub_date ?? 'NA'}}</td>
                        <td>{{$issue_trackings->issue_status_name->name ?? 'NA'}}</td>


                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                                @can('accept_issue')
                                    <a class="button small blue --jb-modal" data-target="sample-modal-2"
                                       href="{{route('issue_approved',$issue_trackings->id)}}"
                                       type="button" @if($issue_trackings->accept==1) style="pointer-events: none; cursor: default" title="Application already accepted" @endif>
                                        <span class="icon"><i class="mdi mdi-check-circle"></i></span>
                                    </a>
                                @endcan
                                <a class="button small green --jb-modal" data-target="sample-modal-2"
                                   @if($issue_trackings->accept!=1) href="#" title="Please approved application first"
                                   @else  href="{{route('get_issue_data',$issue_trackings->id)}}" title="view" @endif
                                   type="button">
                                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                                </a>
                                    @can('delete_issue')
                                <a class="button small red --jb-modal" data-target="sample-modal-2"  @if($issue_trackings->accept==1) href="#" title=""
                                   @else href="{{route('issue_delete',$issue_trackings->id)}}" title="Delete"@endif
                                   type="button">
                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                </a>
                                    @endcan
                                    <a class="button small black --jb-modal" data-target="sample-modal-2"  @if($issue_trackings->accept==1) href="#" title=""
                                       @else href="{{route('track_application',$issue_trackings->id)}}" title="Delete"@endif
                                       type="button" style="background: #2F96B4">
                                        <span class="icon"><i class="mdi mdi-information" style="color: white"></i></span>
                                    </a>
                            </div>
                        </td>
                </tr>

                @endforeach


                </tbody>
            </table>
            <div class="table-pagination">
                <div class="flex items-center justify-between">
                    <div class="buttons">
                        {{ $issue_tracking->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('main-script')
    @include('issue.js')
@endsection
