<?php include "head.php"; ?>
<body>

<h1 class="type">Type of Pollution</h1>

<div id="demo">

</div>

<form id = "pollution" action = "" method = "post">

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

$("#submit").on("click", function(event) {
    event.preventDefault();
    console.log("hello, this thing working?");
    $.post("api/api_insert.php", $("#pollution").val(), function(data) {
        console.log("Data: " + data + "\nStatus: " + status);
    })
})

</script>
<?php include "footer.php"; ?>
