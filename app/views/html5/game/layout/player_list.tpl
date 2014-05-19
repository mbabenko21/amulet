{literal}
    <script type="text/javascript">
        <!--
        function targetPlayer(id){
            hideMenu(id);
            target('player-target-'+id);
            document.getElementById('player-'+id).onclick = function(){
                return false;
            }
        }
        // -->
    </script>
{/literal}
<div class="player-list">
    <ul class="list" id="game-player-list">
    {foreach from=$player_list item=playerItem}
        {if $playerItem->getId() != $player->getId()}
            <li>{include "game/layout/player.tpl" player=$playerItem}</li>
        {/if}
    {/foreach}
    </ul>
</div>