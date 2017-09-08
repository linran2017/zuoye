<?php
class Controller{
    protected function display($data){
        include './view/'.CONTROLLER.'/'.ACTION.'.php';
    }
}
?>