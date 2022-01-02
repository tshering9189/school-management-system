@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full"> 

        <!-- Main content -->
        <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box bb-3 border-warning">
                    <div class="box-header">
                        <h4 class="box-title">Student <strong>Search</strong></h4>
                    </div>

                    <div class="box-body">
                        <form action="{{ route('student.year.class.wise') }}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-md-4"> <!-- Start Col-Md Row -->

                                    <div class="form-group">
                                        <h5>Year <span class="text-danger">*</span></h5>
                                            <select name="year_id" required class="custom-select custom-select-md">
                                                <option value="" selected="" disabled="">Select Year</option>
                                                @foreach($years as $year)
                                                <option value="{{ $year->id }}" {{ (@$year_id == $year->id) ? "selected" : "" }}>{{ $year->name }}</option>
                                                <!-- @ = isset  -->
                                                @endforeach
                                            </select>
                                    </div>


                                </div> <!-- End Col-Md Row -->
                                <div class="col-md-4"> <!-- Start Col-Md Row -->

                                    <div class="form-group">
                                        <h5>Class<span class="text-danger">*</span></h5>
                                            <select name="class_id"required class="custom-select custom-select-md">
                                                <option value="" selected="" disabled="">Select Class</option>
                                                @foreach($classes as $class)
                                                <option value="{{ $class->id }}"  {{ (@$class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>

                                </div> <!-- End Col-Md Row -->

                                <div class="col-md-4 pt-25"> <!-- Start Col-Md Row -->

                                    <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="Search">

                                </div> <!-- End Col-Md Row -->

                            </div> <!-- END Row -->
                        </form>
                    </div>
                </div>

            </div>  <!-- END Col-12 -->

            <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Student List</h3>
                <a href="{{ route('student.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">

                    @if(!@$search)
                    <!-- !@ == not isset -->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Name</th>
                                    <th>ID Number</th>
                                    <th>Roll</th>
                                    <th>Year</th>
                                    <th>Class</th>
                                    <th>Image</th>
                                    @if(Auth::user()->role == 'Admin')
                                    <th>Code</th>
                                    @endif
                                    <th style="width:25%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($allData as $key => $value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value['student']['name'] }}</td>
                                    <td>{{ $value['student']['id_no'] }}</td>
                                    <td>{{ $value->roll }}</td>
                                    <td>{{ $value['student_year']['name'] }}</td>
                                    <td>{{ $value['student_class']['name'] }}</td>
                                    <td>
                                        <img class="border" id="showImage" src="{{ (!empty($value['student']['image'])) ? url('upload/student_images/'.$value['student']['image']) : url('upload/no_image.jpg') }}" style="width:80px; height:auto;">
                                    </td>
                                    <td>{{ $value->year_id }}</td>
                                    <td>
                                        <a href="{{ route('student.registration.edit', $value->student_id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('student.registration.promotion', $value->student_id) }}" class="btn btn-success"><i class="fa fa-check"></i></a>
                                        <a target="_blank" href="{{ route('student.registration.details', $value->student_id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    @else

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th>Name</th>
                                    <th>ID Number</th>
                                    <th>Roll</th>
                                    <th>Year</th>
                                    <th>Class</th>
                                    <th>Image</th>
                                    @if(Auth::user()->role == 'Admin')
                                    <th>Code</th>
                                    @endif
                                    <th style="width:25%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($allData as $key => $value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $value['student']['name'] }}</td>
                                    <td>{{ $value['student']['id_no'] }}</td>
                                    <td>{{ $value->roll }}</td>
                                    <td>{{ $value['student_year']['name'] }}</td>
                                    <td>{{ $value['student_class']['name'] }}</td>
                                    <td>
                                        <img class="border" id="showImage" src="{{ (!empty($value['student']['image'])) ? url('upload/student_images/'.$value['student']['image']) : url('upload/no_image.jpg') }}" style="width:80px; height:auto;">
                                    </td>
                                    <td>{{ $value->year_id }}</td>
                                    <td>
                                        <a href="{{ route('student.registration.edit', $value->student_id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('student.registration.promotion', $value->student_id) }}" class="btn btn-success"><i class="fa fa-check"></i></a>
                                        <a target="_blank" href="{{ route('student.registration.details', $value->student_id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>

                    @endif
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            
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