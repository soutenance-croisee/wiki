<?php
class tags extends Controller
{
    private $userModel;
    private $categoryModel;
    private $wikiModel;
    private $tagModel;

    public function __construct()
    {
        $this->wikiModel = $this->model('wiki');

        $this->userModel = $this->model('User');
        $this->categoryModel = $this->model('Category');
        $this->tagModel = $this->model('tags');

    }
}