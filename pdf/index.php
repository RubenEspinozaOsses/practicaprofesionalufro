<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=+, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input id="pdf_upload" type="file" name="fileToUpload" id="fileToUpload" accept=".pdf">
        <script type="text/javascript">
            document.getElementById('pdf_upload').onchange = () => {
                const filesize = document.getElementById('pdf_upload').files[0].size
                if (filesize >= 41943040) {
                    alert('File too large')
                    document.getElementById('pdf_upload').value = "";
                }
            }
        </script>
        <input type="submit" value="Upload Image" name="submit">

    </form>

</body>

</html>