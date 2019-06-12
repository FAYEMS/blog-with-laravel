@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
    
    <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h4>{{$user->name}}</h4> Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form method="post" action="{{ route('createpost') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       aria-describedby="title" placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label for="description">body</label>
                                <textarea class="form-control" id="body" rows="3" name="body" placeholder="body"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Create post</button>
                        </form>


                    <hr>
                    <h2>USERS</h2>

                    @foreach($users as $user)
                        
                    <h4>{{$user->name}}</h4>
                        
                    @endforeach

                    <hr>

                    <h2>MY POST</h2>

                    @foreach ($posts as $post)

                    {{-- <h4>{{$post->title}}-----
                        @if (!$post->category->name->isempty() )
                            
                        @endif

                    {{$post->category->name}}</h4> 
                         --}}
                    @endforeach
                    <hr>

                    <h2>ALL POSTS</h2>

                    @foreach ($allposts as $allpost)

                    <h4>{{$allpost->title}}-----{{$allpost->user->name}}</h4>
                        
                    @endforeach
                                <hr>
                    <h2>ALL CATEGORY</h2>

                    @foreach ($categories as $category)

                    <h4>{{$category->name}}</h4>
                        
                    @endforeach
                    <hr>

                    <h2>SPORT CATEGORY</h2>

                    @foreach ($sportcategories as $sportcategory)

                    <h4>{{$sportcategory->title}}</h4>
                        
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
