<base href="{$base}">
<title>{$seo.title|default:$settingWeb.metatitle}</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="keywords" content="{$seo.keyword|default:$settingWeb.keywords}">
<meta name="description" content="{$seo.desc|default:$settingWeb.description}">
<meta name="author" content="">
<meta name="HandheldFriendly" content="true">
<meta name="format-detection" content="telephone=no">

{assign  var=valLinkImgSeo value="{$base}{$template}/assets/img/static/brand.png"}
<meta property="og:type" content="website">
<meta property="og:url" content="">
<meta property="og:title" content="{$valSeoTitle|default:$settingWeb.metatitle}">
<meta property="og:description" content="{$valSeoDescription|default:$settingWeb.description}">
<meta property="og:image" content="{$valSeoImages|default:$valLinkImgSeo}">
<meta property="og:site_name" content="">
<meta property="og:locale" content="">
<meta property="og:locale:alternate" content="">

{* <link rel="apple-touch-icon" sizes="180x180" href="{$template}/assets/favicon//apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="{$template}/assets/favicon//favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="{$template}/assets/favicon//favicon-16x16.png">
<link rel="manifest" href="{$template}/assets/favicon//site.webmanifest">
<link rel="mask-icon" href="{$template}/assets/favicon//safari-pinned-tab.svg" color="#ffffff">
<meta name="msapplication-TileColor" content="#0f6939">
<meta name="theme-color" content="#ffffff"> *}

{strip}
    {if {$assigncss|default:null}}
        {foreach $assigncss as $addAssetCss}
            {$addAssetCss}
        {/foreach}
    {/if}
{/strip}