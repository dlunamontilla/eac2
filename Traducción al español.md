# PREGUNTAS TIPO TEST Y ABIERTAS QUE CONFORMAN EL EAC2 SEGÚN SE INDICA EN EL DOCUMENT ENUNCIADO EAC2

## Forma de entrega

Para responder a las cuestiones debe utilizar este mismo formulario.

Pero tenga en cuenta que no será evaluado si no entrega un ZIP con los entregables definidos en cada ejercicio a la tarea del EAC.

**CON EL FORMULARIO NO HA SUFICIENTE, NECESITA HACER UNA DOBLE ENTREGA, en el cuestionario y en la tarea.**

## Los resultados de aprendizaje que se plantean son

### Criterio de evaluación

Los criterios que se tendrán en cuenta para evaluar el trabajo del alumno son los siguientes:

- Reconocer las posibilidades de procesamiento en los entornos cliente - servidor.

- Establecer y verificar la seguridad en los accesos al servidor.

- Documentar los procedimientos realizados.

- Reconocer las relacionese entre los lenguajes de guiones de servidor y los lenguajes de marcas utilizados en los clientes.

- Reconocer la sintaxis básica de un lenguaje de guiones concreto.

- Utilizar estructuras de control del lenguaje.

- Utilizar formularios para introducir información.

- Establecer y utilizar mecanismos para asegurar la persistencia e la información entre los diferentes documentos web relacionadops.

- Identifica y asegura a los usuarios que accedan al documento Web.

- Verifique la integración de los sistemas gestores de base de datos en el lenguaje de guiones del servidor.

- Configura en el lenguaje de giones la conexión para el acceso al sistema de gestión de base de datos.

- Crea la base de datos y tablas en el gestor utilizando el lenguaje de giones.

- Obtén y actualice la información almacenada en la base de datos.

- Aplique los criterios de seguridad en el acceso de los usuarios.

## Creación de la base de datos

En este ejercicio debe crear un script en PHP que cree la estructura de la base de datos. Como es de esperar, debe utilizar los conocimientos aprendidos en la lección correspondiente, por lo tanto, debe utilizar **sqlite**.

Este script se llamará **install.php**, y debe pedirnos en un formulario si queremos añadir un prefijo a las tablas de la base de datos.

Por ejemplo, nuestras iniciales. En mi caso sería **ppf**, por tanto, la tabla "user" se crearía con el nombre "ppf_user". Esto deberá tenerlo en cuenta en el resto de la aplicación. Cuando haga selects, insters, etc... Tendrá que poner este prefijo que recuperaremos de la tabla "config" . Esta tabla "config" no tendrá prefijo, si no sería posible saber su nombre.

Las tablas que creará son:

- Tabla: **config**

`config`

|nombre(pk)| string |
|-|-|
valor|string

En esta tabla, podemos guardar el parámetro de configuración prefijo. Puede gestionarlo como desee, pero tendrá que recuperar este valor para acceder al resto de tablas.

Esta mesa no tendrá prefijo. Si tuviera, no sabríamos cómo acceder.

Tabla: **user**

`<prefix>_user`

|nombre|string|(pk)|
|-|-|-|
password|string|-|
admin|boolean|-|

En esta tabla guardaremos a los usuarios, por defecto crearemos un usuario admin, con password admin encriptado. Puede mirar la siguiente función:
<https://www.php.net/manual/es/function.crypt.php>

Tabla: **productes**

`<prefix>_productes`

|id | number | pk |
|-|-|-|
**creador** | string | `fk --> user`
**producte** | string | - |
**quantitat** | string | - |
**comentaris** | string | - |
**privat** | boolean | - |

Ésta será la tabla donde pondremos productos de la compra. En principio, todos los usuarios de la aplicación comparten la misma lista de la compra, a menos que el producto sea marcado como privado.

El nombre del creador es una clave foránea en la tabla user, en el campo nombre.

### Login de entrada (index.php)

Al entrar en la aplicación se mostrará un formulario y se pedirá el nombre de usuario y contraseña mediante mediante él.

Se comprobará que el usuario y contraseña sean válidos, contrastando el valor del formulario con el de la Base de Datos.

En la BD, las contraseñas de los usuarios deben estar encriptadas, por lo tanto, deberá comprobar si el valor del formulario encriptado coinciden con el valor de la Base de Datos.

Puede utilizar la siguiente función para cifrar la contraseña:
<https://www.php.net/manual/es/function.crypt.php>

Recuerde que en el ejercicio anterior debe haber creado un usuario administrador que el usuario sea "admin" y la contraseña sea "admin".

Si el nombre de usuario o la contraseña no son correctos se mostrará un mensaje por la pantalla indicándolo.

### Usuario o contraseñas incorrectas

En caso de que sean correctos guardaremos en la sesión el nombre del usuario, y si es administrador o no. Y se mostrará por la pantalla el texto: “Usuario:” concatenado con el nombre del usuario/a y su Rol.

Por ejemplo: Usuario: Polo (Administrador)
Otro ejemplo: Usuario: Invitado (No adminitrador)
Creación de usuarios (**creaUsuari.php**, **modificaUsuari.php**, **borraUsuari.php**).

En caso de que estemos identificados como administradores, y, por tanto, tengamos guardados en sesión este rol, debemos tener la capacidad de crear, modificar y eliminar usuarios.

En la modificación de usuario sólo se pide que podamos modificar el rol y el password.

A continuación tiene una sugerencia de los nombres de los archivos, pero tiene la libertad de poner el nombre que desee siempre que sea semántico (**creaUsuario.php**, **modificaUsuario.php**, **borraUsuario.php**).

### Gestione los productos de la compra (**creaProducte.php**, **modificaProducte.php**, **esborraProducte.php**)

- Cualquier usuario debe poder crear nuevos productos en la lista de la compra.

- Cualquier usuario debe poder modificar productos de la lista de la compra.

- Cualquier usuario debe poder borrar productos de la lista de compra.

- Los productos marcados como privados sólo deben ser visibles por su creador.

A continuación, tiene una sugerencia de los nombres de los archivos, pero tiene la libertad de poner el nombre que desee siempre que sea semántico. (**creaProducto.php**, **modificaProducto.php**, **borraProducto.php**).

Los entregables del ejercicio son:

- Los archivos del código fuente (**empaquetados con formato ZIP**):

- Enlace de un vídeo explicativo, el vídeo debe contener dos partes. La primera debe mostrar la ejecución, y la segunda debe ser la explicación del código.

### Nota importante

- En la valoración del ejercicio no se tendrá únicamente en cuenta que el resultado sea correcto. Comente correctamente el programa, da nombres adecuados a las variables, atributos, métodos...

- Utilice soluciones óptimas y codifique de manera clara.

Todo esto define “la calidad” de un código y de su programador.

- **Adjunte la URL del vídeo:**

    Puede colgarlo donde desee, el **Drive** de Google, en **YouTube**, **Vimeo** o cualquier servicio de visualización de vídeo en línea similar.

    No debe publicarlo para que lo vea todo el mundo si no quiere, pero debe tener permisos para que el profesor lo pueda ver. Por ejemplo, si lo pone en **Drive** no se podrá ver si no se tiene el enlace, y si lo pone en una plataforma de vídeo similar a **YouTube**, lo puede con la opción que se pueda ver si se tiene el enlace. En ningún caso adjunte el vídeo al envío por pequeño que sea.

- **La duración del vídeo no es importante, pero ha de quedar claro lo que se expone a continuación:**

    En este vídeo, lo primero que se debe visualizar es la ejecución y demostración de forma enumerada cada una de los requerimientos que ha implementado y se pedía.

    A continuación en este vídeo se ha de visualizar el código y ha de explicar de forma breve, clara y enumerada lo que ha aprendido en este ejercicio mostrando el código.

    El objetivo de ver el vídeo es adaptarnos a la situación de enseñanza on-line, donde es relevante para verificar que entiende los concepto y cómo solucionar los problemas. Puede hacer el vídeo tan corto como considere, siempre que quede claro que lo entiende.

    No se solicita que utilice ninguna herramienta especial para crear el vídeo. Puede utilizar cualquier herramienta gratuita para grabar su escritorio y voz. O simplemente puede grabar con el móvil usted mismo a mano alzada.

    Cuando se pide un vídeo, no es necesario que literalmente sea un vídeo, si os va mejor hacerlo en dos partes, también es perfecta. La idea es que no pierda tiempo haciendo el vídeo, hágalo relajadamente y cómo le vaya mejor.

    La calidad del vídeo no será evaluada ni puntuada, puede hacerlo relajadamente, pero es imprescindible que lo entregue para evaluar los ejercicios, sirviendo como prueba de autoría del código, similar a una entrevista en persona como se podrían hacer un instituto presencial una vez entregas un ejercicio.

- **Es imprescindible que adjunte todo el código fuente y los recursos en un archivo ZIP (ningún otro formato)**. Para poder verificar el correcto funcionamiento de la aplicación, la autoría del trabajo y controlar que no ha habido copia con otros compañeros.
  
    Si no se adjunta el código con la misma versión del que se ve en el vídeo, no se compatibilizará este apartado.

### Inyección de código SQL

Con el fin de realizar una aplicación segura, en este ejercicio se pide refactorizar el código de nuestra aplicación aplicando los conocimientos que tenemos sobre el tema de inyección de código SQL y gestión de errores/seguridad.

**Adjunte el código y comente en el vídeo los diferentes cambios que ha hecho remarcando su significado.**

Los entregables del ejercicio son:

- Los archivos del código fuente **(empaquetados con formato ZIP)**:

- Enlace de un vídeo explicativo, el vídeo debe contener dos partes. La primera debe mostrar la ejecución, y la segunda debe ser la explicación del código.

### Notas importantes

- En la valoración del ejercicio no se tendrá únicamente en cuenta que el resultado sea correcto. Comente correctamente el programa, da nombres adecuados a las variables, atributos, métodos... Utilice soluciones óptimas y codifique de manera clara.
  
    Todo esto define “la calidad” de un código y de su programador.

### Adjunte la dirección URL de un vídeo

Puede colgarlo donde desee, el **Drive** de Google, en **YouTube**, **Vimeo** o cualquier servicio de visualización de vídeo en línea similar.

No debe publicarlo para que lo vea todo el mundo si no quiere, pero debe tener permisos para que el profesor lo pueda ver. Por ejemplo, si lo pone en Drive no se podrá ver si no se tiene el enlace, y si lo pone en una plataforma de vídeo similar a YouTube, lo puede con la opción que se pueda ver si se tiene el enlace. En ningún caso adjunte el vídeo al envío por pequeño que sea.

### La duración del vídeo no es importante, pero ha de quedar claro lo qeu se expone a continuación

En este vídeo, lo primero que se ha de visualizar es la ejecución donde se demostrará de forma enumarada cada uno de los requerimientos que se han implementado y se ha solicitado.

A continuación en este vídoe se ha de visualizar el código y ha de explicar de forma breve, clara y enumerada lo aprendido en este ejercicio mostrando el código.

El objetivo de hacer el vídeo es adaptarnos a la situación de enseñanza online, donde es relevante verificar que entiende los conceptos y como solucionar los problemas, Puede hacer el vídeo tan corto como considere, siemrpe que quede claro que lo entiende.

No se solicita que utilice ninguna herramienta especial para crear el vídeo. Puede utilizar cualquier herramienta gratuita para grabar su escritorio y voz. O simplemente puede grabar con el móvil usted mismo a mano alzada.

Cuando se pide un vídeo, no es necesario que literalmente sea un vídeo, si os va mejor hacerlo en dos partes, también es perfecta. La idea es que no pierda tiempo haciendo el vídeo, hágalo relajadamente y cómo le vaya mejor.

La calidad del vídeo no será evaluada ni puntuada, puede hacerlo relajadamente, pero es imprescindible que lo entregue para evaluar los ejercicios, sirviendo como prueba de autoría del código, similar a una entrevista en persona como se podrían hacer un instituto presencial una vez entregas un ejercicio.

- **Es imprescindible que adjunte todo el código fuente y los recursos en un archivo ZIP (ningún otro formato).**

Para poder verificar el correcto funcionamiento de la aplicación, la autoría del trabajo y controlar que no ha habido copia con otros compañeros.
Si no se adjunta el código con la misma versión del que se ve en el vídeo, no se compatibilizará este apartado.