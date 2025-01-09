-- CREATE DATABASE BankSystem;
-- USE BankSystem;

-- Create Branch Table
CREATE TABLE Branch (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL
);

-- Create Users Table
CREATE TABLE Users (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    accountNumber VARCHAR(20) NOT NULL UNIQUE,
    accountType VARCHAR(50) NOT NULL,
    balance DECIMAL(15, 2) NOT NULL,
    active BOOLEAN DEFAULT TRUE,
    dateCreated DATETIME DEFAULT CURRENT_TIMESTAMP,
    dateModified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    dob DATE NOT NULL,
    phoneNumber VARCHAR(15),
    email VARCHAR(255),
    address VARCHAR(255)
);

-- Create Employee Table
CREATE TABLE Employee (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    role VARCHAR(100) NOT NULL,
    branchID INT,
    dateCreated DATETIME DEFAULT CURRENT_TIMESTAMP,
    dateModified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    active BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (branchID) REFERENCES Branch(ID)
);

-- Create TransactionTypes Table
CREATE TABLE TransactionTypes (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Create Transactions Table
CREATE TABLE Transactions (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    IDAccountFrom INT,
    IDAccountTo INT,
    dateCreated DATETIME DEFAULT CURRENT_TIMESTAMP,
    dateModified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    IDBranch INT,
    IDEmployee INT,
    amount DECIMAL(15, 2) NOT NULL,
    IDTrType INT,
    FOREIGN KEY (IDAccountFrom) REFERENCES Users(ID),
    FOREIGN KEY (IDAccountTo) REFERENCES Users(ID),
    FOREIGN KEY (IDBranch) REFERENCES Branch(ID),
    FOREIGN KEY (IDEmployee) REFERENCES Employee(ID),
    FOREIGN KEY (IDTrType) REFERENCES TransactionTypes(ID)
);


-- Modify Users table: password to store MD5-encrypted values
ALTER TABLE Users MODIFY password CHAR(32) NOT NULL;
