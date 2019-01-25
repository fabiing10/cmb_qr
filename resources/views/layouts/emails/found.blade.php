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
							<center><img src="{{URL::asset('assets/logo-identipet.png')}}" style="margin: 0 auto;display: block;" width="300"/></center>
							<center><h2>Hey.... Buenas Noticias!</h2></center>
							<p class="lead">
                Hola {{$name}}. Te queremos informar que alguien ha encontrado a {{$petName}} y ha querido compartirlo contigo por eso ha dejado el siguiente mensaje:
              </p>
              <h1><center>Mensaje</center></h1>
							<p>{{$description}}</p>
									<img width="600" src="http://maps.googleapis.com/maps/api/staticmap?autoscale=false&size=600x300&maptype=roadmap&format=png&visual_refresh=true&markers=size:mid%7Ccolor:0x5b8ffc%7Clabel:1%7C{{$latitud}},{{$longitud}}" alt="">
            </td>
					</tr>
				</table>
			</div><!-- /content -->

			<!-- content -->
			<div class="content">
				<table bgcolor="" width="500">
					<tr>
						<td>

							<!-- social & contact -->
							<table bgcolor="" class="social" width="100%" width="500">
								<tr>
									<td>

										<!--- column 1 -->

										<div class="column">
											<table bgcolor="" cellpadding="" align="left">
										<tr>
											<td> Copyright Identipet 2018 | Todos Los derechos Reservados

										<div class="clear"></div>

									</td>
								</tr>
							</table><!-- /social & contact -->

						</td>
					</tr>
				</table>
			</div><!-- /content -->


		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<table class="footer-wrap">
	<tr>
		<td></td>
		<td class="container">

				<!-- content -->
				<div class="content">
					<table>
						<tr>
							<td align="center">
								<p>
									<a href="#">Terms</a> |
									<a href="#">Privacy</a> |
									<a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>
								</p>
							</td>
						</tr>
					</table>
				</div><!-- /content -->

		</td>
		<td></td>
	</tr>
</table><!-- /FOOTER -->
</center>
</body>
</html>
