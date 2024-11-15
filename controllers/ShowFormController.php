<?php

class ShowFormController extends BaseController
{
    /**
     * @var ?int
     */
    private int $id;

    public function __construct(string $area)
    {
        parent::__construct($area);
        $this->view = 'form';
    }

    public function handle($getData, $postData): Response
    {
        try {


            if (isset($getData['id'])) {
                if ($this->area === 'trip') {
                    $array = (new Trip())->getObjectById($getData['id']);
                } elseif ($this->area === 'client') {
                    $array = (new Client())->getObjectById($getData['id']);
                } elseif ($this->area === 'upcomingTrip') {
                    $array = (new UpcomingTrip())->getObjectById($getData['id']);
                } elseif ($this->area === 'public') {
                    $array = (new UpcomingTrip())->getObjectById($getData['tripId']);
                }
                $r = new Response([$array]);
                $r->setAction('update');
                return $r;
            }
            $r = new Response([]);
            $r->setAction('insert');
            return $r;
        } catch (Error $e) {
            throw new Exception($e);
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

}