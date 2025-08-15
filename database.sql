-- Create database
CREATE DATABASE IF NOT EXISTS dental_appointments;
USE dental_appointments;

-- Create appointments table
CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    service VARCHAR(50) NOT NULL,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending'
);

-- Insert sample data (optional)
INSERT INTO appointments (first_name, last_name, email, phone, service, message) VALUES
('John', 'Doe', 'john.doe@email.com', '(555) 123-4567', 'general', 'Regular checkup needed'),
('Jane', 'Smith', 'jane.smith@email.com', '(555) 987-6543', 'cleaning', 'Teeth cleaning appointment');