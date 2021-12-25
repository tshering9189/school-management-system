@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full"> 
    <!-- Main content -->
        <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Change Password</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        
                        <form novalidate="" method="post" action="{{ route('password.update') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">	

                                    <div class="form-group">
                                        <h5>Current Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="current_password" type="password" name="oldpassword" class="form-control" >
                                            @error('oldpassword')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <h5>New Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="password" type="password" name="password" class="form-control" >
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Re-Type Password<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="password_confirmation"  type="password" name="password_confirmation" class="form-control" >
                                            @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
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