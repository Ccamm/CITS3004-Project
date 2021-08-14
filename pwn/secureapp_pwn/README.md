# SecureApp Pwn

**Description:**

The developers of SecureApp aren't too secure with the C programs. I was able to cause a **segmentation fault** error somehow and analysing the functions shows there is a very interesting one called **`exploitme`**.

**Can you exploit the buffer overflow vulnerability and execute the `exploitme` function?**

If you are stuck doing this challenge, follow the buffer overflow demo that is provided. Once you have a working exploit you can use the Python `telnetlib` module to send your payloads to the server. Alternatively you can install `pwnlib`, which is a binary exploitation development framework.

* **Telnetlib Documentation:** https://docs.python.org/3/library/telnetlib.html
* **Pwnlib Documentation:** https://docs.pwntools.com/en/stable/

**Flag:** CTF{pwN3D_uR_w3aK_C_aPpLiC4sHon!11!}

## Solution

* First you need to input in an incorrect password to get to the input for your name. This input is vulnerable to a buffer overflow attack (can tell by fuzzing).

* Using the pattern method talked about in the demo, you can find that the offset to overwrite the stack point is 120 bytes.

* Using `objdump`, the address for the `exploitme` function is `0x000000000040126f`.

* Write a python program to send the payloads and get the flag (see the solution script).
