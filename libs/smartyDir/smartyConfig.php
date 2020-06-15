<?php   
        //echo phpinfo();
        require_once('libs/smarty/Smarty.class.php');                 
        
        $smarty = new Smarty();

        $smarty->setTemplateDir('./smartyDir/templates/');
        $smarty->setCompileDir('./smartyDir/templates_c/');
        $smarty->setConfigDir('./smartyDir/configs/');
        $smarty->setCacheDir('./smartyDir/cache/');
        
        


        
    ?>