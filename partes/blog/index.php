<section id="blog" itemscope itemtype="https://schema.org/ItemList">

    <header>
        <h2 itemprop="name">Blog</h2>
    </header>


    <div id="textos">
        Fique por dentro das novidades! Nosso blog traz notícias e insights fresquinhos sobre tudo que movimenta o nosso universo.
        <div id="links">
            <img alt="links de redes sociais" width="30px" height="30px" src="<?php echo tema;?>/img/links1.svg" title="redes sociais">
            <img alt="links de redes sociais" width="30px" height="30px" src="<?php echo tema;?>/img/links2.svg" title="redes sociais">
            <img alt="links de redes sociais" width="30px" height="30px" src="<?php echo tema;?>/img/links3.svg" title="redes sociais">
            <img alt="links de redes sociais" width="30px" height="30px" src="<?php echo tema;?>/img/links4.svg" title="redes sociais">
        </div>
    </div>


    <?php
    $categories = get_categories(array(
        'parent' => 0,
    ));

    if (! empty($categories)) {
        echo '<ul id="MeusPosts">';
        foreach ($categories as $category) {

            $image = get_field('fotoscategory', 'category_' . $category->term_id);

            $image_path = get_attached_file($image);
            
            $tamanhos = [
                ['largura' => 176, 'altura' => 109,   'qualidade' => 70],
                ['largura' => 239, 'altura' => 149,   'qualidade' => 60]
            ];
            $imagens = reduzirImagem($image_path, $tamanhos, "jpg");

            // Exibe a imagem se ela existir
            if ($image) {
                //print_r($imagens);

                echo '<li>';
                echo '<picture><img src="' .  $imagens['urls']['239x149'] . '" alt="'.get_category_link($category->term_id).'" title="'.get_category_link($category->term_id).'" ></picture>';
                echo '<a class="titulo"  href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
                echo '<a class="descricao" href="' . get_category_link($category->term_id) . '">' . $category->description . '</a>';
                echo '<a class="button" href="' . get_category_link($category->term_id) . '"> acessar </a>';
                echo '</li>';
            } else {
                echo '<li>';
                echo '<a class="descricao" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
                echo '<a class="descricao" href="' . get_category_link($category->term_id) . '">' . $category->description . '</a>';
                echo '<a class="button" href="' . get_category_link($category->term_id) . '"> acessar</a>';
                echo '</li>';
            }
        }
        echo '</ul>';
    } else {
        echo 'Nenhuma categoria pai encontrada.';
    }
    ?>

</section>