<div id="content">
    {% if act == 'delall' %}
        <div class=title>{{lang.adm_news_delall}}</div>
        <div class=mess><form method="POST">
            <input type="hidden" value="{{csrf}}" name="csrf">
            {{lang.adm_news_delall_c}}<br>
            <input type="submit" name="ok" value="{{lang.w_next}}">
        </form></div><a href="?" class="link">{{lang.back}}</a>
    {% elseif act == 'del' %}
        <div class=title>{{lang.adm_news_del}}</div>
        <div class=mess><form method="POST">
            <input type="hidden" value="{{csrf}}" name="csrf">
            {{lang.adm_news_del_msg}}<br>
            <div style="background: #ededef;padding: 12px;">{{news.txt}}</div>
            <input type="submit" name="ok" value="{{lang.w_next}}">
        </form></div><a href="?" class="link">{{lang.back}}</a>
    {% elseif act == 'create' %}
        <div class=title>Добавление новости</div>
        <div class=mess><form method="POST">
         <input type="hidden" value="{{csrf}}" name="csrf">
         {{lang.adm_news_t3}}: <br>
         <input type="text" name="name" value=""><br>
         {{lang.adm_news_t4}}:<br>
         <div class="bbcode">
            <script src="/data/js/bbcode.js"></script>
            <a href="javascript:bb_b('ta_msg');" title="B">B</a> 
            <a href="javascript:bb_u('ta_msg');" title="U">U</a> 
            <a href="javascript:bb_i('ta_msg');" title="i">I</a> 
            <a href="javascript:bb_q('ta_msg');" title="q">Q</a> 
            <a href="javascript:bb_url('ta_msg');" title="url">URL</a> 
            <a href="javascript:bb_color('ta_msg');" title="color">Color</a> 
         </div>
         <textarea name="text" id="ta_msg"></textarea><br>
         {{lang.captha}}:<br>
         <img class="captcha" src = "/modules/captcha.php" width="120" height="40"/><br/>
         <input type="text" name="capcha"><br>
         <input type="submit" name="ok" value="{{lang.W_create}}">
        </form></div>
        <a href="?" class="link">{{lang.back}}</a>
    {% else %}
        {% for mm in news %}
        <div newsid="{{mm.id}}">
           <div class=title>{{mm.title}} ({{mm.time}})</div>
           <div class=mess>{% autoescape false %}{{mm.msg}}{% endautoescape %}<br>
           {{lang.added}}: <a href="/modules/user/profile.php?id={{mm.who.id}}" class="acc">{{mm.who.login}}</a><hr>
           [<a href="/modules/admin/news.php?id={{mm.id}}&act=del">{{lang.adm_news_t1}}</a>]
           </div>
        </div>
        {% endfor %}
        <div class="title">{{lang.act}}</div>
        <a href="?act=create" class="link">{{lang.adm_news_created}}</a>
        <a href="?act=delall" class="link">{{lang.adm_news_delall}}</a>
    {% endif %}
</div>