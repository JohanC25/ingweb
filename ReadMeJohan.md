*Introducción al Framework MVC - Laravel*

Laravel es un framework PHP que facilita el desarrollo de aplicaciones mediante su estructura MVC (Modelo-Vista-Controlador) y un robusto sistema de paquetes. Este ambiente de desarrollo permite a los programadores enfocarse más en la lógica de la aplicación al simplificar tareas como la instanciación de clases y métodos, promoviendo así un código más limpio y reduciendo la redundancia, especialmente cuando se requieren cambios en el código. Laravel facilita tareas comunes utilizadas en la mayoría de los proyectos web, como la autenticación, enrutamiento, sesiones y almacenamiento en caché, brindando herramientas poderosas necesarias para grandes aplicaciones, y con una inversión de código sorprendentemente ligera.

*Diseño de Ingeniría*

Diagrama arquitectura framework
![ArchLaravel](https://github.com/JohanC25/ingweb/assets/114593684/5d0d9f1a-d3f0-4248-8cdd-9fa32170181a)

Este es la arquitectura básica que posee un proyecto en Laravel. Comencemos por el usuario, el cual llama a una ruta en específico y esta ruta tiende a estar atada con un controlador, de ahí el controlador devuelve la vista y llama al modelo para traer o almacenar la información requerida en su base de datos. Este proceso se repite siempre que se navegue por páginas web usando el framework de Laravel.
En otras palabras, el usuario envía una solicitud(GET,POST, etc.), donde se envía eso a una ruta que nos lleva al controlador respectivo. El controlador llama al modelo, el cual busca información o la almacena dependiendo del caso y lo devuelve al controlador. Este continúa a llenar la vista e imprimir la data solicitada.


*Diseño del Login*

*Explicación del Login*

Cuando el usuario accede a la pagina web se le presenta el login, en el cual si ya tiene una cuenta puede acceder directamente, caso contrario puede crearse una cuenta. En el login no se puede cambiar la ruta (ejemplo: pasar de la ruta del login "www.ingweb.com" a la ruta "www.ingweb.com/usuarios), además de la validación de que exista el usuario en la base de datos creada anteriormente. 

![LoginJohanC](https://github.com/JohanC25/ingweb/assets/114593684/0ffe9686-8b35-4481-9625-30f471ba5abe)

En este diseño tenemos la pantalla de Login. El usuario puede crear un usuario o si ya tiene uno, acceder con sus credenciales. El 'auth' de Laravel revisar que el usuario este logueado y evite que el mismo cambie la URL a una a la que no deba o no tenga acceso, como por ejemplo a borrar usuarios mediante URL. Si el usuario existe y es valido accede al sistema, caso contrario se queda en la pantalla de Login hasta que ingrese correctamente las credenciales.

*Explicación Funcionamiento Admin*

![AdminMVC1](https://github.com/JohanC25/ingweb/assets/114593684/3700e97b-5e81-40f0-8aac-e0c37339ccb2)


Este diagrama de administración por roles y permisos muestra como cada rol posee diferentes permisos para interactuar en el sistema. Mientras que el que posea Admin o Superadmin tienen acceso a todas las gestiones del sistema, el empleado solo tiene acceso a gestionar las actividades del negocio y no a los usuarios ya que ese no es su campo de trabajo. Cada usuario es consedido diferentes roles y en los roles se conceden diferentes permisos para interactuar en el sistema.Todo esto es validado por el front y backend de la aplicación y tiene un diseño minimalista para que el usuario no se pierda.
