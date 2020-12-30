@extends('post')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-lg-5 mt-5">
              <div class="card">
                  <div class="card-body">
                      <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">title</label>
                            <input type="text" name="title" class="form-control">
                            <small class="text-danger">{{$errors->first('title')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="">author</label>
                            <input type="text" name="author" class="form-control">
                            <small class="text-danger">{{$errors->first('author')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="">image</label>
                            <input type="file" name="image" class="form-control">
                            <small class="text-danger">{{$errors->first('image')}}</small>
                        </div>
                    
                        <div class="form-group">
                            <label for="">body</label>
                            <input type="text" name="body" class="form-control">
                            <small class="text-danger">{{$errors->first('body')}}</small>
                        </div>
                        <div class="form-group">
                        <input type="submit" name="send" class="btn btn-danger w-100">
                            </div>

                      </form>
                  </div>
              </div>
             
          </div>
      </div>
          </div>  
@endsection