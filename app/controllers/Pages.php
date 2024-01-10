<?php
class Pages extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->wikiModel = $this->model('wiki');

        $this->userModel = $this->model('User');
    }

    public function get_categories()
    {
        $categories = $this->userModel->fetchCategories();
        // var_dump($categories);
        return $categories;
    }
    public function get_wikis($id)
    {
        $wikis = $this->userModel->getAllWikis($id);
        return $wikis;
    }
    public function index()
    {
        $category_id = isset($_POST['selectedCategoryId']) ? $_POST['selectedCategoryId'] : null;
        // var_dump($_POST);
        $data['categories'] = $this->get_categories();
        $data['wikis'] = $this->get_wikis($category_id);
        var_dump($data['wikis']);

        $this->view('pages/index', $data);
    }

}