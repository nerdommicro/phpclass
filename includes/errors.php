<?php  if (count($errors) > 0) : ?>
    <p class="errors">
        <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>
    </p>
<?php  endif ?>
