# PluginCakePHPLoadSubComponets
Plugin CakePHP 2.x Load SubComponets

**Instalar con composer:**

Modificar tu archivo **composer.json** con los siguientes cambios.

```json
"extra": {
        "installer-paths": {
            "app/Plugin/EOM/{$name}/": ["vendor:eom","type:cakephp-plugin"]
        }
    }
 ```

Esto puede variar con su **configuracion de CakePHP 2.x** y donde configuraron la carpeta **vendors** con composer.
En mi caso, el ejemplo se tomo con esta estructura, si tiene otra estructura ajueste el path correcto dentro del composer.json ``"app/Plugin/EOM/{$name}/": ["vendor:eom","type:cakephp-plugin"]``

**Path Tree:**

```json
|-> app 
| |-> Plugin
|   |-> ...
|   |-> EOM
|      |-> LoadSubComponents
|   |-> ...
|-> vendors
| |-> bin
| |-> composer
| |-> ...
| |-> autoload.php
```

Despues agregar al final del archivo o juntos a otros plugins la siguiente linea dentro del archivo **app/Config/bootstrap.php**

```php
// Load Plugins
...
...
CakePlugin::load('EOM/PluginCakePHPLoadSubComponets', array('bootstrap' => false, 'routes' => false));
```
