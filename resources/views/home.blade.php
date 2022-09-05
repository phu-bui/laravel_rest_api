@extends('layouts.app')
@section('content')
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @foreach($posts as $post)
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{ route('post.getById', array('id' => $post->id)) }}">
                    <h2 class="post-title">{{ $post->title }}</h2>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">{{__('startbootstrap')}}</a>   
                    on September 24, 2022
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            @endforeach
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="{{ route('post.createPost') }}">{{__('CREATEPOST')}} →</a></div>
        </div>
    </div>
</div>
@endsection
