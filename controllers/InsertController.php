<?php

class InsertController extends BaseController
{
    /**
     * @param string $area
     * @param string $view
     */
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
                $postData = (new FilterData($postData))->filter();
                $object = (new Trip())->insert($postData['destination'], $postData['description']);
            } elseif ($this->area === 'client') {
                $postData = (new FilterData($postData))->filter();
                $object = (new Client())->insert($postData['firstName'], $postData['lastName'], $postData['gender'],
                    $postData['dateOfBirth'], $postData['countryOfOrigin'], $postData['email']);
            } elseif ($this->area === 'upcomingTrip') {
                $postData = (new FilterData($postData))->filter();
                $object = (new UpcomingTrip())->insert($postData['tripId'], $postData['tripDate'], $postData['availablePlaces']);
            } elseif ($this->area === 'public') {
                $postData = (new FilterData($postData))->filter();
                $object = (new Applicant())->insert($postData['firstName'], $postData['lastName'], $postData['email']);
                $applicantId = $object->getId();
                (new Booking())->insert($postData['upcomingTripId'], $applicantId);
                header("Location: index.php?action=showPublic&area=public&success=1");
                exit;

            }
        } catch (PDOException $e) {
            if  (strpos($e->getMessage(), 'SQLSTATE[23000]') !== false){
                // if ($e->getCode() === '23000') {
                $message = 'Email already exists';
                $this->view = 'form';

            }
        } catch (Error $e) {
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
