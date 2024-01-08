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
    public function get_tags($wikiid)
    {
        $tags = $this->userModel->fetchTags($wikiid);
        return $tags;
    }
    public function get_categories()
    {
        $categories = $this->userModel->fetchCategories();
        return $categories;
    }
    public function get_wikis($id)
    {
        $wikis = $this->userModel->fetchWikis($id);
        return $wikis;
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
    public function categories()
    {
        $data['categories'] = $this->get_categories();
        $this->view('admin/categories', $data);
    }

}


?>