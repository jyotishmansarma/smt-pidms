@extends('layouts_old.master')

@section('main-body')
    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                Details
            </p>
            <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
        </header>
        <div class="card-content">
            <table>
                <thead>
                <tr>
                    <th>Issue Related to</th>
                    <td>{{$issue_tracking->issue_relato_to->name}}</td>
                    <th>Issue type</th>
                    <td>{{$issue_tracking->issue_types->name}}</td>

                </tr>
                <tr>

                    <th>Assign to</th>
                    <td>{{$issue_tracking->assign_histroty->assign_to->name ?? 'NA'}}</td>
                    <th>Submission Date</th>
                    <td>{{$issue_tracking->assign_histroty->sub_date ?? 'NA'}}</td>

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

                </thead>
                <tbody>


                </tbody>
            </table>


        </div>
    </div>
    @php
        $issueId=$issue_tracking->id;

    @endphp
{{--    <livewire:issue-status-update wire:props="['issueId' => $issueId]" wire:key="issue-status-update-{{$issueId}}"/>--}}
    @livewire('issue-status-update',['issueId'=>$issueId])

@endsection
@section('main-script')
    @include('issue.js')
@endsection
