<!DOCTYPE html>
<?php

?>

<HTML lang="<?php echo $language?>">
	<head>
		<?php
		(TEMPLATE)::head($headContent,$favicons,$linksHead,$externalJavaScript,$faceBookOpenGraph,$twitterCard);
		?>
  
	</head>
	<body>
	<?php
	
    (TEMPLATE)::nav($navBar,"Portada","#",$logo,$languages,);//$searchForm);

	

    (TEMPLATE)::carousel($carousel);
	
	(TEMPLATE)::sectionTitle(['title'=>'About us','content'=>'Lore ipsum']);
	
	(TEMPLATE)::card($cardPresent);
	
	(TEMPLATE)::card($cardPresent,false,true);
	(TEMPLATE)::sectionTitle('Our Jobs ','LoreIpsum');
	(TEMPLATE)::cardGroup($cardGroup,2);
	(TEMPLATE)::cardGroup($cardGroup,3);
	(TEMPLATE)::cardGroup($cardGroup,4);

	(TEMPLATE)::footer($footer);

	(TEMPLATE)::makeModal($infoCookies);
	(TEMPLATE)::makeModal($warningCookies);
	//echo (TEMPLATE)::linkModal('warningCookies',['type'=>HtmlTags::BUTTON,'title'=>'warning']);
	
    ?>


	  
  </body>
	
</HTML>
