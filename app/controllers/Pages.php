<?php
class Pages extends Controller
{
    private $userModel;
    private $categoryModel;
    private $wikiModel;

    public function __construct()
    {
        $this->wikiModel = $this->model('wiki');

        $this->userModel = $this->model('User');
        $this->categoryModel = $this->model('Category');

    }

    // public function get_categories()
    // {
    //     $categories = $this->userModel->fetchCategories();
    //     // var_dump($categories);
    //     return $categories;
    // }

    public function index()
    {
        $category_id = isset($_POST['selectedCategoryId']) ? $_POST['selectedCategoryId'] : null;
        // var_dump($_POST);
        $data['categories'] = $this->categoryModel->fetchCategories();
        $data['wikis'] = $this->wikiModel->getAllWikis($category_id);
        // var_dump($data['wikis']);

        $this->view('pages/index', $data);
    }
    // public function wiki()
    // {
    //     if (isset($_POST["submitForm"])) {
    //         $selectedWikiId = $_POST['selectedWikiId'];

    //         $data['wiki'] = $this->wikiModel->fetchWiki($selectedWikiId);
    //         $this->view('pages/wiki', $data);
    //     }

    // }
    public function wiki()
    {
        if (isset($_POST["submitForm"])) {
            $selectedWikiId = $_POST['selectedWikiId'];
            $this->wikiModel->fetchWiki($selectedWikiId);

            $data['wiki'] = [
                'id' => $this->wikiModel->getId(),
                'title' => $this->wikiModel->getTitle(),
                'content' => $this->wikiModel->getContent(),
                'created_at' => $this->wikiModel->getCreatedAt(),
                'TEXT' => $this->wikiModel->getText()
            ];
            $this->view('pages/wiki', $data);
        }
    }

}