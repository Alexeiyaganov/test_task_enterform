(function(){
    var body = document.getElementsByTagName('body')[0];

    var switcherRU = document.getElementById('switcher-ru');
    var switcherEN = document.getElementById('switcher-en');

    // Заранее считаем срок хранения кук
    var expires = new Date();
    expires.setDate(expires.getDate() + 366);
    expires.toUTCString();

    // Русский и английский заголовки
    var titleRU = document.getElementById('title-ru');
    var titleEN = document.getElementById('title-en');
    var title = {
        ru: titleRU.getAttribute('content'),
        en: titleEN.getAttribute('content')
    }

    var switchLang = function() {
        var lang = this.id
        lang = lang.replace('switcher-', '');

        // Меняем класс для BODY
        body.className = lang;

        // Записываем куки
        document.cookie = [
            'lang=' + lang
            ,'; expires=' + expires // используем expires, max-age не поддерживается в ИЕ
            ,'; path=/'
            ,'; domain=' + document.location.host
        ].join('');
        document.title = title[lang];
    }

    switcherRU.onclick = switchLang;
    switcherEN.onclick = switchLang;
})();
