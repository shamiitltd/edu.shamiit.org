@extends('backEnd.master')
@section('title')
    {{ @Auth::user()->roles->name }} @lang('common.dashboard')
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('public/backEnd/assets/vendors/css/fullcalendar.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/backEnd/assets/vendors/calender_js/core/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/backEnd/assets/vendors/calender_js/daygrid/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/backEnd/assets/vendors/calender_js/timegrid/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/backEnd/assets/vendors/calender_js/list/main.css') }}" />
    <style>
        .ti-calendar:before {
            position: absolute;
            bottom: 17px !important;
            right: 18px !important;
        }
    </style>
@endpush


@section('mainContent')
    <section class="mb-40">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-title">
                        @if (isSubscriptionEnabled() && auth()->user()->role_id == 1 && saasDomain() != 'school')
                            <h3 class="mb-0">@lang('dashboard.welcome') - {{ @Auth::user()->school->school_name }} |
                                {{ @Auth::user()->roles->name }} |
                                @lang('dashboard.active_package') : {{ @$package_info['package_name'] }} |
                                @lang('dashboard.remain_days') : {{ @$package_info['remaining_days'] }} |
                                @lang('dashboard.student') : {{ @$totalStudents }} out {{ @$package_info['student_quantity'] }} |
                                @lang('common.staff') : {{ @$totalStaffs }} out {{ @$package_info['staff_quantity'] }}
                            </h3>
                        @else
                            <h3 class="mb-0">@lang('dashboard.welcome') - {{ @Auth::user()->school->school_name }} |
                                {{ @Auth::user()->roles->name }}</h3>
                        @endif
                    </div>
                </div>
            </div>

            @if (Auth::user()->is_saas == 0)
                <div class="row">
                    @if (userPermission('number-of-student'))
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <a href="{{ route('student_list') }}" class="d-block">
                                <div class="white-box single-summery">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h3>@lang('dashboard.student')</h3>
                                            <p class="mb-0">@lang('dashboard.total_students')</p>
                                        </div>
                                        <h1 class="gradient-color2">
                                            @if (isset($totalStudents))
                                                {{ $totalStudents }}
                                            @endif
                                        </h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if (userPermission('number-of-teacher'))
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <a href="{{ route('staff_directory') }}" class="d-block">
                                <div class="white-box single-summery">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h3>@lang('common.teachers')</h3>
                                            <p class="mb-0">@lang('dashboard.total_students')</p>
                                        </div>
                                        <h1 class="gradient-color2">
                                            @if (isset($totalTeachers))
                                                {{ $totalTeachers }}
                                            @endif
                                        </h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if (userPermission('number-of-parent'))
                        {{-- mt-30-md --}}
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <a href="#" class="d-block">
                                <div class="white-box single-summery">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h3>@lang('dashboard.parents')</h3>
                                            <p class="mb-0">@lang('dashboard.total_parents')</p>
                                        </div>
                                        <h1 class="gradient-color2">
                                            @if (isset($totalParents))
                                                {{ $totalParents }}
                                            @endif
                                        </h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if (userPermission('number-of-staff'))
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <a href="{{ route('staff_directory') }}" class="d-block">
                                <div class="white-box single-summery">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h3>@lang('dashboard.staffs')</h3>
                                            <p class="mb-0">@lang('dashboard.total_staffs')</p>
                                        </div>
                                        <h1 class="gradient-color2">
                                            @if (isset($totalStaffs))
                                                {{ $totalStaffs }}
                                            @endif
                                        </h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            @endif

            @if (Auth::user()->is_saas == 1)

                <div class="row">
                    @if (userPermission('number-of-student'))
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <a href="#" class="d-block">
                                <div class="white-box single-summery">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h3>@lang('dashboard.student')</h3>
                                            <p class="mb-0">@lang('dashboard.total_students')</p>
                                        </div>
                                        <h1 class="gradient-color2">

                                            @if (isset($totalStudents))
                                                {{ $totalStudents }}
                                            @endif
                                        </h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if (userPermission('number-of-teacher'))
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <a href="#" class="d-block">
                                <div class="white-box single-summery">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h3>@lang('common.teachers')</h3>
                                            <p class="mb-0">@lang('dashboard.total_teachers')</p>
                                        </div>
                                        <h1 class="gradient-color2">
                                            @if (isset($totalTeachers))
                                                {{ $totalTeachers }}
                                            @endif
                                        </h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if (userPermission('number-of-parent'))
                        {{-- mt-30-md --}}
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <a href="#" class="d-block">
                                <div class="white-box single-summery">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h3>@lang('dashboard.parents')</h3>
                                            <p class="mb-0">@lang('dashboard.total_parents')</p>
                                        </div>
                                        <h1 class="gradient-color2">
                                            @if (isset($totalParents))
                                                {{ $totalParents }}
                                            @endif
                                        </h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if (userPermission('number-of-staff'))
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <a href="#" class="d-block">
                                <div class="white-box single-summery">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h3>@lang('dashboard.staffs')</h3>
                                            <p class="mb-0">@lang('dashboard.total_staffs')</p>
                                        </div>
                                        <h1 class="gradient-color2">
                                            @if (isset($totalStaffs))
                                                {{ $totalStaffs }}
                                            @endif
                                        </h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </section>
    @if (userPermission('month-income-expense'))
       <section class="" id="studentClassDiv">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6 mt-4">
                                <div id="visitorPerDayColumnChart" style="height: 350px;"></div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div id="attendancePerDayBarChart" style="height: 350px;"></div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div id="attendancePerClassBarChart" style="height: 350px;"></div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div id="studentPerClassDonutChart" style="height: 350px;"></div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div id="studentPerAgeGroupColumnChart" style="height: 350px;"></div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div id="studentPerAdmissionYearColumnChart" style="height: 350px;"></div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div id="studentPerGenderDonutChart" style="height: 350px;"></div>
                            </div>
                        </div>                                
                    </div>
                </div>
            </div>
        </section>

        <section class="" id="studentClassDiv">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6 mt-4">
                                <div id="studentPerBloodGroupDonutChart" style="height: 350px;"></div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div id="studentPerHeightGroupColumnChart" style="height: 350px;"></div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div id="studentPerWeightColumnChart" style="height: 350px;"></div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div id="studentPerReligionDonutChart" style="height: 350px;"></div>
                            </div>
                        </div>                                
                    </div>
                </div>
            </div>
        </section>


        <section class="" id="incomeExpenseDiv">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-8 col-md-9 col-8">
                        <div class="main-title">
                            <h3 class="mb-30"> @lang('dashboard.income_and_expenses_for') {{ date('M') }} {{ $year }} </h3>
                        </div>
                    </div>
                    <div class="offset-lg-2 col-lg-2 text-right col-md-3 col-4">
                        <button type="button" class="primary-btn small tr-bg icon-only" id="barChartBtn">
                            <span class="pr ti-move"></span>
                        </button>

                        <button type="button" class="primary-btn small fix-gr-bg icon-only ml-10" id="barChartBtnRemovetn">
                            <span class="pr ti-close"></span>
                        </button>
                    </div>
                    <div class="col-lg-12">
                        <div class="white-box" id="barChartDiv">
                            <div class="row">
                                <div class="col-lg-2 col-md-6 col-6">
                                    <div class="text-center">

                                        <h1>({{generalSetting()->currency_symbol}}) {{number_format($m_total_income)}}</h1>
                                        <p>@lang('dashboard.total_income')</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-6">
                                    <div class="text-center">
                                        <h1>({{generalSetting()->currency_symbol}}) {{number_format($m_total_expense)}}</h1>
                                        <p>@lang('dashboard.total_expenses')</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6">
                                    <div class="text-center">
                                        <h1>({{generalSetting()->currency_symbol}}) {{number_format($m_total_income - $m_total_expense)}}</h1>
                                        <p>@lang('dashboard.total_profit')</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6">
                                    <div class="text-center">
                                        <h1>({{generalSetting()->currency_symbol}}) {{number_format($m_total_income)}}</h1>
                                        <p>@lang('dashboard.total_revenue')</p>
                                    </div>
                                </div>
                                @if (moduleStatusCheck('Wallet'))
                                    <div class="col-lg-2 col-md-6 col-6">
                                        <div class="text-center">
                                            <h1>{{ currency_format($monthlyWalletBalance) }}</h1>
                                            <p>@lang('dashboard.wallet_balance')</p>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-lg-12">
                                    <div id="commonBarChart" style="height: 350px; padding-right: 20px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    @if (userPermission('year-income-expense'))
        <section class="mt-50" id="incomeExpenseSessionDiv">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-8 col-md-9 col-8">
                        <div class="main-title">
                            <h3 class="mb-30">@lang('dashboard.income_and_expenses_for') {{ $year }}</h3>
                        </div>
                    </div>
                    <div class="offset-lg-2 col-lg-2 text-right col-md-3 col-4">
                        <button type="button" class="primary-btn small tr-bg icon-only" id="areaChartBtn">
                            <span class="pr ti-move"></span>
                        </button>

                        <button type="button" class="primary-btn small fix-gr-bg icon-only ml-10"
                            id="areaChartBtnRemovetn">
                            <span class="pr ti-close"></span>
                        </button>
                    </div>
                    <div class="col-lg-12">
                        <div class="white-box" id="areaChartDiv">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-6">
                                    <div class="text-center">
                                        <h1>({{generalSetting()->currency_symbol}}) {{number_format($y_total_income)}}</h1>
                                        <p>@lang('dashboard.total_income')</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-6">
                                    <div class="text-center">

                                        <h1>({{generalSetting()->currency_symbol}}) {{number_format($y_total_expense)}}</h1>
                                        <p>@lang('dashboard.total_expenses')</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-6">
                                    <div class="text-center">
                                        <h1>({{generalSetting()->currency_symbol}}) {{number_format($y_total_income - $y_total_expense)}}</h1>
                                        <p>@lang('dashboard.total_profit')</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-6">
                                    <div class="text-center">
                                        <h1>({{generalSetting()->currency_symbol}}) {{number_format($y_total_income)}}</h1>
                                        <p>@lang('dashboard.total_revenue')</p>
                                    </div>
                                </div>
                                @if (moduleStatusCheck('Wallet'))
                                    <div class="col-lg-2 col-md-6 col-6">
                                        <div class="text-center">
                                            <h1>{{ currency_format($yearlyWalletBalance) }}</h1>
                                            <p>@lang('dashboard.wallet_balance')</p>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-lg-12">
                                    <div id="commonAreaChart" style="height: 350px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    @if (userPermission('notice-board'))
        <section class="mt-50">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="main-title">
                            <h3 class="mb-30">@lang('communicate.notice_board')</h3>
                        </div>
                    </div>
                    <div class="col-lg-2 pull-right text-right">
                        <a href="{{ route('add-notice') }}" class="primary-btn small fix-gr-bg"> <span
                                class="ti-plus pr-2"></span> @lang('common.add') </a>
                    </div>

                    <div class="col-lg-12">
                        <table class="school-table-style w-100">
                            <thead>
                                <tr>
                                    <th>@lang('common.date')</th>
                                    <th>@lang('dashboard.title')</th>
                                    <th class="d-flex justify-content-around">@lang('common.actions')</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $role_id = Auth()->user()->role_id; ?>

                                <?php if (isset($notices)) {

                            foreach ($notices as $notice) {
                            // $inform_to = explode(',', @$notice->inform_to);
                            // if (in_array($role_id, $inform_to)) {
                            ?>
                                <tr>
                                    <td>

                                        {{ @$notice->publish_on != '' ? dateConvert(@$notice->publish_on) : '' }}

                                    </td>
                                    <td>{{ @$notice->notice_title }}</td>
                                    <td class="d-flex justify-content-around">
                                        <a href="{{ route('view-notice', @$notice->id) }}" title="@lang('common.view_notice')"
                                            class="primary-btn small tr-bg modalLink"
                                            data-modal-size="modal-lg">@lang('common.view')</a>
                                    </td>
                                </tr>
                                <?php
                            // }
                            }
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="mt-50">
        <div class="container-fluid p-0">
            <div class="row">
                @if (userPermission('calender-section'))
                    <div class="col-lg-7 col-xl-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-title">


                                    <div id="eventContent" title="Event Details" style="display:none;">
                                        @lang('common.start'): <span id="startTime"></span><br>
                                        @lang('dashboard.end'): <span id="endTime"></span><br><br>
                                        <p id="eventInfo"></p>
                                        <p><strong><a id="eventLink" href=""
                                                    target="_blank">@lang('dashboard.read_more')</a></strong></p>
                                    </div>


                                    <h3 class="mb-30">@lang('dashboard.calendar')</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="white-box">
                                    <div class='common-calendar'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-lg-5 col-xl-4 mt-50-md md_infix_50">
                    @if (userPermission('to-do-list'))
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="main-title">
                                    <h3 class="mb-30">@lang('dashboard.to_do_list')</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 text-right col-md-6 col-6">
                                <a href="#" data-toggle="modal" class="primary-btn small fix-gr-bg"
                                    data-target="#add_to_do" title="Add To Do" data-modal-size="modal-md">
                                    <span class="ti-plus pr-2"></span>
                                    @lang('common.add')
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="modal fade admin-query" id="add_to_do">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">@lang('dashboard.add_to_do')</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <div class="container-fluid">
                                        {{ Form::open([
                                            'class' => 'form-horizontal',
                                            'files' => true,
                                            'route' => 'saveToDoData',
                                            'method' => 'POST',
                                            'enctype' => 'multipart/form-data',
                                            'onsubmit' => 'return validateToDoForm()',
                                        ]) }}

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row mt-25">
                                                    <div class="col-lg-12" id="sibling_class_div">
                                                        <div class="primary_input">
                                                            <label class="primary_input_label"
                                                                for="">@lang('dashboard.to_do_title') *<span></span>
                                                            </label>
                                                            <input class="primary_input_field form-control" type="text"
                                                                name="todo_title" id="todo_title">

                                                            <span class="modal_input_validation red_alert"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-30">
                                                    <div class="col-lg-12" id="">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="col">
                                                                <div class="primary_input">
                                                                    <label class="primary_input_label"
                                                                        for="">@lang('common.date') <span></span>
                                                                    </label>
                                                                    <input
                                                                        class="read-only-input primary_input_field  primary_input_field date form-control form-control{{ $errors->has('date') ? ' is-invalid' : '' }}"
                                                                        id="startDate" type="text" autocomplete="off"
                                                                        readonly="true" name="date"
                                                                        value="{{ date('m/d/Y') }}"><i
                                                                        class="ti-calendar" id="start-date-icon"></i>
                                                                    @if ($errors->has('date'))
                                                                        <span class="text-danger">
                                                                            {{ $errors->first('date') }}
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 text-center">
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg"
                                                            data-dismiss="modal">@lang('common.cancel')</button>
                                                        <input class="primary-btn fix-gr-bg submit" type="submit"
                                                            value="@lang('common.save')">
                                                    </div>
                                                </div>
                                            </div>
                                            {{ Form::close() }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="white-box school-table">
                                <div class="row to-do-list mb-20">
                                    <div class="col-md-12 d-flex align-items-center justify-content-between ">
                                        <button class="primary-btn small fix-gr-bg"
                                            id="toDoList">@lang('dashboard.incomplete')</button>
                                        <button class="primary-btn small tr-bg"
                                            id="toDoListsCompleted">@lang('dashboard.completed')</button>
                                    </div>
                                </div>
                                <input type="hidden" id="url" value="{{ url('/') }}">
                                <div class="toDoList">
                                    @if (count(@$toDos->where('complete_status', 'P')) > 0)
                                        @foreach ($toDos->where('complete_status', 'P') as $toDoList)
                                            <div class="single-to-do d-flex justify-content-between toDoList"
                                                id="to_do_list_div{{ @$toDoList->id }}">
                                                <div>
                                                    <input type="checkbox" id="midterm{{ @$toDoList->id }}"
                                                        class="common-checkbox complete_task" name="complete_task"
                                                        value="{{ @$toDoList->id }}">

                                                    <label for="midterm{{ @$toDoList->id }}">
                                                        <input type="hidden" id="id"
                                                            value="{{ @$toDoList->id }}">
                                                        <input type="hidden" id="url"
                                                            value="{{ url('/') }}">
                                                        <h5 class="d-inline">{{ @$toDoList->todo_title }}</h5>
                                                        <p>
                                                            {{ $toDoList->date != '' ? dateConvert(@$toDoList->date) : '' }}

                                                        </p>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="single-to-do d-flex justify-content-between">
                                            @lang('dashboard.no_do_lists_assigned_yet')
                                        </div>
                                    @endif
                                </div>


                                <div class="toDoListsCompleted">
                                    @if (count(@$toDos->where('complete_status', 'C')) > 0)
                                        @foreach ($toDos->where('complete_status', 'C') as $toDoListsCompleted)
                                            <div class="single-to-do d-flex justify-content-between"
                                                id="to_do_list_div{{ @$toDoListsCompleted->id }}">
                                                <div>
                                                    <h5 class="d-inline">{{ @$toDoListsCompleted->todo_title }}</h5>
                                                    <p class="">

                                                        {{ @$toDoListsCompleted->date != '' ? dateConvert(@$toDoListsCompleted->date) : '' }}

                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="single-to-do d-flex justify-content-between">
                                            @lang('dashboard.no_do_lists_assigned_yet')
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div id="fullCalModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modalTitle" class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span> <span class="sr-only">@lang('common.close')</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="" alt="There are no image" id="image" class="" height="150"
                        width="auto">
                    <div id="modalBody"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('common.close')</button>
                </div>
            </div>
        </div>
    </div>



    {{-- Dashboard Secound Graph Start  --}}

    {{-- @php
    @$chart_data = "";

    for($i = 1; $i <= date('d'); $i++){

        $i = $i < 10? '0'.$i:$i;
        @$income = App\SmAddIncome::monthlyIncome($i);
        @$expense = App\SmAddIncome::monthlyExpense($i);

        @$chart_data .= "{ day: '" . $i . "', income: " . @$income . ", expense:" . @$expense . " },";
    }
    @endphp

    @php
    @$chart_data_yearly = "";

    for($i = 1; $i <= date('m'); $i++){

        $i = $i < 10? '0'.$i:$i;

        @$yearlyIncome = App\SmAddIncome::yearlyIncome($i);

        @$yearlyExpense = App\SmAddIncome::yearlyExpense($i);

        @$chart_data_yearly .= "{ y: '" . $i . "', income: " . @$yearlyIncome . ", expense:" . @$yearlyExpense . " },";

    }
    @endphp --}}

    {{-- Dashboard Secound Graph End  --}}


@endsection
@include('backEnd.partials.date_picker_css_js')
@section('script')
    <script type="text/javascript" src="{{ asset('public/backEnd/') }}/vendors/js/fullcalendar.min.js"></script>
    <script src="{{ asset('public/backEnd/vendors/js/fullcalendar-locale-all.js') }}"></script>

    <script type="text/javascript">
        function barChart(idName) {
            window.barChart = Morris.Bar({
                element: 'commonBarChart',
                data: [<?php echo $chart_data; ?>],
                xkey: 'day',
                ykeys: ['income', 'expense'],
                labels: [jsLang('income'), jsLang('expense')],
                barColors: ['#8a33f8', '#f25278'],
                resize: true,
                redraw: true,
                gridTextColor: 'var(--base_color)',
                gridTextSize: 12,
                gridTextFamily: '"Poppins", sans-serif',
                barGap: 4,
                barSizeRatio: 0.3
            });
        }

        const monthNames = ["", "Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];

        function areaChart() {
            window.areaChart = Morris.Area({
                element: 'commonAreaChart',
                data: [<?php echo $chart_data_yearly; ?>],
                xkey: 'y',
                parseTime: false,
                ykeys: ['income', 'expense'],
                labels: [jsLang('income'), jsLang('expense')],
                xLabelFormat: function(x) {
                    var index = parseInt(x.src.y);
                    return monthNames[index];
                },
                xLabels: "month",
                labels: [jsLang('income'), jsLang('expense')],
                hideHover: 'auto',
                lineColors: ['rgba(124, 50, 255, 0.5)', 'rgba(242, 82, 120, 0.5)'],
            });
        }
    </script>

    <script type="text/javascript">
        if ($('.common-calendar').length) {
            $('.common-calendar').fullCalendar({
                locale: _locale,
                rtl: _rtl,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                eventClick: function(event, jsEvent, view) {
                    $('#modalTitle').html(event.title);
                    let url = event.url;
                    let description = event.description;
                    if (!url) {
                        $('#image').addClass('d-none');
                    }
                    if (url.includes('lead')) {
                        $('#image').addClass('d-none');
                        $('#modalBody').html(event.description);
                    } else {
                        $('#image').attr('src', event.url);
                    }
                    $('#fullCalModal').modal();
                    return false;
                },
                height: 650,
                events: <?php echo json_encode($calendar_events); ?>,
            });
        }
    </script>

    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <!-- Load the Google Charts API -->
    <script type="text/javascript">
    
        var studentPerClass = <?php echo json_encode($studentPerClass); ?>;
        var studentPerGender = <?php echo json_encode($studentPerGender); ?>;
        var studentPerReligion = <?php echo json_encode($studentPerReligion); ?>;
        var studentPerBloodGroup = <?php echo json_encode($studentPerBloodGroup); ?>;
        var incomeExpenseArray = [ <?php echo $chart_data; ?> ];
        var incomeExpenseYearlyArray = [ <?php echo $chart_data_yearly; ?> ];
        var attendanceData = <?php echo json_encode($attendanceData); ?>;

        
        let databag = studentPerClass.map((item) => {
            return [capitalizeFirstLetter(item.class_name), parseInt(item.total)];
        });
        
        let genderDataBag = studentPerGender.map((item) => {
            return [item.base_setup_name, parseInt(item.total)];
        });
        
        let religionDataBag = studentPerReligion.map((item) => {
            return [item.base_setup_name, parseInt(item.total)];
        });
        
        let bloodGroupDataBag = studentPerBloodGroup.map((item) => {
            return [item.base_setup_name, parseInt(item.total)];
        });

        var studentPerAgeGrouptable = [];
        var studentPerAdmissionYeartable = [];
        var studentPerHeightGrouptable = [];
        var studentPerWeightGrouptable = [];
        var visitorPerDaytable = [];
        var incomeExpensetable = [];
        var incomeExpenseYearlytable = [];
        var attendancetable = [];
        var attendancePerClasstable = [];

        studentPerAgeGrouptable.push(['Age', 'Number of Students']);
        studentPerAdmissionYeartable.push(['Year', 'Number of Students']);
        studentPerHeightGrouptable.push(['Height', 'Number of Students']);
        studentPerWeightGrouptable.push(['Weight', 'Number of Students']);
        visitorPerDaytable.push(['Day', 'Number of Visitors']);
        incomeExpensetable = convertData(incomeExpenseArray);
        incomeExpenseYearlytable = convertYearlyData(incomeExpenseYearlyArray);
        attendancetable = convertAttendanceData(attendanceData);
        attendancePerClasstable = convertAttendancePerClassData(attendanceData);
        
        <?php foreach($studentPerAgeGroup as $row) { ?>
            studentPerAgeGrouptable.push(['<?php echo $row['CalculatedAge']; ?>', <?php echo (int)$row['total']; ?>]);
        <?php } ?>
        
        <?php foreach($studentPerAdmissionYear as $row) { ?>
            studentPerAdmissionYeartable.push(['<?php echo $row['year']; ?>', <?php echo (int)$row['total']; ?>]);
        <?php } ?>
        
        <?php foreach($studentPerHeightGroup as $row) { ?>
            studentPerHeightGrouptable.push(['<?php echo $row['height']; ?>', <?php echo (int)$row['total']; ?>]);
        <?php } ?>
        <?php foreach($studentPerWeightGroup as $row) { ?>
            studentPerWeightGrouptable.push(['<?php echo $row['weight']; ?>', <?php echo (int)$row['total']; ?>]);
        <?php } ?>
        
        <?php foreach($visitors as $day => $count) { ?>
            visitorPerDaytable.push(['{{$day}}', {{$count}}]);
        <?php } ?>


        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
      
        function drawChart() {
            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Classes');
            data.addColumn('number', 'Students');
            data.addRows(databag);
            var options = {'title':'Students Per Class',
                        'width':'100%',
                        'height':'100%',
                        'pieHole': 0.4,
                        is3D: true
                    };
            // Instantiate and draw our chart, passing in some options.//PieChart,ColumnChart
            var visitorPerDayChartContainer = document.getElementById("studentPerClassDonutChart");
            if (data.getNumberOfRows() === 0) {
                visitorPerDayChartContainer.style.height = "100px";
            } else {
                visitorPerDayChartContainer.style.height = "350px";
            }
            var chart = new google.visualization.PieChart(visitorPerDayChartContainer);
            chart.draw(data, options);
            
            //Gender Chart
            var genderData = new google.visualization.DataTable();
            genderData.addColumn('string', 'Gender');
            genderData.addColumn('number', 'Students');
            genderData.addRows(genderDataBag);
            var options = {'title':'Students Per Gender',
                        'width':'100%',
                        'height':'100%',
                        'pieHole': 0.4,
                        is3D: true
                    };
            // Instantiate and draw our chart, passing in some options.//PieChart,ColumnChart
            var genderChartContainer = document.getElementById("studentPerGenderDonutChart");
            if (genderData.getNumberOfRows() === 0) {
                genderChartContainer.style.height = "100px";
            } else {
                genderChartContainer.style.height = "350px";
            }
            var genderChart = new google.visualization.PieChart(genderChartContainer);
            genderChart.draw(genderData, options);
            
            //Religion Chart
            var religionData = new google.visualization.DataTable();
            religionData.addColumn('string', 'Religion');
            religionData.addColumn('number', 'Students');
            religionData.addRows(religionDataBag);
            var options = {'title':'Students Per Religion',
                        'width':'100%',
                        'height':'100%',
                        'pieHole': 0.4,
                        is3D: true
                    };
            // Instantiate and draw our chart, passing in some options.//PieChart,ColumnChart
            var religionChartContainer = document.getElementById("studentPerReligionDonutChart");
            if (religionData.getNumberOfRows() === 0) {
                religionChartContainer.style.height = "100px";
            } else {
                religionChartContainer.style.height = "350px";
            }
            var religionChart = new google.visualization.PieChart(religionChartContainer);
            religionChart.draw(religionData, options);

            //Blood Group Chart
            var bloodGroupData = new google.visualization.DataTable();
            bloodGroupData.addColumn('string', 'Blood Group');
            bloodGroupData.addColumn('number', 'Students');
            bloodGroupData.addRows(bloodGroupDataBag);
            var options = {'title':'Students Per Blood Group',
                        'width':'100%',
                        'height':'100%',
                        'pieHole': 0.4,
                        is3D: true
                    };
            // Instantiate and draw our chart, passing in some options.//PieChart,ColumnChart
            var bloodGroupChartContainer = document.getElementById("studentPerBloodGroupDonutChart");
            if (bloodGroupData.getNumberOfRows() === 0) {
                bloodGroupChartContainer.style.height = "100px";
            } else {
                bloodGroupChartContainer.style.height = "350px";
            }
            var bloodGroupChart = new google.visualization.PieChart(bloodGroupChartContainer);
            bloodGroupChart.draw(bloodGroupData, options);
            
            
            //Column Chart graph Age vs students
            var studentPerAgeGroupData = google.visualization.arrayToDataTable(studentPerAgeGrouptable);
            var options = {
                title: "Age vs Number of Students",
                legend: { position: "none" },
                hAxis: { title: "Age" },
                vAxis: { title: "Number of Students" }
            };
            var studentPerAgeGroupDataChartContainer = document.getElementById("studentPerAgeGroupColumnChart");
            if (studentPerAgeGroupData.getNumberOfRows() === 0) {
                studentPerAgeGroupDataChartContainer.style.height = "0";
            } else {
                studentPerAgeGroupDataChartContainer.style.height = "350px";
            }
            var studentPerAgeGroupDataChart = new google.visualization.ColumnChart(studentPerAgeGroupDataChartContainer);
            studentPerAgeGroupDataChart.draw(studentPerAgeGroupData, options);
            
            //Column Chart graph Admission Year vs students
            var studentPerAdmissionYearData = google.visualization.arrayToDataTable(studentPerAdmissionYeartable);
            var options = {
                title: "Admission Year vs Number of Students",
                legend: { position: "none" },
                hAxis: { title: "Year" },
                vAxis: { title: "Number of Students" }
            };
            var studentPerAdmissionYearDataChartContainer = document.getElementById("studentPerAdmissionYearColumnChart");
            if (studentPerAdmissionYearData.getNumberOfRows() === 0) {
                studentPerAdmissionYearDataChartContainer.style.height = "0";
            } else {
                studentPerAdmissionYearDataChartContainer.style.height = "350px";
            }
            var studentPerAdmissionYearDataChart = new google.visualization.ColumnChart(studentPerAdmissionYearDataChartContainer);
            studentPerAdmissionYearDataChart.draw(studentPerAdmissionYearData, options);
            
            //Column Chart graph Height vs students
            var studentPerHeightData = google.visualization.arrayToDataTable(studentPerHeightGrouptable);
            var options = {
                title: "Height vs Number of Students",
                legend: { position: "none" },
                hAxis: { title: "Height" },
                vAxis: { title: "Number of Students" }
            };
            var studentPerHeightDataChartContainer = document.getElementById("studentPerHeightGroupColumnChart");
            if (studentPerHeightData.getNumberOfRows() === 0) {
                studentPerHeightDataChartContainer.style.height = "0";
            } else {
                studentPerHeightDataChartContainer.style.height = "350px";
            }
            var studentPerHeightDataChart = new google.visualization.ColumnChart(studentPerHeightDataChartContainer);
            studentPerHeightDataChart.draw(studentPerHeightData, options);
            
            //Column Chart graph Weight vs students
            var studentPerWeightData = google.visualization.arrayToDataTable(studentPerWeightGrouptable);
            var options = {
                title: "Weight vs Number of Students",
                legend: { position: "none" },
                hAxis: { title: "Weight" },
                vAxis: { title: "Number of Students" }
            };
            var studentPerWeightDataChartContainer = document.getElementById("studentPerWeightColumnChart");
            if (studentPerWeightData.getNumberOfRows() === 0) {
                studentPerWeightDataChartContainer.style.height = "0";
            } else {
                studentPerWeightDataChartContainer.style.height = "350px";
            }
            var studentPerWeightDataChart = new google.visualization.AreaChart(studentPerWeightDataChartContainer);
            studentPerWeightDataChart.draw(studentPerWeightData, options);
            
            //Column Chart graph Day vs Visitors
            var visitorPerDayData = google.visualization.arrayToDataTable(visitorPerDaytable);
            var options = {
                title: 'Number of Visitors per Day for this Month',
                legend: { position: "none" },
                hAxis: { title: 'Day' },
                vAxis: { title: 'Number of Visitors' }
            };
            var visitorPerDayDataChartContainer = document.getElementById("visitorPerDayColumnChart");
            if (visitorPerDayData.getNumberOfRows() === 0) {
                visitorPerDayDataChartContainer.style.height = "0";
            } else {
                visitorPerDayDataChartContainer.style.height = "350px";
            }
            var visitorPerDayDataChart = new google.visualization.AreaChart(visitorPerDayDataChartContainer);
            visitorPerDayDataChart.draw(visitorPerDayData, options);
            
            //Day wise income and expensis
            var incomeExpenseData = google.visualization.arrayToDataTable(incomeExpensetable);
            var options = {
                title: 'School Performance',
                curveType: 'function',
                legend: { position: 'bottom' },
                colors: ['#00a65a', '#f56954', '#bfbfbf']
            };
            var incomeExpenseDataChartContainer = document.getElementById("commonBarChart");
            if (incomeExpenseData.getNumberOfRows() === 0) {
                incomeExpenseDataChartContainer.style.height = "0";
            } else {
                incomeExpenseDataChartContainer.style.height = "350px";
            }
            var incomeExpenseDataChart = new google.visualization.LineChart(incomeExpenseDataChartContainer);
            incomeExpenseDataChart.draw(incomeExpenseData, options);
            
            //Year wise income and expensis 
            var incomeExpenseYearlyData = google.visualization.arrayToDataTable(incomeExpenseYearlytable);
            var options = {
                title: 'School Performance',
                hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0},
                curveType: 'function',
            };
            var incomeExpenseYearlyDataChartContainer = document.getElementById("commonAreaChart");
            if (incomeExpenseYearlyData.getNumberOfRows() === 0) {
                incomeExpenseYearlyDataChartContainer.style.height = "0";
            } else {
                incomeExpenseYearlyDataChartContainer.style.height = "350px";
            }
            var incomeExpenseYearlyDataChart = new google.visualization.AreaChart(incomeExpenseYearlyDataChartContainer);
            incomeExpenseYearlyDataChart.draw(incomeExpenseYearlyData, options);
            
            //Attendance Per Day of all student //attendancePerClasstable
            var attendancePerDayData = google.visualization.arrayToDataTable(attendancetable);
            var options = {
                title: 'Attendance per Day',
                chartArea: {width: '50%'},
                isStacked: true,
                hAxis: {
                    title: 'Number of Students',
                    minValue: 0
                },
                vAxis: {title: 'Day'}
            };
            var attendancePerDayDataChartContainer = document.getElementById("attendancePerDayBarChart");
            if (attendancePerDayData.getNumberOfRows() === 0) {
                attendancePerDayDataChartContainer.style.height = "0";
            } else {
                attendancePerDayDataChartContainer.style.height = "350px";
            }
            var attendancePerDayDataChart = new google.visualization.BarChart(attendancePerDayDataChartContainer);
            attendancePerDayDataChart.draw(attendancePerDayData, options);

            //Attendance per Class for today
            var attendancePerClassData = google.visualization.arrayToDataTable(attendancePerClasstable);
            var options = {
                title: 'Attendance per class',
                hAxis: {
                    title: 'Class',
                    minValue: 0
                },
                vAxis: { title: "Number of Students" }

            };
            var attendancePerClassDataChartContainer = document.getElementById("attendancePerClassBarChart");
            if (attendancePerClassData.getNumberOfRows() === 0) {
                attendancePerClassDataChartContainer.style.height = "0";
            } else {
                attendancePerClassDataChartContainer.style.height = "350px";
            }
            var attendancePerClassDataChart = new google.visualization.ColumnChart(attendancePerClassDataChartContainer);
            attendancePerClassDataChart.draw(attendancePerClassData, options);

        }
        function capitalizeFirstLetter(str) {
            return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
        }
        function convertData(data) {
            const result = [["Day", "Income", "Expenses", "Profit"]];
            data.forEach(obj => {
            const row = [obj.day, obj.income, obj.expense, (parseInt(obj.income) - parseInt(obj.expense))];
                result.push(row);
            });
            return result;
        }
        function convertYearlyData(data) {
            const result = [["Year", "Income", "Expenses"]];
            const monthNames = ["", "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
            ];
            data.forEach(obj => {
                const row = [monthNames[parseInt(obj.y)], obj.income, obj.expense];
                result.push(row);
            });
            return result;
        }
        
        function convertAttendanceData(data) {
            // Define an object to store attendance data for each date
            const attendanceData = {};

            // Loop through each attendance record in the input data
            data.forEach((record) => {
                const { attendance_date, attendance_type, class_name } = record;

                // Check if attendance data exists for this date in the attendanceData object
                if (!attendanceData[attendance_date]) {
                    attendanceData[attendance_date] = {
                        Present: 0,
                        Absent: 0,
                        Late: 0,
                        Holiday:0,
                        HalfDay:0
                    };
                }

                // Increment the attendance count for the corresponding type
                switch (attendance_type) {
                    case 'P':
                        attendanceData[attendance_date].Present++;
                        break;
                    case 'A':
                        attendanceData[attendance_date].Absent++;
                        break;
                    case 'L':
                        attendanceData[attendance_date].Late++;
                        break;
                    case 'H':
                        attendanceData[attendance_date].Holiday++;
                        break;
                    case 'F':
                        attendanceData[attendance_date].HalfDay++;
                        break;
                    default:
                        break;
                }

                // Add the class name to the attendance data for this date
                if (!attendanceData[attendance_date][class_name]) {
                    attendanceData[attendance_date][class_name] = 0;
                }
                attendanceData[attendance_date][class_name]++;
            });

            // Convert the attendance data object to an array of arrays
            const attendanceArray = [['Date', 'Present', 'Absent', 'Late', 'Half Day', 'Holiday']];
            const sortedKeys = Object.keys(attendanceData).sort();
            sortedKeys.forEach((date) => {
                const { Present, Absent, Late, HalfDay, Holiday } = attendanceData[date];
                attendanceArray.push([date, Present, Absent, Late, HalfDay, Holiday]);
            });
            return attendanceArray;
        }

        function convertAttendancePerClassData(data) {
            // Define an object to store attendance data for each date
            const attendanceData = {};
            const today = new Date().toISOString().slice(0, 10);
 
            // Loop through each attendance record in the input data
            data.forEach((record) => {
                const { attendance_date, attendance_type, class_name } = record;
                
                
                // Check if attendance data exists for this date in the attendanceData object
                if (!attendanceData[class_name]) {
                    attendanceData[class_name] = {
                        Present: 0,
                        Absent: 0,
                        Late: 0,
                        Holiday:0,
                        HalfDay:0
                    };
                }

                // Increment the attendance count for the corresponding type
                if (attendance_date === today){
                switch (attendance_type) {
                    case 'P':
                        attendanceData[class_name].Present++;
                        break;
                    case 'A':
                        attendanceData[class_name].Absent++;
                        break;
                    case 'L':
                        attendanceData[class_name].Late++;
                        break;
                    case 'H':
                        attendanceData[class_name].Holiday++;
                        break;
                    case 'F':
                        attendanceData[class_name].HalfDay++;
                        break;
                    default:
                        break;
                }
                }
            });

            // Convert the attendance data object to an array of arrays
            const attendanceArray = [['Class', 'Present', 'Absent', 'Late', 'Half Day', 'Holiday']];
            const sortedKeys = Object.keys(attendanceData).sort();
            sortedKeys.forEach((class_name) => {
                const { Present, Absent, Late, HalfDay, Holiday } = attendanceData[class_name];
                attendanceArray.push([class_name, Present, Absent, Late, HalfDay, Holiday]);
            });
            return attendanceArray;
        }
    </script>

@endsection
