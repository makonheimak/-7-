<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
    <style>
        .calculator {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
        }
        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin: 20px 0;
        }
        button {
            padding: 15px;
            font-size: 18px;
            cursor: pointer;
        }
        .result {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Калькулятор</h2>
        <form method="POST">
            <input type="number" step="any" name="num1" placeholder="Первое число" 
                   value="<?php echo isset($_POST['num1']) ? htmlspecialchars($_POST['num1']) : ''; ?>" required>
            <input type="number" step="any" name="num2" placeholder="Второе число" 
                   value="<?php echo isset($_POST['num2']) ? htmlspecialchars($_POST['num2']) : ''; ?>" required>
            
            <div class="buttons">
                <button type="submit" name="operation" value="add">+</button>
                <button type="submit" name="operation" value="subtract">-</button>
                <button type="submit" name="operation" value="multiply">×</button>
                <button type="submit" name="operation" value="divide">÷</button>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $num1 = floatval($_POST['num1']);
            $num2 = floatval($_POST['num2']);
            $operation = $_POST['operation'];
            $result = 0;
            $operationSymbol = '';

            switch ($operation) {
                case 'add':
                    $result = $num1 + $num2;
                    $operationSymbol = '+';
                    break;
                case 'subtract':
                    $result = $num1 - $num2;
                    $operationSymbol = '-';
                    break;
                case 'multiply':
                    $result = $num1 * $num2;
                    $operationSymbol = '×';
                    break;
                case 'divide':
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                        $operationSymbol = '÷';
                    } else {
                        echo "<p style='color: red;'>Ошибка: деление на ноль!</p>";
                        exit;
                    }
                    break;
            }

            echo "<div class='result'>";
            echo "$num1 $operationSymbol $num2 = $result";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
