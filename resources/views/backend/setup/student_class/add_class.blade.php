@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full"> 
    <!-- Main content -->
        <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add Class</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        
                        <form novalidate="" method="post" action="{{ route('store.student.class') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">	

                                <div class="form-group">
                                    <h5>Add Class Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control" >
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Add Class">
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