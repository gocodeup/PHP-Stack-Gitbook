# Database Users

### Lesson Goals

- Understand how users interact with the MySQL server
- Understand how to list all users, including the current user
- Understand how to create a new user
- Understand that users connect from hosts
- Understand user priveleges
- Understand how to use ansible to automate the admin user creation process

---------------------------------

The MySQL server is a multiuser system. In the previous lesson we used the `vagrant` user to connect to the server and explore the command line client in general. In this lesson we will learn more about how MySQL users are defined and created and the basics of managing them. These users exist independently of the Vagrant environment itself, so even though we have been using the `vagrant` user in MySQL, it is not the same as the `vagrant` user in our Vagrant box.

## Finding the Current User

As stated, we have been using the `vagrant` user to connect to MySQL. What if we are already in the MySQL client want to determine what user we are currently connected with. The command to do this would be `SELECT current_user;`. The output for this is below:

    mysql> SELECT current_user;
    +-------------------+
    | current_user      |
    +-------------------+
    | vagrant@localhost |
    +-------------------+
    1 row in set (0.00 sec)

We can see from the output that we are connected as `vagrant`, just as we had anticipated. But there is a second piece there; what about the `localhost` part of the result? MySQL has told us that our current user is actually a username and a hostname together. All MySQL users are defined as a combination of their name and where they are connecting from. In this case, we are the `vagrant` user and we are connecting from `localhost`.

## Listing Users

The MySQL server stores the information for users and privileges in a table called `user` within the `mysql` database. We will learn the specifics of databases, tables, and selecting data from them in a later lesson, but for now let's look at the key information in that table. If we ran the following command:

```sql
SELECT user, host, password FROM mysql.user;
```

We should see this as the output:

    +------------------+---------------+-------------------------------------------+
    | user             | host          | password                                  |
    +------------------+---------------+-------------------------------------------+
    | vagrant          | localhost     | *04E6E1273D1783DF7D57DC5479FE01CFFDFD0058 |
    | debian-sys-maint | localhost     | *5A1820595E9530E1259AAC41E5C86B51ED5D6815 |
    +------------------+---------------+-------------------------------------------+
    2 rows in set (0.00 sec)

This table presents us with the usernames defined in our MySQL server, what hosts they are allowed to connect from, and if there is a password defined for them. From this, we can see that there are two users defined: `vagrant` (our current user), and `debian-sys-maint` (a user for Ubuntu to perform certain tasks). Lastly we can see that the users have passwords, but they are "hashed" so that the *real* password cannot be read (for example, the `vagrant` user's actual password is also "vagrant").

## Creating a User

To create a new MySQL user we use the [command `CREATE USER`](http://dev.mysql.com/doc/refman/5.5/en/create-user.html). We must then specify a new username and hostname for that user to connect from. A username & hostname combination is defined like `'username'@'hostname'`. Notice the single quotes (`'`) around the username and hostname and the `@` between them. If we wanted to add multiple hostnames for our user to connect from (i.e. `127.0.0.1` and `192.168.77.77`) that would take separate `CREATE USER` commands. Lastly, we specify the password by adding `IDENTIFIED BY 'password'` afterwards. If you omit `IDENTIFIED BY` from the `CREATE USER` command, people will be able to connect as a user without specifying a password, which would be a serious security hazard.

So, if we wanted to create a user named `billy` who could connect from `localhost` with the password `billysSecretP@ass123` the command would be:

```sql
CREATE USER 'billy'@'localhost' IDENTIFIED BY 'billysSecretP@ass123';
```

To create a user named `sally` who can connect from `192.168.77.1` whose password is `passwordForSally321` we use the following command:

```sql
CREATE USER 'sally'@'192.168.77.1' IDENTIFIED BY 'passwordForSally321';
```

### Host Wildcards

Sometimes we want to create a user for multiple clients in different locations. To do that we can use the wildcard `%` in the host specification. For example, let's say we have an office where all the computers have IP addresses that start with `192.168.77`. If we wanted to quickly and easily create a user those computers could all share (called `office_user`) we could use `'office_user'@'192.168.77.%'`, thus allowing any client in the IP range of `192.168.77.1` to `192.168.77.255` to connect. We could go one step further and use `'office_user'@'%'`, which would allow people to connect as that user from anywhere on the internet (assuming they know the user's password).

In general though, it is a good idea to make the user specifications as restrictive as possible, in order to limit the chances of a malicious person from gaining access to our databases. For the remainder of class, you will **not** need any users that can connect from outside of `localhost`.

_**Note:** By default, the MySQL server is configured to disallow connections coming from outside of the server itself, meaning even if a user's host is set to `%`, it can still only connect from `localhost`. Modifying this configuration is outside of the scope of this class, unnecessary for our uses, and something that should only be approached with **extreme** caution._

### Privileges

Creating a user is only half of the process however. On its own, a user has no "privileges", meaning it does not have the permission to do anything within the MySQL server. To address that, we must [*grant* the user *privileges*](http://dev.mysql.com/doc/refman/5.5/en/grant.html). The simplest solution to this would be to grant *all* privileges on all databases and tables to a user. If we wanted to do this with our `billy` user from before, the syntax would be:

```sql
GRANT ALL ON *.* TO 'billy'@'localhost';
```

The first part of the command (`GRANT ALL`) specifies which permissions we want to give to a user. If we need to be more fine grained we can list individual privileges to allow the user. A common example might be creating a `read_only` user in our production database server. This would be an account other developers could use to look up and analyze data, without the risk of accidentally changing anything. To grant our `read_only` user these privileges we need to do:

```sql
GRANT SELECT ON *.* TO 'read_only'@'%';
```

A list of available privileges can be found in MySQL's [reference manual](http://dev.mysql.com/doc/refman/5.5/en/privileges-provided.html#idm139711220094800).

The second portion (`ON *.*`) is how we control what databases and tables the privileges applies to. It is in the format of `database_name.table_name`, where `*` is a wildcard for each. Our prior examples granted privileges for all databases, all tables. Instead, if wanted our user `sally` to only be able to `SELECT`, `INSERT`, `UPDATE`, and `DELETE` from a single table called `sallys_table` inside `sally_db` we would do:

```sql
GRANT SELECT, INSERT, UPDATE, DELETE ON sally_db.sallys_table TO 'sally'@'192.168.77.1';
```

On the other hand, maybe our `office_user` needs to be able to `CREATE`, `ALTER`, `INSERT`, and `DROP` all tables in the `office_db`. The grant for that would look like:

```sql
GRANT CREATE, ALTER, INSERT, DROP ON office_db.* TO 'office_user'@'192.168.77.%';
```

Lastly, what about the permission to grant privileges themselves? To accomplish this, we add `WITH GRANT OPTION` to the end of our `GRANT` command. Going back to `billy`, if we wanted him to be able to grant these privileges to other users, we would modify our previous command slightly:

```sql
GRANT ALL ON *.* TO 'billy'@'localhost' WITH GRANT OPTION;
```

Running this would not only allow `billy` full access to our entire database server, but would give him the ability to give these same privileges to any other user in the system. Obviously this is a fairly dangerous situation, so you'd better be sure `billy` has a pretty secure password!

## Dropping a User

The process of removing a user from the system is known as ["dropping" it](http://dev.mysql.com/doc/refman/5.5/en/drop-user.html). For example, to remove `sally` from our server, we would run:

```sql
DROP USER 'sally'@'192.168.77.1';
```

_**Be extremely careful with this command!** `DROP USER` will not ask for confirmation before removing a user from the server, therefore it can be especially dangerous!_

## Flushing Privileges

Information about the users and their privileges are actually stored in a handful of tables within the `mysql` database. When checking this information though&mdash;to see if a user is allowed to connect or to execute some query&mdash;the MySQL server checks its own set of information stored internally to its memory. At times, what MySQL has in memory and what is stored in the tables can get out of sync; meaning a user or privilege has been changed in MySQL's tables, but the server is unaware of it. To address this, you can run:

```sql
FLUSH PRIVILEGES;
```

This command instructs the MySQL server to reload its internal cache of users and privileges from the tables. Thankfully, the commands we have covered above will trigger the MySQL server to reload this information for us, so we should not need to run this command manually.

## Ansible

There are several steps to creating a user in MySQL. And there are many potential stumbling blocks. To make this process simpler and easier, we have provided you with an Ansible script that automatically creates a new user and grants all privileges to it with a single command.

From your Mac environment, navigate to the directory `~/vagrant-lamp` and run the following from the command line:

```bash
ansible-playbook ansible/playbooks/vagrant/mysql/admin.yml
```

This will prompt you for a username and password for a new user. Behind the scenes, Ansible will connect the MySQL server in our Vagrant box, create new user for us, and grant all privileges to it automatically. If we were to specify our new user was `my_username` and the password was `this_is_my_password`, Ansible would run the following queries for us:

```sql
CREATE USER 'my_username'@'localhost' IDENTIFIED BY 'this_is_my_password';
GRANT ALL ON *.* TO 'my_username'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
```

Thus saving us quite a bit of typing, and making the process more reliable.

## Exercises

### Exercise Goals

- Create users that can connect from various hosts with different privileges
- Log in as the users we've created to test and understand privileges
- Use ansible to create a new db admin user

--------------------------

1. From your Vagrant environment, log in to the MySQL server by running `mysql -u vagrant -p`.
1. Create a new user called `joe` that can only log in from `localhost`. Give `joe` a memorable password. Do not grant any privileges to `joe`.
    1. Use the query we gave you at the beginning of the lesson to make sure `joe` has been created and has a password.
    1. Exit `mysql` and then connect again as `joe`.
    1. Try the same `SELECT` query again and see the results.

        What results are you getting? Why?
    1. Log out from `mysql` and then reconnect again as `vagrant`
1. Create a new user called `mark` that can only log in from IPs beginning with `192.0.2`. Do not give `mark` a password or grant him any privileges.
    1. Disconnect from `mysql` and then try connecting again as `mark`.

        Did this work? Why or why not?
    1. Reconnect as `vagrant`.
1. Create a new user called `anne` that can connect from any host starting with `192.168.77` and from `localhost`. Give `anne` her own password.
    1. Grant all privileges to `anne` on `mysql.user` for each host she can connect from. Do not give her the ability to grant those privileges to others.
    1. Exit, and then connect as `anne`.

        Which host does MySQL say you are connecting from?
    1. Run the query to list all users from this lesson.

        Why does this work?
    1. Try to flush the privileges.

        Why did this not work?

    1. Exit and reconnect as `vagrant`.
1. Create a new user named `jean` that can connect from **any** host, and from `localhost` specifically. Give `jean` a sensible password.
    1. Give `jean` read-only permissions to the entire database server.
    1. Disconnect and then log in as `jean`. Once again, determine which host the MySQL server says you are connecting from.

        What does this tell you about these hosts and wildcards?
    1. Refer back to the [previous exercise](README.md#exercises), try those same select queries.
    1. Copy and paste the following query.
        ```sql
        INSERT INTO mysql.user (Host, User) VALUES ('localhost', 'randal');
        ```
        What is the result? Why?
    1. Exit and reconnect as `vagrant`.
1. Drop all our previous users:
    - `joe`
    - `mark`
    - `anne`
    - `jean`

    Remember that to drop a user you must specify the combination of username and host, and do that for each host a user is allowed to connect from.
1. Use the Ansible scripts from your Mac to create a new user called `codeup` and give it password. **Do not forget this password!** We will be using the `codeup` user for the rest of our lessons.
