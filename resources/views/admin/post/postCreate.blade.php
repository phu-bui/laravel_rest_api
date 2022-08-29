
@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create new post</h6>
    </div>
    <div class="card-body">
    <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Post!</h1>
                    </div>
                    <form class="user" method="POST" action="{{ route('admin.storePost') }}">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user @error('title') is-invalid @enderror"
                                    id="title" placeholder="Title" name="title">
                            </div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user @error('body') is-invalid @enderror"
                                    id="body" placeholder="Body" name="body">
                            </div>
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-user btn-block">
                            Save
                        </button>
                        <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection