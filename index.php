<?php include "head.php"; ?>
<body>

<h1 class="type">Type of Pollution</h1>

<form action = "api/api_insert.php" method = "post">

    <label for = "type">Air Pollution</label>
        <input type = "radio" name = "type" value = "smoke">Smoke
        <input type = "radio" name = "type" value = "smog">Smog
        <input type = "radio" name = "type" value = "smell">Smell
        <input id = "location" type = "submit" name = "submit" value = "Report">
</form>

<div id = "map">

</div>


</body>
<script><?php include "includes/map.js"; ?></script>
<script>

$(document).ready(function() {
$.get("api/api_test.php", function(data) {
    alert(data);
});
});

// $("#location").click(function() {
//     $.post("api/api_insert.php", function (lat_lon, status) {
//         alert("Location: " + lat_lon + "\nStatus: " + status);
//     })
// })

</script>
<?php include "footer.php"; ?>
