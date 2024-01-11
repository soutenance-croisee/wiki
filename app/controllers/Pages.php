<?php
class Pages extends Controller
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
        $this->tagModel = $this->model('Tag');

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


    public function addWiki()
    {
        $data['categories'] = $this->categoryModel->fetchCategories();

        $this->view('pages/addWiki', $data);

    }
    public function addingWiki()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            var_dump($_POST);
            // die();
            $title = $_POST['title'];
            $content = $_POST['content'];
            $categoryId = $_POST['category'];
            $body = $_POST['body'];

            $this->wikiModel->addWiki($title, $content, $categoryId, $body);
            redirect(URLROOT . '/pages/index');
        }
    }


    public function wiki()
    {
        if (isset($_POST["submitForm"])) {
            $selectedWikiId = $_POST['selectedWikiId'];

            // var_dump($selectedWikiId);
            // Fetch the wiki
            $this->wikiModel->fetchWiki($selectedWikiId);

            // Fetch tags associated with the wiki
            $data['tags'] = $this->wikiModel->fetchTagsByWiki($selectedWikiId);

            // var_dump($data['tags']);
            // Prepare data
            $data['wiki'] = [
                'id' => $this->wikiModel->getId(),
                'title' => $this->wikiModel->getTitle(),
                'content' => $this->wikiModel->getContent(),
                'created_at' => $this->wikiModel->getCreatedAt(),
                'body' => $this->wikiModel->getbody(),
                'author_id' => $this->wikiModel->getAuthor_Id(),
            ];

            // Prepare tags data
            // $tagData = [];
            // foreach ($tags as $tag) {
            //     $tagData[] = [
            //         'id' => $tag->getId(),
            //         'title' => $tag->getTitle()
            //     ];
            // }
            // $data['tags'] = $tagData;

            $this->view('pages/wiki', $data);
        }
    }

}