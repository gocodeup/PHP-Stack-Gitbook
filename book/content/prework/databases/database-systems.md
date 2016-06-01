# Database Management Systems
A database management systems (DBMS), sometimes shortened to "database system", is a piece of software used to create, manipulate, and access databases. To provide an analogy, database management systems (DBMS) are to databases (DBs) as librarians are to libraries. Similar to how librarians maintain an accurate inventory of books and periodicals, update the index of those items in the card catalog, and control who has access to the library's resource, a DMBS is the steward responsible for its collection of data.

A DBMS's primary responsibilities are to:

- provide the ability to store large amounts of data
- ensure the safety, durability, and integrity of data
- coordinate the storage and retrieval of data
- enable administrators to manage key aspects of the system
- control access for which users or applications can access and manipulate the data
- allow users to query data (which means to ask questions about the data)
- allow users to alter or delete data

## Introducing MySQL
While there are different types of database systems, the most common and widely used database systems are Relational Database Management Systems (RDBMS). MySQL, Oracle Database, Microsoft SQL Server, SAP's Sybase, and Microsoft Access are all types of RDBMS. In Codeup, we will use MySQL because it's stable, mature, and is the most popular open source database currently in use. MySQL is the "M" in the LAMP stack (Linux, Apache, MySQL, PHP).

MySQL, like other RDBMS applications, presents data to users as a set of related tables where each table consists of columns to represent attributes (like name, email, and phone number on a "users" table) and rows to hold each distinct record. For example, the row for Jane Doe contains Jane Doe's name, email address, and phone number. Each row-column intersection is called an attribute value.
