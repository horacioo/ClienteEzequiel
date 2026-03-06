<main id="blog">

    <header>
        <h1>Nosso Blog</h1>
    </header>

    <p>

        <strong>Blog: Seu Guia Completo sobre Planos de Saúde na Baixada Santista</strong>

        <br>A saúde é um bem inestimável, e ter um bom plano é fundamental, especialmente em uma região vibrante como a Baixada Santista. 
        É por isso que o nosso blog nasce como seu <strong>ponto de referência</strong> confiável e atualizado sobre tudo que envolve <strong>planos de 
        saúde</strong> em Santos, 
        São Vicente, Guarujá, Praia Grande e cidades vizinhas.

        <br>Nossa missão é descomplicar o complexo mundo da saúde suplementar. Você encontrará análises detalhadas e comparativos claros sobre as 
        <strong>operadoras locais</strong>, garantindo que você tome a melhor decisão, seja para a sua família, seu negócio ou individualmente.

        <br>Vamos além da cotação. Abordaremos temas cruciais como: as diferenças entre planos por adesão e empresariais, dicas para usar a rede 
        credenciada de forma eficiente, orientações sobre carências e reajustes, e as últimas notícias da ANS que impactam diretamente os moradores
         da Baixada.

        <br>O blog também será um espaço para destacarmos os <strong>melhores hospitais e clínicas</strong> da região, entrevistas com especialistas e 
        guias práticos
         sobre como otimizar seu plano para consultas, exames e procedimentos.

        <br>Se você está pesquisando sua primeira cobertura, querendo migrar para um plano com melhor custo-benefício ou simplesmente entender 
        seus direitos como beneficiário, <strong>este é o seu lugar</strong>. Acompanhe nossas postagens semanais e garanta que sua saúde 
        esteja sempre em primeiro lugar, 
        com a tranquilidade e segurança que você merece.

    </p>

    <h2>Categorias</h2>


    <?php
    $categorias = get_categories([
        'orderby' => 'name',
        'order'   => 'ASC',
        'hide_empty' => true
    ]);
    ?>

    <!------------------------------------->
    <ul id="categorias">
        <?php foreach ($categorias as $cat) { ?>
            <li>
                <a href="<?php echo get_category_link($cat->term_id); ?>">
                    <?php
                    $image_id = get_field('fotoscategory',  'category_' . $cat->term_id);
                    echo wp_get_attachment_image($image_id, 'large');
                    ?>
                    <div id="fundo"></div>
                    <H3><?php echo $cat->name; ?></H3>
                </a>
            </li>
        <?php } ?>
    </ul>
    <!------------------------------------->
</main>