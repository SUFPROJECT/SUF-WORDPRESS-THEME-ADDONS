<?php

namespace SUF\Modules;

    function include_suf_modules_files()
    {
        include_once(__DIR__ . '/mod/clean_up.php');
        include_once(__DIR__ . '/mod/disable-asset-versioning.php');
        include_once(__DIR__ . '/mod/disable-rest-api.php');
        include_once(__DIR__ . '/mod/disable-trackbacks.php');
        include_once(__DIR__ . '/mod/nav-walker.php');
        include_once(__DIR__ . '/mod/nice-search.php');
        include_once(__DIR__ . '/mod/disable-googlefonts.php');
    }

    include_suf_modules_files();

