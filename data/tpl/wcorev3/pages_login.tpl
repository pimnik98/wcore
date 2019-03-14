<div class=title>{{lang.inakk}}</div>
{% if form.log_in == 0 %}
    {% if form.form_start == 1 %}
        {{form.login}}
    {% else %}
        <div class=mess><form method="POST">
        {{lang.l_log}}:<br>
        <input type="text" name="login"><br>
        {{lang.l_pwd}}:<br>
        <input type="password" name="ps"><br>
        <input type="submit" name="wcore" value="{{lang.enter}}"><br>
        </form></div>
        <a class="link" href="/modules/user/reg.php">{{lang.noacc}}</a>
    {% endif %}
{% endif %}