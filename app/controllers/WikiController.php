<?php
class WikiController extends Controller
{
    private $wikiModel;
    private $CategoryModel;

    private $tagModel;


    public function __construct()
    {
        $this->wikiModel = $this->model('Wiki');
        $this->CategoryModel = $this->model('Category');
        $this->tagModel = $this->model('Tag');
    }
    public function deleteWiki()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['wiki_id'];

            $this->wikiModel->deleteWiki($id);
            redirect(URLROOT . '/pages/MyWikis');


        }
    }
    public function index()
    {
        $wikis = $this->wikiModel->getAllWikis();

        $categories = $this->CategoryModel->getAllCategories();

        $categoryTags = [];
        foreach ($categories as $category) {
            $tags = $this->tagModel->getTagsByCategory($category->category_id);
            $categoryTags[$category->category_id] = $tags;
        }

        $data = [
            'categories' => $categories,
            'categoryTags' => $categoryTags,
            'wikis' => $wikis,
        ];
        $this->view('Pages/index', $data);

        if (isset($_GET['url']) && $_GET['url'] === 'WikiController/index/addForm') {

            echo '<script >
            document.getElementById("AddWiki").classList.remove("hidden");
            document.getElementById("closeModalBtnwiki").addEventListener("click", function() {
                document.getElementById("AddWiki").classList.add("hidden");
            });
          </script>';
        }
    }
}