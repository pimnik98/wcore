<div class="nav">
{% for mm in nav %}
{% if mm.code == 1 %}
        <a class="nav_link" code="{{mm.code}}" href="{{mm.href}}"><<</a>
    {% elseif mm.code == 2 %}
        <a class="nav_link nav_select" code="{{mm.code}}" href="{{mm.href}}">{{mm.page}}</a>
    {% elseif mm.code == 3 %}
        <a class="nav_link" code="{{mm.code}}" href="{{mm.href}}">{{mm.page}}</a>
    {% elseif mm.code == 4 %}
        <a class="nav_link nav_select" code="{{mm.code}}" href="{{mm.href}}">{{mm.page}}</a>
    {% elseif mm.code == 5 %}
        <a class="nav_link" code="{{mm.code}}" href="{{mm.href}}">>></a>
    {% endif %}
{% endfor %}
</div>