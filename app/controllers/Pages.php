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
    public function updateWiki($id)
    {
        $data['categories'] = $this->categoryModel->fetchCategories();
        $data['wikis'] = $this->wikiModel->fetchWiki($id);
        $data['tags'] = $this->tagModel->fetchTagsByWiki($id);

        $this->view('pages/editWiki', $data);

    }

    public function editWiki()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $wikiId = intval($_POST['wikiId']);
            $editTitle = filter_var($_POST['editTitle'], FILTER_SANITIZE_STRING);
            $editContent = filter_var($_POST['editContent'], FILTER_SANITIZE_STRING);
            $editCategoryId = intval($_POST['editCategoryId']);
            $imageWiki = null;



            if (isset($_FILES['editImage']) && $_FILES['editImage']['error'] === UPLOAD_ERR_OK) {
                $targetDirectory = "upload/";
                $targetPath = $targetDirectory . basename($_FILES['editImage']['name']);

                if (!file_exists($targetDirectory)) {
                    mkdir($targetDirectory, 0755, true);
                }

                if (move_uploaded_file($_FILES['editImage']['tmp_name'], $targetPath)) {
                    $imageWiki = "upload/" . $_FILES['editImage']['name'];
                } else {
                    $_SESSION['message'] = ['type' => 'error', 'text' => 'Sorry, there was a problem uploading the image.'];
                }
            }
            $wikiUpdated = $this->wikiModel->updateWiki($wikiId, $editTitle, $editContent, $editCategoryId, $imageWiki);

            if ($wikiUpdated) {

                $selectedTags = isset($_POST['editSelectedTags']) ? json_decode($_POST['editSelectedTags'], true) : [];

                if ($selectedTags != NULL) {
                    $this->wikiModel->DeleteWikiTags($wikiId);

                    foreach ($selectedTags as $tagId) {
                        $this->wikiModel->addWikiTags($wikiId, $tagId);
                    }
                }

                $_SESSION['message'] = ['type' => 'success', 'text' => 'Wiki Updated successfully.'];
            } else {
                $_SESSION['message'] = ['type' => 'error', 'text' => 'Failed to add wiki. Please try again.'];
            }
        }
        redirect(URLROOT . '/pages/Mywikis');
        exit();
    }
    public function addingWiki()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imageWiki = URLROOT . '/images/w1.jpeg';


            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $targetDirectory = "upload/";
                $targetPath = $targetDirectory . basename($_FILES['image']['name']);

                if (!file_exists($targetDirectory)) {
                    mkdir($targetDirectory, 0755, true);
                }

                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                    $imageWiki = "upload/" . $_FILES['image']['name'];
                } else {
                    $_SESSION['message'] = ['type' => 'error', 'text' => 'Sorry, there was a problem uploading the image.'];
                }
            }
            $title = $_POST['title'];
            $content = $_POST['content'];
            $categoryId = $_POST['category'];
            $body = $_POST['body'];
            // $img = $_POST['image'];
            $wikiId = $this->wikiModel->addWiki($title, $content, $categoryId, $imageWiki, $body);
            if (isset($_POST['tags'])) {
                $tags = explode(',', $_POST['tags']);
                var_dump($tags);
                // die();
                foreach ($tags as $tagName) {
                    $tagName = trim($tagName);
                    $this->tagModel->addNewTag($wikiId, $tagName);
                }
            }
            redirect(URLROOT . '/pages/index');
        }
    }

    // YourController.php

    // YourController.php

    // YourController.php

    public function Mywikis()
    {
        $wikis = $this->wikiModel->getMyWikis();

        // Fetch wikis grouped by category
        $wikisGroupedByCategory = $this->tagModel->getWikisGroupedByCategory();
        // var_dump($wikisGroupedByCategory);
        // die();

        $categories = $this->categoryModel->fetchCategories();
        $wikiTags = [];

        foreach ($wikis as $wiki) {
            // Fetch tags for each wiki
            $tags = $this->tagModel->fetchTagsByWiki($wiki['id']);

            $wikiTags[$wiki['id']] = $tags;
        }

        $data = [
            'categories' => $categories,
            'wikisGroupedByCategory' => $wikisGroupedByCategory,
            'wikiTags' => $wikiTags,
            'wikis' => $wikis,
        ];

        $this->view('Pages/MyWikis', $data);
    }

    public function search()
    {
        // Check if it's an AJAX request
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchTerm'])) {
            $searchTerm = $_POST['searchTerm'];

            $searchResults = $this->searchWikiTagCategory($searchTerm);

            echo json_encode($searchResults);
            exit;
        }

    }


    public function searchWikiTagCategory($searchTerm)
    {
        $searchResults = [];

        // Search by Wiki
        $wikiResults = $this->wikiModel->searchWiki($searchTerm);
        $searchResults['wikis'] = $wikiResults;

        // Search by Tag
        $tagResults = $this->wikiModel->searchTag($searchTerm);
        $searchResults['tags'] = $tagResults;

        // Search by Category
        $categoryResults = $this->wikiModel->searchCategory($searchTerm);
        $searchResults['categories'] = $categoryResults;

        return $searchResults;
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