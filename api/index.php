<?php

// Forzar la creación de la carpeta de vistas en el entorno temporal de Vercel
if (!is_dir('/tmp/views')) {
    mkdir('/tmp/views', 0755, true);
}
putenv("VIEW_COMPILED_PATH=/tmp/views");
putenv("SESSION_DRIVER=cookie"); 
putenv("LOG_CHANNEL=stderr");

require __DIR__ . '/../public/index.php';