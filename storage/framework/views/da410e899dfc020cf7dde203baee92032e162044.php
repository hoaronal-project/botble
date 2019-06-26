<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    input{
        width: 95%;
    }
</style>
<body>
<div class="container">
    <label for="title">Title</label>
    <div>
        <input id="title" value="<?php echo e($post->name); ?>"/>
        <a onclick="myFunction('title')" href="javascript:;">COPY</a>
    </div>
    <label for="description">Des</label>
    <div>
        <input id="description" value="<?php echo e($post->description); ?>"/>
        <a onclick="myFunction('description')" href="javascript:;">COPY</a>
    </div>
    <label for="Content">Content</label>
    <div>
        <input id="Content" value="<?php echo e($post->content); ?>"/>
        <a onclick="myFunction('Content')" href="javascript:;">COPY</a>
    </div>
    <label for="Image">Image</label>
    <div>
        <input id="Image" value="<?php echo e($post->image_link); ?>"/>
        <a onclick="myFunction('Image')" href="javascript:;">COPY</a>
    </div>
    <label for="Source">Source</label>
    <div>
        <input id="Source" value="<?php echo e($post->format_type); ?>"/>
        <a onclick="myFunction('Source')" href="javascript:;">COPY</a>
    </div>

</div>

</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script>
    function myFunction(id) {
        var copyText = document.getElementById(id);
        copyText.select();
        document.execCommand("copy");
    }
</script>

</html>
<?php /**PATH C:\xampp\htdocs\botble\resources\views/detail.blade.php ENDPATH**/ ?>