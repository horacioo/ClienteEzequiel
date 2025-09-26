<main id="blog">
<?php
$args = array(
    'post_type'      => 'post',
    'posts_per_page' => 20,
    'post_status'    => 'publish'
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    echo '<ul class="ultimos-posts">';
    while ($query->have_posts()) : $query->the_post();
        /***************************************************************************************/
        $id = get_the_ID();
        $image = get_post_thumbnail_id();/****pego o id da imagem****/
        /***************************************************************************************/
        if ($image) {
            ////echo "<hr>=>"; print_r($image); echo"<=<hr>";
            $image_path = get_attached_file($image); //******pego o caminho físico da imagem****//
          
            $tamanhos = [
                ['largura' => 238, 'altura' => 180,   'qualidade' => 40],
                ['largura' => 175, 'altura' => 100,   'qualidade' => 60]
            ];
            $imagens = reduzirImagem($image_path, $tamanhos,'jpeg');
            
            /***************************************************************************************/
            /***************************************************************************************/
        }
        if ($image) {
            echo '<li class="card clicavel">';
            echo '<picture><img src="' .  $imagens['urls']['175x100'] . '" alt="teste"></picture>';
            echo '<h2>' . get_the_title() . '</h2>';
            echo '<span>'.get_the_excerpt( $id).'</span>';
            echo '<a href="' . get_permalink() . '" title='.get_the_excerpt( $id).'>ver mais </a></h2>';
            echo '</li>';
        } else {
            echo '<li class="card">';
            echo '<a href="' . get_permalink() . '">' . get_the_title() . '  title='.get_the_excerpt( $id).' </a>';
            echo '</li>';
        }
    endwhile;
    echo '</ul>';
    wp_reset_postdata();
else :
    echo '<p>Nenhum post encontrado.</p>';
endif;
?>
</main>