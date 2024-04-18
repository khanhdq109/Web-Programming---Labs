<!DOCTYPE html>
<html>
    <body>

        <?php
            function f($n) {
                if ($n <= 0) {
                    echo "Invalid!";
                    return 0;
                }
                switch ($n % 5) {
                    case 0:
                        echo "Hello";
                        break;
                    case 1:
                        echo "How are you?";
                        break;
                    case 2:
                        echo "I'm doing well, thank you";
                        break;
                    case 3:
                        echo "See you later";
                        break;
                    case 4:
                        echo "Good-bye";
                        break;
                    default:
                        echo "Default case";
                }
            }

            $n = 16543;
            f($n);
        ?>

    </body>
</html>