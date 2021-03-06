<?php

namespace CeddyG\ClaraEntityGenerator\Generator;

use Config;

class RouteApiGenerator extends BaseGenerator
{
    /*
     * Path where to generate the file.
     * 
     * @var string
     */
    static $PATH = '/config/';
    
    /*
     * Stub's name to use to create the file.
     * 
     * @var string
     */
    static $STUB = 'config';
    
    /**
     * Generate the file.
     * 
     * @return void
     */
    public function generate($sName = '', $sFolder = '')
    {
        $aConfig = config('clara.route.api', []);
        $aConfig[$sFolder]  = $sName;
        
        Config::set('clara.route.api', $aConfig);
        
        $aNewConfig = [];
        foreach ($aConfig as $sKey => $sValue)
        {
            $aNewConfig[] = "    '".$sKey."' => '".$sValue."'";
        }
        
        self::createFile('clara.route.api.php', [
            'Config' => implode(",\n", $aNewConfig)
        ]);
    }
}
