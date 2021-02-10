<?php 

class Link{
    const LINK_STYLESHEET="stylesheet";
    const LINK_CANONICAL="canonical";
    const LINK_AMPHTML=" amphtml";
    const LINK_MANIFEST="manifest";
    const LINK_AUTHOR="author";
    const LINK_LICENSE="license";
    const LINK_ALTERNATE="alternate";
    const LINK_ME="me";
    const LINK_ARCHIVES="archives";
    const LINK_INDEX="index";
    const LINK_SELF_REL="self";
    const LINK_FIRST="first";
    const LINK_LAST="last";
    const LINK_PREV="prev";
    const LINK_NEXT="next";
    const LINK_EDITURI="EditURI";
    const LINK_PINGBACK="pingback";
    const LINK_WEBMENTION="webmention";
    const LINK_MICROPUB="micropub";
    const LINK_SEARCH="search";
    const LINK_DNS_PREFETCH="dns-prefetch";
    const LINK_PRECONNECT="preconnect";
    const LINK_PREFETCH="prefetch";
    const LINK_PRERENDER="prerender";
    const LINK_PRELOAD="preload";

    public $rel='',$src='',$asTo='',$type='',$title='';

    public function __construct($rel='',$src='',$type='',$title='',$asTo='')
    {
        $this->rel=$rel;
        $this->src=$src;
        $this->type=$type;
        $this->asTo=$asTo;
        $this->title=$title;
    }
}