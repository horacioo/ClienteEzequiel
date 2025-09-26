function adicionarFilhoComCloneDoLinkOuBtn() {
  const clicaveis = document.querySelectorAll(".clicavel");

  if (clicaveis.length === 0) {
    console.warn(
      'Nenhum elemento com a classe ".clicavel" foi encontrado na página.'
    );
    return;
  }

  clicaveis.forEach((original, index) => {
    const filhosEspecificos = original.querySelectorAll("a, .btn");

    if (filhosEspecificos.length > 0) {
      const novoFilho = document.createElement("div");
      novoFilho.classList.add("filho-clonado");

      // Clona todos os filhos <a> ou .btn e insere no novo container
      filhosEspecificos.forEach((filhoOriginal, i) => {
        const filhoClonado = filhoOriginal.cloneNode(true);
        novoFilho.appendChild(filhoClonado);
      });

      // Adiciona o novo container dentro do .clicavel
      original.appendChild(novoFilho);

      console.log(
        `✅ .filho-clonado com <a>/.btn clonado adicionado a .clicavel #${
          index + 1
        }`
      );
    } else {
      console.log(
        `ℹ️ .clicavel #${index + 1} não possui <a> ou .btn como filho.`
      );
    }
  });
}

window.addEventListener("DOMContentLoaded", adicionarFilhoComCloneDoLinkOuBtn);





















jQuery(document).ready(function () {
  jQuery(document).on("mouseenter", ".filho-clonado", function () {
    console.log("Mouse entrou no .filho-clonado!");

    // procura o link do mesmo <li> e esconde
    jQuery(this)
      .closest("li.clicavel") // sobe até o <li>
      .find('a[href="#form"]') // encontra o link alvo
      .css("opacity", 0);
  });

  jQuery(document).on("mouseleave", ".filho-clonado", function () {
    console.log("Mouse saiu do .filho-clonado");

    jQuery(this)
      .closest("li.clicavel")
      .find('a[href="#form"]')
      .css("opacity", 1);
  });
});
