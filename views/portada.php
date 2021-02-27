<!DOCTYPE html>
<?php
// se deben indicar que variables son globales para que funcionen las vistas
require_once 'config/globalVariables.php'
?>

<HTML lang="<?php echo $language?>">
	<head>
		<?php
		(TEMPLATE)::head($headContent,$favicons,$linksHead,$externalJavaScript,$faceBookOpenGraph,$twitterCard);
		?>
  
	</head>
	<body>
      <?php

    (TEMPLATE)::nav($navBar,"Portada","#",$logo,$searchForm);

    (TEMPLATE)::carousel($carousel);
	(TEMPLATE)::sectionTitle(['title'=>'About us','content'=>'Lore ipsum']);
	(TEMPLATE)::card($cardPresent);
	(TEMPLATE)::card($cardPresent,false,true);
	(TEMPLATE)::sectionTitle('Our Jobs ','LoreIpsum');
	(TEMPLATE)::cardGroup($cardGroup,2);
	(TEMPLATE)::cardGroup($cardGroup,3);
	(TEMPLATE)::cardGroup($cardGroup,4);

	(TEMPLATE)::footer($footer);

	(TEMPLATE)::makeModal(['id'=>'textCookies','buttons'=>[['type'=>HtmlTags::BUTTON_CLOSE_MODAL,'title'=>'another']]]);
	(TEMPLATE)::makeModal(['id'=>'warningCookies','class'=>HtmlTags::STYLE_MODAL_DIALOG_END.' modal-xl '.HtmlTags::STYLE_NO_BORDER,
	'buttons'=>[['type'=>HtmlTags::BUTTON_CLOSE_MODAL,'title'=>'close'],
				['type'=>HtmlTags::BUTTON_TARGET_MODAL,'target_modal'=>'textCookies','title'=>'cookies']]]);
	echo (TEMPLATE)::linkModal('warningCookies',['type'=>HtmlTags::BUTTON,'title'=>'warning']);

	
	

	

      ?>


	  
  </body>
	
</HTML>
