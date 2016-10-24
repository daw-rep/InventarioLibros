# InventarioLibros
Aplicación PHP para crear un inventario de libros

1.	Instalar un servidor WAMP/LAMP.
	2.	Configuración de la base de datos
		-	Arrancar mysql
		-	Crear un usuario en mysql denominado admin con password admin.
			o La configuración de la conexión a la base datos está definida en el fichero configuración.php.
 			o La configuración por defecto es
				
				define("BD_SERVIDOR", "localhost:3306");
				define("BD_NOMBRE", "inventariolibros");
				define ("BD_USUARIO", "admin");
				define ("BD_PASSWORD", "admin");

    - Crear un esquema/catalogo en mysql denominado inventariolibros
		-	Asignarle permisos al usuario admin sobre la base de datos inventariolibros
		-	Conectarse a la base de datos con el usuario admin 
		-	importar el script BD/inventariolibros.sql
			
	3.	Configuración de la aplicación web
		-	Copiar la aplicación a un directorio del servidor web.
		-	Reiniciar Apache
	4.	Arrancar una navegador y acceder a http://localhost/
