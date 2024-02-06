@extends('backEnd.master')
@section('title') 
@lang('exam.active_exams')
@endsection

@section('mainContent')
@push('css')
<style>
    table.dataTable tbody th, table.dataTable tbody td {
        padding-left: 20px !important;
    }

    table.dataTable thead th {
        padding-left: 34px !important;
    }

    table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting:after,table.dataTable thead .sorting_desc:after {
        left: 16px;
        top: 10px;
    }
</style>
@endpush
@php
    $user =$student;
@endphp
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('exam.online_exam') </h1>
            <div class="bc-pages">
                <a href="{{route('dashboard')}}">@lang('common.dashboard')</a>
                <a href="{{route('parent_online_examination',$user->id) }}">@lang('exam.active_exams')</a>
            </div>
        </div>
    </div>
</section>


@endsection
@include('backEnd.partials.data_table_js')
