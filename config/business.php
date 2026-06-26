<?php

return [
    'whatsapp_number' => env('WHATSAPP_NUMBER', '521234567890'),
    'whatsapp_message' => env('WHATSAPP_MESSAGE', 'Hola%21+Quiero+agendar+una+cita+en+LAS+DIVINAS+SPA'),
    'whatsapp_url' => 'https://wa.me/' . env('WHATSAPP_NUMBER', '521234567890') . '?text=' . env('WHATSAPP_MESSAGE', 'Hola%21+Quiero+agendar+una+cita+en+LAS+DIVINAS+SPA'),
];
