<?php
defined('MOODLE_INTERNAL')||die;

$capabilities=array(
    'block/nombreetudiant:addinstance'=>array(
        'captype'=>'write',
        'contextlevel'=>CONTEXT_SYSTEM,
        'archetypes'=>array(
            'guest'=>CAP_PREVENT,
            'user'=>CAP_PREVENT,
            'student'=>CAP_PREVENT,
            'teacher'=>CAP_PREVENT,
            'editingteacher'=>CAP_ALLOW,
            'coursecreator'=>CAP_ALLOW,
            'manager'=>CAP_ALLOW,
        ),
        'clonepermissionsform'=>'moodle1/my:manageblocks'
    ),

    'block/nombreetudiant:myaddinstance'=>array(
        'riskbitmask'=>RISK_SPAM | RISK_XSS,
        'captype'=>'write',
        'contextlevel'=>CONTEXT_BLOCK,
        'archetypes'=>array(
            'guest'=>CAP_PREVENT,
            'user'=>CAP_PREVENT,
            'student'=>CAP_PREVENT,
            'teacher'=>CAP_PREVENT,
            'editingteacher'=>CAP_ALLOW,
            'coursecreator'=>CAP_ALLOW,
            'manager'=>CAP_ALLOW,
        ),
    )
)
?>