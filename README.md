# Plugin CakePHP 2.x Load SubComponets
Con este componente va a poder crear subdirectorios dentro de tu carpeta Controller/Component/.../ y que sea cargados luego sin la limitacion nativa de CakePHP 2.x respecto a este problema.

**Instalar con composer:**

Edita tu archivo **composer.json** con los siguientes cambios.

```json
"extra": {
        "installer-paths": {
            "app/Plugin/EOM/{$name}/": ["vendor:eom","type:cakephp-plugin"]
        }
    }
 ```

Esto puede variar con su **configuracion de CakePHP 2.x** y donde configuraron la carpeta **vendors** para composer.
En mi caso, se tomo la siguiente estructura, si tiene otra estructura ajueste el path correcto dentro del archivo **composer.json** ``"app/Plugin/EOM/{$name}/": ["vendor:eom","type:cakephp-plugin"]``

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

Despues agregué al final del archivo o juntos a los otros plugins que tenga configurado, la siguiente linea dentro del archivo **app/Config/bootstrap.php**

```php
// Load Plugins
...
...
CakePlugin::load('EOM/PluginCakePHPLoadSubComponets', array('bootstrap' => false, 'routes' => false));
```
