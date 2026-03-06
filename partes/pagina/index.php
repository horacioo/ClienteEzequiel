<?php
while (have_posts()) :
    the_post();
    $id = get_the_ID();
    $titulo = get_the_title();
    $resumo = get_the_excerpt();

    // Adicionar schema para Post (Article)
    $article_schema = 'itemscope itemtype="https://schema.org/Article"';

    if (is_single()) {
        $current_category = get_the_category($id);
        $idDaCategoria = $current_category[0]->term_id;
        // print_r($current_category[0]);
    }

    /**************************************************************/
    $image_id = get_post_thumbnail_id($id); // Obter ID do thumbnail
    $image_path = get_attached_file($image_id); // Caminho absoluto
    /**************************************************************/
    $tamanhos = [
        ['largura' => 1100, 'altura' => 400, 'qualidade' => 50],
    ];
    $imagens = reduzirImagem($image_path, $tamanhos, "jpeg");
    /**************************************************************/

    // 🔥 Aqui está o ponto principal:
    // get_the_content() por si só não aciona os filtros (onde o plugin atua)
    // por isso, aplicamos manualmente:
    $conteudo = apply_filters('the_content', get_the_content());

    $categoria = get_the_category($id);
    $content = inserir_html_no_meio_do_conteudo($conteudo, $categoria);

    // Adicionar schema para Imagem (ImageObject)
    if (is_array($imagens)) :
        echo '<picture id="thumb">';
        echo '<img title="' . esc_attr(get_the_excerpt($id)) . '" width="219" height="134" alt="corretora de seguros em santos ' . esc_attr($image_id) . '" src="' . esc_url($imagens['urls']['1100x400']) . '" itemprop="url image" class="thumb">';
        echo '<meta itemprop="width" content="219">';
        echo '<meta itemprop="height" content="134">';
        echo '<meta itemprop="contentUrl" content="' . esc_url($imagens['urls']['1100x400']) . '">';
        echo '<meta itemprop="encodingFormat" content="image/jpeg">';
        echo '</picture>';
    endif;

    echo '<h1 itemprop="headline">' . esc_html($titulo) . '</h1>'; // Adicionar itemprop para título

    // Iniciar o conteúdo principal com schema Article
    echo "<div id='content' $article_schema>";
    echo '<div itemprop="articleBody">' . $content . '</div>'; // O conteúdo já passou pelo plugin
    echo "</div>";

endwhile;
?>
