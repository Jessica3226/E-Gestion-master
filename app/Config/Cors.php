<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Cross-Origin Resource Sharing (CORS) Configuration
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
 */
class Cors extends BaseConfig
{
    
    public array $default = [
        'allowedOrigins' => ['http://127.0.0.1:5500', 'http://localhost:5500'], // Origines autorisées
        'allowedOriginsPatterns' => [], // Laissez vide si pas besoin de regex
        'supportsCredentials' => true,  // Si vous utilisez des cookies ou des sessions partagées
        'allowedHeaders' => ['Content-Type', 'Authorization', 'X-Requested-With'], // En-têtes autorisés
        'exposedHeaders' => ['Content-Type', 'Authorization'], // En-têtes exposés
        'allowedMethods' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'], // Méthodes autorisées
        'maxAge' => 7200, // Cache des résultats des pré-requêtes
    ];
}
