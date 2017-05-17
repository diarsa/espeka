@extends('layout.master2')

@section('title', 'Detail Recommendation')

@section('header')
  @parent

<div class="page-header">
  <h3><b>
    {{ $wisatawan->nama }}
  </b></h3>
  Created at {{ date('d F Y' , strtotime($wisatawan->created_at) )}}
</div>

<div class="col-md-6">
<blockquote class="default">
  <p>
    {{ $wisatawan->user }}
  </p>

  <table class="table">    
    @foreach($wisat as $wi)
      <tr>
          <td>Country</td>
          <td>:</td>
          <td>{{$wi->country}}</td>
      </tr>
      
      <tr>
          <td>Gender</td>
          <td>:</td>
          <td>{{$wi->gender}}</td>
      </tr>
      <tr>
          <td>Purpose</td>
          <td>:</td>
          <td>{{$wi->purpose}}</td>
      </tr>
      <tr>
          <td>Age</td>
          <td>:</td>
          <td>{{$wi->umur}} years old</td>
      </tr>
      <tr>
          <td>Frequency</td>
          <td>:</td>
          <td>{{$wi->frekuensi}}</td>
      </tr>
    @endforeach
  </table>
  
</blockquote>
</div>


<div class="col-md-6">
<blockquote class="default">
	<h4>Recommendations</h4>

	<div class="alert alert-info fade in">
	    <button data-dismiss="alert" class="close close-sm" type="button">
	      <i class="fa fa-times">
	      </i>
	    </button>
	    Click name for more information.
  	</div>

  	<?php $nilai = 0; ?>
    	@if(isset($temps[0]->nilai))
        	<?php $nilai = number_format(($temps[0]->nilai)* 100, 2); ?>
        	<b> Percentage = {{$nilai}}% </b>
        @else 
        	No data available 
        @endif

  	@foreach($robjeks as $rItem)
  	{{-- <hr> --}}
	@foreach($rItem as $robjek)
		<div>
			<b>
				<a href="#" method="get" data-toggle="modal" data-target="#lihat{{$robjek->slug}}" onclick="javascript: {{url('/objek/'.$robjek->slug)}}">{{ $robjek->nama_objek }}</a>
			</b>
		</div>

		{{-- MODAL NE --}}

	    <div class="modal fade" id="lihat{{$robjek->slug}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
	      <div class="modal-dialog" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title" id="exampleModalLabel">Detail Attraction</h4>
	          </div>
	          <div class="modal-body">

	            <img src="{{ asset ("assets/images/img1/$robjek->img1") }}" onerror="this.src='{{ asset ("assets/images/error/900x500.png") }}'" width="" height="140"/>

	            <h2> @include('laravelLikeComment::like', ['like_item_id' => $robjek->id]) </h2> 

	              <table class="">
	                <tbody>
	                  <tr>
	                    <td><b>Name</b></td>
	                    <td> : </td>
	                    <td> {{ $robjek->nama_objek }} </td>
	                  </tr>
	                  <tr>
	                    <td><b>Address</b></td>
	                    <td> : </td>
	                    <td> {{ $robjek->alamat }} </td>
	                  </tr>
	                  <tr>
	                    <td><b>Description</b></td>
	                    <td> : </td>
	                    <td>  </td>
	                  </tr>
	                </tbody>
	              </table>
	              
	              <div style="text-align:justify">
	                {!! substr($robjek->keterangan,0,400)."" !!} <a href="{{url('/objek', $robjek->slug)}}">read more.</a>
	              </div>
	          </div>
	          <div class="modal-footer">
	            <form class="" action="" method="post">
	              <button class="btn btn-default" data-dismiss="modal"> Close </button>
	            </form>
	          </div>
	        </div>
	      </div>
	    </div>

		{{-- MODAL NE --}}
	@endforeach
	<hr>
	@endforeach

</blockquote>
</div>



@endsection

@section('footer')
@endsection
