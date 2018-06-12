<div class="container">
    <div class="col-md-12 footer">
        <div class="row">
            <div class="col-md-2 text-center text-md-left">
                <img class="img-fluid d-block mx-auto pt-4 pb-3" src="http://www.organizadasbrasil.com/imagens/logo-footer.png">
            </div>
            <div class="col-md-8">
                <form class="col-md-10 pt-4 pb-3 ml-auto mr-auto" action="http://www.organizadasbrasil.com/resultado-busca.php" target="_blank">
                    <div class="input-group">
                        <input type="text" class="form-control p-3" name="q" size="31" placeholder="Pesquisar" aria-label="Pesquisar">
                        <input type="hidden" name="cx" value="partner-pub-9964926331531883:rontum8s4by" />
                        <input type="hidden" name="cof" value="FORID:10" />
                        <input type="hidden" name="ie" value="ISO-8859-1" />
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary btn-obr" name="sa" value="Buscar" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>
                <div class="text-center copyright">© Copyright 2004 - <?php echo date('Y'); ?> Organizadas Brasil O Portal das Torcidas Organizadas. Direitos reservados</div>
            </div>
            <div class="col-md-2">
                <?php
                include ("config.php3");
                if (!$datei) $datei = dirname(__FILE__)."/$filename";
                $time = @time();
                //$ip = $REMOTE_ADDR;
                $ip = $_SERVER['REMOTE_ADDR'];
                $string = "$ip|$time\n";
                $a = fopen("$filename", "a+");
                fputs($a, $string);
                fclose($a);
                $timeout = time()-(60*$timer);
                $all = "";
                $i = 0;
                $datei = file($filename);
                for ($num = 0; $num < count($datei); $num++) {
                $pieces = explode("|",$datei[$num]);
                if ($pieces[1] > $timeout) {
                $all .= $pieces[0];
                $all .= ",";
                }
                $i++;
                }
                $all = substr($all,0,strlen($all)-1);
                $arraypieces = explode(",",$all);
                $useronline = count(array_flip(array_flip($arraypieces)));
                // display how many people where activ within $timeout?>
                <span class="d-block pt-4 pb-3 text-center users-online"><i class="icon-user"></i> Torcedores online: <?echo $useronline;?></span>
                <?
                // Delete
                $dell = "";
                for ($numm = 0; $numm < count($datei); $numm++) {
                $tiles = explode("|",$datei[$numm]);
                if ($tiles[1] > $timeout) {
                $dell .= "$tiles[0]|$tiles[1]";
                }
                }
                if (!$datei) $datei = dirname(__FILE__)."/$filename";
                $time = @time();
                $ip = $REMOTE_ADDR;
                $string = "$dell";
                $a = fopen("$filename", "w+");
                fputs($a, $string);
                fclose($a);
                ?>
            </div>
        </div>
    </div>
</div>