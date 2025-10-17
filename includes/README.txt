Aquí van a ir todos los archivos PHP que se van a utilizar en varias páginas.
Por ejemplo:
    - header.php -> Cabecera común para todas las páginas
    - footer.php -> Footer para todas las páginas
    - navbar.php -> navbar que se usará en todas las páginas
    - conexion.php -> Conexión a la base de datos

Esos son archivos de ejemplo, la idea es que todo lo que pueda ser reutilizable
se agregue en el includes, para no reescribir código y solo incluirlo.

Nota: A su conexión a la base de datos, si o si llamenla conexion.php, ya que así
está configurada en el .gitignore.
