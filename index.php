<?php
require 'classes/Session.php';
Session::start();

// $_SESSION['role'] = 'client';
$_SESSION['role'] = 'admin';
$userRole = $_SESSION['role'];

try {
    include 'config.php';
    include 'helpers.php';

    spl_autoload_register(function ($className): void {
        if (substr($className, -10) === 'Controller') {
            include 'controllers/' . $className . '.php';
        } else {
            include 'classes/' . $className . '.php';
        }
    });

//inspect($_REQUEST);
//inspect($_SESSION);
// inspect($_GET);
// inspect($_POST);

    $action = $_REQUEST['action'] ?? 'showList';
    $area = $_REQUEST['area'] ?? 'trip';
    $id = $_REQUEST['id'] ?? null;
    $tripId = $_REQUEST['tripId'] ?? null;

    $postData = [];
    $postDataNames = ['destination', 'description', 'id', 'area', 'action', 'firstName',
        'lastName', 'gender', 'dateOfBirth', 'countryOfOrigin', 'email', 'tripDate', 'tripId', 'availablePlaces', 'upcomingTripId', 'applicantId'];
    foreach ($postDataNames as $field) {
        $value = $_POST[$field] ?? null;
        if (!empty($value)) {
            $postData[$field] = $value;
        }
    }
    $getData = [];
    $getDataNames = ['id', 'area', 'action'];
    foreach ($getDataNames as $field) {
        $value = $_GET[$field] ?? null;
        if (!empty($value)) {
            $getData[$field] = $value;
        }
    }

    $possibleActions = ['showList', 'showEdit', 'showForm', 'insert', 'update', 'delete', 'showPublic', 'login', 'register'];

    // Check if the action is valid
//    if (!in_array($action, $possibleActions)) {
//        throw new Exception('Page Not Found', 404); // Throw 404 error if action is invalid
//    }
//    if (in_array($action, $possibleActions)) {
        $controllerName = ucfirst($action) . 'Controller';
        $controller = new $controllerName($area);

        $response = $controller->handle($getData, $postData);
        $array = $response->getArray();
        $message = $response->getMessage() ?? '';
        $newAction = $response->getAction() ?? '';

        if ($newAction === 'insert') {
            $action = 'insert';
        } elseif ($newAction === 'update') {
            $action = 'update';
        }
//    }

    if ($controller->getView() === 'list') {
        $arrayName = $area . 's';
        $$arrayName = $array;
    } elseif ($controller->getView() === 'form') {
        if ($action === 'update') {
            $objectName = substr($area, 0, 1);
            $$objectName = $array[0];
        }
    }
    include 'views/' . $controller->getArea() . '/' . $controller->getView() . '.php';
} catch (Exception $e) {

    file_put_contents(LOG_PATH, (new DateTime())->format('Y-m-d H:i:s')
        . ' ' . $e->getMessage() . "\n" . file_get_contents(LOG_PATH));

    if ($e->getCode() == 404) {

        include 'views/404.php';
    } else {

        include 'views/error.php';
    }
//    include 'views/error.php';
}


