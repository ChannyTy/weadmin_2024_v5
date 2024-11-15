
<!DOCTYPE html>
<html lang="{$langon}">
<head>
{include file="{$incfile.metatag}" title=title}
</head>
<body>
{include file="{$incfile.preloader}" title=title}
<div class="global-container">
{include file="{$fileInclude|templateInclude:$settemplate}" title=pageContent}
</div>
{include file="{$incfile.loadscript}" title=title}
</body>
</html>