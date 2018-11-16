<div class="header">
    <h1>Pasirinkite puslapį į kurį norite eiti</h1>
    <?php foreach ($page['header_links'] as $link): ?>
        <a href="<?php print $link['url'] ?>"><?php print $link['text'] ?></a>
    <?php endforeach; ?>
</div>