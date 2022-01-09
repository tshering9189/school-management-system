@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full"> 
    <!-- Main content -->
        <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Edit Grade for Marks</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        
                        <form method="post" action="{{ route('update.marks.grades', $editData->id) }}">
                        @csrf
                            <div class="row">
                                <div class="col-12">
                                    
                                    <div class="row"><!-- 1st Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Grade Name <span class="text-danger">*</span></h5>
                                                    <input type="text" name="grade_name" class="form-control" required="" value="{{ $editData->grade_name }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Grade Point <span class="text-danger">*</span></h5>
                                                    <input type="text" name="grade_point" class="form-control" required="" value="{{ $editData->grade_point }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Start Marks <span class="text-danger">*</span></h5>
                                                    <input type="text" name="start_marks" class="form-control" required="" value="{{ $editData->start_marks }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                    </div> <!-- End 1st Row -->

                                    <div class="row"><!-- 2nd Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>End Marks <span class="text-danger">*</span></h5>
                                                    <input type="text" name="end_marks" class="form-control" required="" value="{{ $editData->end_marks }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Start Point <span class="text-danger">*</span></h5>
                                                    <input type="text" name="start_point" class="form-control" required="" value="{{ $editData->start_point }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>End Point <span class="text-danger">*</span></h5>
                                                    <input type="text" name="end_point" class="form-control" required="" value="{{ $editData->end_point }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                    </div> <!-- End 2nd Row -->

                                    <div class="row"><!-- 3rd Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Remarks <span class="text-danger">*</span></h5>
                                                    <input type="text" name="remarks" class="form-control" required="" value="{{ $editData->remarks }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        
                                    </div> <!-- End 3rd Row -->

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update Grade">
                                    </div>
                                </div>

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