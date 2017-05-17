@extends('layout.master2')

@section('title', 'Edit Blog')

@section('header')
  @parent

<br>
<form class="" action="../../blog/{{$blog->id}}" method="post">
<label> Title </label>
  <input class="form-control" type="text" name="title" value="{{$blog->title}}" placeholder="Judul ..."><br><br>
  {{ ($errors->has('title')) ? $errors->first('title') : '' }}

  <label> Subject </label>
  <textarea class="form-control" name="subject" rows="5" placeholder="Isi ...">{{$blog->subject}}</textarea><br>
  {{ ($errors->has('subject')) ? $errors->first('subject') : '' }}
  <br>

  <input type="hidden" name="_method" value="put">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="submit" class="btn btn-primary" value="Edit">
</form>


@endsection

@section('footer')
@endsection
