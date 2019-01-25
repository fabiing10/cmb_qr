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
							<center><h2>Hey.... Buenas Noticias!</h2></center>
							<p class="lead" style="text-align:justify;">
                Hola {{$name}}. Ya eres parte de la familia IdentiPET. Sabemos lo importante que es tu mascota, pensando en ti hemos creado la solución perfecta, para que siempre estén juntos.
              </p>
							<br>
							<p class="lead"style="text-align:justify;">
              Ahora puedes ingresar y tener todo al alcance de un click, el control de tus mascotas y demas informacion estaran disponibles una vez ingreses a tu cuenta con las siguientes credenciales:
              </p>

							<br>
							<p>Tus Datos de Ingreso a la plataforma:</p><!-- /hero -->
							<p><b>Usuario:</b> {{$username}}</p>
							<p><b>Password:</b> {{$password}}</p>
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
