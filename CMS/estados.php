<?php
	include("engine/functions.php");
	require_once("engine/conection.php");
?>
<?php
	$SQL = "SELECT reg.nome as regioes_nome, est.nome as estado_nome, est.id as estado_id, est.sigla as estado_sigla, est.preposicao as estado_preposicao, est.bandeira as estado_bandeira FROM regioes reg INNER JOIN estados est ON reg.id = est.regiao_id WHERE est.id = " .$_GET['id'].";";
	$resultado = mysql_query($SQL) or die(mysql_error());
	$linha = mysql_fetch_array($resultado);
?>
<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php if($linha['estado_id'] != 28 ? $uf="do estado" : $uf="do") ?>
		<title>Torcidas Organizadas <?php echo $uf." ".$linha['estado_preposicao']." ".$linha['estado_nome']?> - Organizadas Brasil</title>
		<meta name="keywords" content="Torcidas Organizadas, torcidas, Organizadas, uniformizadas, torcidas uniformizadas, <?php echo $linha['estado_nome']?>, <?php echo $linha['estado_sigla']?>" />
		<meta name="description" content="Torcidas Organizadas - <?php echo $linha['estado_nome']?> -  <?php echo $linha['estado_sigla'] ?>" />
		<link rel="canonical" href="http://www.organizadasbrasil.com<?php echo $_SERVER['REQUEST_URI']; ?>" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/styles.css">
		<!-- TWITTER CARD -->
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="" />
		<meta name="twitter:creator" content="" />
		<meta name="twitter:title" content="" />
		<meta name="twitter:description" content="" />
		<meta name="twitter:image" content="" />
		<!-- TAGS DO FACEBOOK -->
		<meta property="og:type" content="website" />
		<meta property="fb:admins" content="100003761281728"/>
		<meta property="og:image" content="http://www.organizadasbrasil.com/imagens/obr-facebook.png"/>
		<meta property="og:title" content="Torcidas Organizadas <?php echo $linha['estado_nome']?> - Organizadas Brasil"/>
		<meta property="og:description" content="<?php echo $linha['estado_nome']?>, conheça todas as Torcida Organizadas deste estado"/>
		<meta property="og:url" content="http://www.organizadasbrasil.com/"/>
		<meta property="og:site_name" content="Organizadas Brasil"/>
		<meta property="og:type" content="website"/>
		<!-- favicon e icons -->
		<link rel="icon" href="favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
		<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png" />
	</head>
	<body>
		
	<header>
		<?php include("includes/_header.php"); ?>
	</header>
		<main>
			<div class="container">
				<div class="col-md-12">
					<div class="row">
						<div class="side-menu col-md-3 col-lg-2 hidden-sm-down">
							<?php include("includes/_side-menu.php"); ?>
						</div>
						<div class="col-md-9 col-lg-8">
							<div class="principal col-sm-12 mt-4 mb-2 pt-4 pb-4">
								<div class="row">
									<div class="col-11 breadcrumbs mt-1 mb-4">
										<ul class="p-0 d-inline">
											<li class="d-inline strong">Você está em:</li>
											<li class="d-inline"><i class="icon-arrow"></i><a href="/index.php">Home</a></li>
											<li class="d-inline"><i class="icon-arrow"></i>Região <?php echo $linha['regioes_nome'] ;?></li>
											<li class="d-inline"><i class="icon-arrow"></i><?php echo $linha['estado_nome']?></li>
										</ul>
									</div>
									<div class="col-1">
										<img src="<?php echo $linha['estado_bandeira'] ?>" width="34" height="24" alt="<?php echo $linha['estado_nome'] ?>">
									</div>
								</div>
								<?php
									$SQL = "SELECT tim.nome as nome_time, tor.id as torcida_id, tor.nome as torcida_nome, tor.fundacao as fundacao, tor.sede as sede, tor.sub_sede as sub_sede, tor.lema as lema, tor.site_oficial as site_oficial, tor.simbolo as simbolo, tor.status as status, est.bandeira as estado_bandeira FROM torcidas tor
									inner join times tim on tim.id = tor.time_id
									inner join estados est on est.id = tim.estado_id
									WHERE  est.id = " .$_GET['id'].";";
								?>
								
								<?php $resultado = mysql_query($SQL);
									while($linha = mysql_fetch_array($resultado)){
									if($linha['status'] == 1){
								?>
								<?php $url_obr = friendlyUrl($linha['torcida_nome']).$linha['torcida_id'].".html";?>
								<div class="col-sm-12 mt-1 mb-2 pt-4 pb-4 torcida">
									<div class="col-md-12">
										<div class="row">
											<div class="simbolo align-self-center col-12 col-sm-2">
												<a href="<?php echo $url_obr ?>" title="Ver Página da <?php echo $linha['torcida_nome'] ?>"><img src="/imagens/simbolos/<?php echo $linha['simbolo']; ?>" class="img-fluid d-block mb-3 ml-auto mr-auto" alt="Ver Página da <?php echo $linha['torcida_nome']?>"></a>
											</div>
											<div class="infos col-12 col-sm-10">
												<div class="row">
													<div class="col-4 col-sm-3 col-md-3 col-lg-2 text-truncate odd"><strong>Nome:</strong></div>
													<div class="col-8 col-sm-9 col-md-9 col-lg-10 text-truncate odd"><?php echo $linha['torcida_nome'] ?></div>
													<div class="col-4 col-sm-3 col-md-3 col-lg-2 text-truncate"><strong>Time:</strong></div>
													<div class="col-8 col-sm-9 col-md-9 col-lg-10 text-truncate"><?php echo $linha['nome_time'] ?></div>
													<div class="col-4 col-sm-3 col-md-3 col-lg-2 text-truncate odd"><strong>Fundação:</strong></div>
													<div class="col-8 col-sm-9 col-md-9 col-lg-10 text-truncate odd"><?php echo $linha['fundacao']; ?></div>
													<div class="col-4 col-sm-3 col-md-3 col-lg-2 text-truncate"><strong>Sede:</strong></div>
													<div class="col-8 col-sm-9 col-md-9 col-lg-10 text-truncate"><?php echo $linha['sede'] ?></div>
													<div class="col-4 col-sm-3 col-md-3 col-lg-2 text-truncate odd"><strong>Sub-sedes:</strong></div>
													<?php if($linha['sub_sede']){ ?>
													<div class="col-8 col-sm-9 col-md-9 col-lg-10 text-truncate odd"><?php echo $linha['sub_sede']?></div>
													<?php } else{ ?>
													<div class="col-8 col-sm-9 col-md-9 col-lg-10 text-truncate odd">---</div>
													<?php } ?>
													<div class="col-4 col-sm-3 col-md-3 col-lg-2 text-truncate"><strong>Lema:</strong></div>
													<?php if($linha['lema']){ ?>
													<div class="col-8 col-sm-9 col-md-9 col-lg-10 text-truncate font-italic lema">"<?php echo  $linha['lema'] ?>"</div>
													<?php } else{ ?>
													<div class="col-8 col-sm-9 col-md-9 col-lg-10 text-truncate">---</div>
													<?php } ?>
													<div class="col-4 col-sm-3 col-md-3 col-lg-2 text-truncate odd"><strong>Site oficial:</strong></div>
													<?php if($linha['site_oficial']){ ?>
													<div class="col-8 col-sm-9 col-md-9 col-lg-10 text-truncate odd"><a href="http://<?php echo $linha['site_oficial']; ?>" target="blank"><?php echo $linha['site_oficial'] ?></a></div>
													<?php } else{ ?>
													<div class="col-8 col-sm-9 col-md-9 col-lg-10 text-truncate odd">Não disponível</div>
													<?php } ?>
												</div>
											</div>
											<div class="col-6 mt-2 no-padding">
												<div id="fb-root"></div>
												<script>(function(d, s, id) {
												var js, fjs = d.getElementsByTagName(s)[0];
												if (d.getElementById(id)) return;
												js = d.createElement(s); js.id = id;
												js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
												fjs.parentNode.insertBefore(js, fjs);
												}(document, 'script', 'facebook-jssdk'));</script>
												<div class="fb-like" data-href="http://www.organizadasbrasil.com<?php echo $url_obr ?>" data-send="false" data-layout="button_count" data-width="115" data-show-faces="false"></div>
											</div>
											<div class="col-6 mt-2 no-padding text-right">
												<a href="<?php echo $url_obr ?>" class="btn btn-obr pl-4 pr-4" style="font-size: 1.25rem;">Ver Perfil</a>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
								<?php } ?>
								<div class="col-sm-12 mt-1 mb-2 d-none d-sm-block bg-white">

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
	    <script>
	      $(document).ready(function() {
	        $('.menu-link').bigSlide();

	        var $btnRegiao = $('dl dd.regiao > a');
	        $btnRegiao.click(function(e){
	        	e.preventDefault();
	        	$(this).siblings('dl').slideToggle();
	        });

	      });
	    </script>
	</body>
</html>