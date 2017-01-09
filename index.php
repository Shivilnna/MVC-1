<?php
/**
 * Created by P.E.
 * Date: 09/01/2017
 * Time: 09:48
 */
class Model
{
    public $string;
    public $string2;

    public function __construct()
    {
        $this -> string = "Cliquez-moi, grand fou !!";
        $this -> string2 = "Owi grand fou, clique moi !";
    }
}

class View
{
    private $model;
    private $controller;

    public function __construct($controller, $model)
    {
        $this -> controller = $controller;
        $this -> model = $model;
    }

    public function output() {
        return "<p><a href=\"index.php?action=clicked\">" . $this -> model -> string . "</a></p>";
    }

    public function output2() {
        return "<p><a href=\"index.php?action=unclicked\">" . $this -> model -> string2 . "</a></p>";
    }

    public function returnto() {
        return "<p><a href=\"index.php\">Return to Home</a></p>";
    }
}

class Controller
{
    private  $model;

    public function __construct($model)
    {
        $this -> model = $model;
    }

    public function clicked() {
        $this -> model -> string = "Ich bin updat&eacute;";
    }

    public function unclicked() {
        $this -> model -> string = "Because i'm black !";
    }
}

//********************************************************************************************************************//

$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);

if (empty($_GET['action'])) {
    echo $view -> output();
    echo $view -> output2();
}

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller -> {$_GET['action']}();
    echo $view -> output();
    echo $view -> returnto();
}