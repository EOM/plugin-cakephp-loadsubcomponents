<?php
App::uses('Component', 'Controller');

class HolaComponent extends Component {

    public function hola($mundo) {
        return 'Hola '.$mundo;
    }

}
