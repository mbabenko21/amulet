{literal}
    <script type="text/javascript">
        <!--
        function showMenu(id) {
            var menus = document.getElementsByClassName('player-menu');
            for (var i = 0; i < menus.length; i++) {
                menus[i].classList.add("hidden");
            }
            var menu = document.getElementById('player-' + id + '-menu');
            menu.classList.remove('hidden');
        }

        function hideMenu(id) {
            var menu = document.getElementById('player-' + id + '-menu');
            menu.classList.add('hidden');
        }

        function playerMenuInit(id) {
            var hiddenMenu = document.getElementById('player-' + id + '-menu').classList.contains('hidden');
            if (hiddenMenu) {
                showMenu(id);
            } else {
                hideMenu(id);
            }
        }

        function target(id) {
            document.getElementById('target-goal').innerHTML = document.getElementById(id).innerHTML;
            document.getElementById('target-goal').classList.remove('hidden');
            return;
        }
        function untarget(id) {
            document.getElementById('target-goal').innerHTML = "";
            document.getElementById('target-goal').classList.add('hidden');
            document.getElementById('player-' + id).onclick = function () {
                playerMenuInit(id);
            }
        }
        function objectInfoInit(id) {
            var menu = document.getElementById('object-menu-' + id);
            if (menu.classList.contains('hidden') == true) {
                var menus = document.getElementsByClassName("object___menu");
                var links = document.getElementsByClassName("object___menu-link");
                for(var i = 0; i < menus.length; i++){
                    menus[i].classList.add('hidden');
                    links[i].innerHTML = "?";
                }
                menu.classList.remove('hidden');
                document.getElementById('object-menu-link-' + id).innerHTML = "^";
            } else {
                menu.classList.add('hidden');
                document.getElementById('object-menu-link-' + id).innerHTML = "?";
            }
        }

        function replaceGpsLinkText()
        {
            if(document.getElementById('player-gpc-menu').classList.contains('hidden')){
                document.getElementById('player-gpc-menu-link').innerHTML = "поиск пути";
            } else {
                document.getElementById('player-gpc-menu-link').innerHTML = "скрыть ^";
            }
        }
        // -->
    </script>
{/literal}