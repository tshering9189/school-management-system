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
                            <h4 class="box-title">Employee Monthly <strong>Salary</strong></h4>
                        </div>

                        <div class="box-body">
                            
                                <div class="row">

                                    <div class="col-6">	

                                        <div class="form-group">
                                            <h5>Attendance Date <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="date" id="date" class="form-control">
                                                @error('start_date')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- /.col-6 -->
                                    

                                    <div class="col-md-4 pt-25"> <!-- Start Col-Md Row -->

                                        <a id="search" class="btn btn-primary mb-5" name="search">Search</a>

                                    </div> <!-- End Col-Md Row -->

                                </div> <!-- END Row -->


                                <div class="row"> 
                                    <div class="col-md-12">

                                    <!-- If you want to visible table using https://handlebarsjs.com -->
                                        <div id="DocumentResults">

                                            <script id="document-template" type="text/x-handlebars-template">
                                                
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

                                            </script>

                                        </div>  
                                    <!-- End https://handlebarsjs.com -->  

                                    </div>
                                </div>

                           
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

<!-- ============ Get Registration Fee Method And View Page =================== -->

<script type="text/javascript">
  $(document).on('click','#search',function(){
    var date = $('#date').val();
     $.ajax({
      url: "{{ route('employee.monthly.salary.get')}}",
      type: "get",
      data: {'date':date,},
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