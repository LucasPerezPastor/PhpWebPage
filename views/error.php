<!DOCTYPE html>
<HTML lang="<?php echo $GLOBALS['language']?>">
	<head>
		<?php
		(TEMPLATE)::head(HEAD_CONTENT,FAVICONS,LINKS_HEAD,EXTERNAL_JAVA_SCRIPTS,FACEBOOKOPENGRAPH,TWITTER_CARD);
		?>
  
	</head>
	<body>
      <?php

    (TEMPLATE)::nav(NAVBAR,"Enterprise","#",LOGO,SEARCH_FORM);

    (TEMPLATE)::carousel(CAROUSEL);
	(TEMPLATE)::sectionTitle(['title'=>'About us','content'=>'Lore ipsum']);
	(TEMPLATE)::card(CARD_PRESENT);
	(TEMPLATE)::card(CARD_PRESENT,false,true);
	(TEMPLATE)::sectionTitle('Our Jobs ','LoreIpsum');
	(TEMPLATE)::cardGroup(CARD_GROUP,2);
	(TEMPLATE)::cardGroup(CARD_GROUP,3);
	(TEMPLATE)::cardGroup(CARD_GROUP,4);

	(TEMPLATE)::footer(FOOTER);

	(TEMPLATE)::makeModal(['id'=>'textCookies','buttons'=>[['type'=>HtmlTags::BUTTON_CLOSE_MODAL,'title'=>'another']]]);
	(TEMPLATE)::makeModal(['id'=>'warningCookies','class'=>HtmlTags::STYLE_MODAL_DIALOG_END.' modal-xl '.HtmlTags::STYLE_NO_BORDER,
	'buttons'=>[['type'=>HtmlTags::BUTTON_CLOSE_MODAL,'title'=>'close'],
				['type'=>HtmlTags::BUTTON_TARGET_MODAL,'target_modal'=>'textCookies','title'=>'cookies']]]);
	echo (TEMPLATE)::linkModal('warningCookies',['type'=>HtmlTags::BUTTON,'title'=>'warning']);

	
	

	

      ?>


	  
  </body>
	
</HTML>
