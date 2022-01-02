@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full"> 

        <!-- Main content -->
        <section class="content">
        <div class="row">

            <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">School Subject List</h3>
                <a href="{{ route('school.subject.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add School Subject</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">SL</th>
                                <th>Exam Name</th>
                                <th style="width:25%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($allData as $key => $school_subject)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <!-- fee_cateogry is a model && name is the column name -->
                                <td>{{ $school_subject->name }}</td>
                                <td>
                                    <a href="{{ route('school.subject.edit',$school_subject->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('school.subject.delete',$school_subject->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
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