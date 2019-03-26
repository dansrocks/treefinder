# treefinder
A tree finder utility


## Example: ##

Defining a Closure



    $compareStrings = function (string $str1, string $str2) {
            $minChars = min(mb_strlen($str1), mb_strlen($str2));
            $changes = levenshtein($str1, $str2);
            $percent = (($minChars - $changes) / $minChars) * 100;
  
            return intval($percent);
        };


After, we try to compare severals strin with previous closure


    $treefinder = new \TreeFinder\TreeFinder($compareStrings, 50);
    $coincidences = $treefinder->findCoincidences(
        ['carrot', 'pastilla', 'comanda' ],
        ['comando', 'pastillero', 'carotida' ]
    );

Finaly, you could to see the results


    print_r($coincidences);



Then, you should see...


    treefinder$ php main.php 
    Ejecutando coincidencias entre (carrot, comando)
    Ejecutando coincidencias entre (carrot, pastillero)
    Ejecutando coincidencias entre (carrot, carotida)
    Ejecutando coincidencias entre (pastilla, comando)
    Ejecutando coincidencias entre (pastilla, pastillero)
    Ejecutando coincidencias entre (pastilla, carotida)
    Ejecutando coincidencias entre (comanda, comando)
    Ejecutando coincidencias entre (comanda, pastillero)
    Ejecutando coincidencias entre (comanda, carotida)
    Array
    (
        [0] => Array
            (
                [left-pos] => 1
                [right-pos] => 1
                [left] => pastilla
                [right] => pastillero
                [coincidence] => 62
            )
    
        [1] => Array
            (
                [left-pos] => 2
                [right-pos] => 0
                [left] => comanda
                [right] => comando
                [coincidence] => 85
            )
    )

