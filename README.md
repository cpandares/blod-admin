

<!-- 

Blog autoadministrable, se implemento plantilla Admn Lte para el mantenimiento.

en la consola correr el comando composer install para reconstruir la carpeta vendor.
Despues correr npm install && npm run dev Para los estilos de tailwind

* Politicas de acceso.
* Form request
* Roles y permisos
* Relaciones con eloquent
* Estilos publicos con Tailwind
* Estilos del dashboar con bootstrap
* Proteccion de rutas con middleware
* Implementacion del cache para la primera carga de posts, y con cada actualizacion. Modificar en el .env:
 CACHE_DRIVER=file


Para las imagenes se uso cloudinary, ya que no es recomendable subir imagenes a nuestro servidor.
La configuracion de cloudinary en el .env:

CLOUDINARY_API_KEY= xxxxxxx
CLOUDINARY_API_SECRET= xxxxxxxxx
CLOUDINARY_CLOUD_NAME= xxxxxxxxxxxxxxxxx
CLOUDINARY_URL=cloudinary:xxxxxxxxxxxxxxxxxxxxxxx
CLOUDINARY_UPLOAD_PRESET=xxxxxxxxxxxxxxxxxxxx



 -->