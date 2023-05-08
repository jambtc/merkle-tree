# Yii2 merkle-tree
 Generate and check merkle root

 
## Usage:

```php
// array di dati
$data = ['abc', 'cde', 'efg', 'jki', 'lmn');

// inizializzo la classe
$merkle = new MerkleTree();

// genero il Merkle root
$root = $merkle->tree($data);


echo "Merkle root: $root\n";
echo "Verifica Merkle tree: " . ($merkle->verify($data, $root) ? 'SUCCESSO' : 'FALLITO') . "\n";
```

Nell'esempio, il metodo `tree` viene utilizzata per calcolare il Merkle Root a partire dalla lista di dati 'abc', 'cde', 'efg', 'jki', 'lmn', e viene stampato il risultato.

Successivamente, il metodo `verify` viene utilizzata per verificare se i dati 'abc', 'cde', 'efg', 'jki', 'lmn' corrispondono al Merkle Root calcolato e viene stampato il risultato della verifica.