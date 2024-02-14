<h1 class="text-center">Quick Count</h1>
<p class="text-center">Pemilihan Presiden dan Wakil Presiden Indonesia 2024</p>
<p class="text-center">Data terakhir diambil pada <?= date("d-m-Y H:i:s") ?></p>
<hr>
<div class="row">
    <?php foreach ($data as $key => $value) { ?>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 mb-3">
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
                    <canvas id="chart<?= $value["provider"] ?>" style="width:100%;"></canvas>
                    <?php
                    // percentage is string, so we need to convert to float and put it to array
                    $percentage = [];
                    foreach ($value["items"] as $key => $item) {
                        $percentage[] = floatval($item["percentage"]);
                    }
                    // print the array to string
                    $percentage = json_encode($percentage);
                    // echo $percentage;
                    ?>
                    <!-- Chart Js -->
                    <script>
                        var xValues = ["01", "02", "03"];
                        var yValues = <?php echo $percentage ?>;
                        var barColors = ["orange", "blue", "red"];

                        new Chart("chart<?= $value["provider"] ?>", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: barColors,
                                    data: yValues
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                    text: "<?= $value["label"] ?>"
                                }
                            }
                        });
                    </script>
                    <hr>
                    <div class="text-center">
                        <span>Data masuk : <?= $value["totalReceivedDataFormatted"] ?></span>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>