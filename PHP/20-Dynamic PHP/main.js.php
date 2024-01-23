<?php
header('Content-type: text/js')
?>

$(document).ready(function(){
console.log("You are 100x better than before!");
alert("You are <?= rand(100, 200) ?>x better than before!");
});