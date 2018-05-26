<?php include "head.php"; ?>
<body>

<h1 class="type">Type of Pollution</h1>

<div id="demo">

</div>

<div id = "results">

</div>

<form id = "pollution" action = "api/api_insert.php" method = "post">

    <label for = "type">Air Pollution: </label>
        <div class="radio">
            <input type = "radio" name = "type" value = "smoke">Smoke
        </div>
        <div class = "radio">
            <input type = "radio" name = "type" value = "smog">Smog
        </div>
        <div class = "radio">
            <input type = "radio" name = "type" value = "smell">Smell
        </div>
        <div class = "submit">
            <input id = "submit" type = "submit" name = "submit" value = "Report">
        </div>
</form>



<div id = "map">

</div>


</body>
<script><?php include "includes/map.js"; ?></script>
<script>


</script>
<?php include "footer.php"; ?>
