<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                max-width: 500px;
            }

            td {
                border: 2px solid black;
                text-align: center;
                padding: 8px;
                width: 20px;
                background-color: yellow;
            }
        </style>
    </head>

    <body>

        <?php 
            // Init table
            $value = [];
            for ($i = 1; $i <= 7; $i++) {
                $row = [];
                for ($j = 1; $j <= 7; $j++) {
                    $row[] = $j * $i;
                }
                $value[] = $row;
            }

            # Display table
            echo "<table>";
            for ($i = 0; $i < count($value); $i++) {
                echo "<tr>";
                for ($j = 0; $j < count($value[$i]); $j++) {
                    echo "<td>" . $value[$i][$j] ."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>