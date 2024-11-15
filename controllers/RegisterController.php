<?php


class registerController extends BaseController
{

    public function __construct(string $area)
    {
        parent::__construct($area);
        $this->view = 'register';
    }

    public function handle($getData, $postData): Response
    {
        if (isset($getData['id'])) {
            if ($this->area === 'public') {
                if ($action === 'login'){
                    $this->view = 'login';
                } elseif ($action === 'register') {
                    $this->view = 'register';
                }
            }
            $r = new Response([$array]);
            $r->setAction('login');
            return $r;
        }
        $r = new Response([]);
        $r->setAction('register');
        return $r;
    }

}

