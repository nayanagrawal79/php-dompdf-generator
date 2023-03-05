<?php

use Dompdf\Dompdf;

require 'vendor/autoload.php';

if (isset($_POST['submit_val'])) {
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'age' => $_POST['age'],
        'country' => $_POST['country']
    ];

    $dompdf = new Dompdf();
    $dompdf->loadHtml('
    <table border=1 align=center width=400>
    <tr><td>Name : </td><td>' . $data['name'] . '</td></tr>
    <tr><td>Email : </td><td>' . $data['email'] . '</td></tr>
    <tr><td>Age : </td><td>' . $data['age'] . '</td></tr>
    <tr><td>Country : </td><td>' . $data['country'] . '</td></tr>
    </table>
    ');
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream("", array("Attachment" => false));
}
