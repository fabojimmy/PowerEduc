<?php
//fichier de definittion des liens de configuration

// if($hassiteconfig) {
    $ADMIN->add('root',new admin_category('powerschool', 'PowerEduc'));

    // $ADMIN->add('powerschool',new admin_externalpage('index',get_string('reglages', 'local_powerschool')
    // ,new moodle_url ('/local/powerschool/statistique.php')));
    // $ADMIN->add('powerschool', new admin_externalpage('index', get_string('reglages', 'local_powerschool'), 
    // new moodle_url ('/local/powerschool/statistique.php')));


    // $ADMIN->add('powerschool',new admin_externalpage('index',get_string('accueilp', 'local_powerschool')
    // ,new moodle_url ('/local/powerschool/index.php')));

    // $ADMIN->add('powerschool',new admin_externalpage('inscription',get_string('gestinscription', 'local_powerschool')
    // ,new moodle_url ('/local/powerschool/inscription/inscription.php'))); 

    // $ADMIN->add('manager', new admin_category('powerschool', 'PowerEduc'));
        $ADMIN->add('powerschool', new admin_externalpage('index', get_string('reglages', 'local_powerschool'), 
        new moodle_url ('/local/powerschool/statistique.php')));

//         if($hassiteconfig)
// {
//     // $ADMIN->add('localplugins',$settings);
//     $ADMIN->add('Power',new admin_category('local_powerschool',get_string('reglages', 'local_powerschool')));
//     $ADMIN->add('local_powerschool', new admin_externalpage('local_powerschool',
//     get_string('reglages', 'local_powerschool'),
//      new moodle_url ('/local/powerschool/statistique.php'),null
//     ));
// }
// }

