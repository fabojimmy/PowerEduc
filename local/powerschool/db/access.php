<?php
$capabilities = array(
    'local/powerschool:createfiliere' => array(
        'riskbitmask' => RISK_SPAM, 
        'captype' => 'write', 
        'contextlevel' =>CONTEXT_MODULE, 
        'archetypes' => array(
            'manager' => CAP_ALLOW,
        ),
        'clonepermissionsform'=>'powereduc1/my:manageblocks'
    ),
        );

        
?>