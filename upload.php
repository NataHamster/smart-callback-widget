<?php
session_start();

if($_SERVER["REQUEST_METHOD"] !== "POST") exit;
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) exit;

$file = "data-main.php";

$arr_main = $_POST;

$content = "<?php\n\n";

foreach ($arr_main as $key => $value) {
    if (is_array($value)) {
        $value = json_encode($value, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    $content .= '$' . $key . ' = ' . var_export($value, true) . ";\n";
}

$result = file_put_contents($file, $content, LOCK_EX);

if ($result === false) {
    http_response_code(500);
    echo 'Failed to save configuration';
    exit;
}
?>
