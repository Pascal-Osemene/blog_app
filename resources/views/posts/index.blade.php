@extends('layouts.app')


@section('content')
    <header
        class="masthead"
        style="background-image: url( {{asset('assets/img/home-bg.jpg') }})"
    >
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container">

        <div class="col-md-10 mx-auto my-5">

            <div class="card shadow">
                <div class="card-body">

                    <div class="text-end">
                        <a href="{{route('posts.create')}}" class="btn btn-primary btn-sm py-3">
                            <i class="fa fa-plus"></i>
                            Create Post
                        </a>
                    </div>

                    <table class="table table-stripe">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Body</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>{{$post->image}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->slug}}</td>
                                    <td>{{$post->body}}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td>
                                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-outline-info btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('posts.destroy', $post->id)}}" class="d-inline" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted"> No posts found </td>
                            </tr>
                            @endforelse
                        </tbody>


                    </table>

                </div>
            </div>

        </div>

    </div>
@endsection
