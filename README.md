# Proyecto Final - Control de Mantenimiento Vehículos Automechanic

### Ciencias de la Computación

### Proyecto de Programación 4 Web

#### Descripción
El proyecto consiste en el desarrollo de una **aplicación web** para gestionar los servicios de mantenimiento y reparación de vehículos proporcionados  **Automechanic**. La aplicación está dividida en dos partes principales:

1. **Interfaz pública de Marketing**: 
   - Página principal (Home)
   - Descripción de los servicios
   - Video promocional
   - Testimonios de clientes
   - Galería de imágenes
   - Sección de preguntas frecuentes (FAQ)
   
2. **Interfaz de Citas y Facturación**:
   - Sistema de login de clientes
   - Creación de citas para mantenimiento o reparaciones
   - Consulta de horarios
   - Solicitud de reparación
   - Pago con tarjeta de crédito
   - Generación de recibos y entrega de vehículos

#### Tecnologías Utilizadas
- **Frontend**:
  - HTML
  - CSS (con Bootstrap)
  - JavaScript (con jQuery)
- **Backend**:
  - PHP
- **Base de Datos**:
  - MySQL

#### Estructura del Proyecto

1. **Página Principal (Index)**: La página de inicio contiene enlaces a los diferentes servicios ofrecidos por Automechanic
   
2. **Página de Servicios**:
   - **Servicios de mantenimiento**: Cambio de aceite, revisión de dirección y mantenimiento básico.
   - **Servicios de reparación**: Cambio de repuestos, enderezado y pintado, sistema eléctrico.

3. **Citas y Facturación**:
   - Los clientes pueden **agendar citas** para mantenimiento o reparación.
   - Opción de ver disponibilidad de horarios.
   - Los usuarios se autentican para **crear una cita**, realizar un pago con tarjeta de crédito y recibir un recibo de pago.

4. **Base de Datos**:
   La base de datos contiene las siguientes tablas:
   - **Usuarios**: Información de los usuarios registrados.
   - **Servicios**: Detalles de los servicios de mantenimiento y reparación.
   - **Citas**: Información sobre las citas creadas por los clientes.
   - **Orden de trabajo**: Datos relacionados con la ejecución del servicio.
   - **Técnicos**: Información sobre los técnicos que realizan las reparaciones.
   - **Factura**: Detalles sobre el pago y la factura generada.
   - **Tarjetas de Crédito**: Información sobre las tarjetas de crédito de los clientes.
   - **Pagos**: Información de los pagos realizados por los clientes.

#### Funcionalidades Clave

1. **Página de Marketing**:
   - Muestra los servicios de la empresa.
   - Permite a los usuarios visualizar testimonios y videos promocionales.
   - Incluye un sistema de agendamiento de citas donde el usuario puede elegir entre mantenimiento o reparación.

2. **Sistema de Login y Gestión de Citas**:
   - Los usuarios pueden crear una cuenta, iniciar sesión y gestionar sus citas.
   - La plataforma permite seleccionar el servicio a realizar y agendar una cita.
   
3. **Sistema de Pagos**:
   - Los usuarios pueden realizar pagos utilizando una tarjeta de crédito.
   - Se genera un recibo de pago, que el cliente puede descargar.

#### Funciones de Administrador

1. **Gestión de Servicios**: Los administradores pueden agregar, editar o eliminar servicios de mantenimiento y reparación.
2. **Gestión de Citas**: Los administradores pueden visualizar, aprobar o cancelar citas.
3. **Gestión de Pagos y Facturación**: Los administradores pueden procesar pagos y generar facturas.

#### Instrucciones para la Ejecución del Proyecto

1. **Instalación del Servidor**:
   - Asegúrate de tener **PHP**, **MySQL**, y **Apache** instalados en tu entorno de desarrollo local.
   - Puedes usar herramientas como **XAMPP** o **WAMP** para instalar Apache y MySQL.
   
2. **Base de Datos**:
   - Importa el archivo SQL de la base de datos proporcionado en este repositorio para crear las tablas necesarias.

3. **Ejecutar el Proyecto**:
   - Coloca todos los archivos del proyecto en el directorio raíz de tu servidor (por ejemplo, `htdocs` en XAMPP).
   - Accede a través de `http://localhost/nombre_del_proyecto/` en tu navegador.
   - Con Xamp por ejemplo : C:\xampp\php\php.exe -S localhost:30000

#### Capturas de Pantalla
![Página Principal](./imagenes%20para%20GitHub/1.png)
![FAQ](./imagenes%20para%20GitHub/2.png)
![Programar Cita](./imagenes%20para%20GitHub/3.png)
![Login](./imagenes%20para%20GitHub/4.png)
![Crear Cita Temporal](./imagenes%20para%20GitHub/5.png)
![Login Prinicpal](./imagenes%20para%20GitHub/6.png)
![programar Cita ](./imagenes%20para%20GitHub/7.png)
![gestion Cita](./imagenes%20para%20GitHub/8.png)
![Realizar Pago](./imagenes%20para%20GitHub/9.png)
![Confirmacion de Pago](./imagenes%20para%20GitHub/10.png)
![Ver Detalle Factura](./imagenes%20para%20GitHub/11.png)
![Login Admin](./imagenes%20para%20GitHub/12.png)
![Ver Citas Admin](./imagenes%20para%20GitHub/13.png)
![Agregtar Servicios](./imagenes%20para%20GitHub/14.png)


#### Notas Finales

Este proyecto tiene como objetivo brindar una solución web para la gestión de servicios automotrices de Automechanic, incluyendo la agendación de citas, la gestión de pagos y la administración de los servicios ofrecidos. He utilizado las tecnologías aprendidas durante el curso de programación web y he integrado funciones clave como la creación de citas, el procesamiento de pagos y la generación de recibos de forma eficiente.


#### English 

# Final Project - Vehicle Maintenance Management System - Automechanic

### School of Computer Science

### Web Programming Project 4

#### Description
This project involves the development of a **web application** to manage vehicle maintenance and repair services provided by **Automechanic**. The application is divided into two main parts:

1. **Public Marketing Interface**:
   - Home page
   - Description of services
   - Promotional video
   - Customer testimonials
   - Image gallery
   - Frequently Asked Questions (FAQ) section
   
2. **Appointments and Billing Interface**:
   - Customer login system
   - Create appointments for maintenance or repairs
   - View available time slots
   - Request repairs
   - Pay via credit card
   - Generate receipts and vehicle delivery details

#### Technologies Used
- **Frontend**:
  - HTML
  - CSS (with Bootstrap)
  - JavaScript (with jQuery)
- **Backend**:
  - PHP
- **Database**:
  - MySQL

#### Project Structure

1. **Home Page (Index)**: The homepage contains links to the various services offered by Automechanic.
   
2. **Services Page**:
   - **Maintenance Services**: Oil change, steering inspection, and basic maintenance.
   - **Repair Services**: Parts replacement, denting and painting, electrical system repair.

3. **Appointments and Billing**:
   - Customers can **schedule appointments** for maintenance or repairs.
   - Option to view available time slots.
   - Users log in to **create an appointment**, make a payment via credit card, and receive a payment receipt.

4. **Database**:
   The database contains the following tables:
   - **Users**: Information of registered users.
   - **Services**: Details of maintenance and repair services.
   - **Appointments**: Information about appointments created by customers.
   - **Work Orders**: Data related to the execution of services.
   - **Technicians**: Information about the technicians performing the repairs.
   - **Invoices**: Details about payments and generated invoices.
   - **Credit Cards**: Information about customers' credit cards.
   - **Payments**: Information on payments made by customers.

#### Key Features

1. **Marketing Page**:
   - Displays the services offered by the company.
   - Allows users to view testimonials and promotional videos.
   - Includes an appointment scheduling system where users can choose between maintenance or repair.

2. **Login System and Appointment Management**:
   - Users can create an account, log in, and manage their appointments.
   - The platform allows users to select the service and schedule an appointment.
   
3. **Payment System**:
   - Users can make payments using a credit card.
   - A payment receipt is generated, which the customer can download.

#### Admin Features

1. **Service Management**: Admins can add, edit, or delete maintenance and repair services.
2. **Appointment Management**: Admins can view, approve, or cancel appointments.
3. **Payment and Invoice Management**: Admins can process payments and generate invoices.

#### Instructions for Running the Project

1. **Install the Server**:
   - Ensure you have **PHP**, **MySQL**, and **Apache** installed in your local development environment.
   - You can use tools like **XAMPP** or **WAMP** to install Apache and MySQL.
   
2. **Database**:
   - Import the provided SQL database file to create the necessary tables.

3. **Run the Project**:
   - Place all project files in the root directory of your server (e.g., `htdocs` in XAMPP).
   - Access the project via `http://localhost/project_name/` in your browser.
   - running with Xamp for example : C:\xampp\php\php.exe -S localhost:30000

#### Screenshots
![Home Page](./imagenes%20para%20GitHub/1.png)
![FAQ](./imagenes%20para%20GitHub/2.png)
![Schedule Appointment](./imagenes%20para%20GitHub/3.png)
![Login](./imagenes%20para%20GitHub/4.png)
![Create Temporary Appointment](./imagenes%20para%20GitHub/5.png)
![Main Login](./imagenes%20para%20GitHub/6.png)
![Schedule Appointment](./imagenes%20para%20GitHub/7.png)
![Manage Appointment](./imagenes%20para%20GitHub/8.png)
![Make Payment](./imagenes%20para%20GitHub/9.png)
![Payment Confirmation](./imagenes%20para%20GitHub/10.png)
![View Invoice Details](./imagenes%20para%20GitHub/11.png)
![Admin Login](./imagenes%20para%20GitHub/12.png)
![View Appointments Admin](./imagenes%20para%20GitHub/13.png)
![Add Services](./imagenes%20para%20GitHub/14.png)

#### Final Notes

This project aims to provide a web solution for managing the automotive services of **Automechanic**, including appointment scheduling, payment management, and administration of the services offered. I have used the technologies learned during the web programming course and integrated key features such as appointment creation, payment processing, and receipt generation efficiently.

---

### Evaluation

The project was developed according to the course requirements and the submission deadline, with evaluation focused on the full functionality of the system, its usability, and code quality.

---

Thank you for reviewing my project!
