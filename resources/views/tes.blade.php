@extends('layout.master2')

@section('title', 'DSS')

@section('header')
  @parent

<div class="col-lg-8">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

    @foreach($tjs as $tj)
      <div class="panel panel-default">
          <div class="panel-heading button_outer_rounded" role="tab" id="heading{{$heading++}}">
              <h4 class="panel-title">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$collapse++}}" aria-expanded="false" aria-controls="collapseTwo">
                      {{ $tj->tanya }}
                  </a>
              </h4>
          </div>
          <div id="collapse{{$collapses++}}" class="panel-collapse collapse" role="tabpane{{$tabpane++}}" aria-labelledby="heading{{$headings++}}">
              <div class="panel-body">
                  {{ $tj->jawab }}
              </div>
          </div>
      </div>
    @endforeach

  </div>
</div>

<b>Disbudpar Bangli atau Dinas Kebudayaan dan Pariwisata adalah salah satu Dinas yang berada di Kabupaten Bangli, <i>Provinsi Bali.</i></b>












<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Advanced Form validations
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="cmxform form-horizontal " id="signupForm" method="get" action="">
                        <div class="form-group ">
                            <label for="firstname" class="control-label col-lg-3">Firstname</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="firstname" name="firstname" type="text" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="lastname" class="control-label col-lg-3">Lastname</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="lastname" name="lastname" type="text" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="username" class="control-label col-lg-3">Username</label>
                            <div class="col-lg-6">
                                <input class="form-control " id="username" name="username" type="text" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="password" class="control-label col-lg-3">Password</label>
                            <div class="col-lg-6">
                                <input class="form-control " id="password" name="password" type="password" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="confirm_password" class="control-label col-lg-3">Confirm Password</label>
                            <div class="col-lg-6">
                                <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="email" class="control-label col-lg-3">Email</label>
                            <div class="col-lg-6">
                                <input class="form-control " id="email" name="email" type="email" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="agree" class="control-label col-lg-3 col-sm-3">Agree to Our Policy</label>
                            <div class="col-lg-6 col-sm-9">
                                <input  type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="agree" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="newsletter" class="control-label col-lg-3 col-sm-3">Receive the Newsletter</label>
                            <div class="col-lg-6 col-sm-9">
                                <input  type="checkbox" style="width: 20px" class="checkbox form-control" id="newsletter" name="newsletter" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <button class="btn btn-default" type="button">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>


@endsection

@section('footer')
@endsection
