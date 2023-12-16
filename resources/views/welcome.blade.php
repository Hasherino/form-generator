<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/style.css') }}" />
    <script type="text/javascript" src="{{ url('/script.js') }}"></script>
    <title>Form generator</title>
</head>
<body>
<div class="container">
    <form id="dynamicForm" method="POST" action="/forms/create">
        @csrf
        <div class="form-header">Create a new form</div>
        <input type="text" class="form-title edit-icon" name="title" placeholder="Untitled form">
        <div class="field-containers">
        </div>
        <button type="button" class="add-field-button round-button"><i class="fa fa-plus"></i></button> Add new field
    </form>

    <div class="publish-button-container">
        <button type="submit" form="dynamicForm" class="publish-button">Publish Form</button>
    </div>
</div>
</body>
</html>
