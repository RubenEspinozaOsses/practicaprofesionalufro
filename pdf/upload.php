<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Upload</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a>
    to improve your experience.</p>
<![endif]-->
    <?php

    require 'vendor/autoload.php';

    use GuzzleHttp\Psr7;


    execute_pdf_filtering();

    function execute_pdf_filtering()
    {
        if (isset($_POST['submit'])) {

            post_pdf();
        }
    }

    function post_pdf()
    {

        upload_file();

        $localFile = 'uploads/' . $_FILES['fileToUpload']['name'];
        $url = "http://localhost:5000/api/pdf";
        $endpoint = "/upload";
        $client = new GuzzleHttp\Client();
        echo make_post_request($client, $url, $localFile, $endpoint);
        delete_file();
    }

    function delete_file()
    {
        unlink('uploads/' . $_FILES['fileToUpload']['name']);
    }

    function make_post_request($client, $url, $localFile, $endpoint)
    {



        $file_info = array(
            'name' => $_FILES['fileToUpload']['name'],
            'type' => 'pdf'
        );



        //echo "<script type='text/javascript'>console.log('".$postBody."');</script>";

        //['Content-Disposition' => 'attachment; filename=' . $_FILES['fileToUpload']['name']]
        $res = $client->request('POST', $url . $endpoint, ['multipart' => [
            [
                'name'     => 'file_contents',
                'contents' => Psr7\Utils::tryFopen($localFile, 'r'),
                //'contents' => file_get_contents($localFile),
                'filename' => $_FILES['fileToUpload']['name'],
                'headers' => [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'attachment',
                    'filename' => $_FILES['fileToUpload']['name']
                ],
            ],
        ]]);

        return $res->getBody();
    }


    function upload_file()
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;


        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<script type='text/javascript'>console.log('" . "Sorry, file already exists." . "')</script>";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            echo "<script type='text/javascript'>console.log('" . "Sorry, your file is too large." . "')</script>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script type='text/javascript'>console.log('Sorry, your file is not uploaded');</script>";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "<script type='text/javascript'>console.log('" . "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded." . "');</script>";
            } else {
                echo "<script type='text/javascript'>console.log('Sorry, there was an error uploading your file.');</script>";
            }
        }
    }

    ?>
    <script src="" async defer></script>
</body>

</html>