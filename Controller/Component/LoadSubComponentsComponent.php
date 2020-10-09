<?php
App::uses('Component', 'Controller');

/**
 * Class LoadSubComponentsComponent
 * The Componet for is load SubComponents in SubFolders.
 * @author Sergio de EOM Design Group | www.eom.com.ar
 *
 */
class LoadSubComponentsComponent extends Component
{

    /**
     * Load subCompenents in subFolders
     * @param string $path
     * @param string $pre_path
     * @return Component|false
     */
    public function Load($path = '', $pre_path = APP . 'Controller/Component/')
    {
        // Is Empty..?
        if (empty($path) === true) {
            return false;
        }

        // Get name component
        $component_name = substr($path, strripos($path, '/') + 1);

        // Was not loaded..?
        if ($this->_Collection->loaded($component_name) === false) {

            // Get Name SubFolder
            $path_folder = substr($path, 0, strripos($path, '/') + 1);

            // Join Path Full SubFolder
            $load_folder = $pre_path . $path_folder;

            // New set path SubFolder load component
            App::build(array('Controller/Component' => array($load_folder)));
        }

        // Component Load
        return $this->_Collection->load($component_name);
    }

}
