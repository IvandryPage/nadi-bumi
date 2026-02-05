# NADI-BUMI // SYSTEM ARCHIVE

<div align="center">
  <p>✦ <i>A PHP-based management system engineered for resource tracking and data integrity.</i> ✦</p>
</div>

---

### // OVERVIEW
**Nadi-Bumi** is a web-based application designed to manage and monitor environmental or resource-related data. Built during the exploration of server-side development, this project focuses on the seamless integration of relational databases and dynamic content rendering using the PHP ecosystem.

The system emphasizes **CRUD (Create, Read, Update, Delete)** operations and secure data handling within a traditional monolithic architecture.

### // TECH STACK
The application is deployed on a local server environment with the following specifications:

* **Language** | PHP
* **Database** | MariaDB / MySQL
* **Local Server** | XAMPP Environment
* **Frontend** | HTML5, CSS3, JavaScript

### // CORE FEATURES
* **Relational Data Management** | Optimized SQL queries for efficient data retrieval and storage.
* **Session Handling** | Secure user state management for administrative operations.
* **Dynamic UI Rendering** | Server-side logic to generate interfaces based on real-time database states.
* **Validation Logic** | Integrated input sanitization to ensure data consistency and system security.

### // SYSTEM ARCHITECTURE
This project follows the classic **Client-Server** model:
1.  **Frontend**: Interface handles user input and displays data.
2.  **Server (PHP)**: Processes business logic and communicates with the data layer.
3.  **Database (MySQL)**: Persistent storage for all system records.

---

### // INSTALLATION & SETUP
To deploy a local instance of **Nadi-Bumi**:

1.  **Clone the repository** into your XAMPP `htdocs` directory:
    ```bash
    git clone [https://github.com/IvandryPage/nadi-bumi.git](https://github.com/IvandryPage/nadi-bumi.git)
    ```
2.  **Database Configuration**:
    * Open `phpMyAdmin`.
    * Create a new database (e.g., `nadi_bumi`).
    * Import the provided `.sql` file
3.  **System Connection**:
    * Configure your database credentials in the `config.php` or `connection.php` file.
4.  **Access the System**:
    * Start Apache and MySQL in XAMPP.
    * Navigate to `http://localhost/nadi-bumi` in your browser.
