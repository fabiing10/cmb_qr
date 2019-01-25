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
				<center>
				<table width="500">
					<tr>
						<td>
							<center><img src="{{URL::asset('assets/logo-identipet.png')}}" style="margin: 0 auto;display: block;" width="300"/></center>
							<center><h2>Cambio de Clave</h2></center>
							<p class="lead" style="text-align:justify;">
                A continuacion encontraras un link para que asignar nuevamente una clave. Recuerda que tenias 24 horas para que realizar este procedimiento de lo contrario tendras que solicitar un cambio de clave nuevamente.
              </p>
							<br>
							<p class="lead"style="text-align:justify;">
              <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
              </p>


  				</td>
					</tr>
				</table>
			</center>
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
													<center>Copyright Identipet 2016 | Todos Los derechos Reservados</center>
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
