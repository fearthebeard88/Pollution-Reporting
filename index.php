<?php include "head.php"; ?>
<body>

<h1 class="type">Type of Pollution</h1>

<div id="demo">

</div>

<form id = "pollution" action = "api/api_insert.php" method = "post">

    <label for = "type">Air Pollution</label>
        <input type = "radio" name = "type" value = "smoke">Smoke
        <input type = "radio" name = "type" value = "smog">Smog
        <input type = "radio" name = "type" value = "smell">Smell
        <input id = "submit" type = "submit" name = "submit" value = "Report">
</form>

<div id = "map">

</div>


</body>
<script><?php include "includes/map.js"; ?></script>
<script>


</script>
<?php include "footer.php"; ?>
