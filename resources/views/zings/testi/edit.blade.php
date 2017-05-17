@extends('layout.master')

@section('title', 'Edit Blog')

@section('header')
  @parent

<br>
<form class="" action="../../blog/{{$blog->id}}" method="post">
<label> Title </label>
  <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
  <input class="form-control" type="text" name="title" value="{{$blog->title}}" placeholder="Judul ..."><br><br>
  @if ($errors->has('title'))
      <p class="help-block">
          <strong>{{ $errors->first('title') }}</strong>
      </p>
  @endif
  </div>

  <label> Subject </label>
  <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <textarea class="form-control" name="subject" rows="5" placeholder="Isi ...">{{$blog->subject}}</textarea><br>
    @if ($errors->has('subject'))
        <p class="help-block">
            <strong>{{ $errors->first('subject') }}</strong>
        </p>
    @endif
  </div>
  <br>

  <input type="hidden" name="_method" value="put">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="submit" class="btn btn-primary" value="Edit">
</form>


@endsection

@section('footer')
@endsection
