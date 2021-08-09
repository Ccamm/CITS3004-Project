# No SQL Injection

**Description:**

Oh dear you weren't supposed to pass the authentication page. At least **my password** is secure on the **NoSQLDB** and you cannot get that! Even though I forgot to hash it...

**Can you exfiltrate the password for the admin account?**

The flag is the password, only has **lower and upper case letters** and will start with `CTF`.

**Student Files:**
  - [students_no_sql_injection.zip](provided_files/students_no_sql_injection.zip)

**Flag:** CTFnosqlregexking

## Solution

* NoSQLi also enables exfiltrating data character by character using regex.

* https://github.com/swisskyrepo/PayloadsAllTheThings/tree/master/NoSQL%20Injection

* You use the regex pattern "^" to match to the start of the password and test characters by appending to the end of the known password until you get a successful login.

* Once you get a successful login you know the next character in the password.

* See the solution script in `solution/exploit.py`.
