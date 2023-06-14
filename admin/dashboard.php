



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/semantic.min.css">
    <script src="assets/semantic.min.js"></script>
    <title>Document</title>
</head>
<body>
    <pre><?php print_r($_SESSION)  ?></pre>
    <div class="ui container">
    <table class="ui celled table">
<thead>
    <tr>
    <th>Name</th>
    <th>Age</th>
    <th>Job</th>
    </tr>
</thead>
    <tbody>
    <tr>
        <td data-label="Name">James</td>
        <td data-label="Age">24</td>
        <td data-label="Job">Engineer</td>
    </tr>
    <tr>
        <td data-label="Name">Jill</td>
        <td data-label="Age">26</td>
        <td data-label="Job">Engineer</td>
    </tr>
    <tr>
        <td data-label="Name">Elyse</td>
        <td data-label="Age">24</td>
        <td data-label="Job">Designer</td>
    </tr>
    </tbody>
</table>
</div>
</body>
</html>