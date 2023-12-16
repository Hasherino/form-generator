<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/style.css') }}" />
    <script type="text/javascript" src="{{ url('/script.js') }}"></script>
    <title>Form generator</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .tabs {
            display: flex;
            margin-bottom: 10px;
        }

        .tab {
            cursor: pointer;
            padding: 10px;
            border: 1px solid #ddd;
            border-bottom: none;
            background-color: #f1f1f1;
        }

        .tab:hover {
            background-color: #ddd;
        }

        .tab-content {
            display: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-header">Your form link for respondents:</div>
    <div class="form-header margin-top">
        <a href="{{ URL::to('/')."/forms/".$answeringId }}">{{ URL::to('/')."/forms/".$answeringId }}</a>
    </div>
    <div class="form-header margin-top">Your form answerers:</div>
    <div class="tabs">
        @foreach($answerers as $index => $answerer)
            <div class="tab" onclick="showTab({{ $index }})">Answerer {{ $index + 1 }}</div>
        @endforeach
    </div>

    @foreach($answerers as $index => $answerer)
        <div class="tab-content" id="tab{{ $index }}">
            <div class="field-containers">
                @foreach($answerer as $answer)
                    <div class="field-container">
                        <div class="field-title">{{ $answer['fieldTitle'] }}</div><br>
                        <div class="field-title">{{ $answer['answer'] }}</div><br>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

<script>
    function showTab(index) {
        // Hide all tab contents
        var tabContents = document.querySelectorAll('.tab-content');
        tabContents.forEach(function (tabContent) {
            tabContent.style.display = 'none';
        });

        // Show the selected tab content
        document.getElementById('tab' + index).style.display = 'block';
    }
</script>
</body>
</html>
