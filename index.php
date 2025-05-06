<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tombol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card"></div>
                <div class="card">
                    <div class="card-header">
                        Panel Lampu
                    </div>
                    <div class="card-body">
                        <h4>Modul</h4>
                        <p id="ledSt">Status</p>
                        <!-- <form action="" method="post"> -->
                        <button class="btn btn-success" type="submit" value="" name="led" id="btnLed1">Led 1</button>
                        <button class="btn btn-success" type="submit" value="" name="led" id="btnLed2">Led 2</button>
                        <button class="btn btn-danger" type="submit" value="" name="led" id="lock">Lock</button>
                        <button class="btn btn-primary" type="submit" value="" name="led" id="unlock">Unlock</button>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


    <script>
        var ledLock = true;
        $("#btnLed1").click(function() {
            $.ajax({
                url: "proses.php",
                type: "POST",
                data: {
                    perintah: "1"
                },
                success: function(response) {
                    console.log(response);
                    if (ledLock) {
                        document.getElementById("ledSt").innerHTML = "LED Locked";
                    } else {
                        document.getElementById("ledSt").innerHTML = "LED 1 Blinking";
                    }
                }

            });
            console.log("Lampu 1 Blink");
        });

        $("#btnLed2").click(function() {
            $.ajax({
                url: "proses.php",
                type: "POST",
                data: {
                    perintah: "2"
                },
                success: function(response) {
                    console.log(response);
                    if (ledLock) {
                        document.getElementById("ledSt").innerHTML = "LED Locked";
                    } else {
                        document.getElementById("ledSt").innerHTML = "LED 2 Blinking";
                    }
                }

            });
            console.log("Lampu 2 Blink");
        });

        $("#lock").click(function() {
            $.ajax({
                url: "proses.php",
                type: "POST",
                data: {
                    perintah: "l"
                },
                success: function(response) {
                    console.log(response);
                    document.getElementById("ledSt").innerHTML = "LED Locked";
                    ledLock = true;
                }

            });
            console.log("Lock");
        });

        $("#unlock").click(function() {
            $.ajax({
                url: "proses.php",
                type: "POST",
                data: {
                    perintah: "u"
                },
                success: function(response) {
                    console.log(response);
                    document.getElementById("ledSt").innerHTML = "LED Unlocked";
                    ledLock = false;
                }

            });
            console.log("Unlock");
        });
    </script>
</body>

</html>