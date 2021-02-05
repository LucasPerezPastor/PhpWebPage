<!DOCTYPE html>
<HTML lang="<?php echo $GLOBALS['language']?>">
	<head>
		<?php
		(TEMPLATE)::head(CHARSET,VIEWPORT,CONTENT_HEAD,LIST_ICONS,LINKS,EXTERNAL_JAVASCRIPT,FACEBOOK_OPENGRAPH,TWITTER_CARD);
		?>
	</head>
	<body>
      <?php

    $listNav=new Lista(Lista::UNORDERED,"navbar",'','','class="navbar-nav me-auto mb-2 mb-md-0"');

    $item1=new Lista(Lista::ARTICLE,"item1",'','','class="nav-item active"');
    $item1->addArticle(new HyperLink("hyperlinkItem1","Home","#",'class="nav-link" aria-current="page"'));
    $item2=new Lista(Lista::ARTICLE,"item2",'','','class="nav-item active"');
    $item2->addArticle(new HyperLink("hyperlinkItem2","Link","#",'class="nav-link"'));
    $item3=new Lista(Lista::ARTICLE,"item3",'','','class="nav-item active"');
    $item3->addArticle(new HyperLink("hyperlinkItem3","Disabled","#",'class="nav-link disabled" tabindex="-1" aria-disabled="true"'));

    $item4=new Lista(Lista::ARTICLE,"item4",'','','class="nav-item dropdown"');
    $item4->addArticle(new HyperLink("hyperlinkItem4DropDowm","Disabled","#",'class="nav-link dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"'));
    $dropdown1=new Lista(Lista::UNORDERED,"Dropdowm1",'','','class="dropdown-menu" aria-labelledby="dropdown01"');
    $itemDropDowm=new Lista(Lista::ARTICLE,'Item1DropDown1');
    $itemDropDowm->addArticle(new HyperLink('HyperLinkItem1DropDown1','Action','#','class="dropdown-item"'));
    $dropdown1->addArticle($itemDropDowm);
    $item4->addArticle($dropdown1);
    $listNav->addArticle($item1);
    $listNav->addArticle($item2);
    $listNav->addArticle($item3);
    $listNav->addArticle($item4);

    echo $listNav;



      ?>
  </body>
	
</HTML>
