
# Project Harmoni Bank

PHP Website for bank management.

## setup

+ local project directory
+ todo text file
+ github: upload project
+ install docker server
+ install php docker image 
+ test docker address; localhost:8080
+ test php works: test index.php running
+ test database works; localhost:8081

## project

- review assigment

- planning

+ folder structure: docker files
/app /src /doc /dist /test /info   

+ /src directory: index.php assets/css assets/js assets/img /templates

## Database

- ERD diagram complete
- SQL commands to create database
- SQL commands to add initial test records

## HTML frontend

- review number of pages
- doc info for each page
- pages: 

html header - logo, menu 
html body

menu:
home 
login-logout
customers /
employers /
transactions /

pages:
home
list customers; name, profile link, 
customer profile page: name, date created, nr of transaction, link to transactions, all data

transactions page: selected by customer, list all 
list employers: name, empl. profile link
employer profile page: name, branch, date..

- actions menu: create new, update, delete







## PHP

- 

## PLanning

## ABout

HarmoniBank Online Banking System

HarmoniBank is a local bank based in Birmingham that has recently expanded its operations by
opening four additional branches across the city. The bank provides a comprehensive range of
financial products and services to its customers, including personal accounts, savings accounts,
loans, and business accounts. To ensure efficient customer account management and personalized
service delivery, HarmoniBank relies on a dedicated team of branch staff, including Branch
Managers, Relationship Managers, Tellers, Loan Officers, Financial Advisors, and Customer
Service Representatives. Each staff member is assigned to a specific branch, with senior employees
like Branch Managers overseeing other staff members.

## Database

A database system capable of streamlining
various banking processes and enhancing the overall customer experience.


• Efficiently manage customer accounts and personal information
• Enable secure and real-time transaction processing
• Streamline employee administration and access control
• Optimize branch operations and data management


Furthermore, HarmoniBank's headquarters requires granular data on account transactions across
all branches to gain valuable business insights. For each account activity, the system must log the following information:

• Account number
• Transaction type (deposit, withdrawal, transfer, payment, fee, interest)
• Transaction amount
• Timestamp
• Branch location
• Employee who conducted the transaction

## Task 1 - diagrams

++ ERD diagram
- DB schema asd relationships
- entity, attributes, keys, relationships
- 3NF

## Task 2 - database

- DB create in mySQL (mariaDB): create db, keys, relation

- pre-update database with records; sql commands

## Task 3  - php app

- users 
login: php SESSION, cache

roles: admin, member, public 

- actions php 

customer account information
transaction record
-- other relevant data

form --> CRUD create, read, update, delete db

- frontend (html) 

responsive display style Framework: 
HTML, CSS, JS 
include Twitter Bootstrap framework

(other examples: Google Angular, Facebook React)
(better use NODEjs or DENO in future)

## Task 4 - 

- CRUD create, read, update, delete actions

- create/add account - register account
- user profile page with user information, transactions
- update customer data: address, contact, ..
- delete user

steps:
html form - submit button action (php.file)
php.file - 
receive the form data; 
process data: find out what to do (CRUD)
do the action with the database
return message: done/thank you or not successful 

## Task 5 - Docs

- /screenshots
- project - harmonic bank.doc
- 





