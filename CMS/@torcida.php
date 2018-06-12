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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<meta http-equiv="Content-Language" content="pt-BR" />
		<?php if($torcida_status){ ?>
		<title>Perfil da <?php echo $torcida_nome ?> - Organizadas Brasil</title>
		<?php } else{?>
		<title>Organizadas Brasil</title>
		<?php }?>
		<meta name="keywords" content="torcida, torcida organizada, organizada, torcida uniformizada, <?php echo $torcida_nome?>, <?php echo $nome_time ?>" />
		<meta name="description" content="Perfil com informações sobre a <?php echo $torcida_nome ?>, <?php echo $nome_time?>, <?php echo $estado_nome ?> - <?php echo $estado_sigla ?>" />
		<link rel="canonical" href="http://www.organizadasbrasil.com<?php echo $_SERVER['REQUEST_URI']; ?>" >
		<link href="/css/novo.css?v=2" rel="stylesheet" type="text/css" media="screen" />
		<link href="/css/plugins.css" rel="stylesheet" type="text/css" media="screen" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
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

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		     (adsbygoogle = window.adsbygoogle || []).push({
		          google_ad_client: "ca-pub-9964926331531883",
		          enable_page_level_ads: true
		     });
		</script>		
	</head>
	<body>
		<?php include("includes/topo.php"); ?>
		<div id="conteudo" class="clearfix">
			<div id="col-esquerda" class="clearfix">
				<?php include("includes/menu.php"); ?>
			</div>
			<div id="perfil">
				<div class="box">
					
					<?php if($torcida_status){ ?>
					
					<div id="bandeira">
						<?php $url_estado = friendlyUrlEstados($estado_nome);?>
						<?php $url_obr = friendlyUrl($torcida_nome).$torcida_id.".html"; ?>
						<a title="<?php echo $estado_nome ?>" href="<?php echo strtolower($url_estado); ?>"><img src="<?php echo $estados_bandeira ?>" alt="<?php echo $estado_nome ?>" title="<?php echo $estado_nome?>" /><?php echo $estado_sigla?></a>
					</div>
					<div id="avatar">
						<div id="simbolo">
							<img class="simbolo" alt="<?php echo $torcida_nome; ?>" title="<?php echo $torcida_nome?>" src="/imagens/simbolos/<?php echo $simbolo; ?>" /><span></span>
						</div>
						<div id="social">
							<h5>Compartilhe</h5>
							<div id="like-fb">
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
						</div/>
					</div>
					<div id="infos">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<ins class="adsbygoogle"
						     style="display:inline-block;width:468px;height:60px"
						     data-ad-client="ca-pub-9964926331531883"
						     data-ad-slot="8934825169"></ins>
						<script>
						     (adsbygoogle = window.adsbygoogle || []).push({});
						</script>
						<h1>
						<?php echo $torcida_nome;?>
						</h1>
						
						<?php if(($_SESSION['ind_ativo'] == 1)){ ?>
						<a title="editar" class="btEdit" href="/extranet/adm/torcidas/alterar.php?id=<?php echo $torcida_id; ?>">Editar Torcida</a>
						<?php };?>
						
						<?php if(($_SESSION['ind_ativo'] == 1) || ($_SESSION['ind_ativo'] == 2)){ ?>
						<?php
							$hoje = date ('d/m');
							$data_fund = substr($fundacao, 0, 5);
												$ano_fund = substr($fundacao, 6, 4);
												$idade = date ('Y') - $ano_fund;
						if($hoje == $data_fund){?>
						<?php if($idade == 1):?>
						<p id="tododia">Torcida do dia (<?php echo $hoje ?>): <?php echo $torcida_nome?>, comemora hoje <?php echo $idade ?> ano de fundação, foi fundada em <?php echo $fundacao ?> http://<?php echo $_SERVER['SERVER_NAME'] ?><?php echo $_SERVER['REQUEST_URI'] ?></p>
						<?php else:?>
						<p id="tododia">Torcida do dia (<?php echo $hoje ?>): <?php echo $torcida_nome?>, comemora hoje <?php echo $idade ?> anos de fundação, foi fundada em <?php echo $fundacao ?> http://<?php echo $_SERVER['SERVER_NAME'] ?><?php echo $_SERVER['REQUEST_URI'] ?></p>
						<?php endif;?>
						<?php } ?>
						<?php } ?>
						
						<p class="time"><?php echo $nome_time.", "?><span><?php echo $estado_nome?></span></p>
						<?php
						if($lema){ ?>
						<h2><span><?php echo $lema?></span></h2>
						<?php } else{?>
						<hr/>
						<?php } ?>
						<ul id="dados" class="clearfix">
							<li class="line"><span class="question">Estado:</span>	<span class="request"><?php echo $estado_nome?></span></li>
							<li><span class="question">Time:</span>	<span class="request"><?php echo $nome_time?></span></li>
							<li class="line"><span class="question">Fundação:</span>	<span class="request"><?php echo ($fundacao) ?></span></li>
							<li><span class="question">Sede:</span>	<span class="request"><?php echo $sede?></span></li>
							<li class="line"><span class="question">Sub-sedes:</span>
							<span class="request">
								<?php
									if($sub_sede == null){
										echo "Nome da Região";
									}else{
										echo $sub_sede;
									}
								?>
							</span></li>
							<li><span class="question">Site oficial:</span>	<span class="request">
							<?php
								if($site_oficial == null){
								echo "Não disponivel";
								}else{
							?>
							<a title="Site oficial da <?php echo $torcida_nome ?>" href="http://<?php echo $site_oficial; ?>" rel="noFollow" target="blank"><?php echo $site_oficial; ?></a>
							<?php } ?>
						</span></li>
						<li class="line"><span class="question">Twitter:</span>	<span class="request">
						<?php if($twitter == null){
							echo "Não disponível";
						} else{?>
						<a title="Twitter da <?php echo $torcida_nome ?>" href="http://www.twitter.com/<?php echo $twitter; ?>" rel="noFollow" target="blank">www.twitter.com/<?php echo $twitter; ?></a>
						<?php }?>
					</span></li>
					
					
				</ul>
			</div>
		</div>
		<div class="box noBorderTop">
			
			<?php if($_SERVER['SERVER_NAME'] != "obr.local"):?>
			<div id="perfilAds">
				<script type="text/javascript"><!--
					google_ad_client = "ca-pub-9964926331531883";
					/* obr_perfil */
					google_ad_slot = "7083693599";
					google_ad_width = 160;
					google_ad_height = 600;
				//-->
				</script>
				<script type="text/javascript"
				src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
			</div>
			<?php endif;?>
			
			<div class="infosBox fRight">
				<h5>História</h5>
				<div class="infosBoxQuest">
					<?php if($historia == null){
					echo "<pre class=\"none\">Não disponivel</pre>";
				}else{ ?>
				<?php
					if(strlen($historia)>455){
						$resumo = substr("$historia",0,445);
						$resumo = rtrim($resumo);
				?>
			<pre id="block1"><?php echo $resumo. "... "?></pre>
		<pre id="block2"><?php echo $historia?></pre>
		<a title="[+] Mostrar história completa" href="javascript:void(0)" id="mostrar">[+] Mostrar história completa</a>
		<a title="Fechar" href="javascript:()" id="fechar" style="display:none;">Fechar</a>
		<?php
		}else{
		?>
		<pre>
			<?php echo $historia?>
			<?php }	 ?>
		</pre>
		<?php }?>
	</div>
</div>
<hr class="fRight" />
<div class="infosBox fRight">
	<h5>Fotos</h5>
	<div class="infosBoxQuest clearfix">
		<?php
					$resultado = mysql_query("SELECT fot.id as fotos_id, fot.url as fotos_url FROM fotos fot INNER JOIN torcidas tor ON tor.id = fot.torcida_id WHERE tor.id =" .$_GET['id']." LIMIT 50;");
						$num_rows = mysql_num_rows($resultado);
		?>
		<?php if($num_rows <= 5) { ?>
		<ul id="default" class="clearfix">
			<?php }else{?>
			<ul id="mycarousel" class="jcarousel-skin-tango">
				<?php } ?>
				<?php
					while($num_rows = mysql_fetch_array($resultado)){
				?>
				<li>
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
	</div>
	
</div>

<div class="infosBox fRight">
	<h5>Comentários sobre da <?php echo $torcida_nome?></h5>
	<div class="fb-comments" data-href="http://www.organizadasbrasil.com<?php echo $url_obr ?>" data-numposts="5" data-width="565px"></div>
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



<hr class="fRight" />
<?php }else{  echo "torcida não cadastrada"; } ?>

</div>
</div>
</div>
<?php include("./includes/rodape.php"); ?>
<link rel="stylesheet" href="/css/colorbox.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript" src="/js/funcoes2.js"></script>
<script src="/js/jquery.jcarousel.min.js" type="text/javascript"></script>
<script src="/js/jquery.colorbox.js"></script>
<script>
	$(document).ready(function(){
		//Examples of how to assign the ColorBox event to elements
		$(".group1").colorbox({rel:'group1'});
		$(".group2").colorbox({rel:'group2', transition:"fade"});
		$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
		$(".group4").colorbox({rel:'group4', slideshow:true});
		
		
		//Example of preserving a JavaScript event for inline calls.
		$("#click").click(function(){
			$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});
	});
</script>
</body>
</html>