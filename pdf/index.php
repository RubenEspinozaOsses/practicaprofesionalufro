<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload" accept=".pdf">
        <script>
            var element = document.getElementById("fileToUpload")
            document.getElementById("fileToUpload").onchange = function() {
                if (!(element.files[0].type == 'application/pdf') || element.files[0].size > 10000000) {
                    alert('El archivo subido no es un PDF o su tamaño es muy grande, por favor intente con un archivo valido');
                    element.value = '';
                }
            }
        </script>
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>

</html>