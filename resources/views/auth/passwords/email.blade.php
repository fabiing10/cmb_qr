@extends('admin.layouts.login')

@section('content')
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
data-animsition-out="fade-out">>
   <div class="page-content vertical-align-middle" style="width: 370px;">
     <div class="brand">
       @if(session('status'))
           <div class="info-label success">
             <h3>Genial! </h3>
             {{session('status')}}
           </div>

      @endif


      <a href="../"><img class="brand-img" src="../front/images/logo.svg" alt="..."></a>

</div>
<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-12 control-label"><center>E-Mail</center></label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-envelope"></i> Solicitar Clave
                        </button>
                    </div>
                </div>
            </form>
                </div>
            </div>
@endsection
