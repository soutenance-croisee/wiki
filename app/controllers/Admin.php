<?php
class Admin extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function get_authors()
    {
        $authors = $this->userModel->fetchUsers();
        // var_dump($authors);
        return $authors;

    }
    public function get_users_number()
    {
        $number = $this->userModel->fetchUsersNumber();
        return $number;
    }
    public function get_tags_number()
    {

        $tagNumber = $this->userModel->fetchTagsNumber();
        return $tagNumber;
    }
    public function get_wikis_number()
    {
        $tagsNumber = $this->userModel->fetchWikisNumber();
        return $tagsNumber;

    }
    public function get_categories_number()
    {
        $categoriesNumber = $this->userModel->fetchCategoriesNumber();
        return $categoriesNumber;

    }
    public function get_tags()
    {
        $tags = $this->userModel->fetchTags();
        return $tags;
    }
    public function get_categories()
    {
        $categories = $this->userModel->fetchCategories();
        return $categories;
    }
    public function insertCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category-name'])) {
            $categoryName = $_POST['category-name'];
            $this->userModel->insertCategory($categoryName);
            redirect(URLROOT . '/admin/categories');

        }
    }
    public function deleteCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoryId'])) {
            $categoryId = $_POST['categoryId'];
            $this->userModel->deleteCategory($categoryId);
            redirect(URLROOT . '/admin/categories');


        } else {
            echo "someting goes wrong";
        }
    }
    public function deleteTag()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tagId'])) {
            $tagId = $_POST['tagId'];
            $this->userModel->deleteTag($tagId);
            redirect(URLROOT . '/admin/tags');


        } else {
            echo "someting goes wrong";
        }
    }
    public function updateCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoryId'])) {
            $categoryId = $_POST['categoryId'];
            $this->userModel->updateCategory($categoryId);
            redirect(URLROOT . '/admin/categories');


        } else {
            echo "someting goes wrong";
        }
    }

    public function index()
    {
        $data['categories_number'] = $this->get_categories_number();
        $data['users_number'] = $this->get_users_number();
        $data['wikis_number'] = $this->get_wikis_number();
        $data['tags_number'] = $this->get_tags_number();


        // var_dump($data);
        $this->view('admin/index', $data);
    }
    public function users()
    {
        $data = $this->get_authors();

        // var_dump($data);
        $this->view('admin/users', $data);
    }
    public function login()
    {

        $this->view('admin/login');
    }
    public function archiveWiki()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wikiId'])) {
            $wikiId = $_POST['wikiId'];
            $this->userModel->archiveWiki($wikiId);
            redirect(URLROOT . '/admin/wikis');


        } else {
            echo "someting goes wrong";
        }
    }
    public function get_wikis()
    {
        $data = $this->userModel->fetchWikis();
        return $data;
    }
    public function wikis()
    {
        $data['wikis'] = $this->get_wikis();
        $this->view('admin/wikis', $data);
    }


    public function categories()
    {
        $data['categories'] = $this->get_categories();
        $this->view('admin/categories', $data);
    }

    public function tags()
    {
        $data['categories'] = $this->get_categories();
        $data['tags'] = $this->get_tags();
        // var_dump($data);
        $this->view('admin/tags', $data);
    }

}


?>