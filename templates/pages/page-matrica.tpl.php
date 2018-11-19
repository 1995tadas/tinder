<div class="matrica-page">
    <h1><?php print $page['content']['title']; ?></h1>

    <?php if (isset($page['content']['subtitle'])): ?>
        <h2><?php print $page['content']['subtitle']; ?></h2>
    <?php endif; ?>
    <hr>

    <div class="wrapper">
        <?php foreach ($page['content']['grid'] as $square): ?>
            <div class="box <?php print $square['class'] ?>"> 
            </div>
        <?php endforeach; ?>
    </div>
</div>

