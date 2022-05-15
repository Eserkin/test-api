## Installation

## 1 clonar repositorio y instalar dependecias docker
Dentro del directorio principal del proyecto en una terminal y con Docker ya instalado.
```
./vendor/bin/sail up
```

## Correr archivo de migraciones para crear tablas en la base de datos
```
./vendor/bin/sail artisan migrate
```

## Probar api en postman, importando el arhivo "Test.postman_collection.json" que se encuentra en el directorio principal. O mediante CURL por la terminal mediante el siguiente comando 

curl --location --request POST 'http://localhost/api/numbers/get-perfect-numbers' \--form 'numbers="[1,2,6,100,450]"'


