# Web Ninja

**Description:** Do you want to become the ultimate master at building websites? Join the **Web Ninja Course** today and learn how to design websites using modern frameworks such as *Flask*.

The flag is located at `/flag` on the server.

**Provided Files:** [students_web_ninja.zip](provided_files/students_web_ninja.zip)

**Flag:** CTF{tH3s3_n1Nj4s_aR3_h3cK1nG_mY_jInjA_t3MpLatEs!!11one!}

## Solution

* The website is vulnerable to Server-Side Template Injection (SSTI).
  - SSTI occurs if templates for HTML are rendered on the server side with **unsanitised** user input.

* For this challenge the line `render_template_string(SIGNUP_TEMPLATE.format(email=email))` formats the template using the user supplied 'email address' **before the template is rendered**. This allows running code within the Jinja engine.

* Example using the imported `request` module from `Flask`.

```python
{{request.application.__globals__.__builtins__.__import__('os').popen('cat /flag').read()}}
```

* The client side email check can be easily bypassed by using a proxy like Burp Suite or just using `curl` to send the payload.

* More info
  - https://www.onsecurity.io/blog/server-side-template-injection-with-jinja2/
  - https://medium.com/@nyomanpradipta120/ssti-in-flask-jinja2-20b068fdaeee
  - https://book.hacktricks.xyz/pentesting-web/ssti-server-side-template-injection
