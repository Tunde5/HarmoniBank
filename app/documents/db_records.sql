
-- Insert 10 branches (UK examples)
INSERT INTO Branch (name, location) VALUES
('Central London Branch', 'London'),
('North Manchester Branch', 'Manchester'),
('South Birmingham Branch', 'Birmingham'),
('West Glasgow Branch', 'Glasgow'),
('East Leeds Branch', 'Leeds'),
('Oxford Branch', 'Oxford'),
('Cambridge Branch', 'Cambridge'),
('Brighton Branch', 'Brighton'),
('Edinburgh Branch', 'Edinburgh'),
('Cardiff Branch', 'Cardiff');

-- Insert 10 users (UK examples)
INSERT INTO Users (accountNumber, accountType, balance, active, username, password, firstName, lastName, dob, phoneNumber, email, address) VALUES
('AC001', 'Savings', 1500.50, TRUE, 'user1', MD5('password1'), 'John', 'Doe', '1990-01-01', '07700123456', 'john.doe@example.co.uk', '123 High St, London'),
('AC002', 'Checking', 1000.00, TRUE, 'user2', MD5('password2'), 'Jane', 'Smith', '1992-02-15', '07700234567', 'jane.smith@example.co.uk', '456 King St, Manchester'),
('AC003', 'Savings', 2000.75, TRUE, 'user3', MD5('password3'), 'Alice', 'Brown', '1985-05-05', '07700345678', 'alice.brown@example.co.uk', '789 Queen St, Birmingham'),
('AC004', 'Checking', 3000.10, TRUE, 'user4', MD5('password4'), 'Bob', 'Johnson', '1995-08-20', '07700456789', 'bob.johnson@example.co.uk', '321 Prince St, Glasgow'),
('AC005', 'Savings', 500.25, TRUE, 'user5', MD5('password5'), 'Charlie', 'Davis', '1988-12-12', '07700567890', 'charlie.davis@example.co.uk', '654 Regent St, Leeds'),
('AC006', 'Checking', 750.60, TRUE, 'user6', MD5('password6'), 'Emily', 'Clark', '1993-11-11', '07700678901', 'emily.clark@example.co.uk', '987 Oxford Rd, Oxford'),
('AC007', 'Savings', 1200.00, TRUE, 'user7', MD5('password7'), 'David', 'Harris', '1980-03-03', '07700789012', 'david.harris@example.co.uk', '123 Cambridge Rd, Cambridge'),
('AC008', 'Checking', 800.75, TRUE, 'user8', MD5('password8'), 'Laura', 'Martin', '1983-07-07', '07700890123', 'laura.martin@example.co.uk', '456 Brighton Ave, Brighton'),
('AC009', 'Savings', 950.40, TRUE, 'user9', MD5('password9'), 'Mike', 'Anderson', '1975-09-09', '07700901234', 'mike.anderson@example.co.uk', '789 Edinburgh Way, Edinburgh'),
('AC010', 'Checking', 1300.80, TRUE, 'user10', MD5('password10'), 'Sophia', 'Lee', '1999-10-10', '07701012345', 'sophia.lee@example.co.uk', '321 Cardiff Ln, Cardiff');

-- Insert 10 employees (UK examples)
INSERT INTO Employee (firstName, lastName, role, branchID, active) VALUES
('Emma', 'Williams', 'Manager', 1, TRUE),
('Olivia', 'Jones', 'Cashier', 2, TRUE),
('Liam', 'Taylor', 'Accountant', 3, TRUE),
('Noah', 'Wilson', 'Clerk', 4, TRUE),
('Ava', 'Moore', 'Manager', 5, TRUE),
('Elijah', 'Thomas', 'Cashier', 6, TRUE),
('Isabella', 'White', 'Accountant', 7, TRUE),
('Sophia', 'Harris', 'Clerk', 8, TRUE),
('James', 'Martin', 'Manager', 9, TRUE),
('Mia', 'Thompson', 'Cashier', 10, TRUE);

-- Insert 10 transaction types
INSERT INTO TransactionTypes (name) VALUES
('Deposit'),
('Withdrawal'),
('Transfer'),
('Bill Payment'),
('Loan Payment'),
('Online Purchase'),
('In-Store Purchase'),
('ATM Withdrawal'),
('Mobile Transfer'),
('Cheque Deposit');

-- Insert 10 transactions (UK examples)
INSERT INTO Transactions (IDAccountFrom, IDAccountTo, dateCreated, dateModified, IDBranch, IDEmployee, amount, IDTrType) VALUES
(1, 2, NOW(), NOW(), 1, 1, 200.00, 1),
(2, 3, NOW(), NOW(), 2, 2, 300.00, 2),
(3, 4, NOW(), NOW(), 3, 3, 500.00, 3),
(4, 5, NOW(), NOW(), 4, 4, 100.00, 4),
(5, 6, NOW(), NOW(), 5, 5, 400.00, 5),
(6, 7, NOW(), NOW(), 6, 6, 150.00, 6),
(7, 8, NOW(), NOW(), 7, 7, 250.00, 7),
(8, 9, NOW(), NOW(), 8, 8, 350.00, 8),
(9, 10, NOW(), NOW(), 9, 9, 450.00, 9),
(10, 1, NOW(), NOW(), 10, 10, 550.00, 10);
