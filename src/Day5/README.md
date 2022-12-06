Reflexion #1

for ($i = 0; $i < $boardSize; $i+=4) {
    dump(substr($line, $i, 3));
}

Reflexion #2

$lines = file($filepath, FILE_IGNORE_NEW_LINES);

$columns = array_map('trim', array_map(fn($chunk) => join('', $chunk), array_chunk(str_split($line), 4)));

