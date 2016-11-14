<!DOCTYPE HTML>
<html>
<head>
</head>
	<title>Proyecto de programación</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0"/>
	<link rel="stylesheet" href="ModGeneral/css/estyle.css"/>
	<link rel="stylesheet" href="ModGeneral/css/style2menu.css"/>
	<link rel="stylesheet" href="ModGeneral/css/fontello.css"/>
	<link rel="stylesheet" href="ModGeneral/css/slider.css"/>
    <script type="text/javascript" src="ModGeneral/js/jquery_p.js"></script>
    <script type="text/javascript" src="js/funciones_cruUsu.js"></script>

</head>
<body class="body" background="ModGeneral/html/fondo2.jpg">



	<div id="contenedor"> <!--inicio del contenedor general-->

	<header>
		<input type="checkbox" id="btn-menu">
		<label for="btn-menu" class="icon-menu"></label>
			<nav class="menu">
				<ul>
					<li><a href="#"><b>Inicio</b></a></li>
					<li><a href="ModGeneral/html/nosotros.php"><b>Nosotros</b></a></li>
					<li><a  href="ModGeneral/html/historia_RCC.php"><b>Historia de RCC</b></a></li>
					<li><a href="#"><b>Ministerios</b></a></li>
					<li><a href="#"><b>Grupos Adoración</b></a></li>
					<li class="submenu"><a href="#"><b>Horarios</b><span class="icon-down-open">
					</span></a>
						<ul>
							<li><a href="#"><b>Horarios de misas</b></a></li>
							<li><a href="#"><b>Horarios reunión de jóvenes</b></a></li>
							<li><a href="#"><b>Horarios catequesis</b></a></li>
							<li><a href="#"><b>Horarios reunión de parejas</b></a></li>
						</ul>
					</li>
					<li><a href="ModGeneral/html/galeria_img.php"><b>Galería de imagenes</b></a></li>
					<li><a href="#"><b>Calendarización</b></a></li>
				</ul>

			</nav>
		</header><!-- comentario -->


		<!--<div id="imagen">
			<img id="vaticano" src="../imagen/catedral2.jpg"/>
		</div>-->




		<div id="subcontenedor"> <!--inicio del subcontenedor -->
		<div class="slider">
				<ul>
					<li><img src="ModGeneral/imagen/catedral2.jpg"></li>
					<li><img src="ModGeneral/imagen/9.jpg"></li>
					<li><img src="ModGeneral/imagen/8.jpg"></li>
					<li><img src="ModGeneral/imagen/7.jpg"></li>
					<li><img src="ModGeneral/imagen/4.jpg"></li>
					<li><img src="ModGeneral/imagen/5.jpg"></li>
					<li><img src="ModGeneral/imagen/6.jpg"></li>
					<li><img src="ModGeneral/imagen/1.jpg"></li>
					<li><img src="ModGeneral/imagen/2.jpg"></li>
					<li><img src="ModGeneral/imagen/3.jpg"></li>

				</ul>
			</div>

		<div id="izquierdo"> <!--inicio del div izquierdo-->
		<form>
					<h3 class="p">Iniciar Sesión</h3>
					<label class="b"><b>Usuario:</b></label><br/>
						 <input type="text" name="txtUsuario" id="txtUsuario" class="input"/><br/>
					<label class="b"><b>Contraseña:</b></label><br/>
						 <input type="password" name="txtClave" id="txtClave" class="input"/><br/>
					<p>

						<input type="button" value="Iniciar sesi&oacute;n" onClick="buscarDatos()"/>
							<h3 class="p">Enlaces</h3>
							<p><a target="_blank" href="http://psicologoscatolicos.org/Documents/biblia-ab.htm">La Biblia</a></p>
							<p><a target="_blank" href="http://www.vatican.va/archive/catechism_sp/index_sp.html">Catecismo</a></p>
							<p><a target="_blank" href="http://www.vatican.va/roman_curia/pontifical_councils/justpeace/documents/rc_pc_justpeace_doc_20060526_compendio-dott-soc_sp.html">Doctrina Social<br/>de la iglesia</a></p>
							<p><a target="_blank" href="http://www.vatican.va/holy_father/index_sp.htm">Magisterio</a></p>
							<a target="_blank" href="http://www.news.va/es/sites/homilias"><img id="homilia" src="ModGeneral/imagen/homilia.png"/></a>
							<p>
							<a target="_blank" href="http://www.news.va/es/sites/el-papa-francisco-en-corea"><img id="corea" src="ModGeneral/imagen/corea.png"/></a>
							<p>
							<a target="_blank" href="https://twitter.com/pontifex_es"><img id="tweeter" src="ModGeneral/imagen/tweeter.png"/></a>
					</form>
		</div> <!--fin del  div izquierdo-->

		<div id="centro"> <!--inicio del div centro-->
		<h3 class="p">Moseñor Romero</h3>
		<a target="_blank" href="http://fundacionmonsenorromero.org.sv/biografia"><img id="romero" src="ModGeneral/imagen/romero.jpg"/></a>
		<p class="b"><b>Nuestro beato salvadoreño; un hombre lleno de historia<br/>valor
		y determinación, que luchó por su pueblo.</b></p>
		<h3 class="p">Papa Francisco</h3>
		<a target="_blank" href="https://w2.vatican.va/content/francesco/es/biography/documents/papa-francesco-biografia-bergoglio.html"><img id="papa" src="ModGeneral/imagen/papa.jpg"/></a>
		<p class="b"><b>Nuestro Papa latino, carismático y humilde</b>
		</p>
		<h3 class="p">Rutilio Grande</h3>
		<a target="_blank" href="https://es.wikipedia.org/wiki/Rutilio_Grande"><img id="papa" src="ModGeneral/imagen/rutilio.jpg"/></a>
		<p class="b"><b>Un gran sacerdote salvadoreño y servidor del Señor.</b>
		</p>
		</div> <!--fin del  div centro-->




		<div id="derecho"> <!--inicio del div derecho-->
			<div id="igle1">
				<img id="dibujo_igle1" src="ModGeneral/imagen/igle1.png"/>
			</div><p>
			<div id="igle2">
				<img id="dibujo_igle2" src="ModGeneral/imagen/igle2.png"/>
			</div>
		</div> <!--fin del  div derecho-->

		<div id="pie">
			<footer id="pie_principal">
			<p class="b"><b>RENOVACIÓN CARISMÁTICA CATÓLICA DE SANTIAGO DE MARÍA</b></p>
			</footer>
		</div>

		</div> <!--fin del subcontenedor -->



	</div> <!--fin del contenedor general-->
<script type="text/javascript" src="ModGeneral/js/menu.js"></script>
</body>


</html>
