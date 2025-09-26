<section id="formulario" itemscope itemtype="https://schema.org/ContactPage">

  <!-- Descrição geral -->
  <header itemprop="description">
    Nossa especialidade é a Consultoria na troca de planos de saúde lhe informando o que você precisa priorizar nesse processo!
  </header>

  <div id="MeusForms">

    <!-- Formulário Familiar -->
    <div id="formFamiliar" itemscope itemtype="https://schema.org/ContactPoint">
      <h2 itemprop="headline">COTE PLANO INDIVIDUAL OU FAMILIAR</h2>
      <h3 itemprop="description">
        Por favor, preencha este formulário somente se você quer cotação para planos individual ou familiar.
        Acrescente informações como idade e se tem preferência por algum plano.
      </h3>
      <meta itemprop="contactType" content="Individual/Familiar">
      <?php echo do_shortcode('[contact-form-7 id="19fb0ae" title="Formulário de contato 1"]'); ?>

    </div>

    <!-- Formulário Empresas -->
    <div id="formEmpresa" itemscope itemtype="https://schema.org/ContactPoint">
      <h2 itemprop="headline">Cote com Seu MEI ou CNPJ - Ofertas Exclusivas Para MEI e Empresas</h2>
      <meta itemprop="contactType" content="Empresarial/MEI">
      <?php echo do_shortcode('[contact-form-7 id="19fb0ae" title="Formulário de contato 1"]'); ?>

    </div>

  </div>

</section>