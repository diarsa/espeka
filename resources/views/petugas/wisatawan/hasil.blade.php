@extends('petugas.lay')

@section('title', 'Hasil ')

@section('conten')
@parent

<div class="">
    <ul class="breadcrumbs-alt">
        <li>
            <a href="{{URL('petugas')}}">Beranda</a>
        </li>
        <li>
            <a href="{{URL('petugas/wisatawan')}}">Wisatawan</a>
        </li>
        <li>
            <a href="" class="current">Tambah</a>
        </li>
    </ul>
</div>

<br>
@if(Session::has('message'))

<div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times">
        </i>
    </button>
    <strong>
        {{ Session::get('message') }}
    </strong>
</div>
@else

@endif

<div class=" col-lg-12">

    <div class="col-md-12">
        <div class="alert alert-success fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="fa fa-times">
                </i>
            </button>
            <strong>
                Success!
            </strong>
            Data berhasil ditambahkan.
        </div>

            {{-- <blockquote class="default">
          Please click <b>Like</b> or <b>Unlike</b> button if you Like or Unlike the result of recommendation.
        </blockquote> --}}

      </div>
   
       
      <div class="col-md-12" align="center">
        <h4>
     

            <?php $nilai = 0; ?>

            @if(isset($temps[0]->hasil))
            <?php $nilai = number_format(($temps[0]->nilai) * 100, 2); ?>
            Berdasarkan karakteristik yang dimasukkan, <b> {{ $nilai }}% </b> wisatawan dapat direkomendasikan ke objek wisata berikut ini.
            @else 
            Berdasarkan perhitungan sistem, tidak ada rekomendasi untuk karakteristik yang Anda masukkan, itu mungkin karena Anda hanya memasukkan satu karakteristik atau karakteristik tersebut belum ada dalam basis data. Tapi Anda dapat merekomendasikan wisatawan untuk berkunjung ke objek wisata berikut ini.
            @endif
        </h4>
        <hr>
    </div>

    <div class="col-lg-12">
        @foreach($robjeks as $rItem)
        @foreach($rItem as $robjek)
        <div class="col-md-4">
            <img src="{{ asset ("assets/images/img1/$robjek->img1") }}" width="100%" onerror="this.src='{{ asset ("assets/images/error/900x500.png") }}'"/>

            <div align="center">

                <div class="" align="center">
                    <h4>
                        <a href="{{url('/objek', $robjek->slug)}}">
                            <b> {{{ $robjek->nama_objek }}} </b>
                        </a>
                    </h4>
                </div>

                <div class="">
                    <button class="btn btn-info" name="button" title="Detail" method="get" data-toggle="modal" data-target="#lihat{{$robjek->slug}}" onclick="javascript: {{url('/objek/'.$robjek->slug)}}"> <i class="fa fa-info-circle fa-lg"></i> </button>

                    {{-- <button class="btn btn-info mfp-image" name="button" title="{{ $robjek->nama_objek }}" href="{{ asset ("assets/images/img1/$robjek->img1") }}") }}"> <i class="fa fa-picture-o fa-lg"></i> </button> --}}

                    {{-- <h2> @include('laravelLikeComment::like', ['like_item_id' => $robjek->id]) </h2>  --}}

                </div>
                <hr>
            </div>
        </div>
        @endforeach
        @endforeach

    </div>



</div>


@foreach($robjeks as $rItem)
@foreach($rItem as $robjek)

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
@endforeach



{{-- OBJEK LAIN --}}
<div class="col-lg-12">

    <h4>
        @if($nilai != 0)
        Atau Anda juga dapat merekomendasikan wisatawan untuk berkunjung ke objek wisata berikut ini.
        @else 

        @endif

    </h4>

    <hr>
    @foreach($obj_lain as $lain)
    <div class="col-md-4">
        <img src="{{ asset ("assets/images/img1/$lain->img1") }}" width="100%" onerror="this.src='{{ asset ("assets/images/error/900x500.png") }}'"/>

        <div align="center">

            <div class="" align="center">
                <h4>
                    <a href="{{url('/objek', $lain->slug)}}">
                        <b> {{{ $lain->nama_objek }}} </b>
                    </a>
                </h4>
            </div>

            <div class="">
                <button class="btn btn-info" name="button" title="Detail" method="get" data-toggle="modal" data-target="#lihat{{$lain->slug}}" onclick="javascript: {{url('/objek/'.$lain->slug)}}"> <i class="fa fa-info-circle fa-lg"></i> </button>

            </div>
            <hr>
        </div>
    </div>



    {{-- MODAL NE --}}

    <div class="modal fade" id="lihat{{$lain->slug}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Detail Attraction</h4>
                </div>
                <div class="modal-body">

                    <img src="{{ asset ("assets/images/img1/$lain->img1") }}" onerror="this.src='{{ asset ("assets/images/error/900x500.png") }}'" width="" height="140"/>


                    <table class="">
                        <tbody>
                            <tr>
                                <td><b>Name</b></td>
                                <td> : </td>
                                <td> {{ $lain->nama_objek }} </td>
                            </tr>
                            <tr>
                                <td><b>Address</b></td>
                                <td> : </td>
                                <td> {{ $lain->alamat }} </td>
                            </tr>
                            <tr>
                                <td><b>Description</b></td>
                                <td> : </td>
                                <td>  </td>
                            </tr>
                        </tbody>
                    </table>

                    <div style="text-align:justify">
                        {!! substr($lain->keterangan,0,400)."" !!} <a href="{{url('/objek', $lain->slug)}}">read more.</a>
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

</div>










@endsection
