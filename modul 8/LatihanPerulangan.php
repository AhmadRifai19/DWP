<?php

// Melakukan perulangan banyak baris
for ($BanyakBaris = 1; $BanyakBaris <= 10; $BanyakBaris++) {

    // Melakukan perulangan untuk banyak item yang akan muncul
    for ($BanyakItem = 1; $BanyakItem <= $BanyakBaris; $BanyakItem++) {

        // item yang ingin dilakuka perulangan
        echo "*";
    }

    // membuat agar next item berada di next line
    echo "<br>";
}

?>