<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Quickly view common D&D 5e mechanics and search D&D Beyond">

        <title>D&amp;D Beyond Dashboard</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Roboto+Mono&display=swap" rel="stylesheet">

        <style type="text/css">
            body {
                background-image: url('assets/images/background.jpg');
                background-attachment: fixed;
                background-size: cover;
                font-family: "Roboto Mono";
            }

            h1 {
                font-size: 1.15rem;
            }

            .badge {
                font-size: 1rem;
            }

            .card-header {
                padding: 0;
                cursor: pointer;
            }

            .card-header:hover {
                background-color: #dc3545 !important;
            }

            .card-header:not(.collapsed) {
                background-color: #dc3545 !important;
            }
        </style>

    </head>
    <body>
        <div class="container bg-dark">
            <div class="container mt-4 mb-4 mt-lg-5 mb-lg-5">
                <?php include('sections/logo.php'); ?>
                <?php include('sections/search.php'); ?>
                <?php include('sections/quick-info.php'); ?>
                <div id="accordion-row" class="row pb-4">
                    <div class="col-12">
                        <div id="accordion">
                            <?php include('sections/cards/actions-in-combat.php'); ?>
                            <?php include('sections/cards/combat-conditions.php'); ?>
                            <?php include('sections/cards/movement.php'); ?>
                            <?php include('sections/cards/vision-and-light.php'); ?>
                            <?php include('sections/cards/cover.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script>
            $(function () {
                var searchForm = $("#search-form");
                var searchBar = $("#search-bar");

                searchBar.focus();

                searchForm.on("click", ".btn", function (event) {
                    let button = $(event.target);
                    let resource = button.data("resource");
                    let paramName = button.data("param-name");

                    searchForm.find(".btn").removeClass("bg-danger active");
                    button.addClass("bg-danger active");
                    searchForm.attr("action", "https://www.dndbeyond.com/" + resource + "?");
                    searchBar.attr("name", paramName);
                    searchBar.focus();
                });

                searchForm.on("submit", function (event) {
                    event.preventDefault();

                    this.submit();
                    this.reset();
                });

                searchForm.find(".btn").first().trigger("click");

                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>