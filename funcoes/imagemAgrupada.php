<?php
require_once('reduzir.php');

$resolucoesDeTela = [2560, 1920, 1366, 1536, 1440, 1280, 390, 360, 412, 375, 414, 768, 820, 800];
sort($resolucoesDeTela);

function ImgP1($id_imagem, $largura, $altura, $qualidade = 50, $larguraBase = 1920, $outros = [])
{
    global $resolucoesDeTela;
    $tamanhos = array();
    $image_path = get_attached_file($id_imagem);
    $tagDeImagem = "<picture>\n";

    // Calcula os tamanhos necessários
    foreach ($resolucoesDeTela as $tela) {
        $newWidth = round($tela * ($largura / $larguraBase));
        $newHeight = round($altura * ($newWidth / $largura));
        $tamanhos[] = [
            'largura'   => $newWidth,
            'altura'    => $newHeight,
            'qualidade' => $qualidade
        ];
    }

    $imagens = reduzirImagem($image_path, $tamanhos, 'avif');

    if (empty($imagens['urls'])) {
        return ''; // sem imagens
    }

    $totalDeImagens = count($imagens['urls']) - 1;
    $linha = 0;

    foreach ($imagens['urls'] as $i) {
        if ($linha === 0) {
            $maxnWi = $resolucoesDeTela[0];
            $controle = '<source media="(max-width: ' . $maxnWi . 'px)" srcset="' . $i . '">';
        } elseif ($linha === $totalDeImagens) {
            $minWi = $resolucoesDeTela[$linha];
            $resAnt = $resolucoesDeTela[$linha - 1] + 1;
            $tagDeImagem .= '<source media="(min-width: ' . $resAnt . 'px) and (max-width: ' . ($minWi - 1) . 'px)" srcset="' . $i . '">' . "\n";
            $controle = '<source media="(min-width: ' . $minWi . 'px)" srcset="' . $i . '">';
        } else {
            $resAnterior = $resolucoesDeTela[$linha - 1] + 1;
            $controle = '<source media="(min-width: ' . $resAnterior . 'px) and (max-width: ' . $resolucoesDeTela[$linha] . 'px)" srcset="' . $i . '">';
        }

        $tagDeImagem .= $controle . "\n";
        $linha++;
    }

    // fallback img (maior resolução)
    $fallback = end($imagens['urls']);

    // monta atributos extras (se existirem no array $outros)
    $atributosExtras = '';
    foreach ($outros as $attr => $valor) {
        $atributosExtras .= ' ' . $attr . '="' . htmlspecialchars($valor, ENT_QUOTES) . '"';
    }

    $tagDeImagem .= '<img class="modelo lazy-loaded" src="' . $fallback . '"' . $atributosExtras . '>' . "\n";

    $tagDeImagem .= "</picture>";

    return $tagDeImagem;
}
