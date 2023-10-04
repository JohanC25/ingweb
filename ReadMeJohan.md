*Introducción al Framework MVC - Laravel*

Laravel es un framework PHP que facilita el desarrollo de aplicaciones mediante su estructura MVC (Modelo-Vista-Controlador) y un robusto sistema de paquetes. Este ambiente de desarrollo permite a los programadores enfocarse más en la lógica de la aplicación al simplificar tareas como la instanciación de clases y métodos, promoviendo así un código más limpio y reduciendo la redundancia, especialmente cuando se requieren cambios en el código. Laravel facilita tareas comunes utilizadas en la mayoría de los proyectos web, como la autenticación, enrutamiento, sesiones y almacenamiento en caché, brindando herramientas poderosas necesarias para grandes aplicaciones, y con una inversión de código sorprendentemente ligera.

*Diseño de Ingeniría*

Diagrama arquitectura framework
![ArchLaravel](https://github.com/JohanC25/ingweb/assets/114593684/5d0d9f1a-d3f0-4248-8cdd-9fa32170181a)

Este es la arquitectura básica que posee un proyecto en Laravel. Comencemos por el usuario, el cual llama a una ruta en específico y esta ruta tiende a estar atada con un controlador, de ahí el controlador devuelve la vista y llama al modelo para traer o almacenar la información requerida en su base de datos. Este proceso se repite siempre que se navegue por páginas web usando el framework de Laravel.
En otras palabras, el usuario envía una solicitud(GET,POST, etc.), donde se envía eso a una ruta que nos lleva al controlador respectivo. El controlador llama al modelo, el cual busca información o la almacena dependiendo del caso y lo devuelve al controlador. Este continúa a llenar la vista e imprimir la data solicitada.
