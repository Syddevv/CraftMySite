<?php
$error = '';
$success = '';

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $price = $conn->real_escape_string($_POST['price']);
    $desc = $conn->real_escape_string($_POST['description']);
    $timeline = $conn->real_escape_string($_POST['timeline']);
    $status = 'Active';

    // --- IMAGE UPLOAD LOGIC ---
    $uploaded_images = [];
    $target_dir = '../assets/images/products/'; // Relative to public/pages/

    // Create folder if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Loop through uploaded files
    if (isset($_FILES['product_images'])) {
        $total_files = count($_FILES['product_images']['name']);

        for ($i = 0; $i < $total_files; $i++) {
            $original_name = basename($_FILES['product_images']['name'][$i]);

            // Skip if empty
            if (empty($original_name)) {
                continue;
            }

            // 1. Sanitize Filename: Replace spaces with underscores, remove special chars
            $clean_name = preg_replace(
                '/[^a-zA-Z0-9._-]/',
                '_',
                $original_name,
            );

            // 2. Generate Unique Name
            $unique_name = time() . '_' . $i . '_' . $clean_name;
            $target_file = $target_dir . $unique_name;

            // Allow specific file formats
            $imageFileType = strtolower(
                pathinfo($target_file, PATHINFO_EXTENSION),
            );
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

            if (in_array($imageFileType, $allowed_types)) {
                if (
                    move_uploaded_file(
                        $_FILES['product_images']['tmp_name'][$i],
                        $target_file,
                    )
                ) {
                    // Store the path in DB
                    $uploaded_images[] =
                        '../assets/images/products/' . $unique_name;
                }
            }
        }
    }

    if (empty($uploaded_images)) {
        $error = 'Please upload at least one valid image.';
    } else {
        // Convert array of paths to JSON string for Database
        // We use JSON_UNESCAPED_SLASHES to keep paths readable in DB (e.g. "../assets/..." instead of "..\/\/assets...")
        $images_json = json_encode($uploaded_images, JSON_UNESCAPED_SLASHES);

        // Insert into DB
        $sql = "INSERT INTO products (name, price, description, timeline, images, status) 
                VALUES ('$name', '$price', '$desc', '$timeline', '$images_json', '$status')";

        if ($conn->query($sql) === true) {
            $success = 'Product added successfully!';
        } else {
            $error = 'Database error: ' . $conn->error;
        }
    }
}
?>

<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Add New Product</h1>
        <a href="?view=products" class="text-gray-500 hover:text-brand-primary">← Back to Products</a>
    </div>

    <?php if ($error): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <?php if ($success): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            <?php echo $success; ?> 
            <a href="?view=products" class="underline font-bold ml-2">View Products</a>
        </div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
        
        <!-- Product Name -->
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Product Title</label>
            <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 outline-none" placeholder="e.g. Modern SaaS Template">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Price -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Price ($)</label>
                <input type="number" name="price" step="0.01" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 outline-none" placeholder="49.99">
            </div>
            <!-- Timeline -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Estimated Timeline</label>
                <input type="text" name="timeline" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 outline-none" placeholder="e.g. 3-5 Business Days">
            </div>
        </div>

        <!-- Description -->
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea name="description" rows="4" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 outline-none" placeholder="Describe the template features..."></textarea>
        </div>

        <!-- Image Upload Area -->
        <div class="mb-8">
            <label class="block text-gray-700 text-sm font-bold mb-2">Product Images (Select Multiple)</label>
            
            <!-- Drop Zone -->
            <div id="drop-zone" class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50 hover:bg-gray-100 transition-colors cursor-pointer relative">
                <input type="file" id="file-input" name="product_images[]" multiple accept="image/*" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                
                <div class="text-gray-500 z-10 relative pointer-events-none">
                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <p><span class="text-brand-primary font-bold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs mt-1">PNG, JPG, WEBP up to 5MB</p>
                </div>
            </div>

            <!-- Preview Area -->
            <div id="preview-container" class="grid grid-cols-4 gap-4 mt-4 hidden">
                <!-- Thumbnails will be inserted here via JS -->
            </div>
        </div>

        <button type="submit" class="w-full bg-brand-primary text-white font-bold py-3 px-6 rounded-xl hover:bg-blue-600 transition-colors shadow-lg">
            Save Product
        </button>
    </form>
</div>

<script>
    const fileInput = document.getElementById('file-input');
    const dropZone = document.getElementById('drop-zone');
    const previewContainer = document.getElementById('preview-container');

    // Highlight drop zone on drag
    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, (e) => {
            e.preventDefault();
            dropZone.classList.add('border-brand-primary', 'bg-blue-50');
        });
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-brand-primary', 'bg-blue-50');
        });
    });

    // Handle File Selection
    fileInput.addEventListener('change', function() {
        handleFiles(this.files);
    });

    function handleFiles(files) {
        previewContainer.innerHTML = ''; // Clear previous previews
        
        if (files.length > 0) {
            previewContainer.classList.remove('hidden');
            
            Array.from(files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'relative h-24 w-full rounded-lg overflow-hidden border border-gray-200 shadow-sm';
                        div.innerHTML = `<img src="${e.target.result}" class="h-full w-full object-cover">`;
                        previewContainer.appendChild(div);
                    }
                    reader.readAsDataURL(file);
                }
            });
        } else {
            previewContainer.classList.add('hidden');
        }
    }
</script>