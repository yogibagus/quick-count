<!-- A Backend Proccess -->
<?php 
// curl get data from api with no auth
$url = "https://gateway.narasi.tv/core/api/quick-count/capres";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);

?>

<!doctype html>
<html lang="en" id="theme" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>🇮🇩 Quick Count - Pemilu Presiden Indonesia 2024</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- meta seo -->
    <meta name="description" content="Quick Count - Pemilu Presiden 2024">
    <meta name="keywords" content="Quick Count, Pemilu Presiden 2024, Indonesia, Narasi TV">
    <meta name="author" content="Yogi Bagus">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="7 days">
    <meta name="language" content="Indonesia">
    <meta name="distribution" content="Global">
    <meta name="rating" content="General">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <!-- As a link -->
    <nav class="navbar bg-body-tertiary shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Quick Count - Pemilu Presiden 2024 🇮🇩</a>
            <!-- switcher darkmode -->
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="darkmodeSwitch" />
                <label class="form-check-label" for="flexSwitchCheckChecked">Darkmode</label>
            </div>

        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Quick Count</h1>
        <p class="text-center">Pemilihan Presiden dan Wakil Presiden Indonesia 2024</p>
        <p class="text-center">Data terakhir diambil pada <?= date("d-m-Y H:i:s") ?></p>
        <hr>
        <div class="row">
            <?php foreach ($data as $key => $value) { ?>
            <div class="col-md-4 col-sm-12 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <!-- image center only 200px for max-width -->
                        <div class="text-center mb-2">
                            <img src="<?= $value["logo"] ?>" class="img-fluid" width="200px" alt="...">
                        </div>
                        <div class="row">
                            <?php foreach ($value["items"] as $key => $item) { ?>
                            <div class="col-md-4 col-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <img src="<?= $item["picture"] ?>" class="img-fluid mb-1" alt="...">
                                        <p class="card-text text-center fw-bolder font-monospace" style="font-size: 15px;"> <?= $item["percentageFormatted"] ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <hr>
                        <div class="text-center">
                            <span>Data masuk : <?= $value["totalReceivedDataFormatted"] ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>


    <!-- JS Here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

    <script>
        // jequery darkmode switcher
        $(document).ready(function () {
            $("#darkmodeSwitch").click(function () {

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
</body>

</html>