<?php

  class Router {

    public static function route($url) {
      $controllerName = 'Home';
      $actionName = 'index';
      $controller = 'HomeController';
      $action = 'indexAction';
      $params = [];

      if(isset($url[0]) && $url[0] != '') {
        $controllerName = ucwords($url[0]);
        $controller = $controllerName . 'Controller';

      }

      array_shift($url);
      if(isset($url[0]) && $url[0] != '') {
        $actionName = $url[0];
        $action = $actionName . 'Action';
      }

      $currentUser = Users::getCurrentUser();
      if(!$currentUser->hasAccess($controllerName, $actionName)) {
        header('Location: ' . PROOT . 'auth/accessDenied');
        die();
      }

      array_shift($url);
      $params = $url;

      $dispatch = new $controller;

      if(method_exists($controller, $action)) {
        call_user_func_array([$dispatch, $action], $params);
      } else {
        die("{$action} doesn't exist in the {$controller}");
      }
    }
  }
