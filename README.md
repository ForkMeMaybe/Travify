# ✈️ Travify - US Trip Registration Form

Welcome to **Travify**, a simple PHP-based web form that allows students to register for an exciting US trip organized by LPU Punjab. This project is built using PHP and PostgreSQL and is deployed on [Render](https://render.com).

---

## 🌐 Live Demo

👉 **[Visit the live site here](https://travify.onrender.com)**  
You can fill out the form and your details will be stored in a PostgreSQL database.

---

## 🛠️ Tech Stack

- **Frontend:** HTML, CSS  
- **Backend:** PHP 8  
- **Database:** MySQL  
- **Deployment:** Docker + Render

---

## 🚀 How to Run Locally

### 1. Clone the Repository

```bash
git clone https://github.com/ForkMeMaybe/Travify.git
cd Travify
```


2. Create PostgreSQL Database

You can use any local PostgreSQL instance. Example setup:
CREATE DATABASE travel_form;

```sql
CREATE TABLE trip (
  id SERIAL PRIMARY KEY,
  name VARCHAR(255),
  age VARCHAR(10),
  gender VARCHAR(10),
  email VARCHAR(255),
  phone VARCHAR(20),
  other TEXT,
  dt TIMESTAMP
);
```

3. Update Database Credentials

In index.php, modify these variables according to your local PostgreSQL setup:

```php
$host = "localhost";
$port = "5432";
$dbname = "travel_form";
$user = "your_username";
$password = "your_password";
```

4. Run PHP Server

If you're using PHP installed on your machine:

```bash
php -S localhost:8000

Then open http://localhost:8000 in your browser.
```

📦 Docker Setup (Optional)

If you prefer Docker:
1. Build the Docker image

docker build -t travify .

2. Run the container

docker run -p 8000:80 travify

Visit http://localhost:8000 to access the app.
📁 Project Structure

travify/
├── Dockerfile
├── index.php
├── index.html
├── style.css
├── lpu2.jpg
└── README.md

🙌 Acknowledgements

    Render for free deployment

    MySQL for robust relational data storage

    PHP for simplicity in backend scripting
