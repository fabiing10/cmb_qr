<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" type="text/css" href="{{URL::asset('front/css/email.css')}}" >

</head>

<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<center>
<!-- BODY -->
<table class="body-wrap" bgcolor="">
	<tr>
		<td></td>
		<td class="container" align="" bgcolor="#FFFFFF">
			<!-- content -->
			<div class="content">
				<table width="500">
					<tr>
						<td>
              <center>
                <img src="{{URL::asset('assets/logo-identipet.png')}}" style="margin: 0 auto;display: block;" width="300"/>
                <h2>Se ha encontrado una mascota!</h2>
              </center>
              <br>
							<center>

                @if($validate == true)
                <img src="{{URL::asset('uploads/images/')}}/{{$image}}" alt="...">
                @else
                <img src="{{URL::asset('admin/assets/images/pet-icon.png')}}" alt="...">
                @endif

                <br>
                <h3><center>{{$name}}</center></h3>

              </center>

							<p class="lead">
              Esta mascota ha sido encontrada y queremos agradecer a cada uno quien nos ayudo a encontrarla! ahora esta en hogar seguro con su familia
              </p>

          </td>
					</tr>
				</table>
			</div><!-- /content -->

      <!-- content -->
      <div class="content">
        <center>
          <table bgcolor="#dadada" width="500">
            <tr>
              <td>
                <!-- social & contact -->
                <table bgcolor="" class="social" width="100%">
                  <tr>
                    <td>
                          <center>Copyright Identipet 2018 | Todos Los derechos Reservados</center>
                          <div class="clear"></div>
                    </td>
                  </tr>
                </table><!-- /social & contact -->

              </td>
            </tr>
          </table>
        </center>
      </div><!-- /content -->



		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->


</center>
</body>
</html>
