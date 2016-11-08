<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <form action="/store" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Description">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>