<?php
$category = get_queried_object();


if ($category && isset($category->term_id)) {
    $category_id   = $category->term_id;      // ID da categoria
    $category_name = $category->name;         // Nome da categoria

    $idCategoria   =  esc_html($category_id);
    $nomeCategoria =  esc_html($category_name);


    $image_id = get_field('fotoscategory',  'category_' . $idCategoria);
    $img = wp_get_attachment_image($image_id, 'large');

    echo "<header>" . $img . "</header>";

    echo "<h1>Categoria: " . $nomeCategoria . "</h1>";

    echo "<div id='back'>voltar para o blog</div>";

     echo '<h2>Últimos textos da categoria "' . esc_html($category->name) . '"</h2>';


    /****************************************************************************************/
    $args = array(
        'cat' => $category->term_id,   // ID da categoria atual
        'posts_per_page' => 6,         // Limita a 6 posts
        'orderby' => 'date',           // Ordena por data
        'order' => 'DESC',             // Mais recentes primeiro
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<div class="ultimos-posts">';
       
        echo '<ul id="listaDePosts">';

        while ($query->have_posts()) {
            $query->the_post();

            echo '<li>';

            if (has_post_thumbnail()) {
                the_post_thumbnail('large', array('class' => 'thumb-categoria'));
            }
            echo '<div id="fundo"></div>';
            echo '<h3><a href="' . esc_url(get_permalink()) . '" title="' . esc_attr(get_the_title()) . '">';
            echo '<span>' . get_the_title() . '</span>';
            echo '</a></h3>';
            echo '</li>';
        }

        echo '</ul>';
        echo '</div>';

        wp_reset_postdata();
    } else {
        echo '<p>Não há textos recentes nessa categoria.</p>';
    }
    /****************************************************************************************/
}
