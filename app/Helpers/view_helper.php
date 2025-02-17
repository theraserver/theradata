<?php
function thera_view($link, array $data = null)
{
    $uri = service('uri');
    $datas = [
        'uri' => $uri,
    ];
    if ($data) {
        $datas = array_merge($datas, $data); // Menggabungkan array asosiatif
    }
    return view($link, $datas);
}
