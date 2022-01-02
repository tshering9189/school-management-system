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
                            <h4 class="box-title">Student Roll <strong>Generator</strong></h4>
                        </div>

                        <div class="box-body">
                            <form action="{{ route('roll.generate.store') }}" method="post">
                                @csrf
                                <div class="row">

                                    <div class="col-md-4"> <!-- Start Col-Md Row -->

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
                                    <div class="col-md-4"> <!-- Start Col-Md Row -->

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

                                    <div class="col-md-4 pt-25"> <!-- Start Col-Md Row -->

                                        <a id="search" class="btn btn-rounded btn-primary mb-5" name="search">Search</a>

                                    </div> <!-- End Col-Md Row -->

                                </div> <!-- END Row -->

                                <!--    START ROLL GENERATE TABLE  -->

                                <div class="row d-none" id="roll-generate"> <!-- d-none means not visible in the first load -->
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID No</th>
                                                    <th>Student Name</th>
                                                    <th>Father Name</th>
                                                    <th>Gender</th>
                                                    <th>Roll</th>
                                                </tr>
                                            </thead>
                                            <tbody id="roll-generate-tr">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!--    END ROLL GENERATE TABLE  -->

                                <input type="submit" value="Roll Generator" class="btn btn-info">
                                
                            </form>
                        </div>
                    </div>

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

<!-- // Start Roll Generated // -->

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
     $.ajax({
      url: "{{ route('student.registration.getstudents')}}",
      type: "GET",
      data: {'year_id':year_id,'class_id':class_id},
      success: function (data) {
        $('#roll-generate').removeClass('d-none');
        var html = '';
        $.each( data, function(key, v){
          html +=
          '<tr>'+
          '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
          '<td>'+v.student.name+'</td>'+
          '<td>'+v.student.fname+'</td>'+
          '<td>'+v.student.gender+'</td>'+
          '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"></td>'+
          '</tr>';
        });
        html = $('#roll-generate-tr').html(html);
      }
    });
  });

</script>

<!-- ============ End Script Roll Generate ================= -->

@endsection