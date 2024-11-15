<?php

class TableHelper
{
    /**
     * @param string $area
     * @return array
     */
    public static function getAllObjectsByArea(string $area):array
    {
        $array = [];
        if ($area === 'trip') {
            $array = (new Trip())->getAllAsObjects();
        } elseif ($area === 'client') {
            $array = (new Client())->getAllAsObjects();
        } elseif ($area === 'upcomingTrip') {
            $array = (new UpcomingTrip())->getAllAsObjects();
            foreach ($array as $u) {
                $u->setTripObject();
            }
        } elseif ($area === 'public') {
            $array = (new UpcomingTrip())->getAllAsObjects();
            foreach ($array as $u) {
                $u->setTripObject();
            }
        } elseif ($area === 'booking') {
            $array = (new Booking())->getAllAsObjects();
            foreach ($array as $a) {
                $a->setUpcomingTripObject();
                $a->setApplicantObject();
            }
        }
        return $array;
    }
}