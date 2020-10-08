<?php
App::uses('Component', 'Controller');

class HolaComponent extends Component {

    public $components = array();
    public $settings = array();
    public $controller = null;

//    public function __construct(ComponentCollection $collection, $settings = array()) {
//        parent::__construct($collection, $settings);
//        $this->controller = $collection->getController();
//    }

//    public function startup(Controller $controller) {
//        parent::startup($controller);
//    }
//
//    public function beforeRender(Controller $controller) {
//        parent::beforeRender($controller);
//    }
//
//    public function beforeRedirect(Controller $controller, $url, $status = NULL, $exit = true) {
//        parent::beforeRedirect($controller, $url, $status, $exit);
//    }
//
//    public function shutDown(Controller $controller) {
//        parent::shutdown($controller);
//    }

    public function hola($mundo) {
        return 'Hola '.$mundo;
    }

}
