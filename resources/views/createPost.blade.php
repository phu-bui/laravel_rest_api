@extends('layouts.app')
@section('content')
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h1>{{__('CREATEPOSTTITLE')}}</h1>
                <div class="my-5">
                    <form method="POST" action="{{ route('post.storePost') }}">
                    {{csrf_field()}}
                        <div class="form-floating">
                            <input class="form-control" name="title" id="title" type="text" placeholder="Enter your title..." data-sb-validations="required" />
                            <label for="title">Title</label>
                            <div class="invalid-feedback" data-sb-feedback="title:required">A title is required.</div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" name="body" id="body" type="text" placeholder="Enter your body..." data-sb-validations="required" />
                            <label for="body">Body</label>
                            <div class="invalid-feedback" data-sb-feedback="body:required">An body is required.</div>
                        </div>
                        <br />
                        <button class="btn btn-primary btn-user btn-block" type="submit">{{__('SEND')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
