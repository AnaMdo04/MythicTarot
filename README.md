# MythicTarot

## Descripción del Proyecto

MythicTarot es una plataforma en línea que permite a los usuarios recibir lecturas de tarot personalizadas basadas en sus preguntas específicas. A través de animaciones, los usuarios pueden recibir en la web la experiencia de una lectura de tarot virtual, obteniendo respuestas a sus preguntas. La plataforma ofrece características adicionales como la compra de cartas de tarot personalizadas y un historial de lecturas, mejorando la experiencia personal de cada usuario.

## Razón del Nombre

MythicTarot fusiona "Mythic", que alude a lo mítico y legendario, con "Tarot", refiriéndose a las cartas y prácticas de adivinación. Este nombre sugiere un espacio donde los usuarios se conectan con historias y arquetipos antiguos a través de las lecturas de tarot, permitiendo que cada sesión revele respuestas y enseñanzas a sus preguntas. MythicTarot captura la esencia de sumergirse en un universo de símbolos y mitos que han guiado a la humanidad a lo largo de los siglos.

## Funcionalidades Clave

### Registro de Usuarios y Perfiles

-   **Registro y autenticación:** Los usuarios pueden registrarse usando su correo electrónico.
-   **Perfiles personalizables:** Cada usuario puede personalizar su perfil, incluyendo preferencias de lectura y sus diseños de cartas.

### Lecturas de Tarot

-   **Formulación de preguntas:** Los usuarios pueden escribir sus preguntas antes de comenzar la lectura de tarot.
-   **Animaciones de lectura de cartas:** Implementación de animaciones CSS y JavaScript para simular el mezclado y la selección de cartas, ofreciendo una experiencia interactiva y visual.
-   **Interpretaciones y guardado de lecturas:** Después de cada lectura, se muestra una interpretación basada en las cartas seleccionadas. Los usuarios pueden guardar estas lecturas en su perfil para referencia futura.

### Historial y Edición de Lecturas

-   **Gestión de historial de lecturas:** Los usuarios pueden ver, editar y eliminar lecturas pasadas guardadas en su perfil.
-   **Notas personalizadas:** Posibilidad de añadir notas personales a cada lectura para reflexiones futuras.

### Tienda de Diseños Personalizados

-   **Catálogo de diseños de cartas:** Una sección para comprar diseños exclusivos de cartas de tarot, creados por artistas colaboradores.
-   **Integración de carrito de compras:** Sistema de carrito para la selección y compra de diseños, con integración de pasarelas de pago seguras.

## Tecnologías

### Backend (Laravel)

-   **Modelo de datos:** Definición de modelos para usuarios, lecturas de tarot, cartas y transacciones de compra.
-   **API REST:** Desarrollo de una API RESTful para manejar las operaciones CRUD (Crear, Leer, Actualizar, Eliminar) sobre las lecturas de tarot, perfiles de usuario y la tienda.
-   **Autenticación y seguridad:** Implementación de autenticación JWT para asegurar las rutas de la API y proteger la información del usuario.

### Frontend (React)

-   **Interfaz de usuario interactiva:** Diseño y desarrollo de una SPA (Single Page Application) con React, aprovechando componentes dinámicos para las animaciones de las cartas y la interactividad de la plataforma.
-   **Estado global y manejo de rutas:** Uso de Context API para manejar el estado global de la aplicación y React Router para la navegación.
-   **Integración con la API del backend:** Conexión con la API de Laravel para el manejo de datos y operaciones.

## Despliegue

-   **Despliegue:** Configuración de un entorno de producción adecuado para Laravel y React, utilizando el servicio de AWS.

## Estructura de Páginas

-   **Inicio:** Presentación general de la plataforma y destacados de lecturas de tarot, testimonios de usuarios y novedades.
-   **Sobre Nosotros:** Información sobre la historia de la plataforma, misión, visión y equipo detrás de MythicTarot.
-   **Registro/Inicio de Sesión:** Página para que nuevos usuarios se registren y usuarios existentes inicien sesión.
-   **Perfil de Usuario:** Detalles del perfil del usuario, preferencias de lectura y selección del diseño de cartas. Opción para editar y actualizar información.
-   **Lectura de Tarot:** Sección donde los usuarios pueden formular preguntas y recibir sus lecturas de tarot con animaciones.
-   **Historial de Lecturas:** Listado de todas las lecturas pasadas con opciones para ver, editar o eliminar.
-   **Tienda de Diseños de Cartas:** Catálogo de diseños de cartas disponibles para compra, incluyendo detalles de artistas y precios.
-   **Carrito de Compras:** Resumen de productos seleccionados para compra con opciones para modificar la cantidad o eliminar ítems.
-   **Checkout:** Proceso de finalización de compra con detalles de pago y envío.
-   **FAQs/Preguntas Frecuentes:** Respuestas a preguntas comunes sobre las lecturas de tarot, personalización de cartas y otros servicios ofrecidos.
-   **Contacto:** Formulario de contacto para dudas, soporte o feedback de los usuarios.

## Monetización

-   **Venta de diseños de cartas:** Principal fuente de ingresos a través de la tienda integrada en la plataforma.

## Consideraciones Finales

La clave del éxito de MythicTarot será ofrecer una experiencia de usuario fluida y mística que combine la tradición del tarot con la tecnología moderna. La personalización y la interacción serán fundamentales para captar y retener a los usuarios, al igual que asegurar la privacidad y seguridad de sus datos. Este proyecto es una oportunidad para explorar el mundo del tarot digital y para innovar en cómo las personas interactúan con la espiritualidad en el siglo XXI.
