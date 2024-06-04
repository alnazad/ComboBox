<?php
$con = new mysqli("localhost", "root", "", "bangladesh");
$coun = $con->query("SELECT * FROM country")->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><br><br>
    <div class="container">
        <div class="row">
            <div class="form-group">
                <label for="exampleInputEmail1">Country :</label>
                <select name="country" id="country" class="form-control">
                    <option value="">Select One</option>
                    <?php foreach ($coun as $country) { ?>
                        <option value="<?php echo $country['id'] ?>"><?php echo $country['name'] ?></option>
                    <?php } ?>
                </select>
            </div><br><br>
                
            <div class="form-group">
                <label for="exampleInputEmail1">Division :</label>
                <select id="division" class="form-control" disabled>
                    <option>Select One</option>
                </select>
            </div><br><br>
            <div class="form-group">
                <label for="exampleInputEmail1">District :</label>
                <select id="district" class="form-control" disabled>
                    <option>Select One</option>
                </select>
            </div><br><br>
            <div class="form-group">
                <label for="exampleInputEmail1">Thana :</label>
                <select id="thana" class="form-control" disabled>
                    <option>Select One</option>
                </select>
            </div><br><br>
            <div class="form-group">
                <label for="exampleInputEmail1">Union :</label>
                <select id="union" class="form-control" disabled>
                    <option>Select One</option>
                </select>
            </div><br><br>
            <div class="form-group">
                <label for="exampleInputEmail1">Village :</label>
                <select id="village" class="form-control" disabled>
                    <option>Select One</option>
                </select>
            </div><br><br>
        </div>
</body>

</html>
<script type="text/javascript" src="jquery-3.7.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#country').change(function() {
            let country = $('#country option:selected').val();
            $('#division').prop('disabled', true);
            $('#district').prop('disabled', true);
            $('#thana').prop('disabled', true);
            $('#union').prop('disabled', true);
            $('#village').prop('disabled', true);

            $.getJSON("country_api.php?divid=" + country, function(data) {
                let ht = "<option>Select One</option>"
                data.map((d, i) => {
                    ht += `<option value="${d.id}">${d.name}</option>`
                })
                $('#division').html(ht).prop('disabled', false);
            });
        });

        $('#division').change(function() {
            let division = $('#division option:selected').val();
            $('#district').prop('disabled', true);
            $('#thana').prop('disabled', true);
            $('#union').prop('disabled', true);
            $('#village').prop('disabled', true);

            $.getJSON("country_api.php?disid=" + division, function(data) {
                let ht = "<option>Select One</option>"
                data.map((d, i) => {
                    ht += `<option value="${d.id}">${d.name}</option>`
                })
                $('#district').html(ht).prop('disabled', false);
            });
        });

        $('#district').change(function() {
            let district = $('#district option:selected').val();
            $('#thana').prop('disabled', true);
            $('#union').prop('disabled', true);
            $('#village').prop('disabled', true);

            $.getJSON("country_api.php?thaid=" + district, function(data) {
                let ht = "<option>Select One</option>"
                data.map((d, i) => {
                    ht += `<option value="${d.id}">${d.name}</option>`
                })
                $('#thana').html(ht).prop('disabled', false);
            });
        });

        $('#thana').change(function() {
            let thana = $('#thana option:selected').val();
            $('#union').prop('disabled', true);
            $('#village').prop('disabled', true);

            $.getJSON("country_api.php?unid=" + thana, function(data) {
                let ht = "<option>Select One</option>"
                data.map((d, i) => {
                    ht += `<option value="${d.id}">${d.name}</option>`
                })
                $('#union').html(ht).prop('disabled', false);
            });
        });

        $('#union').change(function() {
            let union = $('#union option:selected').val();
            $('#village').prop('disabled', true);

            $.getJSON("country_api.php?vilid=" + union, function(data) {
                let ht = "<option>Select One</option>"
                data.map((d, i) => {
                    ht += `<option value="${d.id}">${d.name}</option>`
                })
                $('#village').html(ht).prop('disabled', false);
            });
        });
    });
</script>
