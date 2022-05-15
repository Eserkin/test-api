## Instalación

## 1 Clonar el repositorio dentro del directorio donde queremos tener el poryecto
```
git clone git@github.com:Eserkin/test-api.git
```
## 2 Copiar el archivo .env.example al archivo .env
```
cp .env.example .env
```

## 3 Instalar dependecias
Dado que la primer vez que se clona el poryecto no existiria la carpeta ./VENDOR, ni estará instaldo SAIL para poder correr el contenedor Docker. En el directorio principal del proyecto correr el siguiente comando 
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

## 2 Instalar dependecias
Dentro del directorio principal del proyecto en una terminal y con Docker ya instalado.
```
./vendor/bin/sail up
```

## 2 Correr archivo de migraciones para crear tablas en la base de datos
```
./vendor/bin/sail artisan migrate
```

## 3 Probar api en postman, importando el arhivo "Test.postman_collection.json" que se encuentra en el directorio principal. O mediante CURL por la terminal mediante el siguiente comando 
```
curl --location --request POST 'http://localhost/api/numbers/get-perfect-numbers' \--form 'numbers="[1,2,6,100,450]"'
```
```
curl --location --request GET 'http://localhost/api/logs' \
--header 'Accept: application/json'
```
