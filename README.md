# Prueba técnica Bake250

## Instalación
- Clonar el proyecto:
`https://github.com/mcmorenoa/bake250-technical-test.git`
- Ejecutar el comando `composer install` para instalar las dependencias del proyecto
- Levantar el stack de docker compose
`docker-compose up`
- Crear la base de datos:
`php bin/console doctrine:database:create`
- Arrancar el servidor de Symfony
`symfony serve`
  
## Prueba de algoritmia
En la página principal de la aplicación, en la barra de navegación encontraréis dos enlaces: "Sorting" y "Replace", cada
uno de ellos muestra los resultados de los ejercicios. El código referente a estos ejercicios se encuentra en el
controlador _AlgorithmsController_. En esta parte del proyecto no se ha aplicado arquitectura hexagonal.

## Prueba de SQL
Las consultas propuestas para el apartado de SQL son las siguientes:
```sql
# STUDENTS
select s.name
from students s
where score > 75
order by right(name, 3), id;

# CITIES
select c.name
from cities c
where countrycode like 'JPN';

# TRIANGLES
select case
when A = B and B = C then 'Equilatero'
when A = B or A = C or B = C then 'Isósceles'
when A <> B and B <> C then 'Escaleno'
else 'No es un triángulo'
end triangle_type
from triangles;
```
## Apartado POO
Para este apartado de la prueba he implementado en la página principal un pequeño formulario que permite buscar los
últimos tweets de un usuario a partir de su nombre de usuario en Twitter.