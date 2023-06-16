<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculation</title>
</head>
<body>
    <form method="post">
        <label for="num1">Number 1:</label>
        <input type="text" id="num1" name="num1" required>
        
        <label for="num2">Number 2:</label>
        <input type="text" id="num2" name="num2" required>
        
        <label for="operator">Operator:</label>
        <select id="operator" name="operator" required>
            <option value="+">加法</option>
            <option value="-">減法</option>
            <option value="*">乘法</option>
            <option value="/">除法</option>
        </select>
        
        <input type="submit" value="Calculate">
    </form>
    
    <?php
    $results = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];
        $result = '';

        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = "Error: Division by zero.";
                }
                break;
        }

        $results[] = "$num1 $operator $num2 = $result";
    }
    ?>

    <?php if (!empty($results)) : ?>
        <h2>Calculation Results:</h2>
        <ul>
            <?php foreach ($results as $calculation) : ?>
                <li><?php echo $calculation; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
