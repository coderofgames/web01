<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class dashboard extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get("loggedIn");
        if ($logged == false) {
            Session::stop();
            header('location: login');
            exit;
        }
        
        $this->view->js = array('dashboard/js/default.js');
    }

    public function index() {
        $this->view->render("dashboard/index");
    }

    function xhrInsert() {
        echo "CALLED XHRINSERT";
        $this->model->xhrInsert();
    }

    function xhrGetListings() {
        echo "CALLED xhrGetListings";
        $this->model->xhrGetListings();
    }

    function xhrDeleteListing() {
        $this->model->xhrDeleteListing();
    }

}
