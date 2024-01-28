<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css" />
    <script src="jquery.bubble.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Authentication</title>
    <script>
        $(document).ready(function() {
            $("body").bubble({
                background: {
                    0: "#000",
                    1: "#FFF",
                },
                img: [
                    "img/pink.png",
                    "img/yellow.png",
                    "img/green.png",
                    "img/anime.png",
                    "img/anime2.png",
                    "img/anime3.png",
                ],
                shadowColor: [
                    "#8bcecb",
                    "#f2a2b9",
                    "#f4b6d1",
                    "#ca98c3",
                    "#fff231",
                    "#4ab7d0",
                ],
            });
        });
    </script>
</head>

<body>
    <header>
        <h1>Blogger</h1>
    </header>
    <div id="main-body">
        <figure class="hero">
            <figcaption>
                <h1>Powered by Cool Plugins!</h1>
                <p>
                    This is a blogger that showcases "Cool Plugins Project."
                    Please enjoy the accordion picture set and hover Cards
                    with some floating bubbles and images! These pictures
                    shows a little about my favorite genre in anime.
                    それでは！楽しみにしてください！
                </p>
            </figcaption>
        </figure>
    </div>
</body>

</html>