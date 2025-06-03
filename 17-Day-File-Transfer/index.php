<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Transfer Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">FileTransfer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Download</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Welcome to FileTransfer</h1>
            <p class="lead">Easily upload and download your files securely</p>
            <a href="#upload-section" class="btn btn-light btn-lg">Get Started</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container my-5">
        <div class="row">
            <!-- Upload Section -->
            <section id="upload-section" class="col-12 mb-4">
                <h2>Upload Files</h2>
                <!-- Single File Upload -->
                <form action="result.php" method="post" enctype="multipart/form-data" class="border p-4 rounded mb-4">
                    <h5>Single File Upload</h5>
                    <div class="mb-3">
                        <label for="file-upload" class="form-label">Select file to upload:</label>
                        <input type="file" class="form-control" id="file-upload" name="file-upload" required>
                    </div>
                    <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                </form>

                <!-- Multiple Files Upload -->
                <form action="result.php" method="post" enctype="multipart/form-data" class="border p-4 rounded">
                    <h5>Multiple Files Upload</h5>
                    <div class="mb-3">
                        <label for="multiple-file-upload" class="form-label">Select files to upload:</label>
                        <input type="file" class="form-control" id="multiple-file-upload" name="multiple-file-upload[]" multiple required>
                    </div>
                    <button type="submit" name="upload-multiple" class="btn btn-primary">Upload Files</button>
                </form>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <p>&copy; 2024 FileTransfer. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
