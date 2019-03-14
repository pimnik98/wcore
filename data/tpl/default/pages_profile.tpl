<div id="content">
    <div class=title>[ID:{{user.id}}] {{lang.profile}} {{user.login}}</div>
    <div class=mess>
    {{lang.profile_log}}: {{user.login}}<br>
    {{lang.profile_dolz}}:
    {% if user.prv <= 1 %}{{lang.profile_d_u}}{% endif %}
    {% if user.prv == 2 %}{{lang.profile_d_m}}{% endif %}
    {% if user.prv == 3 %}{{lang.profile_d_a}}{% endif %}
    <br>
    {{lang.profile_bits}}: {{user.bits}} {{lang.bits}}
    </div>
    {% if ank.prv >= 3 %}
    <a href="/modules/admin/users.php?id={{user.id}}" class="link">{{lang.profile_adm_eu}}</a>
    {% endif %}
</div>
