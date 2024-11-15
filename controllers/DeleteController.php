<?php

use Couchbase\User;

class DeleteController extends BaseController
{

    public function __construct(string $area)
    {
        parent::__construct($area);
        $this->view = 'list';

    }

    public function handle($getData, $postData): Response
    {
        try {
            $message = '';

            if ($this->area === 'trip') {
                (new Trip())->deleteObjectById($getData['id']);
            } elseif ($this->area === 'client') {
                (new Client())->deleteObjectById($getData['id']);
            } elseif ($this->area === 'upcomingTrip') {
                (new UpcomingTrip())->deleteObjectById($getData['id']);
            } elseif ($this->area === 'booking') {
                (new Booking())->deleteObjectById($getData['id']);

            }

        } catch (PDOException $e) {
            if (substr($e->getMessage(), 0, 15) === 'SQLSTATE[23000]') {
                // if ($e->getCode() === '23000') {
                $message = 'I cannot delete this ' . $this->area . ' , it is still in use.';
            }

        } catch (Exception $e) {

            throw new Exception($e);
        }

        try {
            $array = TableHelper::getAllObjectsByArea($this->area);
        } catch (Error $e) {
            throw new Exception($e);
        }
        $r = new Response($array);
        $r->setMessage($message);
        return $r;
    }
}