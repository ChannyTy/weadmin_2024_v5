

{if $fileInclude|default:null}
   {include file="{$fileInclude|templateInclude:$settemplate}" title=pageContent}
{/if}

{* {if $footerinc}
{include file="$footerinc" title=title}
{/if} *}