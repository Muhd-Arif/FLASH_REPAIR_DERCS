<?php
// Author : Firdaus
/*
   * Base Controller
   * Loads the models
   */
class Controller
{
  // Load model
  public function model($model)
  {
    // Require model file
    require_once '../../../BusinessServiceLayer/model/' . $model . '.php';

    // Instatiate model
    return new $model();
  }
}
