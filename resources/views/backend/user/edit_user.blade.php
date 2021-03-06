@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full"> 
    <!-- Main content -->
        <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Update User</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        
                        <form novalidate="" method="post" action="{{ route('users.update', $editData->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">	

                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <h5>Select User Roll <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="role" id="select" class="custom-select custom-select-lg mb-3">
                                                <option value="" selected="" disabled="">Select Role</option>
                                                <option value="Admin" {{ ($editData->role == 'Admin' ? 'selected' : '') }}>Admin</option>
                                                <option value="Operator" {{ ($editData->role == 'Operator' ? 'selected' : '') }}>Operator</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>User Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" value="{{ $editData->name }}"> </div>
                                    </div>

                                </div>
                            </div> <!-- End Row -->

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>User Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="email" class="form-control"  value="{{ $editData->email }}" > </div>
                                    </div>
                                    
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>User Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="password" class="form-control" required > </div>
                                    </div>

                                </div>
                            </div> <!-- End Row -->

                                
                                
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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