<?php
/* CLASE : min-h-screen 
Mide minimo el alto de la pantalla, asegurando que el contenido ocupe al menos 
toda la altura visible del navegador. 
Esto es útil para crear diseños que se adapten a diferentes tamaños de pantalla, 
evitando que el contenido quede demasiado pequeño en pantallas grandes o que no 
ocupe toda la altura en pantallas pequeñas. Ademas si el contenido crece mas alla
de la altura de la pantalla, el contenedor se expandira para acomodar el contenido adicional,
garantizando que todo el contenido sea visible sin importar el tamaño de la pantalla.
*/

/* DIFERENCIA ENTRE GRID Y FLEXBOX
GRID: Es un sistema de diseño bidimensional que permite organizar el contenido 
en filas y columnas.
1. Trabaja con dos dimensiones (filas y columnas).
2. Permite crear diseños complejos con áreas definidas.
3. Es ideal para diseños de página completos o secciones grandes.
4. Ofrece un control preciso sobre el tamaño y la posición de los elementos.
5. Es excelente para crear diseños de cuadrícula y layouts más estructurados.
6.ideal para layouts completos.

ejemplo:
<div class="grid grid-cols-3 gap-4">
  <div>1</div>
  <div>2</div>
  <div>3</div>
</div>
 $ LO QUE MEJOR HACE:
 1. Crear diseños de cuadrícula con filas y columnas.
 2. Definir áreas específicas para los elementos dentro de la cuadrícula.
 3. Controlar el tamaño y la posición de los elementos con precisión.
 4. Crear layouts complejos y estructurados.
 5. Diseños de página completos o secciones grandes.

 <div class="grid grid-cols-4 min-h-screen">
  <aside class="col-span-1">Sidebar</aside>
  <main class="col-span-3">Contenido</main>
</div>
- grid-cols-4: Define una cuadrícula con 4 columnas de igual ancho.
- min-h-screen: Asegura que la cuadrícula tenga al menos la altura de la pantalla, lo que es útil para crear un diseño que ocupe toda la altura visible del navegador.
Es perfecto para:
1. Diseños de página completos con múltiples secciones.
2. Layouts que requieren una estructura de filas y columnas.
3. Páginas de destino (landing pages) con secciones claramente definidas.
4. Diseños de cuadrícula para galerías o portafolios.
5. Situaciones donde se necesita un control preciso sobre el tamaño y la posición de los elementos

---------------------------------------------------------------------------------------
FLEXBOX: Es un sistema de diseño unidimensional que se enfoca en la distribución 
de elementos a lo largo de una sola dimensión, ya sea horizontal o vertical.
1. Trabaja con una dimensión (fila o columna).
2. Es ideal para alinear y distribuir elementos dentro de un contenedor.
3. Es más sencillo para diseños simples y alineación de elementos.
4. Ofrece flexibilidad para ajustar el tamaño de los elementos según el espacio disponible.
5. Es excelente para crear diseños responsivos y adaptativos.
6.ideal para layouts pequeños o componentes individuales.

ejemplo:
<div class="flex">
  <div>1</div>
  <div>2</div>
  <div>3</div>
</div>
 $ LO QUE MEJOR HACE:
 1. Alinear elementos en una sola dirección (horizontal o vertical).
 2. Centrar vertical y horizontalmente.
 3. Distribuir espacio entre elementos de manera uniforme.
 4. Crear diseños responsivos que se adapten a diferentes tamaños de pantalla.
 5. Componentes individuales o layouts pequeños.
 6. Diseños completos, tablas visualmente atractivos, dashboards, etc.

 <div class="flex items-center justify-center min-h-screen">
  <h1>Login</h1>
</div>

- items-center: Alinea los elementos hijos verticalmente en el centro del contenedor flex.
- justify-center: Alinea los elementos hijos horizontalmente en el centro del contenedor flex.
- min-h-screen: Asegura que el contenedor tenga al menos la altura de la pantalla, lo que es útil para centrar el contenido incluso en pantallas grandes.
Es perfecto para:
1. Formularios de inicio de sesión o registro.
2. Páginas de destino (landing pages).
3. Componentes que necesitan estar centrados en la pantalla.
4. Diseños simples donde el contenido debe estar alineado en una sola dirección.
5. Situaciones donde se desea un diseño responsivo que se adapte a diferentes tamaños de pantalla.
6. Login, botones, navbars, tarjetas, etc.

NOTA MENTAL:
'Quiero ordenar cosas en linea' => FLEXBOX
'Quiero dividir la pantalla en secciones' => GRID

*/