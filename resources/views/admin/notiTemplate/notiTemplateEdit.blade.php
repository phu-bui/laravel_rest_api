
@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Noti template edit</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Update noti template!</h1>
                        </div>
                        <form class="user" method="POST" action="{{ route('admin.updateNotiTemplate', array('id'=> $id))}}">
                            {{csrf_field()}}
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user @error('type') is-invalid @enderror"
                                        id="type" placeholder="{{$noti_template->type}}" name="type" value="{{ old('type') }}"
                                    >
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <textarea class="form-control form-control-user @error('template') is-invalid @enderror"
                                    name="template" id="template" value="{{ old('template') }}"
                                    >
                                    </textarea>
                                    @error('template')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <button class="btn btn-primary btn-user btn-block">
                                Update
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
