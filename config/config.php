<?php

return [

    /*
     * cache path
     */
    'cache' => env('DYNA_CACHE_PATH', storage_path() . '/framework/cache/compile'),

    /*
     * skin name
     * public_html/{$path}/{$skin}
     */
    'skin' => 'default',
    'path' => 'dynahtml'
];
