console.log("Slick atribuições carregado");

jQuery(document).ready(function () {


/***************************************************************/
/***************************************************************/
/***************************************************************/
/***************************************************************/
// Executa assim que o documento carregar

    gerenciarMenu();

/***************************************************************/
/***************************************************************/
/***************************************************************/




jQuery("#logosDasOperadorasHeader").slick({
  dots: true, // Mostra bolinhas de navegação
  infinite: true, // Loop infinito
  speed: 4000, // Velocidade da transição
  slidesToShow: 2, // Quantos slides aparecem por vez
  slidesToScroll: 1, // Quantos slides passam por vez
  autoplay: true, // Ativar autoplay
  autoplaySpeed: 1000, // Tempo do autoplay (ms)
  arrows: false, // Setas de navegação

  responsive: [
    {
      breakpoint: 786, // abaixo de 786px
      settings: {
        slidesToShow: 1, // mostra apenas 1 slide
        slidesToScroll: 1,
      },
    },
  ],
});






jQuery("#MenuHambruguer").click(function(){
  jQuery("#menu").addClass("menuAnda").show();
  jQuery("#menu").children("#fundo").addClass("fundoMenu").show();
});

jQuery("#fundo").click(function(){
  jQuery("#menu").hide();
});

jQuery("#menu").children("ul").children("li").children('a').click(function(){
  jQuery("#menu").hide();
});




})






function gerenciarMenu() {
    var larguraTela = jQuery(window).width();

    if (larguraTela < 768) {
        jQuery("#menu").hide(); // Esconde se for mobile/tablet pequeno
        localStorage.setItem("abreMenu",1);
    } else {
        jQuery("#menu").show(); // Garante que apareça no desktop
        localStorage.setItem("abreMenu",0);
        jQuery("#MenuHambruguer").hide();
    }
}
