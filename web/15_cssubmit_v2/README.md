# Challenge

**Name:** CSSubmit v2.0

**Category:** Web

**Difficulty:** Medium

**Description:**

The UWA Computer Science Department has got a team of CITS3200 students to build the new CSSubmit v2.0 website to replace the old CSSubmit website. In their final sprint 3 documentation, they noted that they were unable to implement the **file type check for submitting assignments**. However, they assumed that it was an unnecessary requirement.

**Can you execute terminal commands on the server and read the flag at `/flag`?**

**Flag:** CTF{cH3cK_Y0uR_f1L3_tYp3s_0r_g1t_w33b_sH3lL51!!!!1!}

## Solution

* The first thing you need to do remove the disabled attribute on the registration page to create an account and login (same as I Want To Join).

* Once logged in, you can upload PHP files that execute when you visit them.
  * My personal favourite is this webshell: https://github.com/WhiteWinterWolf/wwwolf-php-webshell

* Once you have a PHP webshell uploaded you can easily read the file `/flag`.
