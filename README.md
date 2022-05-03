# Inmstalación del proyecto

Antes de instalar el proyecto asegúrese de instalar primero las dependencias:

```bash
sudo apt install sqlite3 php-sqlite3
```

Para empezar, primero debe crear un enlace simbólico para poder correr el proyecto.

## Enlace simbólico Linux o Mac

Para crear un enlace simbólico en los sistemas basadoso en Unix debe escribir desde la terminal la siguiente línea:

```bash
sudo ln -s /ruta-del-proyecto/el-proyecto/public /ruta-del-servidor/public-del-servidor/el-proyecto
```

## Enlace simbólico en Windows

Para crear un enlace simbólico en **Windows** debes escribir la siguiente línea en el símbolo del sistema:

```bat
mklink C:\ruta-del-servidor\public-del-servidor\el-proyecto C:\ruta-del-proyecto\el-proyecto\public
```

## Después de la creación de los enlaces simbólicos

Después de haber creado los enlaces simbólicos, proceda a correr el proyecto. El proyecto será capaz de detectar la ausencia de la base de datos, por lo tanto, le mostrará un formulario para solicitarle que defina un prefijo para todas las tablas de la base de datos.

La base de datos que va a crear se llama `eac2.db` y lo ubicará en la siguiente ruta:

```bash
database/eac2.db
```
