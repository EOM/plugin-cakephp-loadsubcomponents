# Plugin for CakePHP 2.x is for Load SubComponents
Con este componente va a poder crear subdirectorios dentro de tu carpeta Controller/Component/.../ y que sean cargados luego sin la limitacion nativa de CakePHP 2.x respecto a este problema.

**1. Instalar con composer:**

Edita tu archivo **composer.json** con los siguientes cambios.

```txt
  "extra": {
        "installer-paths": {
            "app/Plugin/EOM/{$name}/": ["vendor:eom","type:cakephp-plugin"],
            "app/Plugin/{$name}/": ["type:cakephp-plugin"]
        }
    }
 ```

Esto puede variar con su **configuracion de CakePHP 2.x** y donde configuraron la carpeta **vendors** para composer.
En mi caso, se tomo la siguiente estructura, si tiene otra estructura ajueste el path correcto dentro del archivo **composer.json** ``"app/Plugin/EOM/{$name}/": ["vendor:eom","type:cakephp-plugin"]``

**Path Tree:**

```bash
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

**2. Configurar bootstrap.php para cargar el plugin**

Despues agregué al final del archivo o juntos a los otros plugins que tenga configurado, la siguiente linea dentro del archivo **app/Config/bootstrap.php**

```php
    // Load Plugins ...
    CakePlugin::load('EOM/LoadSubComponents', array('bootstrap' => false, 'routes' => false));
```

**3. Configurar el component de forma global en el AppController**

Como configurar el componente para todo el sistema y cargar otro componentes en una subcarpeta

```php
    /**
     * Application Controller
     * @property LoadSubComponentsComponent $LoadSubComponents
     */
    class AppController extends Controller {
    
        public $components = ['EOM/LoadSubComponents.LoadSubComponents'];
    }
```

**4. Utilizarlos en un controller cualquier que hereda de AppController**

Ejemplo de como utilizar el LoadSubComponents en beforeFilter o una accion.

```php
    /**
     * MiDemo Controller
     * @property MiFunctionDemo1Component $MiFunctionDemo1
     * @property MiFunctionDemo2Component $MiFunctionDemo2
     * @property MiFunctionDemo3Component $MiFunctionDemo3
     */
    class MiDemoController extends AppController {
    
        public function beforeFilter()
        {
                parent::beforeFilter();

                // Load path Controller/Component/SubDirectorios/TestDemoComponent.php
                $this->TestDemo = $this->LoadSubComponents->Load('SubDirectorios/TestDemo');

                // Load path Controller/Component/SubDirectorioX/MiFunctionDemo1Component.php
                $this->MiFunctionDemo1 = $this->LoadSubComponents->load('SubDirectorioX/MiFunctionDemo1');
                $this->MiFunctionDemo3 = $this->LoadSubComponents->load('SubDirectorio/SubX/MiFunctionDemo3');
    
                // Demo1 de como utilizarla
                $this->MiFunctionDemo1->MiAccion1('Demo');
                $this->MiFunctionDemo1->MiAccion2('Demo');
        }

        public function index(){

            // TestDemo de como utilizarla
            echo $this->TestDemo->hello('Hi EOM !!!');

            // Load path Controller/Component/SubDirectorioX/MiFunctionDemo2Component.php
            $this->MiFunctionDemo2 = $this->LoadSubComponents->load('SubDirectorioX/MiFunctionDemo2');
            
            // Demo2 de como utilizarla
            $this->MiFunctionDemo2->MiAccion1('DemoIndexBla');

            // Reutilizar Demo1 load en el __construct
            $this->MiFunctionDemo1->MiAccion101('DemoIndexBlaBla..');

            // Utilizar Demo3 load en el __construct
            $this->MiFunctionDemo3->MiAccionDemoBla('DemoIndexBlaBla..');
        }

        // ...

    }
```
