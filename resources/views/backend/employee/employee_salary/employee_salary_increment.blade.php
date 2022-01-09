@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full"> 
    <!-- Main content -->
        <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Employee Salary Increment</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        
                        <form novalidate="" method="post" action="{{ route('update.increment.store', $allData->id) }}">
                        @csrf
                            <div class="row">
                                <div class="col-6">	

                                    <div class="form-group">
                                        <h5>Salary Amount <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="increment_salary" class="form-control form-control-lg" >
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- /.col-6 -->

                                <div class="col-6">	

                                    <div class="form-group">
                                        <h5>Effected Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="effected_salary" class="form-control" >
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- /.col-6 -->

                            </div> <!-- /.row -->
                                    
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Add Increment">
                            </div> 

                        </form> <!-- /.form -->

                    </div> <!-- /.col -->
                </div> <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
</div>
@endsection