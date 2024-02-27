@extends('layouts.master')

@section('main-body')

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <h5 class="card-title fw-semibold mb-4"> Search</h5>
                <form method="GET" action="">
                    @csrf
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm">
                                <label for="exampleInputEmail1" class="form-label">Issue related to</label>
                                <select name="issue_type" class="form-select">

                                    <option value="">Select issue related to</option>
                                    @foreach ($issue_type as $issue_types)
                                        <option
                                                value="{{ $issue_types->id }}" {{ old('issue_type') == $issue_types->id ? 'selected' : '' }}>{{ $issue_types->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm">
                                <label for="exampleInputEmail1" class="form-label">Status</label>
                                <select name="status" id="issue_related_to" class="form-select">

                                    <option value="">Select status</option>
                                    @foreach ($status as $statues)
                                        <option
                                                value="{{ $statues->id }}">{{ $statues->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{route('issue.index')}}" class="btn btn-danger m-1">
                        Reset
                    </a>

                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th >Sl no</th>
                        <th >Issue no</th>
                        <th >Issue Related to</th>
                        <th >Issue type</th>
                        <th >Assign to</th>
                        <th>Submission Date</th>
                        <th >Status</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($issue_tracking as $key=>$issue_trackings)
                            <td>{{++$key}}</td>
                            <td>{{$issue_trackings->serial_no}}</td>
                            <td>{{$issue_trackings->issue_relato_to->name}}</td>
                            <td>{{$issue_trackings->issue_types->name ?? 'NA'}}</td>
                            <td>{{$issue_trackings->assign_histroty->assign_to->name ?? 'NA'}}</td>
                            <td>{{$issue_trackings->assign_histroty->sub_date ?? 'NA'}}</td>
                            <td>{{$issue_trackings->issue_status_name->name ?? 'NA'}}</td>
                            <td>
                            @can('accept_issue')
                                <a class="btn btn-primary m-1" href="{{route('issue_approved',$issue_trackings->id)}}" @if($issue_trackings->accept==1)  title="Application already accepted"  onclick="return acceptmsg()" @endif><i class="fa fa-check"></i></a>
                            @endcan
                            <a class="btn btn-success m-1" @if($issue_trackings->accept!=1) href="#" onclick="return viewAlert()" title="Please approved application first"
                               @else  href="{{route('get_issue_data',$issue_trackings->id)}}" title="view" @endif><i class="fa fa-eye"></i></a>
                            @can('delete_issue')
                                <a class="btn btn-danger m-1" @if($issue_trackings->accept==1) href="#"  onclick="return alertmsg()" title=""
                                   @else href="{{route('issue_delete',Crypt::encrypt($issue_trackings->id))}}" title="Delete" onclick="return confirmDelete()" @endif><i class="fa fa-trash"></i></a>
                            @endcan
{{--                                <a class="btn btn-success m-1"  href="{{route('get_issue_data',$issue_trackings->id)}}" title="view" ><i class="fa fa-eye"></i></a>--}}
{{--                                <a class="btn btn-info m-1" @if($issue_trackings->accept==1) href="#" title=""--}}
{{--                                   @else href="{{route('track_application',$issue_trackings->id)}}" title="Delete"@endif><i class="fa fa-info-circle"></i></a>--}}
                            </td>



                    </tr>
                    @endforeach

                    </tbody>
                </table>

                {{ $issue_tracking->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this issue?');
        }

        function alertmsg()
        {
            return confirm('You can not delete this issue.Because issue request has already accepted');
        }

        function acceptmsg()
        {
            return alert('You have already accept request');
        }
        function viewAlert()
        {
            return alert('Please approved application firsts');
        }
    </script>
@endsection
@section('main-script')
    @include('issue.js')

@endsection
