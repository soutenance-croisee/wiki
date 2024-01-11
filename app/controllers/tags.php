<?php
class tags extends Controller
{
    private $userModel;
    private $categoryModel;
    private $wikiModel;
    private $tagModel;

    public function __construct()
    {

        $this->tagModel = $this->model('Tag');

    }
}