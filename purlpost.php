<?php
include_once('../../../wp-load.php');
//include_once($_SERVER['DOCUMENT_ROOT'].'/wordpress/wp-load.php' ); ==> Deprecated

$wp_did_header = true;

//Short URL returned from PinnedURL service
$purl=$_GET['bpurl'];

$args = array( 'numberposts' => 1 );
$recent_posts = get_posts( $args );

//Update the most recent post with Short URL
foreach($recent_posts as $post)
    {
		$post->post_content .= "<br /><p><a href=".$purl.">".$purl."</a></p>";
		wp_update_post( $post );		
		//echo $post->post_content; ==> Used for debugging
	}
	?>
		<div id="maindiv" align="left" style="margin-left:auto; margin-right:auto; width:600px; padding:20px; background-color:#F2F2F2; border-width:3px; border-style:outset">
			<div style="width:100%; background:#ffffff;">
				<a href="http://pinnedurl.com" target="_blank"><img src="http://pinnedurl.com/Images/PinBanner_250x70.PNG" alt="PinnedURL.com"title="PinnedURL.com" /></a>
			</div>
			<hr>
			<div id="header" align="center" style="background:#F2F2F2;">
				<h3>A short URL for this Blog Post has been generated.</h3>
				<h4><a href="<?php echo $purl; ?>"><?php echo $purl; ?></a></h4>
				<br />				
			</div>
			<div align="left">
				<b><a href="../../../wp-admin/edit.php"><u>Click here:  Return to your Posts.</u></a></b>	
			</div>
		</div>	
<?php

?>
