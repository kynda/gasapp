<html>
    <head>
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    </head>
    <body>
        <?= $content ?>
        <!-- have a button POST a click via AJAX -->
        <button hx-post="/clicked" hx-swap="outerHTML">
            Click Me
        </button>
        <script src="https://unpkg.com/htmx.org@1.9.6"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>

