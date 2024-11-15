<?php

class updateController extends BaseController
{
    public function __construct(string $area)
    {
        parent::__construct($area);
        $view = 'list';

    }

    public function handle($getData, $postData): Response
    {
        try {

            $this->view = 'list';
            if ($this->area === 'trip') {
                (new Trip($postData['id'], $postData['destination'], $postData['description']))->update();
            } elseif ($this->area === 'client') {
                (new Client($postData['id'], $postData['firstName'], $postData['lastName'], $postData['gender'],
                    $postData['dateOfBirth'], $postData['countryOfOrigin'], $postData['email']))->update();
            } elseif ($this->area === 'upcomingTrip') {
                (new UpcomingTrip($postData['id'], $postData['tripId'], $postData['tripDate'], $postData['availablePlaces']))->update();

            }
        } catch (Error $e) {
            throw new Exception($e);

        }

        try {
            $array = TableHelper::getAllObjectsByArea($this->area);
        } catch (Error $e) {
            throw new Exception($e);
        }
        return new Response($array);
    }
}