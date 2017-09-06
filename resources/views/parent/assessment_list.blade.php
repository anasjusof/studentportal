@extends('layouts.master')

@section('head')

@stop

@section('title')
   Subject : {{ $subject->subject_name }}
@stop

@section('breadcrumb')
    <li>
        <i class="fa fa-home"></i>
        <a href="">Home</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="#">Subject : {{ $subject->subject_name }}</a>
    </li>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box portlet-style">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-calendar font-white" style="color:white;"></i>
                    <span class="caption-subject font-white sbold uppercase">Subject : {{ $subject->subject_name }}</span>
                </div>
            </div>
                
            <div class="portlet-body">
                <div class="table-scrollable table-scrollable-borderless">
                    <table class="table table-hover table-light">
                        <thead>
                            <tr class="uppercase">
                                <th> # </th>
                                <th> Assessment</th>
                                <th> Marks</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php $count = 1; ?>
                            @foreach($assessments as $assessment)
                            <tr>
                                <td> {{ $count}} </td>
                                <td> {{ $assessment->assessment_name }}</td>
                                <td> <input type="text" class="form-control input-line" style="width: 50px;" readonly="" value="{{ $assessment->marks }}"></td>
                            </tr>
                            <?php $count++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>


@stop

@section('script')

<script src="../../assets/global/plugins/icheck/icheck.min.js"></script>

<script src="../../assets/admin/pages/scripts/form-icheck.js"></script>

<script> FormiCheck.init();  </script>

<script>
    $(document).ready(function(){
       $('#checkall-checkbox').click(function(){
            if(this.checked){
                $('.checker').find('span').addClass('checked');
                $("input.single-checkbox").prop('checked', true).show();
            }
            else{
                $('.checker').find('span').removeClass('checked');
                $("input.single-checkbox").prop('checked', false);
            }
       });

       $('.editBtn').click(function(){
            $("#m_student_id").val($(this).data('id'));
            $("#m_name").val($(this).data('name'));
            $("#m_sem").val($(this).data('sem'));
            $("#m_department").val($(this).data('department'));
            $("#m_course").val($(this).data('course'));
       });

    });
</script>


@include('errors.validation-errors')
@include('errors.validation-errors-script')

@stop