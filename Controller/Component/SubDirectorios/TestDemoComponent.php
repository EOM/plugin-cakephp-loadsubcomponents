<?php
App::uses('Component', 'Controller');

/**
 * Class TestDemoComponent
 * Component for easy test
 * @author Sergio de EOM Design Group | www.eom.com.ar
 */
class TestDemoComponent extends Component {

    public function hello($word) {
        return 'Hello '.$word;
    }

}
