@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full"> 
    <!-- Main content -->
        <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Edit Employee Attendance</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        
                        <form novalidate="" method="post" action="{{ route('store.employee.attendance') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">	

                                <div class="form-group">
                                    <h5>Attendance Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="date" class="form-control form-control-md" value="{{ $editData['0']['date'] }}"> <!-- ['0'] == zero index data, ['date'] == field name date-->
                                        @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div> <!-- End col-md-6 -->
                            
                        </div> <!-- End row -->

                        <div class="row">
                            <div class="col-md-12">
                                
                                <table class="table table-bordered table-striped" style="width:100%;">
                                    <thead>
                                        <tr class="text-center">
                                            <th rowspan="2" style="vertical-align:middle; width:10%;">Sl</th>
                                            <th rowspan="2" style="vertical-align:middle;">Employee List</th>
                                            <th colspan="3" style="vertical-align:middle; width:30%;">Employee Status</th>
                                        </tr>

                                        <tr class="text-center">
                                            <th class="btn present_all" style="display: table-cell; background-color: #4895ef;">Present</th>
                                            <th class="btn leave_all" style="display: table-cell; background-color: #457b9d;">Leave</th>
                                            <th class="btn absent_all" style="display: table-cell; background-color: #e63946;">Absent</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($editData as $key => $data)
                                        <tr id="div{{$data->id}}">
                                            <input type="hidden" name="employee_id[]" value="{{ $data->employee_id }}">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $data['user']['name'] }}</td> <!-- Here the relation is used to display the name-->
                                            <td colspan="3">
                                                <div class="switch-toggle switch-3 switch-candy text-center">

                                                    <input type="radio" name="attend_status{{ $key }}" id="present{{$key}}" value="Present" checked="checked" {{ ($data->attend_status == 'Present') ? 'checked' : '' }}>
                                                    <label for="present{{$key}}">Present</label>

                                                    <input type="radio" name="attend_status{{ $key }}" value="Leave" id="leave{{$key}}" {{ ($data->attend_status == 'Leave') ? 'checked' : '' }}>
                                                    <label for="leave{{$key}}">Leave</label>

                                                    <input type="radio" name="attend_status{{ $key }}" value="Absent" id="absent{{$key}}" {{ ($data->attend_status == 'Absent') ? 'checked' : '' }}>
                                                    <label for="absent{{$key}}">Absent</label>

                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                            </div><!-- End col-md-12 -->
                        </div><!-- End row -->
                                
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update Attendance">
                            </div>

                        </form>

                    </div>
                    <!-- /.col -->
                </div>
            <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
</div>
@endsection