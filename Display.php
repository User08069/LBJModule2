
<?php
echo "<html><body><table>\n\n";
$f = fopen("contact_data.csv", "r");
while (($line = fgetcsv($f)) !== false) {
        foreach ($line as $cell) {
            if(is_numeric($cell))
            {
                echo "<td>";
            }
            else
            {
                echo "$cell<br>";
           
            }
        }
        echo "</td>\n\r";
}
fclose($f);
echo "\n</table></body></html>";
?>

