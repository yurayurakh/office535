<?php

include 'defines.php';

$post = (!empty($_POST)) ? true :false;

if($post) {

    $type = stripcslashes($_POST['type-form']);
    switch ($type) {
        case 'social' :
            $typeForm = "Оформление групп в соц. сетях";
            break;
        case 'ad' :
            $typeForm = "Настройка контекстной рекламы";
            break;
        case 'target' :
            $typeForm = "Таргетинг Вконтакте, Facebook";
            break;
        default:
            $typeForm = "Обычная заявка";
    }
    $name = stripcslashes($_POST['name']);
    $phone = stripcslashes($_POST['phone']);
    $email = stripcslashes($_POST['email']);
    $number = stripcslashes($_POST['number']);
    $message = stripcslashes($_POST['message']);
    $subject = 'Заявка';
    $error = '';
    $message = '
            <html>
                <head>
                    <title>Заявка</title>
                </head>
                <body>
                    <p>Тип заявки: '.$typeForm.'</p>
                    <p>Имя: '.$name.'</p>
                    <p>Телефон: '.$phone.'</p>
                    <p>E-mail: '.$email.'</p>
                    <p>Комментарий: '.$message.'</p>
                </body>
            </html>';

    if(!$error) {
        $mail = mail(CONTACT_FORM, $subject, $message,
            "From: Office535.studio@studia.ru\r\n"
            ."Content-type: text/html; charset=utf-8 \r\n"
            ."X-Mailer: PHP/" . phpversion()
        );
        if($mail) {
            echo "OK";
        }
    }
    else {
        echo '<div class="bg-danger">'.$error.'</div>';
    }
}
?>
