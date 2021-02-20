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

	

      ?>
  </body>
	
</HTML>
