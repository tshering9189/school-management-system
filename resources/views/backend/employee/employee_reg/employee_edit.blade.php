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
                <h4 class="box-title">Edit Employee</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        
                        <form method="post" action="{{ route('update.employee.registration',$editData->id) }}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-12">
                                    
                                    <div class="row"><!-- 1st Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Employee Name <span class="text-danger">*</span></h5>
                                                    <input type="text" name="name" class="form-control" required="" value="{{ $editData->name }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Father's Name <span class="text-danger">*</span></h5>
                                                    <input type="text" name="fname" class="form-control" required="" value="{{ $editData->fname }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Mother's Name <span class="text-danger">*</span></h5>
                                                    <input type="text" name="mname" class="form-control" required="" value="{{ $editData->mname }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                    </div> <!-- End 1st Row -->

                                    <div class="row"><!-- 2nd Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Mobile Number <span class="text-danger">*</span></h5>
                                                    <input type="text" name="mobile" class="form-control" required="" value="{{ $editData->mobile }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Address <span class="text-danger">*</span></h5>
                                                    <input type="text" name="address" class="form-control" required="" value="{{ $editData->address }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Gender <span class="text-danger">*</span></h5>
                                                    <select name="gender" id="gender" required class="custom-select custom-select-md">
                                                        <option value="" selected="" disabled="">Select Gender</option>
                                                        <option value="Male" {{ ($editData->gender == 'Male') ? 'selected' : '' }}>Male</option>
                                                        <option value="Female" {{ ($editData->gender == 'Female') ? 'selected' : '' }}>Female</option>
                                                    </select>
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                    </div> <!-- End 2nd Row -->

                                    <div class="row"><!-- 3rd Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Religion <span class="text-danger">*</span></h5>
                                                    <select name="religion" id="religion" required class="custom-select custom-select-md">
                                                        <option value="" selected="" disabled="">Select Religion</option>
                                                        <option value="Buddhist" {{ ($editData->religion == 'Buddhist') ? 'selected' : '' }}>Buddhist</option>
                                                        <option value="Hindu" {{ ($editData->religion == 'Hindu') ? 'selected' : '' }}>Hindu</option>
                                                        <option value="Chirstan" {{ ($editData->religion == 'Chirstan') ? 'selected' : '' }}>Chirstan</option>
                                                    </select>
                                            </div>


                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Date of Birth <span class="text-danger">*</span></h5>
                                                    <input type="date" name="dob" class="form-control" required="" value="{{ $editData->dob }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Designation <span class="text-danger">*</span></h5>
                                                    <select name="designation_id" required class="custom-select custom-select-md">
                                                        <option value="" selected="" disabled="">Select Year</option>
                                                        @foreach($designation as $desi)
                                                        <option value="{{ $desi->id }}" {{ ($editData->designation_id == $desi->id) ? 'selected' : '' }}>{{ $desi->name }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                    </div> <!-- End 3rd Row -->


                                    <div class="row"><!-- 4th Row -->

                                    @if(!$editData)
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->
                                        
                                            <div class="form-group">
                                                <h5>Salary <span class="text-danger">*</span></h5>
                                                    <input type="text" name="salary" class="form-control" required="" value="{{ $editData->salary }}">
                                            </div>
                                        

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            <div class="form-group">
                                                <h5>Joining Date <span class="text-danger">*</span></h5>
                                                    <input type="date" name="join_date" class="form-control" required=""  value="{{ $editData->join_date }}">
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            

                                        </div> <!-- End Col-Md Row -->
                                    @endif
                               
                                    </div> <!-- End 4th Row -->


                                    <div class="row"><!-- 5th Row -->
                                        <div class="col-md-4"> <!-- Start Col-Md Row -->

                                            


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
                                                    <img id="showImage" src="{{ (!empty($editData->image)) ? url('upload/employee_images/'.$editData->image) : url('upload/no_image.jpg') }}" style="width:150px; height:auto;">
                                                </div>
                                            </div>

                                        </div> <!-- End Col-Md Row -->
                                    </div> <!-- End 5th Row -->

                                        
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update Employee">
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