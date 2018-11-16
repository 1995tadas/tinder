<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="showcase-page">
    <h1><?php print $page['content']['title']; ?></h1>

    <form action="index.php?page=showcase" method ="POST">
        Iveskite norimu pirkti kuro kieki litrais:<input type = "text" name="kuras">
        <select name="rusis">
            <option value="A98">A98</option>
            <option value="A95">A95</option>
            <option value="D">D</option>
            <option value="Dž">Dž</option>
            <option value="Dujos">Dujos</option>
        </select>
        <input type="submit" name="submit">
    </form>
    <h1><?php if(isset($page['content']['kuro_kaina'])){
        print $page['content']['kuro_kaina']." EURAI"; 
    } ?></h1>
    <?php if (isset($page['content']['subtitle'])): ?>
        <h2><?php print $page['content']['subtitle']; ?></h2>
    <?php endif; ?>
    <hr>
</div>