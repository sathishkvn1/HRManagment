<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tab Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tab1">Tab 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab2">Tab 2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab3">Tab 3</a>
        </li>
    </ul>

    <div class="tab-content mt-3">
        <div id="tab1" class="tab-pane fade show active">
            <h3>Tab 1 Content</h3>
            <p>This is the content of Tab 1.</p>
        </div>
        <div id="tab2" class="tab-pane fade">
          
            <?php include("tab2.php");?>
        </div>
        <div id="tab3" class="tab-pane fade">
            <?php include("tab3.php");?>
         
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
