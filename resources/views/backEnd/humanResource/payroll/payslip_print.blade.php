<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('/')}}/public/backEnd/css/report/bootstrap.min.css">
    <title>@lang('hr.payslip')</title>
    <style>
    *{
      margin: 0;
      padding: 0;
    }
    body{
      font-size: 12px;
      font-family: 'Poppins', sans-serif;
    }
    .student_marks_table{
      width: 65%;
      margin: 30px auto 0 auto;
    }
    .text_center{
      text-align: center;
    }
    p{
      margin: 0;
      font-size: 12px;
      text-transform: capitalize;
    }
    ul{
      margin: 0;
      padding: 0;
    }
    li{
      list-style: none;
    }
    td {
    border: 1px solid var(--border_color);
    padding: .8rem;
    text-align: center;
  }
  th{
    border: 1px solid var(--border_color);
    text-align: center;
    padding: 1rem;
    white-space: nowrap;
  }
  thead{
    font-weight:bold;
    text-align:center;
    color: #222;
    font-size: 10px
  }
  .custom_table{
    width: 100%;
  }
  table.custom_table thead th {
    padding-right: 0;
    padding-left: 0;
  }
  table.custom_table thead tr > th {
    border: 0;
    padding: 0;
}

table.custom_table thead tr th .fees_title{
  font-size: 12px;
  font-weight: 600;
  border-top: 1px solid #726E6D;
  padding-top: 10px;
  margin-top: 10px;
}
.border-top{
  border-top: 0 !important;
}
  .custom_table th ul li {
  }
  .custom_table th ul li p {
    margin-bottom: 10px;
    font-weight: 500;
    font-size: 14px;
}

tbody td{
  padding: 0.8rem;
}
table{
  border-spacing: 10px;
  width: 65%;
  margin: auto;
}
.fees_pay{
  text-align: center;
}
.border-0{
  border: 0 !important;
}
.copy_collect{
  text-align: center;
  font-weight: 500;
  color: #000;
}

.copyies_text{
  display: flex;
  justify-content: space-between;
  margin: 30px 0;
}
.copyies_text li{
  text-transform: capitalize;
  color: #000;
  font-weight: 500;
  border-top: 1px dashed #ddd;
}
.text_left{
    text-align: left;
}
.italic_text{
}
.student-info{
    
}
.student-info li{
    display: flex;
}
.info_details {
    display: flex;
    flex-wrap: wrap;
    margin-top: 30px;
    margin-bottom: 30px;
    margin: 0;
    padding-left: 0px;
}

.info_details li > p{
    flex-basis: 20%;
}
.info_details li{
    display: flex;
    flex-basis: 50%;
}
.school_name{
    /* text-align: center; */
}
.numbered_table_row{
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}
.numbered_table_row thead{
    border: 1px solid #222
}
.numbered_table_row h3{
    font-size: 24px;
    text-transform: uppercase;
    margin-top: 15px;
    font-weight: 500;
    display: inline-block;
    border-bottom: 2px solid #222;
}
.numbered_table_row td{
   border: 1px solid var(--border_color);
   padding: .4rem;
   font-weight: 400;
   color: #222;
}

table#grade_table th {
    border: 1px solid #726E6D !important;
    padding: .6rem;
    font-weight: 600;
    color: #222;
}
td.border-top.border_left_hide {
    border-left: 0;
    text-align: left;
    font-weight: 600;
}
.devide_td{
    padding: 0;
}
.devide_td p{
    border-bottom: 1px solid #222;
}
.ssc_text{
    font-size: 20px;
    font-weight: 500;
    color: #222;
    margin-bottom: 20px;
}
.student_mark_header{
  display: flex;
  background: aliceblue;
  
}
.school_name{
  text-align: left;
  margin-left: 50px;
}

.transcript_header{
  margin-top:20px;
  text-align:center;
  justify-content: center;
}

.text-uppercase{
  text-transform: uppercase;
}
.border-0.numbered_table_row.full_name_header {
    margin-top: 20px;
    padding-bottom: 0;
    padding-left: 5px;
    margin-bottom: 0;
}
.border-0.full_name_header {
    text-align: left;
    padding-left: 0;
    width: 25%;
}
table.custom_table thead tr > th {
    border: 0;
    padding: 0;
    font-size: 13px;
    line-height: 2;
    text-align: left;
    font-weight: 400;
}
.custom_table.custom_table2 {
    width: 600px;
}
.font_14 {
    font-size: 14px;
    font-weight: 500;
    white-space: nowrap;
}
.numbered_table_row td {
	white-space: nowrap;
}
.info_details li > p {
    flex-basis: 100%;
    font-size: 14px;
    text-align: left;
}
.info_details li {
	display: flex;
	flex-basis: 100%;
}
.student-info {
	max-width: 280px;
	width: 280px;
}
.student-info p {
	font-size: 14px;
	white-space: nowrap;
}
.student-info li p {
    flex-basis: 100%;
    text-align: left;
}

.student-info li {
	display: flex;
	align-items: center;
	padding: 5px 0;
}
.info_details li {
    display: flex;
    flex-basis: 100%;
    padding: 5px 0;
}
/* .muted_text{
  color: #828bb2 !important;
} */
  </style>
@php
$setting_info=generalSetting();
@endphp
  </head>
  <script>
        var is_chrome = function () { return Boolean(window.chrome); }
        if(is_chrome) 
        {
           window.print();
        //    setTimeout(function(){window.close();}, 10000); 
           //give them 10 seconds to print, then close
        }
        else
        {
           window.print();
        }
    </script>
<body onLoad="loadHandler();" style="font-family: 'dejavu sans', sans-serif;">
<div class="student_marks_table">
    <table class="custom_table">
        <thead>
            <tr>
              <td class="border-0" >
                <div class="student_mark_header" style="justify-content: center;">
                  <div class="logo_thumb">
                    <img src=" {{asset('/')}}{{generalSetting()->logo }}" alt="">
                  </div>
                  <div class="school_name">
                  <h2>
                    {{isset(generalSetting()->school_name)?generalSetting()->school_name:'SHAMIIT School Management ERP'}} 
                  </h2>
                  <p>
                    {{isset(generalSetting()->address)?generalSetting()->address:'SHAMIIT School Address'}} 
                  </p>       
                </div>
                </div>
              </td>
            </tr>
            <tr>
            </tr>
        </thead>
    </table>
    <table class="custom_table">
        <thead>
            <tr>
                <th >
                  <div class="numbered_table_row" style="justify-content:center" >
                      <h3>
                        @lang('hr.payslip_for_the_period_of') {{$payrollDetails->payroll_month}} {{$payrollDetails->payroll_year}}
                      </h3>
                  </div>
                </th>
            </tr>
        </thead>
    </table>
    <table class="custom_table custom_table2">
        <thead>
        <tr>
          <td class="border-0 full_name_header">
              <h4 class="muted_text font_14">
                  @lang('hr.payslip') #@if(isset($payrollDetails)){{$payrollDetails->id}} @endif
              </h4>
          </td>
          <td class="border-0 full_name_header"></td>
          <td class="border-0 full_name_header"></td>
          <td class="border-0 full_name_header">
                <h4 class="muted_text font_14">
                @lang('fees.payment_date'): @if(isset($payrollDetails))
                    {{dateConvert($payrollDetails->payment_date)}}
                @endif
                </h4>
          </td>
        </tr>
            <tr>
                <th>@lang('hr.staff_id')</th>
                <th> @if(isset($payrollDetails)){{$payrollDetails->staffs->staff_no}} @endif</th>
                <th>@lang('common.name')</th>
                <th>@if(isset($payrollDetails)){{$payrollDetails->staffDetails->full_name}} @endif</th>
            </tr>
            <tr>
                <th>@lang('hr.departments')</th>
                <th> @if(isset($payrollDetails)){{$payrollDetails->staffDetails->departments->name}} @endif</th>
                <th>@lang('hr.designation')</th>
                <th>@if(isset($payrollDetails)){{$payrollDetails->staffDetails->designations->title}} @endif</th>
            </tr>
            <tr>
                <th>@lang('accounts.payment_mode')</th>
                <th> @if($payrollDetails->payment_mode != "")
                        {{$payrollDetails->paymentMethods->method}}
                    @else
                        @lang('fees.unpaid')
                    @endif
                </th>
                <th>@lang('hr.basic_salary')</th>
                <th>@if(isset($payrollDetails)){{$payrollDetails->basic_salary}} @endif</th>
            </tr>
            <tr>
                <th>@lang('hr.gross_salary')</th>
                <th> @if(isset($payrollDetails)){{$payrollDetails->gross_salary}} @endif</th>
                <th>@lang('hr.net_salary')</th>
                <th>@if(isset($payrollDetails)){{$payrollDetails->net_salary}} @endif</th>
            </tr>
            @if ($payrollDetails->note)
            <tr>
              <th>@lang('common.note')</th>
              <th> @if(isset($payrollDetails)){{$payrollDetails->note}} @endif</th>
            </tr>
            @endif
        </thead>
    </table>
</div>
</body>
    <script src="{{ asset('/') }}/public/backEnd/js/fees_invoice/jquery-3.2.1.slim.min.js"></script>
    <script src="{{ asset('/') }}/public/backEnd/js/fees_invoice/popper.min.js"></script>
    <script src="{{ asset('/') }}/public/backEnd/js/fees_invoice/bootstrap.min.js"></script>
</html>