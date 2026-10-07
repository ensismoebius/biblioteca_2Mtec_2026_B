<?php

return [
    // Emails que podem ver a auditoria.
    // Solucao provisoria ate o nivel de acesso (#54) ser mesclado.
    'administradores' => array_filter(
        array_map('trim', explode(',', (string) env('AUDITORIA_ADMINS', '')))
    ),
];
