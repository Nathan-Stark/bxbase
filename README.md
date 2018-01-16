# changelog
### 0.3.1 ( 16 Января 2018)
   - update: Значени **onlyAdmin** в отладочном классе по умолчанию **true**
   - add: Автозагрузчик классов согласно стандарту PSR-4
    
### 0.2.2 ( 12 Мая 2017)
   - add: Добавлен xdebug
   - update: Для отладочного класса добавалена позможность прописывать стили в виде методов
   - update: Папки ajax и include перенесены в папку шаблона.
   - remove: Удалены константы BASE_TEMPLATE_URL, BASE_INCLUDE_URL
   
### 0.1.5 ( 11 Мая 2017)
   - fix: Мелкие правки
   - update: Обновлен gitignore
   
### 0.1.4 ( 29 Марта 2017 )
   - add: Добавлен путь для установки [slabs-ajaxregistration](https://github.com/Nathan-Stark/slabs-ajaxregistration)
   - add: Добавлен класс отладки **p**
   - add: Добавлен **LOG_FILENAME** в **define.php**
   - remove: Удалена функция отладки **p**
   
### 0.1.3 ( 23 Марта 2017 )
   - add: Добавлен путь для установки [slabs-ajaxmore](https://github.com/Nathan-Stark/slabs-ajaxmore)

### 0.1.2 ( 20 Марта 2017 )
   - remove: vagrant удален, будет отдельной веткой.
   - add: Добавлен путь для установки [slabs-ajaxform](https://github.com/Nathan-Stark/slabs-ajaxform)
   
### 0.1.1 ( 04 Февраля 2017 )
   - add: Добавлена среда разработки [vagr](https://github.com/Nathan-Stark/vagr)
   - fix: Добавлен в зависемости пакет **composer/installers**

### 0.1.0 ( 22 Января 2017 )   
   - add: Добавлена папка **/web/assets/css/**
   - fix: Исправлено имя папки **assets**
   - fix: Исправлены опечатки в файле **header.php**
   - update: Удалена переменная **BASE_TEMPLATE_PATH** в **define.php**
   - update: Добавлена переменная **BASE_INCLUDE_URL** в **define.php**
   - update: Добавлены расширенные пути composer для компонентов и модулей 1C-bitrix.
   - remove: Удалил **frontend/gulpfile.js** в качестве замены, буду использовать CodeKit
   - remove: Удалил папку **frontend/less/**
