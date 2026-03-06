<span id="label">Nosso Blog</span>



<section id="blog_links" itemscope itemtype="https://schema.org/Blog">
  <meta itemprop="name" content="<?php bloginfo('name'); ?>">
  <meta itemprop="url" content="<?php echo esc_url(home_url()); ?>">

  <p id="textoDeApresentacao">
    <strong>Descubra o Melhor para Sua Saúde na Baixada Santista!</strong>
    <br>Cansado de pesquisar sem fim? Nosso blog é seu <strong>guia definitivo</strong> para entender e escolher os melhores <strong>planos de saúde na Baixada Santista</strong>.
    Oferecemos análises transparentes, dicas de especialistas e informações atualizadas para você tomar a decisão mais inteligente para sua 
    família ou empresa.
    <strong>Pare de perder tempo</strong> e comece a garantir a tranquilidade que você merece. <strong>Clique e confira!</strong> Sua saúde é prioridade.
  </p>

  <div id="voltar"> << </div>

  <ul id="lista_De_Links_Do_Blog">
    <?php
    $args = [
      'posts_per_page' => 4,
      'post_type'      => 'post',
      'post_status'    => 'publish',
      'orderby'        => 'date',
      'order'          => 'DESC'
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post();
        $id = get_the_ID();
        $titulo = get_the_title();
        $link = get_permalink();
        $thumb = get_the_post_thumbnail_url($id, 'medium');
        $resumo = get_the_excerpt();
        $data_publicacao = get_the_date('c'); // formato ISO 8601
        $autor = get_the_author();
        $autor_url = get_author_posts_url(get_the_author_meta('ID'));
    ?>
        <li class="card" itemscope itemtype="https://schema.org/BlogPosting" itemprop="blogPost">
          <meta itemprop="mainEntityOfPage" content="<?php echo esc_url($link); ?>">
          <meta itemprop="datePublished" content="<?php echo esc_attr($data_publicacao); ?>">
          <meta itemprop="dateModified" content="<?php echo esc_attr(get_the_modified_date('c')); ?>">
          <meta itemprop="author" content="<?php echo esc_attr($autor); ?>">
          <meta itemprop="publisher" content="<?php bloginfo('name'); ?>">

          <?php if ($thumb) : ?>
            <picture class="thumb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
              <a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($titulo); ?>">
                <img
                  src="<?php echo esc_url($thumb); ?>"
                  alt="<?php echo esc_attr($titulo); ?>"
                  title="<?php echo esc_attr($titulo); ?>"
                  loading="lazy" />
              </a>
              <meta itemprop="url" content="<?php echo esc_url($thumb); ?>">
              <meta itemprop="width" content="600">
              <meta itemprop="height" content="400">
            </picture>
          <?php endif; ?>

          <header>
            <h2 itemprop="headline">
              <a href="<?php echo esc_url($link); ?>" itemprop="url" title="<?php echo esc_attr($titulo); ?>">
                <?php echo esc_html($titulo); ?>
              </a>
            </h2>
          </header>

          <p itemprop="description"><?php echo esc_html(substr($resumo, 1, 120)); ?></p>

          <footer>
            <p>
              <!--<span itemprop="author" itemscope itemtype="https://schema.org/Person">
                Por <a href="<?php echo esc_url($autor_url); ?>" itemprop="url"><span itemprop="name"><?php echo esc_html($autor); ?></span></a>
              </span>-->
              Data:
              <time datetime="<?php echo esc_attr($data_publicacao); ?>" itemprop="datePublished">
                <?php echo get_the_date(); ?>
              </time>
            </p>
            <a class="btn" href="<?php echo esc_url($link); ?>" class="btn" itemprop="url">Saiba Mais</a>
          </footer>
        </li>
    <?php
      endwhile;
      wp_reset_postdata();
    else :
      echo '<p>Nenhum post encontrado.</p>';
    endif;
    ?>
  </ul>
</section>