<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <fieldset>
        <legend>Form Upload Excel</legend>
        <form method="post" enctype="multipart/form-data" action="upload.php">
            <div class="form-group">
                <label for="exampleInputFile">File Upload</label>
                <input type="file" name="file" class="form-control" id="exampleInputFile">
            </div>
            <button type="submit" name="upload" class="btn btn-primary">Import</button>
        </form>
    </fieldset>
</body>

</html>