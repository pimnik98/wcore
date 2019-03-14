<div id="content">
    <div class=title>{{lang.lcab}}</div>
    <div class=mess>{{lang.cab_hi}} {{user.login}}!</div>
    <div class=title>{{lang.w_menu}}</div>
    <a href="/modules/user/profile.php?id={{user.id}}" class="link">{{lang.cab_profile}}</a>
    {% if user.prv > 1 %}
    <a href="/modules/admin/config_core.php" class="link">{{lang.admin_concore}}</a>
    <a href="/modules/admin/users.php" class="link">{{lang.admin_eusers}}</a>
    <a href="/modules/admin/news.php" class="link">{{lang.admin_news}}</a>
    {% endif %}
    <a href="/modules/user/exit.php" class="link">{{lang.cab_exit}}</a>
</div>
