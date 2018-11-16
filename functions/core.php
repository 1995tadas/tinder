<?php

/**
 * Includiname kažkurį tai page controllerį
 * @param type $page - refferencu perduotos $page vertės.
 * @param type $name - kontrolerio failo pavadinimas be .php
 * 
 * $page yra parametras paduotas referencu,
 * nes kontroleris pats jas keis $page masyvo vertes ir norime,
 * kad šie pokyčiai išliktų ir visame index.php faile. 
 * 
 * Jeigu referenco nenaudosime, kontrolerio padaryti pakeitimai
 * $page masyve liks tik funkcijos run_controller ribose.
 * Ir pvz.: $page['stylesheet'] jau nebepakeisime su kontroleriu, nes
 * šią vertę spausdina index.php failas
 */
function run_controller(&$page, $name) {
    include ('controllers/' . $name . '.php');    
}

/**
 * Renders page variables on a template
 * without printing it to the user
 * Returns it as string
 * 
 * Ši funkcija visą sugeneruotą HTML turinį
 * nuo ob_start() iki ob_get_clean() 
 * gražina tekstiniu pavidalu return dalyje.
 * 
 * ob_start() - pradedame bufferinti HTML (nespausdindami į ekraną)
 * ob_get_clean() - baigiame bufferinti HTML ir atiduodame
 * subufferintą HTML kaip tekstinę vertę
 * 
 * @param array $page Page variables
 * @param string $template_name Template name
 * @return string html
 */
function render_page($page, $template_name) {
    // Pradedame bufferinti output'ą į atmintį, o ne ekraną
    ob_start();
    include ('templates/pages/' . $template_name . '.tpl.php');
    // Baigiame bufferinti ir tai kas buvo 'subufferinta', 
    // returniname kaip tekstą
    return ob_get_clean();
}