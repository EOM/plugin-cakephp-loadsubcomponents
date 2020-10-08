# PluginCakePHPLoadSubComponets
Plugin CakePHP 2.x Load SubComponets

**Instalar con composer**
Modificar el archivo **composer.json** con los siguientes cambios.

`"extra": {
        "installer-paths": {
            "app/Plugin/EOM/{$name}/": ["vendor:eom","type:cakephp-plugin"]
        }
    }`

Esto puede variar con su **configuracion de CakePHP 2.x** y donde configuraron la carpeta **vendors** en composer.
El ejemplo se tomo con esta estructura.

Path Tree:
`-> app `
`-> -> Plugin`
`-> -> -> EOM`
`-> -> -> -> LoadSubComponents`
`-> vendors`
`-> -> bin`
`-> -> etc..`

