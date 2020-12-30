@extends('post')
@section('content')
<div class="container">
    <div class="row">
        @foreach($data as $a)  
        <div class="col-lg-3 mt-3">
            <div class="card">
                <img src="{{asset('images/' .$a->image)}}" alt="" width="20%" height="70px">
                     <div class="card-body mt-2">
                         <h4 class="title">{{$a->title}}</h4>
                        <h6 class="author">{{$a->author}}</h6>
                        <h6 class="body">{{$a->body}}</h6>
                        <form action="{{route('post.destroy',['post'=>$a->id])}}" method="POST">
                            @csrf
                            @method("delete")
                            <input type="submit" value="delete" class="btn btn-danger">
                            <a href="{{route('post.edit',['post'=>$a->id])}}" class="btn btn-warning">edit</a>
                            <a href="{{route('post.show',['post'=>$a->id])}}" class="btn btn-primary">view</a>
             </div>
            </div>
    </div>
    @endforeach
</div>
@endsection