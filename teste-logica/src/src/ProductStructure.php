<?php
namespace App;

class ProductStructure
{
    const products = [
        "preto-PP",
        "preto-M",
        "preto-G",
        "preto-GG",
        "preto-GG",
        "branco-PP",
        "branco-G",
        "vermelho-M",
        "azul-XG",
        "azul-XG",
        "azul-XG",
        "azul-P"
    ];

    public function make(): array
    {
        $coresTamanhos = [];

        foreach(self::products as $p){
            [$cor, $tamanho] = explode("-", $p);

            if (isset($coresTamanhos[$cor][$tamanho])) {
                $coresTamanhos[$cor][$tamanho]++;
            } else {
                $coresTamanhos[$cor][$tamanho] = 1;
            }
        }

        return $coresTamanhos;
    }
}