@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>

<div class="content-wrapper">
    <div class="container-full"> 

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Add <strong>Student Fee </strong></h4>
                        </div>

                        <div class="box-body">
                            <div class="row">

                                <div class="col-md-3"> <!-- Start Col-Md Row -->

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
                                <div class="col-md-3"> <!-- Start Col-Md Row -->

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
                                

                                <div class="col-md-3"> <!-- Start Col-Md Row -->

                                    <div class="form-group">
                                        <h5>Fee Category<span class="text-danger">*</span></h5>
                                            <select name="fee_category_id" id="fee_category_id" required class="custom-select custom-select-md">
                                                <option value="" selected="" disabled="">Select Fee Category</option>
                                                @foreach($fee_categories as $fee)
                                                <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>

                                </div> <!-- End Col-Md Row -->

                                <div class="col-md-3"> <!-- Start Col-Md Row -->

                                    <div class="form-group">
                                        <h5>Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date" id="date" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                </div> <!-- End Col-Md Row -->

                                <div class="col-md-2 pt-25"> <!-- Start Col-Md Row -->

                                    <a id="search" class="btn btn-warning mb-5" name="search">Search</a>

                                </div> <!-- End Col-Md Row -->

                            </div> <!-- END Row -->

                            <!--    START Mark Entry TABLE  -->

                            <div class="row"> <!-- d-none means not visible in the first load -->
                                <div class="col-md-12">
                                
                                    <!-- If you want to visible table using https://handlebarsjs.com -->
                                    <div id="DocumentResults">

                                        <script id="document-template" type="text/x-handlebars-template">

                                            <form action="{{ route('account.fee.store') }}" method="POST">
                                            @csrf
                                                
                                                <table class="table table-bordered table-striped" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                        @{{{thsource}}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @{{#each this}}
                                                        <tr>
                                                            @{{{tdsource}}}
                                                        </tr>
                                                        @{{/each}}
                                                    </tbody>
                                                </table>

                                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>

                                                
                                            </form>

                                        </script>


                                    </div>  
                                    <!-- End https://handlebarsjs.com -->  

                                </div>
                            </div> <!--  End Row -->
                                
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


<!-- ============ Get Registration Fee Method And View Page =================== -->

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var year_id = $('#year_id').val();
    var class_id = $('#class_id').val();
    var fee_category_id = $('#fee_category_id').val();
    var date = $('#date').val();
     $.ajax({
      url: "{{ route('account.fee.getstudent')}}",
      type: "get",
      data: {'year_id':year_id,'class_id':class_id,'fee_category_id':fee_category_id,'date':date},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>


<!-- ------------------------------------------------------------------------------------------- -->



@endsection