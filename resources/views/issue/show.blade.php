@extends('layouts.master')

@section('main-body')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Details</h5>
                <table class="table">
                <thead>

                </thead>
                <tbody>
                <tr>
                    <th>Issue Related to</th>
                    <td>{{$issue_tracking->issue_relato_to->name}}</td>
                    <th>Issue type</th>
                    <td>{{$issue_tracking->issue_types->name}}</td>

                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{$issue_tracking->assign_histroty->status_name->name ?? 'NA'}}</td>
                    <th>Status Updated</th>
                    <td>{{$issue_tracking->assign_histroty->status_updated_at ?? 'NA'}}</td>


                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{$issue_tracking->description ?? 'NA'}}</td>


                </tr>

                </tbody>
                </table>
            </div>
        </div>
        @php
            $issueId=$issue_tracking->id;

        @endphp
        {{--    <livewire:issue-status-update wire:props="['issueId' => $issueId]" wire:key="issue-status-update-{{$issueId}}"/>--}}
        @livewire('issue-status-update',['issueId'=>$issueId])
    </div>
@endsection
@section('main-script')
    @include('issue.js')
@endsection
