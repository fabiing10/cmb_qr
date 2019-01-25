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
							<center><h2>Se ha reprogramado una cita para {{$pet}}!</h2></center>
							<p class="lead" style="text-align:justify;">
                Hola {{$client}}. Hemos reprogramado una cita medica, te recomendamos estar 10 minutos antes de lo previsto para que puedas presentarte sin ningun inconveniente, ahhh y no olvides llevar a {{$pet}}.
              </p>
							<br>
							<br>
							<p>La fecha fue reprogramada para la siguiente fecha:<b>{{$fecha}}</b> </p><!-- /hero -->
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
