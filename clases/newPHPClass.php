<?php

$t = "<tr>
        <td>{correo}</td>
        <td>{nombre}</td>
        <td>{apellidos}</td>
        <td>{direccion}</td>
        <td>{tipo}</td>
        <td>{activo}</td>
        <td>{fecha}</td>
        <td>
            <a href='index.php?ruta=usuario&accion=borrar&correo={correo}'>Borrar</a>
            <a href='index.php?ruta=usuario&accion=vereditar&correo={correo}'>Editar</a><br/>
        </td>
    </tr>";
$r = getModelo()->dolistar();
$todo = "";

foreach ($r as $key => $value) {
    $todo = str_replace('{correo}', $value, $todo);
    $todo .= str_replace('{nombre}', $value, $todo);
    $todo .= str_replace('{apellidos}', $value, $todo);
    $todo .= str_replace('{direccion}', $value, $todo);
    $todo .= str_replace('{tipo}', $value, $todo);
    $todo .= str_replace('{activo}', $value, $todo);
    $todo .= str_replace('{fecha}', $value, $todo);
}
