@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full"> 

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Manage <strong>Employee Attendance </strong>Generate</h4>
                        </div>

                        <div class="box-body">
                            <form action="{{ route('report.attendance.get') }}" method="GET" target="_blank">
                                @csrf
                                <div class="row">

                                    <div class="col-md-4"> <!-- Start Col-Md Row -->

                                        <div class="form-group">
                                            <h5>Employee Name <span class="text-danger">*</span></h5>
                                                <select name="employee_id" id="employee_id" required class="custom-select custom-select-md">
                                                    <option value="" selected="" disabled="">Select Employee</option>
                                                    @foreach($employees as $employee)
                                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                    <!-- @ = isset  -->
                                                    @endforeach
                                                </select>
                                        </div>


                                    </div> <!-- End Col-Md Row -->

                                    <div class="col-md-4"> <!-- Start Col-Md Row -->

                                        <div class="form-group">
                                            <h5>Date <span class="text-danger">*</span></h5>
                                                <input type="date" name="date" class="form-control form-control-sm" required="">
                                        </div>

                                    </div> <!-- End Col-Md Row -->

                                    <div class="col-md-2 pt-25"> <!-- Start Col-Md Row -->

                                        <input type="submit" class="btn btn-rounded btn-primary" value="Search">


                                    </div> <!-- End Col-Md Row -->

                                </div> <!-- END Row -->

                            </form>
                        </div>
                    </div> <!-- END box bb-3 border-warning -->

                </div>  <!-- END Col-12 -->
                
                <!-- /.box -->          
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->      
        </section>
        <!-- /.content -->
    
    </div>
</div>


@endsection