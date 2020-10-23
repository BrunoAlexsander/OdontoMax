<?php
function Mask($mask, $str) {
    $str = str_replace(" ", "", $str);

    for ($i = 0; $i < strlen($str); $i++) {
        $mask[strpos($mask, "#")] = $str[$i];
    }
    return $mask;
}

function existeSessao() {
    if (!isset($_SESSION['CODIGO_USUARIO'])) {
        header("Location: index.php");
        exit();
    }
}
?>
