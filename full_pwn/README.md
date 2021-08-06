# CSSubmit v2.0 Solution

## Task 1: Initial Foothold

* The registration page only has the submit button disabled on the html document. You can easily removed the disabled attribute and create an account.

* Once logged in, there are buttons to submit files as assignment submission.
  - It's vulnerable to arbitrary file upload and you can upload PHP files to execute commands and code as www-data.
  - A really useful PHP file to upload is a webshell such as this one https://github.com/WhiteWinterWolf/wwwolf-php-webshell

* Once on you can see that there is a user called `development` on the box and they have reused the MySQL password `supersecurelongpasswordnoonewillgetlol`.
  - This password can be retrieved from `/var/www/html/db.php`

## Task 2: User Escalation

* Once logged in as the development user, you can see that they have access to the private SSH key to the `cyborgchris` account.
  - Use the private SSH key to log in as `cyborgchris`.

## Task 3: Root Escalation

* It is hinted that the development team are planning to use `cyborgchris` to run docker containers to execute test student's code projects in a secure environment.

* `cyborgchris` is a member of the `docker` group so they can run docker commands without `sudo`.

* Can use one of the docker privilege escalation tricks from here https://gtfobins.github.io/gtfobins/docker/
  - eg. `docker run -v /:/mnt --rm -it alpine chroot /mnt sh` will execute a shell as root
