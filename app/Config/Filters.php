<?php
namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors; // Assurez-vous d'importer le filtre Cors
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;
use CodeIgniter\Filters\AuthFilter;

class Filters extends BaseFilters
{
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,  // Assurez-vous que Cors est bien ajouté ici
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
        'auth'   => AuthFilter::class,

    ];

    public array $globals = [
        'before' => [
           
                'auth'   
            
        ],
        'before' => [
            'cors',  // Activer le filtre CORS globalement
        ],
        'after' => [
            // Vous pouvez ajouter d'autres filtres après la requête si nécessaire
        ],
    ];

    public array $methods = [];

    public array $filters = [];

}
