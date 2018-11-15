<?php
// Load all functions here
require_once 'functions/core.php';

// Enable/Disable Debugging
$debug = true;

/**
 * Default $page array:
 * Array of all page variables
 * and settings
 */
$page = [
    'title' => 'Error: 404',
    'stylesheet' => 'main.css',
    'content' => [
        // Šitas variable 'rendered' bus sukurtas controllerio
        // Tai bus ilgas HTML'o stringas sukurtas funkcijos
        // render_page()
        'rendered' => 'Tokio puslapio nerasta'
    ],
    'show_header' => true,
    'show_footer' => true,
];

/**
 * Čia yra mūsų "Router'is"
 * Kiekvienam page iškviečiame
 * atitinkamą controller'į
 */
if (isset($_GET['page'])) {
    $page_name = $_GET['page'];

    if ($page_name == 'home') {
        run_controller($page, 'home');
    }
    //elseif ($page_name == 'cv') {
    //    run_controller($page, 'cv');
    //}
    
    /**
     * Best Way
     */
    /*
    switch ($page_name) {
        case 'home':
            run_controller($page, home);
            break;
        case 'cv':
            run_controller($page, cv);
            break;
        default:
        // run_controller($page, '404');
    }
     */
}
?>
<html>
    <head>
        <title><?php print $page['title']; ?></title>
        <link rel="stylesheet" type="text/css" href="/css/<?php print $page['stylesheet']; ?>">
    </head>
    <body>
        <!-- Debug Output !-->
        <?php if ($debug) var_dump($page); ?>
        
        <!-- Header !-->
        <?php if ($page['show_header']): ?>
            <div class="header-wrapper">
                <?php include ('templates/objects/header.tpl.php'); ?>
            </div>
        <?php endif; ?>
        
        <!-- Content !-->
        <?php if (isset($page['content']['rendered'])): ?>
            <div class="content-wrapper">
                <?php print $page['content']['rendered']; ?>
            </div>
        <?php endif; ?>
        
        <!-- Footer !-->
        <?php if ($page['show_footer']): ?>
            <div class="footer-wrapper">
                <?php include ('templates/objects/footer.tpl.php'); ?>
            </div>
        <?php endif; ?>
    </body>
</html>