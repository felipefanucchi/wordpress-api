<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carros</title>
    <?php wp_head(); ?>
</head>
<body>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div>
        <?php the_content(); ?>
    </div>
    <?php endwhile; else : endif; ?>
    <?php wp_footer(); ?>
</body>
</html>