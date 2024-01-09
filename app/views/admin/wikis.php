<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a4fc922de4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>

    <!-- Your table HTML -->
    <table class="table-auto w-full border border-collapse border-gray-800">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b border-gray-800">Category Name</th>
                <th class="px-4 py-2 border-b border-gray-800">Open</th>
                <!-- Add Action column if needed -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['categories'] as $category): ?>
            <tr>
                <td class="px-4 py-2 border-b border-gray-800">
                    <?php echo $category['title']; ?>
                </td>
                <td class="px-4 py-2 border-b border-gray-800">
                    <button class="open-wikis-btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        data-category-id="<?php echo $category['id']; ?>">
                        Open
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal Structure -->
    <div id="wikisModal" class="fixed inset-0 z-50 hidden overflow-auto bg-gray-800 bg-opacity-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg p-6 max-w-lg mx-auto">
                <h2 class="text-2xl font-semibold mb-4">Wikis for <span id="categoryName"></span></h2>
                <div id="wikisContent"></div>
                <button onclick="closeWikisModal()"
                    class="mt-4 text-white bg-gray-700 py-2 px-4 rounded-md">Close</button>
            </div>
        </div>
    </div>

    <!-- Your script to handle modal interactions -->
    <script>
    function openWikisModal(categoryId) {
        // Fetch wikis data from the backend
        fetch(`<?php URLROOT?>admin/get_wikis_per_category/?categoryId=${categoryId}`)
            .then(response => response.json())
            .then(data => {
                const categoryName = data.categoryName;
                const wikisContent = generateWikisHTML(data.wikis);
                document.getElementById('categoryName').innerText = categoryName;
                document.getElementById('wikisContent').innerHTML = wikisContent;
                document.getElementById('wikisModal').classList.remove('hidden');
            })
            .catch(error => console.error('Error fetching wikis:', error));
    }

    function closeWikisModal() {
        document.getElementById('wikisModal').classList.add('hidden');
    }

    function generateWikisHTML(wikis) {
        // Generate HTML for the wikis content
        return wikis.map(wiki => `<p>${wiki.title}</p>`).join('');
    }

    document.querySelectorAll('.open-wikis-btn').forEach(button => {
        button.addEventListener('click', function() {
            const categoryId = this.getAttribute('data-category-id');
            openWikisModal(categoryId);
        });
    });
    </script>
</body>

</html>