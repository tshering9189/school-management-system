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
                            <h4 class="box-title">Manage <strong>Student </strong>ID Card</h4>
                        </div>

                        <div class="box-body">
                            <form action="{{ route('report.student.idcard.get') }}" method="GET" target="_blank">
                                @csrf
                                <div class="row">

                                    <div class="col-md-5"> <!-- Start Col-Md Row -->

                                        <div class="form-group">
                                            <h5>Year <span class="text-danger">*</span></h5>
                                                <select name="year_id" id="year_id" required class="custom-select custom-select-md">
                                                    <option value="" selected="" disabled="">Select Year</option>
                                                    @foreach($years as $year)
                                                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                    <!-- @ = isset  -->
                                                    @endforeach
                                                </select>
                                        </div>


                                    </div> <!-- End Col-Md Row -->
                                    <div class="col-md-5"> <!-- Start Col-Md Row -->

                                        <div class="form-group">
                                            <h5>Class<span class="text-danger">*</span></h5>
                                                <select name="class_id" id="class_id" required class="custom-select custom-select-md">
                                                    <option value="" selected="" disabled="">Select Class</option>
                                                    @foreach($classes as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
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