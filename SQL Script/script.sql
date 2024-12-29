
CREATE DATABASE IF NOT EXISTS HotelManagement;


USE HotelManagement;


CREATE TABLE IF NOT EXISTS Rooms (
    RoomID INT AUTO_INCREMENT PRIMARY KEY,
    RoomType VARCHAR(255) NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    Status ENUM('Available', 'Occupied') NOT NULL DEFAULT 'Available'
);


INSERT INTO Rooms (RoomType, Price, Status)
VALUES 
('Deluxe Room', 150.00, 'Available'),
('Suite', 300.00, 'Occupied'),
('Single Room', 80.00, 'Available');


CREATE TABLE AdminUsers (
    AdminID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL,
    Password VARCHAR(255) NOT NULL
);