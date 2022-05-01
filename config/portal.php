<?php

return [
    'saName' => env('PORTAL_SUPERUSER_NAME', 'SUPERADMIN_NAME'),
    'saPass' => env('PORTAL_SUPERUSER_PASSWORD', 'password'),
    'saMail' => env('PORTAL_SUPERUSER_EMAIL', 'super@admin.com'),
    'instanceName' => env('PORTAL_NAME', 'name')
];
