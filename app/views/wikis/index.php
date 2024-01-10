<?php
require_once('../controller/Dashboard.php');
$dashboard = new Dashboard();
$selectedArticle = isset($_GET['id']) ? $_GET['id'] : null;
$data = [];
$comments=[];
$numberOfComments=[];
if ($selectedArticle) {
    $data = $dashboard->getArticleById($selectedArticle);
    
}
if ($selectedArticle) {
    $comments = $dashboard->getComments($selectedArticle);
}
if($selectedArticle){
    
    $numberOfComments = $dashboard->getNumberOfComments($selectedArticle);

}

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.9/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
    <link href="https://fonts.cdnfonts.com/css/georgina-script" rel="stylesheet">

</head>


<body class=" w-full max-w-[70vw] flex flex-col items-center justify-center mx-auto  ">

    <?php

    if (!is_null($data) && !empty($data)) {

    ?> <div>
        <h1 class=" text-6xl font-serif font-bold py-8 ">
            <?php echo $data['article_title']; ?>
        </h1>

        <div class=" flex flex-col gap-2">
            <div class="flex">

                <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                    alt="User profile" class=" mr-2 w-10 h-10 rounded-full ">
                <div class="flex flex-col   ">
                    <div class="flex gap-2">
                        <h1 class=" ">
                            <?php  echo $data['author_id'];; ?>
                        </h1>
                        <p class=" text-green-[#1A8917] text-[#1A8917] "> .Follow</p>

                    </div>

                    <p class=" text-[#6B6B6B]  text-xs">
                        <?php
                        $dateTime = new DateTime($data['created_at']);
                        echo $dateTime->format('F j, Y');
                        ?>
                    </p>
                </div>
            </div>


        </div>
        <div class="flex border border-b-#F2F2F2] border-t-#F2F2F2] my-5">
            <div class="drawer drawer-end">
                <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content ">
                    <div class="flex">
                        <svg width="24" height="24" viewBox="0 0 24 24" aria-label="clap" fill="gray">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.37.83L12 3.28l.63-2.45h-1.26zM13.92 3.95l1.52-2.1-1.18-.4-.34 2.5zM8.59 1.84l1.52 2.11-.34-2.5-1.18.4zM18.52 18.92a4.23 4.23 0 0 1-2.62 1.33l.41-.37c2.39-2.4 2.86-4.95 1.4-7.63l-.91-1.6-.8-1.67c-.25-.56-.19-.98.21-1.29a.7.7 0 0 1 .55-.13c.28.05.54.23.72.5l2.37 4.16c.97 1.62 1.14 4.23-1.33 6.7zm-11-.44l-4.15-4.15a.83.83 0 0 1 1.17-1.17l2.16 2.16a.37.37 0 0 0 .51-.52l-2.15-2.16L3.6 11.2a.83.83 0 0 1 1.17-1.17l3.43 3.44a.36.36 0 0 0 .52 0 .36.36 0 0 0 0-.52L5.29 9.51l-.97-.97a.83.83 0 0 1 0-1.16.84.84 0 0 1 1.17 0l.97.97 3.44 3.43a.36.36 0 0 0 .51 0 .37.37 0 0 0 0-.52L6.98 7.83a.82.82 0 0 1-.18-.9.82.82 0 0 1 .76-.51c.22 0 .43.09.58.24l5.8 5.79a.37.37 0 0 0 .58-.42L13.4 9.67c-.26-.56-.2-.98.20-1.29a.7.7 0 0 1 .55-.13c.28.05.55.23.73.5l2.2 3.86c1.3 2.38.87 4.59-1.29 6.75a4.65 4.65 0 0 1-4.19 1.37 7.73 7.73 0 0 1-4.07-2.25zm3.23-12.5l2.12 2.11c-.41.5-.47 1.17-.13 1.9l.22.46-3.52-3.53a.81.81 0 0 1-.1-.36c0-.23.09-.43.24-.59a.85.85 0 0 1 1.17 0zm7.36 1.7a1.86 1.86 0 0 0-1.23-.84 1.44 1.44 0 0 0-1.12.27c-.3.24-.5.55-.58.89-.25-.25-.57-.4-.91-.47-.28-.04-.56 0-.82.1l-2.18-2.18a1.56 1.56 0 0 0-2.2 0c-.2.2-.33.44-.40.70a1.56 1.56 0 0 0-2.63.75 1.6 1.6 0 0 0-2.23-.04 1.56 1.56 0 0 0 0 2.20c-.24.10-.5.24-.72.45a1.56 1.56 0 0 0 0 2.20l.52.52a1.56 1.56 0 0 0-.75 2.61L7 19a8.46 8.46 0 0 0 4.48 2.45 5.18 5.18 0 0 0 3.36-.50 4.89 4.89 0 0 0 4.20-1.51c2.75-2.77 2.54-5.74 1.43-7.59L18.1 7.68z">
                            </path>
                        </svg>
                        <label for="my-drawer-4" class="mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect width="24" height="24" fill="white" fill-opacity="0.1" />
                                <path
                                    d="M21.2402 19.7625C22.1307 18.9226 22.836 17.9061 23.311 16.778C23.786 15.6499 24.0202 14.435 23.9986 13.2112C23.9986 8.13765 19.6516 4 14.0855 4C8.5194 4 4 8.13765 4 13.2112C4 18.2971 8.5194 22.4224 14.0978 22.4224C15.0881 22.424 16.074 22.2915 17.0287 22.0283C17.3119 22.2746 17.6198 22.5086 17.9523 22.7179C19.2576 23.5676 20.6614 23.9986 22.1392 23.9986C22.4101 23.9986 22.6317 23.8632 22.7302 23.6415C22.7818 23.5406 22.8044 23.4274 22.7957 23.3144C22.787 23.2014 22.7473 23.093 22.681 23.0012C21.962 22.0367 21.4734 20.9204 21.2525 19.7378V19.7625H21.2402ZM17.3981 21.0678L17.3242 20.7969L16.9302 20.92C16.0109 21.1926 15.0567 21.3295 14.0978 21.3264C9.13512 21.3264 5.1083 17.6813 5.1083 13.2112C5.1083 8.74106 9.13512 5.1083 14.0978 5.1083C19.0236 5.1083 22.8411 8.75337 22.8411 13.2358C22.8411 15.4524 22.1022 17.5089 20.3536 19.0482L20.1073 19.2453V19.5654L20.1319 19.9349C20.3013 20.9801 20.6691 21.9833 21.2156 22.8903C20.2569 22.7415 19.3437 22.3796 18.5433 21.8313C18.1985 21.622 17.6567 21.3633 17.3858 21.1047L17.3981 21.0801"
                                    fill="black" fill-opacity="0.16" />
                            </svg>
                        </label>

                        <p>
                            10
                        </p>

                    </div>
                </div>
                <div class="drawer-side">
                    <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay"></label>
                    <ul class="menu p-4 w-80 min-h-full bg-base-100 text-base-content">
                        <h3 class="mx-auto text-center">What are your thoughts?</h3>
                        <label for="user-comment" class="text-xs opacity-50">Your Comment:</label>
                        <input type="text" id="user-comment" class="input input-bordered w-full mt-1" name="comment"
                            placeholder="Type your comment..." onkeydown="submitOnEnter(event)">
                        <button onclick="submitComment()">Add</button>


                        <div class="chat-message w-full">
                            <div class="flex items-end">
                                <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                                    <div class="flex items-center">
                                        <div class="flex flex-col my-2 rounded-lg bg-gray-50 text-gray-600">
                                            <?php foreach ($comments as $comment): ?>
                                            <div class="flex gap-2">
                                                <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                                                    alt="User profile" class="w-6 h-6 rounded-full">
                                                <p class="font-bold text-xm text-black">
                                                    <?php echo $comment['user_id'] ?>
                                                </p>
                                            </div>
                                            <p><?php echo $comment['content'] ?></p>
                                            <?php endforeach; ?>
                                        </div>

                                        <div class="dropdown dropdown-bottom w-full max-w-[100px]">
                                            <div tabindex="0" role="button" class="p-2 m-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" role="img"
                                                    aria-labelledby="a66vs5tpsehtyrfmdf5h3ucx4m6d2mrm"
                                                    class="crayons-icon pointer-events-none">
                                                    <title id="a66vs5tpsehtyrfmdf5h3ucx4m6d2mrm">Dropdown menu</title>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8.25 12a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm5.25 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm3.75 1.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <ul tabindex="0"
                                                class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                                <li><a
                                                        onclick="editComment(<?php echo $commentId; ?>, '<?php echo addslashes($commentContent); ?>', <?php echo $IDuser; ?>);">EDIT</a>
                                                </li>
                                                <li><a
                                                        onclick="deleteComment(<?php echo $commentId ?>,<?php echo $IDuser ?>)">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
 
?>

                    </ul>
                </div>
            </div>
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none"
                    class="tl" aria-label="Add to list bookmark button">
                    <path
                        d="M18 2.5a.5.5 0 0 1 1 0V5h2.5a.5.5 0 0 1 0 1H19v2.5a.5.5 0 1 1-1 0V6h-2.5a.5.5 0 0 1 0-1H18V2.5zM7 7a1 1 0 0 1 1-1h3.5a.5.5 0 0 0 0-1H8a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V7z"
                        fill="gray"></path>
                </svg>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3 12a9 9 0 1 1 18 0 9 9 0 0 1-18 0zm9-10a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm3.38 10.42l-4.6 3.06a.5.5 0 0 1-.78-.41V8.93c0-.4.45-.63.78-.41l4.6 3.06c.3.2.3.64 0 .84z"
                        fill="gray"></path>
                </svg>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M15.22 4.93a.42.42 0 0 1-.12.13h.01a.45.45 0 0 1-.29.08.52.52 0 0 1-.3-.13L12.5 3v7.07a.5.5 0 0 1-.5.5.5.5 0 0 1-.5-.5V3.02l-2 2a.45.45 0 0 1-.57.04h-.02a.4.4 0 0 1-.16-.3.4.4 0 0 1 .1-.32l2.8-2.8a.5.5 0 0 1 .7 0l2.8 2.8a.42.42 0 0 1 .07.5zm-.1.14zm.88 2h1.5a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-11a2 2 0 0 1-2-2v-10a2 2 0 0 1 2-2H8a.5.5 0 0 1 .35.14c.1.1.15.22.15.35a.5.5 0 0 1-.15.35.5.5 0 0 1-.35.15H6.4c-.5 0-.9.4-.9.9v10.2a.9.9 0 0 0 .9.9h11.2c.5 0 .9-.4.9-.9V8.96c0-.5-.4-.9-.9-.9H16a.5.5 0 0 1 0-1z"
                        fill="gray"></path>
                </svg>
            </div>
        </div>
        <?php if ($data['article_image']): ?>
        <img src="../images/<?php echo $data['article_image']; ?>" alt="Article Image"
            class="max-w-full w-full  h-[70vh]">

        <?php endif; ?>
        <p class="font-georgina text-xl">
            <?php echo $data['content']; ?>
        </p>
    </div>
    <?php
    } else {
        echo '<p>No data found for the selected ID.</p>';
    }
    ?>
    <script>
    function editComment(commentId, previousCommentContent, IDuser) {
        var newCommentContent = prompt("Enter the new comment content:", previousCommentContent);

        if (newCommentContent !== null) {
            var updatedCommentContent = newCommentContent;

            if (updatedCommentContent !== null) {
                fetch('./update_comment.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'commentId=' + commentId + '&newCommentContent=' + encodeURIComponent(
                                updatedCommentContent) +
                            '&userId=' + IDuser,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        } else {
                            alert('Failed to update comment');
                        }
                    })
                    .then(data => {
                        if (data.success) {
                            var commentElement = document.getElementById('comment_' + commentId);
                            if (commentElement) {
                                commentElement.innerHTML = updatedCommentContent;
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }
    }


    function submitOnEnter(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            submitComment();
        }
    }

    function submitComment() {
        var comment = document.getElementById("user-comment").value;

        var formData = new FormData();
        formData.append('comment', comment);
        formData.append('articleID', <?php echo $article_id ?>);
        formData.append('user_id', <?php echo $IDuser ?>);

        fetch('../controller/insert_comment.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);

            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function deleteComment(commentId, IDuser) {
        fetch('./delete_comment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'commentId=' + commentId + '&userId=' + IDuser,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                    console.log("success");
                } else {
                    alert('Failed to delete comment');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
    </script>

</body>

</html>