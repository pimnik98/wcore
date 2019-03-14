<div id="content">
    <div class=title>{{lang.title_adm_core_1}}</div>
    <div class=mess>
    <b>{{lang.wcore_site_name}}:</b> {{wcore.site_name}}<br>
    <b>{{lang.wcore_site_opis}}:</b> {{wcore.site_opis}}<br>
    <b>{{lang.wcore_site_key}}:</b> {{wcore.site_key}}<br></div>
    
    <div class=title>{{lang.title_adm_core_2}}</div>
    <div class=mess><b>{{lang.wcore_ver}}:</b> {{wcore.ver}}<br>
    <b>{{lang.wcore_timezone}}:</b> {{wcore.timezone}}<br>
    <b>{{lang.wcore_debug}}:</b> {% if wcore.debug == 0 %} Выключен {% else %} Включен {% endif %}<br>
    <b>{{lang.wcore_ROOT}}:</b> {{wcore.ROOT}}<br>
    <b>{{lang.wcore_lang}}:</b> {{wcore.lang}}<br>
    <b>{{lang.wcore_syslang}}:</b>  {% if wcore.syslang == 0 %} Нет {% else %} Да {% endif %}<br>
    <b>{{lang.wcore_apache}}:</b>  {% if wcore.apache == 0 %} Нет {% else %} Да {% endif %}<br></div>
    
    <div class=title>{{lang.title_adm_core_3}}</div>
    <div class=mess><b>{{lang.wcore_twig_power}}:</b> {% if wcore.twig_power == 0 %} Выключен {% else %} Включен {% endif %}<br>
    <b>{{lang.wcore_twig_path}}:</b> {{wcore.twig_path}}<br>
    <b>{{lang.wcore_twig_reload}}:</b> {% if wcore.twig_reload == 0 %} Нет {% else %} Да {% endif %}<br>
    <b>{{lang.wcore_twig_tpl}}:</b> {{wcore.twig_tpl}}<br>
    <b>{{lang.wcore_twig_systpl}}:</b> {% if wcore.twig_systpl == 0 %} Нет {% else %} Да {% endif %}<br></div>

    <div class=title>{{lang.title_adm_core_4}}</div>
    <div class=mess><b>{{lang.theme_name}}:</b> {{theme.name}}<br>
    <b>{{lang.theme_opis}}:</b> {{theme.opis}}<br>
    <b>{{lang.theme_autor}}:</b> {{theme.autor}}<br></div>
    <a href="{{theme.url}}" class="link">{{lang.theme_url}}</a>
    
    <div class=title>{{lang.title_adm_core_5}}</div>
    <div class=mess><b>{{lang.php_t1}}:</b> {{php.HTTP_HOST}}<br>
    <b>{{lang.php_t2}}:</b> {{php.HTTP_ACCEPT_ENCODING}}<br>
    <b>{{lang.php_t3}}:</b> {{php.PATH}}<br>
    <b>{{lang.php_t4}}:</b> {{php.SERVER_SOFTWARE}}<br>
    <b>{{lang.php_t5}}:</b> {{php.SERVER_ADDR}}<br>
    <b>{{lang.php_t6}}:</b> {{php.GATEWAY_INTERFACE}} | {{php.SERVER_PROTOCOL}}<br>

    
    </div>
</div>
