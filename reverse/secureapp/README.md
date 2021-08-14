# SecureApp

**Description:**

The developers of SecureApp believe that their new C application that have been working on is really secure.

**Can you login into SecureApp successfully?**

**Flag:** CTF{sTr1nGs_4_tH3_w1n!1!1}

## Solution

* Using `strings` on the executable, you can see that there is a string `"supersecurepassword1234"`

```
strings secureApp

...

Thank you %s!
The police should arrest you in the next few months!
supersecurepassword1234
Password:
Password has been submitted! Checking now!
Successful Login!
However we are still developing this application so I am going to stop now!
cat /revflag

...
```

* This is the password that allows logging into the application and getting the flag.
