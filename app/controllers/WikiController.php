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
        header('Location: ' . URLROOT . '/WikiController/Mywikis');
        exit();
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