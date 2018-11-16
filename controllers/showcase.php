<?php

$page['title'] = 'Kiausai!';
$page['show_footer'] = true;
$page['show_header'] = true;

$page['content']['title'] = 'Kuro kainos Skaičiuoklė';
$page['content']['subtitle'] = 'Subtitle';

if (isset($_POST["kuras"])) {
    $kuras = $_POST["kuras"];
    switch ($_POST["rusis"]) {
        case "A98":
            $kaina = $kuras * 1.130;
            break;
        case "A95":
            $kaina = $kuras * 1.110;
            break;
        case "D":
            $kaina = $kuras * 1.130;
            break;
        case "Dž":
            $kaina = $kuras * 0.790;
            break;
        case "Dujos":
            $kaina = $kuras * 0.540;
            break;
        default:
            break;
    }
    $page['content']['kuro_kaina'] = $kaina;
}

$page['content']['rendered'] = render_page($page, 'page-showcase');
