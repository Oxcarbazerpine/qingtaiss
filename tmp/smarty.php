<?php   
        //echo phpinfo();
        require_once('./libs/smarty/Smarty.class.php');                 
        
        $smarty = new Smarty();

        $smarty->setTemplateDir('./templates/');
        $smarty->setCompileDir('./templates_c/');
        $smarty->setConfigDir('./configs/');
        $smarty->setCacheDir('./cache/');
        
        $smarty -> assign('test','OK');
        $smarty->display('test.php');
        
    ?>