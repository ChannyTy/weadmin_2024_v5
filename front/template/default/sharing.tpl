{* <div class="social share-content">
    <ul class="item-list">
        <li>
            <a href="http://www.facebook.com/sharer.php?u={$fullurl}&t={$valSeoTitle}" target="_blank" class="link">
                <i class="fab fa-facebook-f"></i>Facebook
            </a>
        </li>
        <li>
            <a href="https://twitter.com/intent/tweet?text={$valSeoTitle}&url={$fullurl}&hashtags=Third500" target="_blank" class="link">
                <i class="fab fa-twitter"></i>Twitter
            </a>
        </li>
        <li>
            <a href="https://plus.google.com/share?url={$fullurl}&hl=en" target="_blank" class="link">
                <i class="fab fa-google-plus-g"></i>Google +
            </a>
        </li>
        <li>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url={$fullurl}&title={$valSeoTitle}&source=Third500" target="_blank" class="link">
                <i class="fab fa-linkedin-in"></i>Linkedin
            </a>
        </li>
        <li>
            <a href="http://pinterest.com/pin/create/bookmarklet/?url={$fullurl}&is_video=false&description={$valSeoTitle}&media={$valSeoImages}" target="_blank" class="link">
                <i class="fab fa-pinterest"></i>Pintertest
            </a>
        </li>
    </ul>
</div> *}

<div class="share dropleft">
    <a href="javascript:void(0);" class="link" data-toggle="dropdown">
        <img src="{$template}/assets/img/icon/share.png" alt="">
    </a>
    <div class="dropdown-menu">
        <ul class="item-list">
            <li>
                <a href="http://www.facebook.com/sharer.php?u={$fullurl}&t={$valSeoTitle}" target="_blank" class="link">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="https://twitter.com/intent/tweet?text={$valSeoTitle}&url={$fullurl}&hashtags=" target="_blank" class="link">
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="https://plus.google.com/share?url={$fullurl}&hl=en" target="_blank" class="link">
                    <i class="fab fa-google-plus-g" aria-hidden="true"></i>
                </a>
            </li>
        </ul>
    </div>
</div>