<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Results</title>
</head>
<body>
<h1>Form Submission Results</h1>
<div>
    @if(!empty($formData))
    @foreach($formData as $key => $value)
    <p><strong>{{ $key }}:</strong> {{ $value }}</p>
    @endforeach
    @else
    <p>No data to display.</p>
    @endif
</div>
</body>
</html>
