<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- file upload -->
    <form action="upload-manager.php" method="post" enctype="multipart/form-data">
        <h2>Upload File</h2>
        <label for="fileSelect">File name:</label>
        <input type="file" name="photo" id="fileSelect" multiple>
        <input type="submit" name="submit" value="Upload">
        <p><strong>Note:</strong>Only  .jpg, .gif, .png, .jpeg format files are allowed to be uploaded to a max size 5MB</p>
    </form>
</body>
</html>