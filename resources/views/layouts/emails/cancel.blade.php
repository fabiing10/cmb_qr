<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="{{URL::asset('front/css/email.css')}}" >

</head>

<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">

<!-- BODY -->
<table class="body-wrap" bgcolor="">
	<tr>
		<td></td>
		<td class="container" align="" bgcolor="#FFFFFF">

			<!-- content -->
			<div class="content">
				<center>
				<table width="500">
					<tr>
						<td>
							<center><img src="{{URL::asset('assets/logo-identipet.png')}}" style="margin: 0 auto;display: block;" width="300"/></center>
							<center><h2>Se ha cancelado una cita para {{$pet}}!</h2></center>
							<p class="lead" style="text-align:justify;">
                Hola {{$client}}. Hemos cancelado la cita medica de la mascota <b>{{$pet}}</b> de la fecha <b>{{$fecha}}</b> .
              </p>
            </td>
					</tr>
				</table>
			</center>
			</div><!-- /content -->

			<!-- content -->
			<div class="content">
				<center>
				<table bgcolor="#dadada">
					<tr>
						<td>
							<!-- social & contact -->
							<table bgcolor="" class="social" width="100%">
								<tr>
									<td>

										<div class="column">
											<table bgcolor="" cellpadding="" align="center">
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

</body>
</html>
