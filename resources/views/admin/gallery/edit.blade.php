@extends('layouts.app')

@section('content')


<style type="text/css">
  
fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.scheduler-border {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
    width:inherit; /* Or auto */
    padding:0 10px; /* To give a bit of padding on the left and right */
    border-bottom:none;
    margin-bottom: 10px;

}
</style>
  <div class="container">

    @include('admin.includes.errors')
    
    <div class="panel panel-default">
      <div class="panel-heading">
        Manage Gallery with {{ $post->title }}
      </div>


    <div class="panel-body">

    <form action='{{ route('gallery.store', ['postid' => $post->id]) }}' method="post" enctype="multipart/form-data">

          {{ csrf_field() }}

              <div class="form-group">
            <label for='name'> Image1 </label>
            @if(isset($gallery[0]))
                <img src="{{ $gallery[0]->imageurl }}" height="100">
                <a href="{{ route('gallery.delete',['id' => $gallery[0]->id]) }}" class="btn btn-xs btn-danger">
                Deleted
                </a>
            @endif
            <input type='file' name="images[]" class="form-control" />

          </div>

          <div class="form-group">
            <label for='name'> Image2 </label>
           @if(isset($gallery[1]))

                <img src="{{ $gallery[1]->imageurl }}" height="100">
                 
                <a href="{{ route('gallery.delete',['id' => $gallery[1]->id]) }}" class="btn btn-xs btn-danger">
                Deleted
                </a>
            @endif
            <input type='file' name="images[]" class="form-control" />

          </div>

          <div class="form-group">
            <label for='name'> Image3 </label>
            @if(isset($gallery[2]))

                <img src="{{ $gallery[2]->imageurl }}" height="100">
                 
                <a href="{{ route('gallery.delete',['id' => $gallery[2]->id]) }}" class="btn btn-xs btn-danger">
                Deleted
                </a>
            @endif
            <input type='file' name="images[]" class="form-control" />

          </div>

          <div class="form-group">
            <label for='name'> Image4 </label>
            @if(isset($gallery[3]))

                <img src="{{ $gallery[3]->imageurl }}" height="100">
                 <a href="{{ route('gallery.delete',['id' => $gallery[3]->id]) }}" class="btn btn-xs btn-danger">
                Deleted
                </a>
            @endif
            <input type='file' name="images[]" class="form-control" />

          </div>

          <div class="form-group">
            <label for='name'> Image5 </label>
            @if(isset($gallery[4]))

                <img src="{{ $gallery[4]->imageurl }}" height="100">
                 <a href="{{ route('gallery.delete',['id' => $gallery[4]->id]) }}" class="btn btn-xs btn-danger">
                Deleted
                </a>
            @endif
            <input type='file' name="images[]" class="form-control" />

          </div>

          <div class="form-group">
          <label for='name'> Image6 </label>
            @if(isset($gallery[5]))

                <img src="{{ $gallery[5]->imageurl }}" height="100">
                 <a href="{{ route('gallery.delete',['id' => $gallery[5]->id]) }}" class="btn btn-xs btn-danger">
                Deleted
                </a>
            @endif
            <input type='file' name="images[]" class="form-control" />

          </div>

          <div class="form-group">
          <label for='name'> Image7 </label>
            @if(isset($gallery[6]))

                <img src="{{ $gallery[6]->imageurl }}" height="100">
                 <a href="{{ route('gallery.delete',['id' => $gallery[6]->id]) }}" class="btn btn-xs btn-danger">
                Deleted
                </a>
            @endif
            <input type='file' name="images[]" class="form-control" />

          </div>

          <div class="form-group">
          <label for='name'> Image8 </label>
            @if(isset($gallery[7]))

                <img src="{{ $gallery[7]->imageurl }}" height="100">
                 <a href="{{ route('gallery.delete',['id' => $gallery[7]->id]) }}" class="btn btn-xs btn-danger">
                Deleted
                </a>
            @endif
            <input type='file' name="images[]" class="form-control" />

          </div>

          <div class="form-group">
          <label for='name'> Image9 </label>
            @if(isset($gallery[8]))

                <img src="{{ $gallery[8]->imageurl }}" height="100">
                 <a href="{{ route('gallery.delete',['id' => $gallery[8]->id]) }}" class="btn btn-xs btn-danger">
                Deleted
                </a>
            @endif
            <input type='file' name="images[]" class="form-control" />

          </div>

          <div class="form-group">
          <label for='name'> Image10 </label>
            @if(isset($gallery[9]))

                <img src="{{ $gallery[9]->imageurl }}" height="100">
                 <a href="{{ route('gallery.delete',['id' => $gallery[9]->id]) }}" class="btn btn-xs btn-danger">
                Deleted
                </a>
            @endif
            <input type='file' name="images[]" class="form-control" />

          </div>

          <div class="form-group">

            <div class="text-center">
              <button class="btn btn-success" type="submit">
                Store Gallery
              </button>
            </div>
          </div>
        </form>
    </div>
   </div>
@stop

