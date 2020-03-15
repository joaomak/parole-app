<?php   
include ("inc/pages.php");  
?>
<!doctype html>
<html lang="<?php echo $lang; ?>" >
<head> 
    <!--base href="<?php echo $BASE; ?>" /-->
    <?php echo ($metaBase); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="language" content="<?php echo $lang; ?>" />
    <title><?php if(isset($title))echo $title;?> </title>

	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="<?php echo ($description); ?>" /> 
    <meta name="keywords" content="<?php echo ($keywords); ?>" /> 
    <meta name="author" content="Jo&atilde;o Makray" />
    <link rel="shortcut icon" href="img/icon32.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="application-name" content="Parole">

    <meta property="og:image" content="http://www.playparole.com/img/icon_parole.png" />
    <meta property="og:url" content="http://www.playparole.com/" />
    <meta property="og:title" content="<?php put('title'); ?>" />
    <meta property="og:description" content="<?php put('description'); ?>" />
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="website" />
    <meta property="fb:app_id" content="108237009230483" />
    
    	  <!-- fav and touch icons -->
    <link rel="icon" sizes="144x144" href="img/icon144.png">
  <link rel="apple-touch-icon-precomposed" href="img/icon144.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/ios72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/ios114.png">
  <link rel="apple-touch-icon" sizes="144x144" href="img/ios144.png">

  <link href='<?php echo $protocol; ?>fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <?php 
    if(isset($cssf)){      
	  foreach($cssf as $cssfile) echo '<link href="'.($cssfile).'" rel="stylesheet" type="text/css" />'."\n";
    }
	?>
    <style type="text/css" media="all"><?php echo $css; ?></style>
    <!--script src="inc/prefixfree.min.js"></script-->
</head>

<body id="<?php echo $pg; ?>" class="<?php echo $bodyClass; ?>">

<div id="fb-root"></div>
<div id="loader"><div class="spinner"></div></div>


        <div class="snap-drawers">
            <div class="snap-drawer snap-drawer-left">
                  <?php put('left'); ?>
            </div>
            <div class="snap-drawer snap-drawer-right">
                  <?php put('right'); ?>
            </div>
        </div>
        
        <div id="content" class="snap-content">
            <div id="header">
              <a id="logo" class="brand" href="">
                <i class="icon-arrow-left2"></i><svg width="130" height="45"><image xlink:href="img/parole.svg" src="img/parole.png" width="130" height="45" /></svg>
              </a>
              <?php put('header'); ?>
            </div>
            <?php put('content'); ?>
        </div>




<?php put('extra'); ?>

<div id="dicionario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dicionario" aria-hidden="true">
  <div class="modal-dialog"><div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-times-circle"></i></button>
    <h3 class="modal-title">Dicionário </h3>
  </div>
  <div class="modal-body"></div>
  <div class="modal-footer">
    <button class="btn btn-block" data-dismiss="modal" aria-hidden="true">Fechar</button>
  </div>
  </div></div>
</div>

<div id="user-info" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Regras" aria-hidden="true">
    <div class="modal-dialog modal-sm"><div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-times-circle"></i></button>
    <h3 class="modal-title">Perfil</h3>
    </div>
    <div class="modal-body"><?php put('conta'); ?></div>
    <div class="modal-footer">
    <button class="btn btn-block" data-dismiss="modal" aria-hidden="true">OK</button>
    </div></div>
    </div>
</div>


<?php 
    echo $server;
    if(isset($js)){      
	  foreach($js as $jsfile) echo '<script type="text/javascript" src="'.$jsfile.'"></script>'."\n"; 
    }
    
?>

</body>
</html>
<?php 

if($phonegap){
  $html = ob_get_contents();
  file_put_contents('www/index.html', str_replace("\n", '', $html));
}

ob_end_flush();


?>

