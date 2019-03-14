<div id="content">
    <div class=title>{{lang.admin_eusers}}</div>
    {% if userq == 0 %}
        <div class="mess"><form method="GET">
        {{lang.adm_eu_t1}}:<br>
        <input type="number" name="id"><br>
        <button>{{lang.adm_eu_t2}}</button>
        </form></div>
    {% else %}
        <div class="mess"><form method="POST">
        <input type="hidden" value="{{crfs}}" name="csrf">
        {{lang.profile_log}}: {{user.login}}<br>
        {{lang.profile_dolz}}:<br> <select name="dolz">
        <option value=1 {% if select.prv == 'u' %}selected="selected"{% endif %}>{{lang.profile_d_u}}</option>
        <option value=2 {% if select.prv == 'm' %}selected="selected"{% endif %}>{{lang.profile_d_m}}</option>
        <option value=3 {% if select.prv == 'a' %}selected="selected"{% endif %}>{{lang.profile_d_a}}</option>
        </select><br>
        {{lang.profile_bits}}:<br>
        <input type="text" name="bits" value="{{user.bits}}"> {{lang.bits}}<br>
        <input type="submit" name="ok" value="{{lang.w_save}}">
        </form></div>
    {% endif %}
</div>