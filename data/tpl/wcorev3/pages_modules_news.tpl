<div id="content">
{% for mm in news %}
    <div newsid="{{mm.id}}">
        <div class=title>{{mm.title}} ({{mm.time}})</div>
        <div class=mess>{% autoescape false %}{{mm.msg}}{% endautoescape %}<br>
        {{lang.added}}: <a href="/modules/user/profile.php?id={{mm.who.id}}" class="acc">{{mm.who.login}}</a>
        </div>
    </div>
{% endfor %}
</div>
