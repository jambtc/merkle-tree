<?php

namespace app\components;

/**
 * Merkle Tree Calculator
 * 
 * Author: Sergio Casizzone
 * Date: 03.05.2023
 */

use yii\base\Component;

class MerkleTree extends Component
{
    private $merkle_tree;

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->merkle_tree = [];
    }

    /**
     * Class destructor (do cleanup)
     */
    public function __destruct()
    {
        $this->merkle_tree = null;
    }

    /**
     * Calcola il Merkle Tree
     * 
     * La funzione calcola il Merkle Tree a partire dai dati passati come argomento, utilizzando 
     * la funzione hash SHA256 per calcolare gli hash dei singoli elementi e degli hash intermedi. 
     * Viene restituito il Merkle Root, ovvero l'hash della radice del Merkle Tree.
     * 
     * @param array $data Array di hash
     * @return string Merkle root
     */
    public function tree(array $data): string
    {
        // Se il numero di elementi è dispari, duplica l'ultimo elemento
        if (count($data) % 2 != 0) {
            $data[] = end($data);
        }

        // Calcola gli hash dei singoli elementi
        foreach ($data as $element) {
            $this->merkle_tree[] = hash('sha256', $element);
        }

        // Calcola gli hash intermedi
        while (count($this->merkle_tree) > 1) {
            $level = [];
            for ($i = 0; $i < count($this->merkle_tree); $i += 2) {
                $left = $this->merkle_tree[$i];
                $right = isset($this->merkle_tree[$i + 1]) ? $this->merkle_tree[$i + 1] : $left;
                $level[] = hash('sha256', $left . $right);
            }
            $this->merkle_tree = $level;
        }

        return $this->merkle_tree[0];
    }

    /**
     * Verifica il Merkle Tree
     * 
     * La funzione verifica se i dati passati come argomento corrispondono al Merkle Root passato 
     * come secondo argomento. La funzione utilizza la funzione tree per calcolare il Merkle Root 
     * e restituisce true se il Merkle Root calcolato corrisponde a quello passato come argomento.
     * 
     * @param array $data Array di hash
     * @param array $root merkle root
     * @return boolean 
     */
    public function verify(array $data, string $root): boolean
    {
        return ($this->tree($data) === $root);
    }
}
