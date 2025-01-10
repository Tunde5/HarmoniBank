# Title
Harmoni Bank

# Short description
This project focuses on developing a database and website application tailored to modernize and enhance Harmoni Bank’s customer service and operational efficiency. The proposed application aims to provide a centralized system for managing customer accounts, transactions, and financial services. It will empower users with secure access to account management features, loan applications, and transaction tracking, ensuring convenience and accessibility.

# Database tables


## Table: users
- Description: Stores information about the users of the system, including personal details and account information.

### Columns:

- ID: Primary Key
- accountNumber: VARCHAR
- accountType: VARCHAR
- balance: DECIMAL
- active: BOOLEAN
- dateCreated: DATETIME
- dateModified: DATETIME
- username: VARCHAR
- password: VARCHAR
- firstName: VARCHAR
- lastName: VARCHAR
- dob: DATE
- phoneNumber: VARCHAR
- email: VARCHAR
- address: VARCHAR

## Table: transactions
- Description: Tracks all financial transactions made within the system.

### Columns:

- ID: Primary Key
- IDAccountFrom: Foreign Key
- IDAccountTo: Foreign Key
- dateCreated: DATETIME
- dateModified: DATETIME
- IDBranch: Foreign Key
- IDEmployee: Foreign Key
- amount: DECIMAL
- IDTrType: Foreign Key

## Table: employee
- Description: Contains details about employees, including their role and branch association.




# Technologies used

Frontend
- bootstrap: CSS js framework, version 5.3

Backend
- php: version 8.2
- mariadb: mysql alternative, version 10
- apache: server, version 

System
- Xamp: software, version 
- windows: version 11



