# Calculadora - Symfony

Aplicacion web de cálculo de operaciones matemáticas básicas (sumar, restar, multiplicar y dividir) empleando Symfony 4.4 y Stimulus


## Comenzando 🚀

Ejecutaremos el proyecto de FORMA LOCAL

### Revisando el entorno de trabajo 📋

Se debe tener instalado ...

```
-  Terminal
-  Php 7.4
-  Composer
-  Symfony CLI
-  NodeJS y Yarn

```

### Instalación 🔧

Pasos a ejecutar desde terminal ...

Clone el proyecto en su máquina, en su directorio de trabajo web

```
...var/www$ git clone git@github.com:zuherna/calculadora.git
```

Méterse en la carpeta del proyecto

```
...var/www$ cd calculadora
```

Y ejecutar

```
...var/www/calculadora$ symfony composer install
...var/www/calculadora$ yarn install

```

Para levantar la aplicacion web

```
...var/www/calculadora$ yarn encore dev-server
...var/www/calculadora$ symfony serve (en otra pestaña)
Y en un navegador poner https://127.0.0.1:8000

Si se quieren ejecutar las operaciones [add, subtract, multiply, divide] directamente usando el controlador que lo hace poner :
https://127.0.0.1:8000/{operation}/{operatorA}/{operatorB}
ej -> https://127.0.0.1:8000/add/5/6
```

Para ejecutar el comando

```
symfony console operations operatorA operatorB  operation
ej:
...var/www/calculadora$ symfony console operations 1.2 1  add
...var/www/calculadora$ symfony console operations 1.2 1  sumar

```

## Ejecutando las pruebas ⚙️

El proyecto incluye algunas pruebas unitarias, funcionales y de comando. Para ejecutar estas pruebas ...

```
...var/www/calculadora$ symfony run bin/phpunit

```

## Analizador de código 🛠️

El proyecto incluye PHPStan. Tiene hasta 9 niveles, por ahora nos quedaremos en el nivel 1, configurado en el fichero phpstan.neon
Para ejecutarlo ...

```
...var/www/calculadora$ symfony php vendor/bin/phpstan analyze
...var/www/calculadora$ symfony php -d memory_limit=-1 vendor/bin/phpstan analyze -l 1  (si queremos especificar el nivel)

```


