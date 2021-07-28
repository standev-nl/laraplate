<?php

if (!function_exists('includeFilesInFolder')) {
    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function includeFilesInFolder($folder)
    {
        try {
            $rdi = new RecursiveDirectoryIterator($folder);
            $it = new RecursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (!function_exists('includeRouteFiles')) {

    /**
     * @param $folder
     */
    function includeRouteFiles($folder)
    {
        includeFilesInFolder($folder);
    }
}

if (!function_exists('copyright_notice')) {

    /**
     * @param int $startyear
     * @return false|int|string
     */
    function copyright_notice(int $startyear)
    {
        $currentYear = date('Y');

        switch ($startyear) {
            case $currentYear:
                return $currentYear;
            case $startyear < $currentYear:
                return $startyear . ' - ' . $currentYear;
            case $startyear > $currentYear:
                return $startyear;
            default:
                return date('Y');
        }
    }

}

if (!function_exists('laraplate_asset')) {
    /**
     * @param $path
     * @return string
     */
    function laraplate_asset($path)
    {
        return route('laraplate_assets').'?path='.urlencode($path);
    }
}
