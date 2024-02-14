<h1 class="text-center">Real Count</h1>
<p class="text-center">Pemilihan Presiden dan Wakil Presiden Indonesia 2024</p>
<p class="text-center">Akses data terakhir pada <?= date("d-m-Y H:i:s") ?></p>
<!-- source -->
<p class="text-center">Sumber: <a href="https://pemilu2024.kpu.go.id/">KPU - Pemilu 2024</a></p>
<hr>
<?php
$chart = [];
$dataReceivedPercentage = [];
$lastUpdate = $data["ts"];
$no = 1;
foreach ($data["chart"] as $key => $value) {
    $chart[$no] = $value;
    if ($no == 4) {
        $dataReceivedPercentage = $value;
        array_pop($chart);
    }
    $no++;
}

$dataCandidate = GetCandidateList();

$candidate = [];
$no = 1;
foreach ($dataCandidate as $key => $value) {
    $candidate[] = [
        "name" => $value["nama"],
        "image" => "https://cdn.narasi.tv/qc/paslon/" . $no . ".webp",
        "number" => $value["nomor_urut"],
    ];
    $no++;
}

$result = [];
foreach ($candidate as $key => $value) {
    foreach ($chart as $keys => $item) {
        if ($value["number"] == $keys) {
            $result[] = [
                "name" => $value["name"],
                "image" => $value["image"],
                "number" => $value["number"],
                "total" => $item,
            ];
        }
    }
}

// count the percentage
$total = 0;
foreach ($result as $key => $value) {
    $total += $value["total"];
}
foreach ($result as $key => $value) {
    $result[$key]["percentage"] = number_format(($value["total"] / $total) * 100, 2);
    $result[$key]["alias"] = $value["name"] . " - " . $result[$key]["percentage"] . "%";
}

// function number with dot
function NumberFormat($number)
{
    return number_format($number, 0, ',', '.');
}

?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>Update!</strong> Data KPU terakhir diambil pada <?= $lastUpdate ?> | Progress <?= NumberFormat($data["progres"]["progres"]) ?> dari <?= NumberFormat($data["progres"]["total"]) ?> TPS (<?= $dataReceivedPercentage ?>%)
</div>

<script>
    var alertList = document.querySelectorAll(".alert");
    alertList.forEach(function(alert) {
        new bootstrap.Alert(alert);
    });
</script>


<div class="row mb-3">
    <? foreach ($result as $key => $value) { ?>
        <div class="col-md-4 col-12 mb-3">
            <div class="card text-start h-100 shadow-sm mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <!-- image -->
                            <img src="<?= $value["image"] ?>" class="img-fluid" alt="...">
                        </div>
                        <div class="col-8">
                            <h5 class="card-title fs-5
                            "><?= $value["name"] ?></h5>
                        </div>
                        <hr class="mt-3">
                        <div class="d-flex justify-content-between">
                            <p class="card-text fw-bolder fs-2"><?= $value["percentage"] ?>%</p>
                            <p class="card-text fs-5 mt-2"><?= NumberFormat($value["total"]) ?> Suara</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <? } ?>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <canvas id="chartReal"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <canvas id="chartPie"></canvas>
            </div>
        </div>
    </div>

</div>

<!-- Chart BAR Js -->
<script>
    var xValues = <?php echo json_encode(array_column($result, "number")) ?>;
    var yValues = <?php echo json_encode(array_column($result, "total")) ?>;
    var barColors = ["orange", "blue", "red"];

    new Chart("chartReal", {
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
                text: "Perolehan Suara"
            }
        }
    });
</script>

<!-- Chart Pie -->
<script>
    var xValues = <?php echo json_encode(array_column($result, "alias")) ?>;
    var yValues = <?php echo json_encode(array_column($result, "total")) ?>;
    var barColors = ["orange", "blue", "red"];

    new Chart("chartPie", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: true,
                position: "bottom"
            },
            title: {
                display: true,
                text: "Perolehan Suara"
            }
        }
    });
</script>