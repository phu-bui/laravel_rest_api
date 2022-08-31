
@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Noti Template list</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Template</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Update/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($noti_templates as $noti_template)
                    <tr>
                        <td>{{ $noti_template->type }}</td>
                        <td>{{ $noti_template->template }}</td>
                        <td>{{ $noti_template->created_at }}</td>
                        <td>{{ $noti_template->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.editNotiTemplate', array('id'=>$noti_template->id)) }}" class="btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>
                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
