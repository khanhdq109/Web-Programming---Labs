<!DOCTYPE html>
<html>
    <body>

        <?php 
            function f_for() {
                for ($i = 0; $i <= 100; $i++) {
                    if ($i % 2 == 1) {
                        echo $i;
                        if ($i != 99) {
                            echo ", ";
                        }
                    }
                }
                echo "<br>";
            }

            function f_while() {
                $n = 0;
                while ($n <= 100) {
                    if ($n % 2 == 1) {
                        echo $n;
                        if ($n != 99) {
                            echo ", ";
                        }
                    }
                    $n++;
                }
                echo "<br>";
            }

            echo "Using for loop:<br>";
            f_for();
            echo "Using while loop:<br>";
            f_while();
        ?>

    </body>
</html>