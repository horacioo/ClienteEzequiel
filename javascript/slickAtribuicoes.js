console.log("só teste");

/*
jQuery('#slide1Topo').slick({
    dots: false,          // Mostra bolinhas de navegação
    infinite: true,      // Loop infinito
    speed: 500,          // Velocidade da transição
    slidesToShow: 3,     // Quantos slides aparecem por vez
    slidesToScroll: 1,   // Quantos slides passam por vez
    autoplay: true,      // Ativar autoplay
    autoplaySpeed: 2000, // Tempo do autoplay (ms)
    arrows: true         // Setas de navegação
  });
  */

jQuery("#slide1Topo").slick({
  dots: false,
  infinite: true,
  speed: 500,
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  arrows: true,

  // Adicionando a opção 'responsive'
  responsive: [
    {
      breakpoint: 768, // Quando a tela for menor que 767px
      settings: {
        slidesToShow: 1, // Mostra 1 slide por vez
        slidesToScroll: 1, // E rola 1 slide por vez
      },
    },
  ],
});

jQuery("#slide2Ul").slick({
  dots: false, // Mostra bolinhas de navegação
  infinite: true, // Loop infinito
  speed: 500, // Velocidade da transição
  slidesToShow: 3, // Quantos slides aparecem por vez
  slidesToScroll: 1, // Quantos slides passam por vez
  autoplay: true, // Ativar autoplay
  autoplaySpeed: 2000, // Tempo do autoplay (ms)
  arrows: true, // Setas de navegação

  // Adicionando a opção 'responsive'
  responsive: [
    {
      breakpoint: 768, // Quando a tela for menor que 768px
      settings: {
        slidesToShow: 1, // Mostra 1 slide por vez
        slidesToScroll: 1, // E rola 1 slide por vez
      },
    },
  ],
});

jQuery("#slideDeProdutos").slick({
  ///dots: true,          // Mostra bolinhas de navegação
  infinite: true, // Loop infinito
  speed: 500, // Velocidade da transição
  //slidesToShow: 3,     // Quantos slides aparecem por vez
  //slidesToScroll: 1,   // Quantos slides passam por vez
  autoplay: true, // Ativar autoplay
  autoplaySpeed: 2000, // Tempo do autoplay (ms)
  arrows: true, // Setas de navegação
});

$(".listaDosDepoimentos").slick({
  dots: false,
  infinite: true,
  speed: 3000,
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000, // Tempo do autoplay (ms)
  arrows: true,
  // USE STRING SELECTORS (mais robusto)
  prevArrow: "#arrowLeft",
  nextArrow: "#arrowRight",
  responsive: [{ breakpoint: 900, settings: { slidesToShow: 1 } }],
});

jQuery(".resposta").hide();

jQuery("#listaDePerguntas")
  .children("li")
  .click(function () {
    jQuery(".resposta").hide();
    jQuery(".resposta").removeClass("apareceResposta");
    jQuery(this).children(".resposta").show().addClass("apareceResposta");
  });
