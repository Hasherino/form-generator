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
    <div class="form-header">Create a new form</div>
    <div class="form-title edit-icon" contenteditable="true">Untitled form</div>
    <div class="field-containers">
    </div>
    <button class="add-field-button"><i class="fa fa-plus"></i></button> Add new field
</div>

<div class="publish-button-container">
    <button class="publish-button">Publish Form</button>
</div>
</body>
</html>
