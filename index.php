<!-- A Backend Proccess -->
<?php
include "fetch.php";
?>

<!doctype html>
<html lang="en" id="theme" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icon with emoji -->
    <link rel="icon" href="https://emojicdn.elk.sh/🇮🇩" type="image/x-icon">

    <title>Pemilu Presiden Indonesia 2024</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Chart Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <!-- meta seo -->
    <meta name="description" content="Real Count - Pemilu Presiden 2024">
    <meta name="keywords" content="Real Count, Pemilu Presiden 2024, Indonesia, Narasi TV">
    <meta name="author" content="Yogi Bagus">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="7 days">
    <meta name="language" content="Indonesia">
    <meta name="distribution" content="Global">
    <meta name="rating" content="General">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffffff">

    <!-- og wa -->
    <meta property="og:title" content="Real Count - Pemilu Presiden 2024">
    <meta property="og:description" content="Rangkuman data real count pemilu presiden 2024">
    <meta property="og:image" content="https://emojicdn.elk.sh/🇮🇩">
    <meta property="og:url" content="<?= $_SERVER['PHP_SELF'] ?>">
    <meta property="og:site_name" content="Real Count - Pemilu Presiden 2024">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="id_ID">
    <meta property="og:locale:alternate" content="en_US">

    <!-- twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@yogsterID">
    <meta name="twitter:creator" content="@yogsterID">
    <meta name="twitter:title" content="Real Count - Pemilu Presiden 2024">
    <meta name="twitter:description" content="Rangkuman data real count pemilu presiden 2024">
    <meta name="twitter:image" content="https://emojicdn.elk.sh/🇮🇩">

</head>

<body>
    <!-- As a link -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= $_SERVER['PHP_SELF'] ?>">Pemilu Presiden 2024 🇮🇩</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= $_SERVER['PHP_SELF'] . "?page=real" ?>">Real Count</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $_SERVER['PHP_SELF'] . "?page=quick" ?>">Quick Count</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            URL Penting
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" target="_blank" href="https://pemilu2024.kpu.go.id/">KPU - Pemilu 2024</a></li>
                            <li><a class="dropdown-item" target="_blank" href="kawalpemilu.org">Kawal Pemilu</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" target="_blank" href="https://www.narasi.tv/">Narasi TV</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" target="_blank" href="https://linkedin.com/in/yogibagus">Delivered by Yogi Bagus</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Kecurangan</a>
                    </li>
                </ul>
                <!-- switcher darkmode -->
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="darkmodeSwitch" />
                    <label class="form-check-label" for="flexSwitchCheckChecked">Darkmode</label>
                </div>

            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div id="quickcount">
            <?php $data = GetQuickCountData() ;include "quick.php"; ?>
        </div>
        <div id="realcount">
            <?php $data = GetRealCountData() ;include "real.php"; ?>
        </div>
        <div class="text-center mt-5">
            <p>© 2024 - Quick Count - Pemilu Presiden 2024 🇮🇩</p>
        </div>
    </div>


    <!-- JS Here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

    <!-- jequery darkmode switcher -->
    <script>
        $(document).ready(function() {
            $("#darkmodeSwitch").click(function() {

                // check the localstorage
                if (localStorage.getItem("darkmode") == "on") {
                    $("#theme").attr("data-bs-theme", "dark");
                    $("#darkmodeSwitch").prop("checked", true);
                    localStorage.setItem("darkmode", "off");
                    console.log("darkmode on");
                } else {
                    $("#theme").attr("data-bs-theme", "light");
                    $("#darkmodeSwitch").prop("checked", false);
                    localStorage.setItem("darkmode", "on");
                    console.log("darkmode off");
                }
            });
        });
    </script>

    <!-- check url parameter -->
    <script>
        $(document).ready(function() {
            var url = new URL(window.location.href);
            var page = url.searchParams.get("page");
            if (page == "quick") {
                $("#quickcount").show();
                $("#realcount").hide();
            } else {
                $("#quickcount").hide();
                $("#realcount").show();
            }
        });
    </script>
</body>

</html>