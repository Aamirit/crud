<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{'uploadcsv'}}" method="post" enctype="multipart/form-data">
@csrf
    <h4>CSV Upload</h4>
    <input type="file" name="file" class="file" id="file">
<br>
<br>

<br>

    <input type="submit" value="Upload File" >
</form>
</body>
</html>