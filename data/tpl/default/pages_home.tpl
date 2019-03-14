<div id="content">
    {% if news.created > 0 %}
    <div id="news">
        <div class=title>{{news.title}} ({{news.time}})</div>
        <div class=mess>{% autoescape false %}{{news.msg}}{% endautoescape %}<br>
        {{lang.added}}: <a href="/modules/user/profile.php?id={{news.who.id}}" class="acc">{{news.who.login}}</a>
        </div>
    {% endif %}
    </div>
    <div id="mmenu">
        {% for mm in main %}
        <a href="{{mm.link}}" class="link"><img src="/data/drive/icon/{{mm.icon}}" alt="{{mm.icon}}"/> {{mm.name}} {% if mm.count != 'n/a' %}({{mm.count}}){% endif %}</a>
        {% endfor %}
    </div>
</div>
