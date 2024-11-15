<?php

class showPublicController extends BaseController
{
    public function __construct(string $area)
    {
        parent::__construct($area);
        $this->view = 'list';
    }

    public function handle(array $getData, array $postData): Response
    {
        try {
            $array = TableHelper::getAllObjectsByArea($this->area);
        } catch (Error $e) {
            throw new Exception($e);
        }
        return new Response($array);
    }
}
