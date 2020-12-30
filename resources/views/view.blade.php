@extends('post')
@section('content')
 <div class="container">
     <div class="row">
         <div class="col-lg-4 mt-2">
             <div class="card">
                 <div class="card-body bg-info">
             <img src="{{asset('images/' . $data->image)}}" alt="" width="20%" height="100px">       
             <h4  class="title">{{$data->title}}</h4>
             <h6 class="author">{{$data->author}}</h6>
             <h6 class="body">{{$data->body}}</h6>
                      </div>
             </div>
         </div>
     </div>
 </div>
    
@endsection