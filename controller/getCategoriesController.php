<?php

require_once('../model/Model.php');
require_once('../model/Category.php');
require_once('Controller.php');


class getCategoriesController extends Controller{
  public function getCategories(){
      $category = new Category();
      $category->listCategories();
    }
}


$getCategories = new getCategoriesController ();
$getCategories -> getCategories();
