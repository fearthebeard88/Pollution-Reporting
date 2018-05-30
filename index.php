<?php include "head.php"; ?>
<body>

<h1 class="type">Type of Pollution</h1>

<div id="demo">

</div>

<div id = "results">

</div>

<div class="form">
    <form id = "pollution" action = "api/api_insert.php" method = "post">

        <label for = "type">Air Pollution: </label>
            <div class="radio">
                <input type = "radio" name = "type" value = "smoke">Smoke
                <input type = "radio" name = "type" value = "smog">Smog
                <input type = "radio" name = "type" value = "smell">Smell
            </div>
            <div class = "submit">
                <input id = "submit" type = "submit" name = "submit" value = "Report">
            </div>
    </form>

</div>

<div class="mobile-form">

<form id = "mobile-pollution" action = "api/api_insert.php" method = "post">

    <label for = "m_type">Air Pollution: </label>
        <div class="m_radio">
            <input type="radio" name = "m_type" value = "smoke">Smoke
            <input type="radio" name = "m_type" value = "smog">Smog
            <input type="radio" name = "m_type" value = "smell">Smell
            </div>
            <div class = "m_submit">
                <input type = "submit" name = "m_submit" value = "Report">
            </div>
        
</form>

</div>


<div id = "map">

</div>


</body>
<script><?php include "includes/map.js"; ?></script>
<script>


</script>
<?php include "footer.php"; ?>
