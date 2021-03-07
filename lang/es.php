<?php


// Variable de configuración de idioma. En este caso el idioma español


$textAccept='aceptar';
$textClose='cerrar';
$data=[HtmlTags::META_CHARSET=>'utf-8','author'=>'author',
        'description'=>['principal'=>'LoreIpsum'],
        'title'=>['principal'=>'LoreIpsum'],
        'facebookOG'=>
        [
            'title'=>['principal'=>'Lore'],
            'description'=>['principal'=>'Ipsum'],
            'author'=>['principal'=>'Color'],
            'imageAlt'=>['principal'=>'Image']
        ],
        'twitterCard'=>
        [
            'title'=>['principal'=>'Lore'],
            'description'=>['principal'=>'Ipsum'],
            'author'=>['principal'=>'Color'],
            'imageAlt'=>['principal'=>'Image']
        ],
        'navBar'=>
        [
            'logo'=>'','title'=>'Portada','searchForm'=>['name'=>'','placeHolder'=>''],/* claves de los nombre de items y subitems*/
            'menu'=>['link'=>'Hyperlink','link2'=>'Hyperlink2','link3'=>'Hyperlink3',
                    'link4'=>
                    ['title'=>'Hyperlink4','sublink'=>
                        ['link1'=>'SubHiperlink1','link2'=>'SubHiperlink2','link3'=>'SubHiperlink3']]
            ]
                   
        ],
        'footer'=>
        [
            'contentFooter'=>['title'=>'','content'=>''],
            'listlink'=>['title'=>'','titleLink1'=>'','titleLink2'=>''/* etc ...*/]
        ],
        'carousel1'=>['title'=>'','content'=>'','imgAlt'=>''],/* Lineas de carousel*/
        'card1'=>['imgAlt'=>'','firstTitle'=>'','text'=>'','secondTitle'=>'','link1'=>'','link2'=>''
        /* Las cards pueden incluir titulos, textos , links , o buttons aquí hay que ir poniendo los títulos de cada uno de ellos*/],
        'sectionTitle'=>['section1'=>['title'=>'','content'=>'']
        /* Titulos de seccion con su contenido*/],

        'warningCookies'=>//Modal Warning Cookies
        [
            'acceptCookies'=>strtoupper($textAccept),
            'moreInfoCookies'=>'+INFO',
            'close'=>strtoupper($textClose)
        ],
        'infoCookies'=>
        [
            'acceptCookies'=>strtoupper($textAccept),
            'close'=>strtoupper($textClose)
        ],
        'cookiesPolicy'=>
        [
            /* Dentro de content las keys irán envueltas emtre {}*/
            'title'=>'Titulo',
            'keys'=>
            ['clave'=>'valor','clave2'=>'valor2'

            ],
            'content'=>['content1 {$clave}','content2 {$clave2}']
        ],
        'legalAdvice'=>
        [
            'title'=>'',
            'keys'=>
            [

            ],
            'content'=>['']
        ],
        'privacyPolicy'=>
        [
            'title'=>'',
            'keys'=>
            [

            ],
            'content'=>['']
        ],
        'language'=>
        [
            ES_LANG=>'español',CAT_LANG=>'catalán',ENG_LANG=>'inglés'
        ]       


    ];