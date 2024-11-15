
{* <script src="{$template}/assets/js/main.js{$lastModify}"></script>
<script src="{$template}/assets/js/cart.js{$lastModify}"></script> *}
<script type="text/javascript">var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;</script>

{strip}
    {if {$assignjs|default:null}}
        {foreach $assignjs as $addAssetScript}
            {$addAssetScript}
        {/foreach}
    {/if}
{/strip}