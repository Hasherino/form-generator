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
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-title">{{ $form->title }}</div>
    <div class="field-containers">
        <form method="POST" action="/answerers/create">
            @csrf
            <input type="hidden" name="formId" value="{{ $form->id }}">
            @foreach($fields as $field)
                <div class="field-container">
                    <div class="field-title">{{ $field->title }}</div><br>
                    <input type="hidden" name="fieldIds[]" value="{{ $field->id }}">
                    <input name="answers[]" type="text" />
                </div>
            @endforeach
            <div class="publish-button-container">
                <input type="submit" class="publish-button" value="Answer" />
            </div>
        </form>
    </div>
</div>
</body>
</html>
