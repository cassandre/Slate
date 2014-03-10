<?php 
global $dataDir, $dirPrefix;
if ($page->theme_is_addon) {
	$theme_path = '/data/_themes/' . $page->theme_name;
} else {
	$theme_path = '/themes/Slate';
} 
$page->head_css[] = $theme_path . '/bootstrap.css';
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php gpOutput::GetHead(); ?>
	<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Raleway:200' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
</head>
<body>
	
	<div class="header"><a id="top" name="top"></a>
	<div class="wrap">
			
		<button type="button" class="nav-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>  
				&#9776;  
		</button>  
		<header class="cf">
			<?php
			global $config;
			$default_value = $config['title'];
			$GP_ARRANGE = false;
			gpOutput::Get('Extra','Header');
			?>
		</header>
		<?php 
		function is_front_page(){
    		global $gp_menu, $page;
    		reset($gp_menu);
   			return $page->gp_index == key($gp_menu);
   		}
		if (is_front_page())  {
			echo '<section class="block">';
			gpOutput::Get('Extra','Info');
			echo '</section>';
		} ?>
		<nav>	
			<?php 
			$GP_ARRANGE = false;
			gpOutput::Get('TopTwoMenu');
			?>
		</nav>	
			
	</div>
	<?php
		if (is_front_page())  {
			echo '<a href="#content" class="arrow white" style="position:absolute; bottom:30px;left:50%;margin-left:-25px;">&#8595;</a>';
		} ?>
	</div>
	
	<div id="page" class="cf">
		<div id="content" class="wrap grid-container">
			<?php $page->GetContent(); ?>
			<a href="#top" class="arrow grey" style="margin:20px 0 20px 10px;">&#8593;</a>
		</div>
	</div>
	<div class="footer">
		<footer class="wrap cf">
			<section class="col-md-4">
				<?php gpOutput::Get('Extra','Footer'); ?>
			</section>
			<section class="col-md-4">
				<?php
				if (!file_exists($dataDir.'/data/_extra/Footer2.php')){
				gpFiles::SaveFile($dataDir.'/data/_extra/Footer2.php','<h3>Second Footer Area</h3><p>How about some Contact information?<br />Or extra links?</p>'); 
				}
				gpOutput::Get('Extra','Footer2');
				?>
			</section>
			<section class="col-md-4">
				<?php
				if (!file_exists($dataDir.'/data/_extra/Footer3.php')){
				gpFiles::SaveFile($dataDir.'/data/_extra/Footer3.php','<h3>Third Footer Area</h3><p>How about some Contact information?<br />Or extra links?</p>'); 
				}
				gpOutput::Get('Extra','Footer3');
				?>
			</section>
			<p class="footerlinks"><?php gpOutput::GetAdminLink(); ?></p>
		</footer>
	</div>


<script>	
$(window).load(function() {
	$( "button.nav-toggle" ).click(function() {
		$( "nav" ).toggle( "slow" );
	});
	$('a[href^=#]').on('click', function(e){ var href = $(this).attr('href'); 
	$('html, body').animate({ scrollTop:$(href).offset().top },'slow'); 
	e.preventDefault(); });
});

</script>
</body>
</html>
