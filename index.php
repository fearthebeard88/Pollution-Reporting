<?php include "head.php"; ?>
<body>
    
<h1 class="type">Type of Pollution</h1>

<form action = "" method = "post">

    <label for = "type">Air Pollution</label>
        <input type = "radio" name = "type">Smoke
        <input type = "radio" name = "type">Smog
        <input type = "radio" name = "type">Smell
        <input id = "location" type = "submit" name = "submit" value = "Report">
</form>

<div id = "map">

</div>


</body>
<script><?php include "includes/map.js"; ?></script>
<?php include "footer.php"; ?>
