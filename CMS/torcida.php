<?php
	session_start();
	include("engine/functions.php");
	require_once("engine/conection.php");
	
			$resulFotos="";
			$torcida_status = "";
			$torcida_id = 0;
			$torcida_nome = "";
			$nome_time = "";
			$simbolo = "";
			$estado_nome = "";
			$site_oficial = "";
			$lema = "";
			$sub_sede = "";
			$sede = "";
			$fundacao = "";
			$historia = "";
			$twitter = "";
			$estados_bandeira = "";
			$estados_id = "";
			$estado_sigla = "";
if($_GET){
	if(is_numeric($_GET['id'])){
						$SQL = "SELECT * , tor.id as  torcida_id, tor.status as torcida_status, tim.nome as nome_time,
				tor.nome as torcida_nome, tor.twitter as twitter, est.nome as estado_nome, est.bandeira as estados_bandeira, est.id as estados_id, est.sigla as estado_sigla FROM torcidas tor
									inner join times tim on tim.id = tor.time_id
				inner join estados est on est.id = tim.estado_id WHERE tor.status = 1 and  tor.id =" .$_GET['id'].";";
		
		$resultado = mysql_query($SQL) or die(mysql_error());
		while($linha = mysql_fetch_array($resultado)){
			$torcida_status = $linha["torcida_status"];
			$torcida_id = $linha["torcida_id"];
			$torcida_nome = $linha["torcida_nome"];
			$nome_time = $linha["nome_time"];
			$simbolo = $linha["simbolo"];
			$estado_nome = $linha["estado_nome"];
			$site_oficial = $linha["site_oficial"];
			$lema = $linha["lema"];
			$sub_sede = $linha["sub_sede"];
			$sede = $linha["sede"];
			$fundacao = $linha["fundacao"];
			$historia = $linha["historia"];
			$twitter = $linha["twitter"];
			$estados_bandeira = $linha["estados_bandeira"];
			$estados_id = $linha["estados_id"];
			$estado_sigla = $linha["estado_sigla"];
			$time_number = $linha["time_id"];
		}
	}
}
	
	$resulFotos = mysql_query("SELECT id, simbolo FROM torcidas where id = $torcida_id limit 4");//$sql = mysql_num_rows($resulFotos);
		$sql = mysql_fetch_array($resulFotos);
?>
<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php if($torcida_status){ ?>
		<title><?php echo $torcida_nome ?> - Organizadas Brasil</title>
	<?php } else{?>
		<title>Organizadas Brasil</title>
	<?php }?>
	<meta name="keywords" content="torcida, torcida organizada, organizada, torcida uniformizada, <?php echo $torcida_nome?>, <?php echo $nome_time ?>" />
	<meta name="description" content="🏳 História, dados e fotos da <?php echo $torcida_nome ?>, <?php echo $nome_time?>, <?php echo $estado_nome ?> - <?php echo $estado_sigla ?>" />
	<link rel="canonical" href="http://www.organizadasbrasil.com<?php echo $_SERVER['REQUEST_URI']; ?>" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="http://idangero.us/swiper/dist/css/swiper.min.css">

	<meta property="fb:admins" content="100003761281728"/>
	<meta property="fb:app_id" content="175380115987579"/> <?php // OBRComents -> https://developers.facebook.com/tools/comments?id=175380115987579 ?>
	<meta property="og:image" content="http://www.organizadasbrasil.com/imagens/simbolos/b/b_<?php echo $sql['simbolo'];?>" />
	<meta property="og:image:alt" content="Simbolo da <?php echo $torcida_nome ?>" />
	<meta property="og:title" content="Perfil da <?php echo $torcida_nome ?> - Organizadas Brasil"/>
	<meta property="og:description" content="Tudo sobre a <?php echo $torcida_nome ?> - Organizadas Brasil"/>
	<meta property="og:url" content="http://www.organizadasbrasil.com<?php echo $_SERVER['REQUEST_URI']; ?>"/>
	<meta property="og:site_name" content="Organizadas Brasil"/>
	<meta property="og:type" content="website"/>
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="http://www.organizadasbrasil.com/imagens/ico_obr_57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://www.organizadasbrasil.com/imagens/ico_obr_72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://www.organizadasbrasil.com/imagens/ico_obr_114x114.png" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@portalOBR" />
	<meta name="twitter:creator" content="@portalOBR" />
	<meta name="twitter:image" content="http://www.organizadasbrasil.com/imagens/simbolos/b/b_<?php echo $sql['simbolo'];?>">
	<meta name="twitter:title" content="Perfil da <?php echo $torcida_nome ?> - Organizadas Brasil">
	<meta name="twitter:description" content="Tudo sobre a <?php echo $torcida_nome ?> - Organizadas Brasil">
	<meta property="twitter:url" content="http://www.organizadasbrasil.com<?php echo $_SERVER['REQUEST_URI']; ?>" />
  </head>
  <body>
    
	<header>
		<?php include("includes/_header.php"); ?>
	</header>

    <main>
      <div class="container">
        <main class="col-md-12">
          <div class="row">

			<div class="side-menu col-md-3 col-lg-2 hidden-sm-down">
				<?php include("includes/_side-menu.php"); ?>
			</div>

	          <div class="col-md-9 col-lg-8">

	          	<div class="principal col-sm-12 mt-4 mb-2 pt-4 pb-4">
	          		<div class="box-resumo col-md-12 pt-5 pb-4">
	          			<div class="estado text-center">
	          				<?php $url_estado = friendlyUrlEstados($estado_nome);?>
							<?php $url_obr = friendlyUrl($torcida_nome).$torcida_id.".html"; ?>
	          				<a title="<?php echo $estado_nome ?>" href="<?php echo strtolower($url_estado); ?>">
	          					<img src="<?php echo $estados_bandeira ?>" height="25" />
	          					<span><?php echo $estado_sigla ?></span>
	          				</a>
	          			</div>
						<div class="row">
		          			<div class="simbolo col-12 col-sm-3">
			          			<img src="/imagens/simbolos/<?php echo $simbolo; ?>" class="img-fluid d-block mb-4 ml-auto mr-auto" alt="<?php echo $torcida_nome ?>" title="<?php echo $torcida_nome ?>">
			          			<div class="col-12 mb-3 text-center ">
			          				<p class="compartilhe">Compartilhe</p>
			          				<div id="fb-root"></div>
									<script>(function(d, s, id) {
									var js, fjs = d.getElementsByTagName(s)[0];
									if (d.getElementById(id)) return;
									js = d.createElement(s); js.id = id;
									js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
									fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));</script>
									<div class="fb-like" data-send="false" data-href="http://www.organizadasbrasil.com<?php echo $url_obr ?>" data-layout="box_count" data-width="80" data-show-faces="false"></div>
			          			</div>
			          			<div class="col-12 no-padding hidden-lg-down">
			          				<?php include("includes/_right-banner.php"); ?>
			          			</div>
			          		</div>
			          		<div class="infos col-12 col-sm-9">
			          			<div class="row"> 
			          				<div class="col-12 col-sm-11 text-center text-sm-left"><h1><?php echo $torcida_nome ?></h1></div>
			          				<div class="col-12 text-center text-sm-left"><p class="time"><?php echo $nome_time?>, <span><?php echo $estado_nome?></span></p></div>
			          				<div class="col-12 text-center text-sm-left">
			          					<?php if($lema){ ?>
				          					<hr>
				          						<h2><i class="icon-quote"></i><?php echo $lema ?></h2>
				          					<hr>
			          					<?php } ?>

			          				</div>
			          			</div>

			          			<div class="col-12 dados">
									<div class="row">
				          				<div class="col-4 col-md-3 col-lg-2 odd"><strong>Nome:</strong></div>
				          				<div class="col-8 col-md-9 col-lg-10 odd"><?php echo $torcida_nome ?></div>
										<div class="col-4 col-md-3 col-lg-2"><strong>Time:</strong></div>
										<div class="col-8 col-md-9 col-lg-10"><?php echo $nome_time ?></div>
										<div class="col-4 col-md-3 col-lg-2 odd"><strong>Fundação:</strong></div>
										<div class="col-8 col-md-9 col-lg-10 odd"><?php echo $fundacao ?></div>
										<div class="col-4 col-md-3 col-lg-2"><strong>Sede:</strong></div>
										<div class="col-8 col-md-9 col-lg-10"><?php echo $sede ?></div>
										<div class="col-4 col-md-3 col-lg-2 odd"><strong>Sub-sedes:</strong></div>
										<div class="col-8 col-md-9 col-lg-10 odd"><?php echo $sub_sede ?></div>
										<div class="col-4 col-md-3 col-lg-2"><strong>Site oficial:</strong></div>
										<div class="col-8 col-md-9 col-lg-10 text-truncate"><a href="http://<?php echo $site_oficial ?>" target="blank"><?php echo $site_oficial ?></a></div>
										<div class="col-4 col-md-3 col-lg-2 text-truncate odd"><strong>Twitter:</strong></div>
										<div class="col-8 col-md-9 col-lg-10 text-truncate odd text-truncate"><a href="http://twitter.com/<?php echo $twitter ?>" target="blank">http://twitter.com/<?php echo $twitter ?></a></div>
				          			</div>			          				
			          			</div>

			          			<div class="row">
									<div class="col-12 mt-4">
										<hr>
										<h3>História da Torcida <span class="d-none"> da<?php echo $torcida_nome ?></span></h3>

										<div class="col-12 pt-4 pb-3 texto-historia">

											<?php
												if(strlen($historia)>455){
													$resumo = substr("$historia",0,445);
													$resumo = rtrim($resumo);
											?>

											<pre id="historia-resumo"><?php echo $resumo. "... "?></pre>
			
											<pre id="historia-completa"><?php echo $historia?></pre>

											<div class="col-12 mt-3 text-right">
												<a title="[+] Mostrar história completa" href="#" id="mostrar-completa">[+] Mostrar história completa</a>
												<a title="Fechar" href="#" id="mostrar-resumo">Fechar</a>
											</div>

											<?php }else{ ?>
											<pre>
												<?php echo $historia?>
											</pre>
											<?php }	 ?>
										</div>

									</div>
			          			</div>

			          			<div class="row">
		          					<div class="col-12 mt-4">
										<hr>
			          					<h3>Fotos da Torcida <span class="d-none"> da<?php echo $torcida_nome ?></span></h3>
										<div class="col-12 p-4 fotos">



<div class="col-12">
	<div class="swiper-container">

		<?php
			$resultado = mysql_query("SELECT fot.id as fotos_id, fot.url as fotos_url FROM fotos fot INNER JOIN torcidas tor ON tor.id = fot.torcida_id WHERE tor.id =" .$_GET['id']." LIMIT 50;");
				$num_rows = mysql_num_rows($resultado);
		?>
		<?php if($num_rows <= 5) { ?>
		<ul class="swiper-wrapper p-0">
			<?php }else{?>
			<ul class="swiper-wrapper p-0">
				<?php } ?>
				<?php
					while($num_rows = mysql_fetch_array($resultado)){
				?>
				<li class="swiper-slide">
					<?php
						$caminho = substr($num_rows['fotos_url'], 0, 10);
						if($caminho == "https://lh"){
							$valores = array("s400", "s450", "s500", "s550", "s600", "s650");
					$thumb_pic = str_replace($valores, "s128" , $num_rows['fotos_url']); ?>
					
					<?php { ?>
					<a title="<?php echo $torcida_nome; ?>" href="<?php echo $num_rows['fotos_url'];?>.jpg" class="group1" title=""><img alt="<?php echo $torcida_nome?>" src="<?php echo $thumb_pic?>" /></a>
					<?php } ?>
					<?php } ?>
					<?php
					$caminho = substr($num_rows['fotos_url'], 0, 33);
					if($caminho == "http://www.organizadasbrasil.com/"){
					$thumb_obr = str_replace("obr", "t_obr", $num_rows['fotos_url'])?>
					<?php { ?>
					<a title="<?php echo $torcida_nome; ?>" href="<?php echo $num_rows['fotos_url'];?>" class="group1" title=""><img alt="<?php echo $torcida_nome?>" src="<?php echo $thumb_obr?>" /></a>
					<?php } ?>
					<?php } ?>
					<?php } ?>
				</li>
				<?php if(mysql_num_rows($resultado) == 0){ ?>
			<pre>Em breve...</pre>
			<?php } ?>
		</ul>
		<div class="swiper-pagination"></div>
	</div>								
</div>								


											
			          					</div>
		          					</div>
			          			</div>

			          			<div class="row">
		          					<div class="col-12 ">
										<hr>
		          							<h3>Comentários <span class="d-none"> sobre a <?php echo $torcida_nome?></span></h3>
			          						<div class="col-12 p-4 comentarios">
												<div class="fb-comments" data-href="http://www.organizadasbrasil.com<?php echo $url_obr ?>" data-numposts="5" data-width="100%"></div>
												<div id="fb-root"></div>
												<div id="fb-root"></div>
												<script>(function(d, s, id) {
												var js, fjs = d.getElementsByTagName(s)[0];
												if (d.getElementById(id)) return;
												js = d.createElement(s); js.id = id;
												js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=175380115987579";
												fjs.parentNode.insertBefore(js, fjs);
												}(document, 'script', 'facebook-jssdk'));</script>
			          						</div>
		          					</div>
			          			</div>

			          		</div>
		          		</div>	          			
	          		</div>
	          	</div>

	          	<div class="col-sm-12 mt-1 mb-2 d-none d-sm-block bg-white">
	          		

      				<div class="col-12">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<ins class="adsbygoogle"
						     style="display:inline-block;width:468px;height:60px"
						     data-ad-client="ca-pub-9964926331531883"
						     data-ad-slot="8934825169"></ins>
						<script>
						     (adsbygoogle = window.adsbygoogle || []).push({});
						</script>			          					
      				</div>
	          	</div>	          	
	          </div>

				<div class="col-md-12 col-lg-2 pt-4 side-banner">
					<?php include("includes/_right-banner.php"); ?>
				</div>
          </div>
      
      </div>
    </main>

	<div class="container parceiros">
    	<?php include("includes/_parceiros.php"); ?>
    </div>

    <footer>
    	<?php include("includes/_footer.php"); ?>
	</footer>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://ascott1.github.io/bigSlide.js/js/bigSlide.js"></script>
    <script src="http://idangero.us/swiper/dist/js/swiper.min.js"></script>

    <script>
      $(document).ready(function() {
        $('.menu-link').bigSlide();

        var $mostrarCompleta = $('#mostrar-completa');
        var $mostrarResumo = $('#mostrar-resumo');

        var $resumo = $('#historia-completa');
        var $completa = $('#historia-resumo');

        $mostrarResumo.click(function(e){
        	e.preventDefault();
        	$(this).hide();
        	$mostrarCompleta.show();

        	$completa.show();
        	$resumo.hide();
        	console.log("mostrarCompleta");
        });        

        $mostrarCompleta.click(function(e){
        	e.preventDefault();
        	$(this).hide();
        	$mostrarResumo.show();

        	$completa.hide();
        	$resumo.show();
        	console.log("ocultarCompleta");
        });

        var $btnRegiao = $('dl dd.regiao > a');
        $btnRegiao.click(function(e){
        	e.preventDefault();
        	$(this).siblings('dl').slideToggle();
        });

      });

	var swiper = new Swiper('.swiper-container', {
	  // Default parameters
	  slidesPerView: 4,
	  spaceBetween: 40,
      freeMode: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },		

	  // Responsive breakpoints
	  breakpoints: {
	    // when window width is <= 320px
	    360: {
	      slidesPerView: 1,
	      spaceBetween: 10
	    },
	    // when window width is <= 480px
	    575: {
	      slidesPerView: 2,
	      spaceBetween: 20
	    },
	    // when window width is <= 640px
	    991: {
	      slidesPerView: 3,
	      spaceBetween: 30
	    }
	  }
	});    
    </script>
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f8c40e84c4e93bc"></script>
  </body>
</html>