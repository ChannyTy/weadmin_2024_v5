<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class breadcrumb {

    public $page;
    public $list;

    function add($array) {
        $this->list[] = $array;
    }
    function respon(){
         return $this->list;
    }

}
