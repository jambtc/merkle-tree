# Yii2 Merkle Root Calculator

## Informazioni

Il presente software effettua il Merkle Root di una serie di hash e ne confronta il contenuto con un Merkle Root fornito.


 
## Come usare il software:

```php
use app\components\MerkleRootCalculator;


$hashes = ['abc', 'cde', 'efg', 'jki', 'lmn'];

// inizializzo la classe
$merkle = new MerkleRootCalculator(); 

// genero il Merkle root
$root = $merkle->root($hashes); 


echo "Merkle root: $root\n";
echo "Verifica Merkle root: " . ($merkle->verify($hashes, $root) ? 'SUCCESSO' : 'FALLITO') . "\n";
```


Nell'esempio, il metodo `root` viene utilizzata per calcolare il Merkle Root a partire dalla lista di dati 'abc', 'cde', 'efg', 'jki', 'lmn', e viene stampato il risultato.

Successivamente, il metodo `verify` viene utilizzata per verificare se i dati 'abc', 'cde', 'efg', 'jki', 'lmn' corrispondono al Merkle Root calcolato e viene stampato il risultato della verifica.