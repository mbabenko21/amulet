{literal}
    <script type="text/javascript">
        <!--
        function hideJournal() {
            document.getElementById('journal').classList.add('hidden');
            document.getElementById('link-journal').innerHTML = "показать журнал";
            document.getElementById('journal-shown').innerHTML = 0;
            return false;
        }

        function showJournal() {
            document.getElementById('journal').classList.remove('hidden');
            document.getElementById('link-journal').innerHTML = "скрыть журнал";
            document.getElementById('journal-shown').innerHTML = 1;
            return false;
        }

        function initJournalLink() {
            var hidden = document.getElementById('journal').classList.contains('hidden');
            if (hidden == true) {
                showJournal();
            } else {
                hideJournal();
            }
            return false;
        }
        // -->
    </script>
{/literal}
<div id="journal-shown" class="hidden">{$player->getPlayerOptions()->getDisplayJournal()}</div>
<div class="journal" id="journal">
    {foreach from=$player->getCharOptions()->getJournal() item=message}
        <span class="journal_message">{$message.message}</span>
    {/foreach}
</div>
{if count($player->getCharOptions()->getJournal()) > 0}
    <div class="upper">
        <a id="link-journal" href="#" onclick="javascript: initJournalLink(); return;">скрыть журнал</a>
    </div>
{/if}

