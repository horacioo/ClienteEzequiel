jQuery(document).ready(function () {
    // Verifica inicialmente a largura da tela
    if (window.innerWidth < 768) {
      EscondeElementos();
    }
  
    // Executa a função ao redimensionar a janela
    jQuery(window).resize(function () {
      if (window.innerWidth < 768) {
        EscondeElementos();
      } else{jQuery("nav").show();}
    });
  
    jQuery("#icon").click(function () {
      Click();
    });
  
    jQuery("#fundao").click(function () {
      if (window.innerWidth < 768) {  // Verifica novamente a largura da tela
        EscondeElementos();
      }
    });
  
    jQuery(".sub-menu").parent().click(function (e) {
      e.preventDefault();
    });
  });
  
  function Click() {
    jQuery("nav").addClass("openMenu");
    jQuery("nav").show();
    jQuery("#fundao").show();
  }
  
  function EscondeElementos() {
    jQuery("#fundao").hide();
    jQuery("nav").hide();
  }