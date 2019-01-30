@extends('admin.layouts.login')

@section('content')
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
data-animsition-out="fade-out">>
   <div class="page-content vertical-align-middle">
     <div class="brand">
<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
</div>
    <div class="row report-container">

          <div class="col-md-12">
              <div class="form-group" style="width: 70%;">

                <h2 style="color:white;">Registro Exitoso!</h2>
              </div>
              <div class="form-group" style="width: 70%;">
                  <p>Se realizo el registro de la actividad.</p>
              </div>
              <div class="form-group" style="width: 70%;">
                <br>
                  <a href="https://qr.cmb.org.co/administrator/" class="btn btn-primary" style="width:150px;">
                     Scan QR
                  </a>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')


@endsection
