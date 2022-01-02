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
                <h4 class="box-title">Student Promotion</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        
                        <form method="post" action="{{ route('promotion.student.registration',$editData->student_id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id", value="{{ $editData->id }}">
                            <div class="row">
                                <div class="col-12">
                                    
                                    <div class="row"><!-- 1st Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Student Name <span class="text-danger">*</span></h5>
                                                    <input type="text" name="name" class="form-control" required="" value="{{ $editData['student']['name'] }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Father's Name <span class="text-danger">*</span></h5>
                                                    <input type="text" name="fname" class="form-control" required="" value="{{ $editData['student']['fname'] }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Mother's Name <span class="text-danger">*</span></h5>
                                                    <input type="text" name="mname" class="form-control" required="" value="{{ $editData['student']['mname'] }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                    </div> <!-- End 1st Row -->

                                    <div class="row"><!-- 2nd Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Mobile Number <span class="text-danger">*</span></h5>
                                                    <input type="text" name="mobile" class="form-control" required="" value="{{ $editData['student']['mobile'] }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Address <span class="text-danger">*</span></h5>
                                                    <input type="text" name="address" class="form-control" required="" value="{{ $editData['student']['address'] }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Gender <span class="text-danger">*</span></h5>
                                                    <select name="gender" id="select" required class="custom-select custom-select-md">
                                                        <option value="" selected="" disabled="">Select Gender</option>
                                                        <option value="Male" {{ ($editData['student']['gender'] == 'Male') ? "selected" : "" }}>Male</option>
                                                        <option value="Female" {{ ($editData['student']['gender'] == 'Female') ? "selected" : "" }}>Female</option>
                                                    </select>
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                    </div> <!-- End 2nd Row -->

                                    <div class="row"><!-- 3rd Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Religion <span class="text-danger">*</span></h5>
                                                    <select name="religion" id="select" required class="custom-select custom-select-md">
                                                        <option value="" selected="" disabled="">Select Religion</option>
                                                        <option value="Buddhist" {{ ($editData['student']['religion'] == 'Buddhist') ? "selected" : "" }}>Buddhist</option>
                                                        <option value="Hindu" {{ ($editData['student']['religion'] == 'Hindu') ? "selected" : "" }}>Hindu</option>
                                                        <option value="Chirstan" {{ ($editData['student']['religion'] == 'Chirstan') ? "selected" : "" }}>Chirstan</option>
                                                    </select>
                                            </div>


                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Date of Birth <span class="text-danger">*</span></h5>
                                                    <input type="date" name="dob" class="form-control" required="" value="{{ $editData['student']['dob'] }}" >
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Discount<span class="text-danger">*</span></h5>
                                                    <input type="text" name="discount" class="form-control" required="" value="{{ $editData['discount']['discount'] }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                    </div> <!-- End 3rd Row -->


                                    <div class="row"><!-- 4th Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Year <span class="text-danger">*</span></h5>
                                                    <select name="year_id" required class="custom-select custom-select-md">
                                                        <option value="" selected="" disabled="">Select Year</option>
                                                        @foreach($years as $year)
                                                        <option value="{{ $year->id }}" {{ ($editData->year_id == $year->id) ? "selected" : "" }}>{{ $year->name }}</option>
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
                                                        <option value="{{ $class->id }}"  {{ ($editData->class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Group<span class="text-danger">*</span></h5>
                                                    <select name="group_id" required class="custom-select custom-select-md">
                                                        <option value="" selected="" disabled="">Select Group</option>
                                                        @foreach($groups as $group)
                                                        <option value="{{ $group->id }}"  {{ ($editData->group_id == $group->id) ? "selected" : "" }}>{{ $group->name }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                    </div> <!-- End 4th Row -->


                                    <div class="row"><!-- 5th Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Shift <span class="text-danger">*</span></h5>
                                                    <select name="shift_id" required class="custom-select custom-select-md">
                                                        <option value="" selected="" disabled="">Select Shift</option>
                                                        @foreach($shifts as $shift)
                                                        <option value="{{ $shift->id }}"  {{ ($editData->shift_id == $shift->id) ? "selected" : "" }}>{{ $shift->name }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>


                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Profile Image <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="image" class="form-control" id="image">
                                                </div>
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                           <div class="form-group">
                                                <div class="controls">
                                                    <img id="showImage" src="{{ (!empty($editData['student']['image'])) ? url('upload/student_images/'.$editData['student']['image']) : url('upload/no_image.jpg') }}" style="width:150px; height:auto;">
                                                </div>
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                    </div> <!-- End 5th Row -->

                                        
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info mb-5" value="Promote">
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection