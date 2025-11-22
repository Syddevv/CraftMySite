<?php
// 1. Check ID
if (!isset($_GET['id'])) {
    echo 'Product ID not found.';
    exit();
}

$id = (int) $_GET['id'];
$error = '';
$success = '';

// 2. Fetch Existing Data
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    echo 'Product not found.';
    exit();
}
$product = $result->fetch_assoc();

// 3. Handle Update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $price = $conn->real_escape_string($_POST['price']);
    $desc = $conn->real_escape_string($_POST['description']);
    $timeline = $conn->real_escape_string($_POST['timeline']);
    $status = $conn->real_escape_string($_POST['status']);

    // Handle Image Logic (Keep old if no new uploads)
    $images_json = $product['images']; // Default to existing

    // If new files are uploaded
    if (
        isset($_FILES['product_images']) &&
        count($_FILES['product_images']['name']) > 0 &&
        !empty($_FILES['product_images']['name'][0])
    ) {
        $uploaded_images = [];
        $target_dir = '../assets/images/products/';

        // Create directory if missing
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $total_files = count($_FILES['product_images']['name']);
        for ($i = 0; $i < $total_files; $i++) {
            $file_name = basename($_FILES['product_images']['name'][$i]);
            $clean_name = preg_replace('/[^a-zA-Z0-9._-]/', '_', $file_name);
            $unique_name = time() . '_' . $i . '_' . $clean_name;
            $target_file = $target_dir . $unique_name;

            if (
                move_uploaded_file(
                    $_FILES['product_images']['tmp_name'][$i],
                    $target_file,
                )
            ) {
                $uploaded_images[] =
                    '../assets/images/products/' . $unique_name;
            }
        }

        if (!empty($uploaded_images)) {
            $images_json = json_encode(
                $uploaded_images,
                JSON_UNESCAPED_SLASHES,
            );
        }
    }

    // Update Query
    $update_sql = "UPDATE products SET 
                   name='$name', price='$price', description='$desc', 
                   timeline='$timeline', status='$status', images='$images_json' 
                   WHERE id=$id";

    if ($conn->query($update_sql) === true) {
        $success = 'Product updated successfully!';
        // Refresh data
        $result = $conn->query($sql);
        $product = $result->fetch_assoc();
    } else {
        $error = 'Error updating record: ' . $conn->error;
    }
}
?>

<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Product</h1>
        <a href="?view=products" class="text-gray-500 hover:text-brand-primary">← Back to Products</a>
    </div>

    <?php if ($success): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"><?php echo $success; ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
        
        <!-- Name & Status -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="md:col-span-2">
                <label class="block text-gray-700 text-sm font-bold mb-2">Product Title</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars(
                    $product['name'],
                ); ?>" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary outline-none">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                <select name="status" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary outline-none bg-white">
                    <option value="Active" <?php echo $product['status'] ==
                    'Active'
                        ? 'selected'
                        : ''; ?>>Active</option>
                    <option value="Inactive" <?php echo $product['status'] ==
                    'Inactive'
                        ? 'selected'
                        : ''; ?>>Inactive</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Price ($)</label>
                <input type="number" name="price" step="0.01" value="<?php echo htmlspecialchars(
                    $product['price'],
                ); ?>" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary outline-none">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Estimated Timeline</label>
                <input type="text" name="timeline" value="<?php echo htmlspecialchars(
                    $product['timeline'],
                ); ?>" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary outline-none">
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea name="description" rows="4" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary outline-none"><?php echo htmlspecialchars(
                $product['description'],
            ); ?></textarea>
        </div>

        <!-- Current Images -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Current Images</label>
            <div class="flex gap-2 overflow-x-auto pb-2">
                <?php
                $current_imgs = json_decode($product['images'], true);
                if ($current_imgs && is_array($current_imgs)) {
                    foreach ($current_imgs as $img) {
                        echo "<img src='$img' class='h-20 w-20 object-cover rounded-lg border border-gray-200'>";
                    }
                } else {
                    echo "<span class='text-sm text-gray-400'>No images uploaded.</span>";
                }
                ?>
            </div>
        </div>

        <!-- Upload New Images -->
        <div class="mb-8">
            <label class="block text-gray-700 text-sm font-bold mb-2">Upload New Images (Replaces current ones)</label>
            <!-- Added ID for JS targeting -->
            <input type="file" id="product_images_input" name="product_images[]" multiple accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-brand-primary hover:file:bg-blue-100 cursor-pointer">
            
            <!-- Preview Container -->
            <div id="new-images-preview" class="flex gap-2 mt-4 overflow-x-auto hidden">
                <!-- Previews will be inserted here -->
            </div>
        </div>

        <button type="submit" class="w-full bg-brand-primary text-white font-bold py-3 px-6 rounded-xl hover:bg-blue-600 transition-colors shadow-lg">
            Update Product
        </button>
    </form>
</div>

<!-- Javascript for Image Preview -->
<script>
    const imgInput = document.getElementById('product_images_input');
    const previewContainer = document.getElementById('new-images-preview');

    imgInput.addEventListener('change', function(event) {
        // Clear previous previews
        previewContainer.innerHTML = '';
        previewContainer.classList.remove('hidden');

        const files = event.target.files;

        if (files.length > 0) {
            Array.from(files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'relative h-24 w-24 flex-shrink-0 rounded-lg overflow-hidden border border-gray-200 shadow-sm';
                        
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'h-full w-full object-cover';
                        
                        div.appendChild(img);
                        previewContainer.appendChild(div);
                    }

                    reader.readAsDataURL(file);
                }
            });
        } else {
            previewContainer.classList.add('hidden');
        }
    });
</script>