<?php class Category extends Controller
{
    private $categoryModel;
    public function __construct()
    {
        $this->categoryModel = $this->model('category');
    }

    public function get_tags($wikiid)
    {
        $tags = $this->categoryModel->fetchTags($wikiid);
        return $tags;
    }


    public function insertCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category-name'])) {
            $categoryName = $_POST['category-name'];
            $this->categoryModel->insertCategory($categoryName);
            redirect(URLROOT . '/admin/categories');

        }
    }
    public function deleteCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoryId'])) {
            $categoryId = $_POST['categoryId'];
            $this->categoryModel->deleteCategory($categoryId);
            redirect(URLROOT . '/admin/categories');


        } else {
            echo "someting goes wrong";
        }
    }

}