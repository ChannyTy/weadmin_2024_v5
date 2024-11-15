{if $pagination|default:null}
    <div class="pagination-block">
        <div class="pagination">
            <ul class="item-list">
                {$pageStartShow = $pagination.curent - 2}
                {$pageEndShow = $pagination.curent + 2}
                {if $pageStartShow < 1}
                    {$pageStartShow = 1}
                {/if}
                {if $pageStartShow - 2 < 0}
                    {$pageEndShow = $pageEndShow + {2 + {$pageStartShow - $pagination.curent}}}
                {/if}
                {if $pageEndShow >= $pagination.totalpage}
                    {$pageEndShow = $pagination.totalpage}
                {/if}
                {if $pagination.total - $pagination.curent < 2}
                    {$startAdd = 2 - {$pagination.totalpage - $pagination.curent}}
                    {$pageStartShow = $pageStartShow - $startAdd}
                {/if}
                {if $pageStartShow < 1}
                    {$pageStartShow = 1}
                {/if}

                {* <li>
                    <a href="#" class="link"><span class="feather icon-chevrons-left"></span></a>
                </li> *}

                {if $pageStartShow > 1}
                    <li>
                        <a href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent-1}"
                            class="link"><span class="feather icon-chevron-left"></a>
                    </li>
                {/if}

                {for $current=$pageStartShow to $pageEndShow}
                    <li class="{if $current == $pagination.curent}active{/if}">
                        <a href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$current}"
                            class="link">{$current}</a>
                    </li>
                {/for}

                {if $pagination.curent+1 < $pagination.totalpage}
                    <li>
                        <a href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent+1}"
                            class="link"><span class="feather icon-chevron-right"></span></a>
                    </li>
                {/if}

                {* <li>
                    <a href="#" class="link"><span class="feather icon-chevrons-right"></span></a>
                </li> *}
            </ul>
        </div>
    </div>
{/if}