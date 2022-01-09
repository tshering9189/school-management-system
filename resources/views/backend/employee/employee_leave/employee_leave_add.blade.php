@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="content-wrapper">
    <div class="container-full"> 
    <!-- Main content -->
        <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Apply Employee Leave</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        
                        <form novalidate="" method="post" action="{{ route('store.employee.leave') }}">
                        @csrf
                            <div class="row">
                                <div class="col-6">	

                                    <div class="form-group">
                                        <h5>Employee Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="employee_id" required class="custom-select custom-select-lg mb-3">
                                                <option value="" selected="" disabled="">Select Employee</option>
                                                @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div> <!-- /.col-6 -->

                                <div class="col-6">	

                                    <div class="form-group">
                                        <h5>Leave Purpose <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="leave_purpose_id" id="leave_purpose_id" required class="custom-select custom-select-lg mb-3">
                                                <option value="" selected="" disabled="">Select Leave Purpose</option>
                                                @foreach($leave_purpose as $leave)
                                                <option value="{{ $leave->id }}">{{ $leave->name }}</option>
                                                @endforeach
                                                <option value="0">New Purpose</option>
                                            </select>

                                            <input type="text" name="name" id="add_another" class="form-control form-control-lg" placeholder="Write Purpose" style="display:none;">


                                        </div>
                                    </div>

                                </div> <!-- /.col-6 -->

                                <div class="col-6">	

                                    <div class="form-group">
                                        <h5>Start Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="start_date" class="form-control" >
                                            @error('start_date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- /.col-6 -->

                                <div class="col-6">	

                                    <div class="form-group">
                                        <h5>End Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="end_date" class="form-control" >
                                            @error('end_date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- /.col-6 -->

                            </div> <!-- /.row -->
                                    
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Apply Leave">
                            </div> 

                        </form> <!-- /.form -->

                    </div> <!-- /.col -->
                </div> <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change', '#leave_purpose_id', function(){
            var leave_purpose_id = $(this).val();
            if (leave_purpose_id == '0') {
                $('#add_another').show();                
            } else {
                $('#add_another').hide();  
            }
        });
    });
</script>
@endsection