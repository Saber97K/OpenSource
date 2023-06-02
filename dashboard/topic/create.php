<?php include("../../path.php"); ?>
<?php  include(ROOT_PATH . '/controllers/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatitive" content="ie=edge">
	<script src="https://kit.fontawesome.com/083ef0b105.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../../styles/general.css">
    <link rel="stylesheet" href="../../styles/header.css">
    <link rel="stylesheet" href="../../styles/admin.css">
	<link href="https://fonts.googleapis.com/css?family=Candal|Lora&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M" crossorigin="anonymous">
	<title>Admin section-add topic</title>
</head>


<body>
<?php include(ROOT_PATH . "/parts/header.php"); ?>
	<div class ="admin-wrapper">
		<div class="admin-content">
		<?php include(ROOT_PATH . "/dashboard/sidebar.php"); ?>
	<div class="main-cont-dashboard">
		<h2 class="page-title">Add topic</h2>
		<div class="inside">
		<?php include(ROOT_PATH . "/controllers/formErrors.php"); ?>
		<form action="create.php" method="post" enctype="multipart/form-data">
			<div class="title">
				<label>Title</label>
				<input value="<?php echo $topic_name ?>"type="text" name="topic_name" class="text-input">

			</div>
			<div>
				<button type="submit" name="add-topic" class="btnLogin" style=" padding:15px 20px;">Add topic</button>
			</div>
			</div>		
		</form>
	</div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
ClassicEditor
    .create( document.querySelector( '#body' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );

</script>

</body>