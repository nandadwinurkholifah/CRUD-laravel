@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($posts as $post)
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $post->title }}
                    <div class="pull-right">
                        <a href="{{ route('post.edit', $post)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('post.destroy', $post)}} " class="" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger">Delete</button>          
                        </form>
                    </div> 
                </div>
                
                    <div class="panel-body">
                       <p>{{ str_limit($post->content, 100, '...') }} </p>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection