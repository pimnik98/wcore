<div class=title>Регистрация</div>
{% if form.log_in == 0 %}
    {% if form.form_start == 1 %}
        {{form.login}}
    {% else %}
        <div class=mess><form method="POST">
        {{lang.l_log}}:<br>
        <input type="text" name="login"><br>
        {{lang.l_pwd}}:<br>
        <input type="password" name="ps"><br>
        {{lang.l_pwd2}}:<br>
        <input type="password" name="ps2"><br>
        {{lang.email}}:<br>
        <input type="text" name="email"><br>
        {{lang.captha}}:<br>
        <img class="captcha" src = "/modules/captcha.php" width="120" height="40"/><br/>
        <input type="text" name="capcha"><br>
        <input type="submit" name="wcore" value="{{lang.regakk}}"><br>
        </form></div>
        <a class="link" href="/modules/user/login.php">{{lang.inakk}}</a>
    {% endif %}
{% endif %}