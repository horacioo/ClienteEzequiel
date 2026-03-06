<?php

function reduzirImagem($caminhoImagem, $tamanhos, $extensao = 'jpeg') {
    // 1. Validação básica de existência
    if (!file_exists($caminhoImagem)) {
        return "Erro: Imagem não encontrada.";
    }

    // 2. Obtém dados do arquivo original
    $infoImagem = getimagesize($caminhoImagem);
    if ($infoImagem === false) return "Erro: Arquivo inválido.";
    
    list($larguraOriginal, $alturaOriginal, $tipoImagem) = $infoImagem;

    // 3. Cria o recurso de imagem baseado no tipo de origem
    switch ($tipoImagem) {
        case IMAGETYPE_JPEG: 
            $imagem = imagecreatefromjpeg($caminhoImagem); 
            break;
        case IMAGETYPE_PNG:  
            $imagem = imagecreatefrompng($caminhoImagem); 
            break;
        case IMAGETYPE_GIF:  
            $imagem = imagecreatefromgif($caminhoImagem); 
            break;
        default: 
            return "Erro: Formato de origem não suportado.";
    }

    $urlsImagens = [];
    $uploads = wp_upload_dir();
    $urlBase = $uploads['baseurl'] . '/';
    
    // Define caminhos de salvamento
    $caminhoRelativo = str_replace($uploads['basedir'], '', $caminhoImagem);
    $pastaData = dirname($caminhoRelativo);
    $pastaSalvar = dirname($caminhoImagem) . DIRECTORY_SEPARATOR . 'reduzidas';

    if (!is_dir($pastaSalvar)) {
        mkdir($pastaSalvar, 0777, true);
    }

    // 4. Padroniza a extensão de saída (Sempre jpg se for jpeg)
    $extensaoParaArquivo = (strtolower($extensao) == 'jpeg' || strtolower($extensao) == 'jpg') ? 'jpg' : 'png';

    foreach ($tamanhos as $tamanho) {
        $largura = (int)$tamanho['largura'];
        $altura  = (int)$tamanho['altura'];
        $qualidade = (int)$tamanho['qualidade'];

        $nomeSemExtensao = pathinfo($caminhoImagem, PATHINFO_FILENAME);
        $nomeFinalArquivo = "qualidade{$qualidade}_{$nomeSemExtensao}_wallpapers_{$largura}X{$altura}.{$extensaoParaArquivo}";
        $caminhoSalvar = $pastaSalvar . DIRECTORY_SEPARATOR . $nomeFinalArquivo;

        // 5. Se já existe no disco, apenas retorna a URL (evita processamento inútil)
        if (file_exists($caminhoSalvar)) {
            $urlsImagens["{$largura}x{$altura}"] = $urlBase . ltrim($pastaData, '/') . '/reduzidas/' . $nomeFinalArquivo;
            continue;
        }

        // 6. Processo de Redimensionamento
        $imagemFinal = imagecreatetruecolor($largura, $altura);
        
        // Mantém transparência se o destino for PNG ou se a origem tiver Alpha
        imagealphablending($imagemFinal, false);
        imagesavealpha($imagemFinal, true);

        imagecopyresampled($imagemFinal, $imagem, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);

        // 7. Salvamento Forçado (Apenas JPG ou PNG)
        if ($extensaoParaArquivo == 'png') {
            // Compressão PNG vai de 0 (nada) a 9 (máximo)
            imagepng($imagemFinal, $caminhoSalvar, 9);
        } else {
            // Padrão JPEG (Funciona em 100% dos servidores)
            imagejpeg($imagemFinal, $caminhoSalvar, $qualidade);
        }

        $urlsImagens["{$largura}x{$altura}"] = $urlBase . ltrim($pastaData, '/') . '/reduzidas/' . $nomeFinalArquivo;
        
        imagedestroy($imagemFinal);
    }

    imagedestroy($imagem);
    
    return ['urls' => $urlsImagens];
}