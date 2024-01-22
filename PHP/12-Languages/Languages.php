<?php

$languages = array('PHP', 'JS', 'Ruby');

echo "<select>";
for ($i = 0; $i < count($languages); $i++) {
    echo "<option> {$languages[$i]} </option>";
}
echo "</select>";

echo "<select>";
foreach ($languages as $language) {
    echo "<option>$language</option>";
}
echo "</select>";

array_push($languages, 'HTML', 'CSS');

echo "<select>";
for ($i = 0; $i < count($languages); $i++) {
    echo "<option> {$languages[$i]} </option>";
}
echo "</select>";
