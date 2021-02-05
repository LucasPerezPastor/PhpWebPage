<?php
class Basic{

    
  

    //  pone el HEAD de la página HTML
    
     public static function head(string $charset='',$viewPort='',string  $contentHead='',
                                  string $icons='',string $links='',string $javaScripts='',
                                  string $facebookOpenGraph='', string $twitterCard=''){
          
          if (!empty($charset)){echo $charset;};
          if (!empty($viewPort)){echo $viewPort;};
          if (!empty($contentHead)){echo $contentHead;};
          if (!empty($facebookOpenGraph)){echo $facebookOpenGraph;};
          if (!empty($twitterCard)){echo $twitterCard;};
          if (!empty($icons)){echo $icons;};
          if (!empty($links)){echo $links;};
          if (!empty($javaScripts)){echo $javaScripts;};
      
  }



    //Creacion del NAV de la página web

    public static function nav($listNav=NULL,$img=NULL,string $title=''){

      if (is_a($listNav,"Lista")){
        $listNav=new Lista(Lista::UNORDERED,"navbar",'','',"class=navbar-nav me-auto mb-2 mb-md-0");
        $item1=new Lista(Lista::ARTICLE,"item1",'','',"class=nav-item active");
        $item1->addArticle(new HyperLink("hyperlinkItem1","Home","#",'class="nav-link" aria-current="page"'));
        $item2=new Lista(Lista::ARTICLE,"item2",'','',"class=nav-item active");
        $item2->addArticle(new HyperLink("hyperlinkItem2","Link","#",'class="nav-link"'));
        $item3=new Lista(Lista::ARTICLE,"item3",'','',"class=nav-item active");
        $item3->addArticle(new HyperLink("hyperlinkItem3","Disabled","#",'class="nav-link disabled" tabindex="-1" aria-disabled="true"'));
        $item4=new Lista(Lista::ARTICLE,"item4",'','',"class=nav-item dropdown");
        $item4->addArticle(new HyperLink("hyperlinkItem4DropDowm","Disabled","#",'class="nav-link dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"'));
        $dropdown1=new Lista(Lista::UNORDERED,"Dropdowm1",'','','class="dropdown-menu" aria-labelledby="dropdown01"');
        $itemDropDowm=new Lista(Lista::ARTICLE,'Item1DropDown1');
        $itemDropDowm->addArticle(new HyperLink('HyperLinkItem1DropDown1','Action','#','class="dropdown-item"'));
        $dropdown1->addArticle($itemDropDowm);
        $item4->addArticle($itemDropDowm);
        $listNav->addArticle($item1);
        $listNav->addArticle($item2);
        $listNav->addArticle($item3);
        $listNav->addArticle($item4);

       
        
        ?>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
              <div class="container-fluid">
                  <a class="navbar-brand" href="#">Navbar</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                      <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item active">
                          <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                          <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                          </ul>
                        </li>
                      </ul>
                      <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                    </div>
                </div>
            </nav>
        <?php
      };
    }
}