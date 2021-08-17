# Challenge

**Name:** Crack XOR Fail

**Category:** Cryptography

**Difficulty:** Hard

**Description:**

Can you recover the original plaintext that was encrypted using XOR with a key that is **8 bytes long**? The ciphertext is encoded as hex values and the plaintext is in the format of **CITS3004{ ... }**.

```
303c2436415b554d081641153a58172d400d243a022751481d21431d2634510d0741332e2d5a0b3a4318390b354a444852540d
```

```
If P XOR K = C then C XOR P = K
```

**Challenge Files:** hex_cipher.txt

**Flag:** CITS3004{c1pH3rT3xT_pL41nT3xT_4tt4CK_1nC0mInG!!1!!}

## Solution

* Since we know the first 8 bytes of the message are `CITS3004`, we can recover the XOR key by XORing the known plaintext `CITS3004` with the first 8 bytes of the encrypted message.

  * Recovers the hex values of the XOR key: https://gchq.github.io/CyberChef/#recipe=From_Hex('Auto')XOR(%7B'option':'UTF8','string':'CITS3004'%7D,'Standard',false)&input=MzAzYzI0MzY0MTViNTU0ZA

  * Find the key is `superkey`

  * Recovers the flag using the XOR key `superkey`: https://gchq.github.io/CyberChef/#recipe=From_Hex('Auto')XOR(%7B'option':'UTF8','string':'superkey'%7D,'Standard',false)&input=MzAzYzI0MzY0MTViNTU0ZDA4MTY0MTE1M2E1ODE3MmQ0MDBkMjQzYTAyMjc1MTQ4MWQyMTQzMWQyNjM0NTEwZDA3NDEzMzJlMmQ1YTBiM2E0MzE4MzkwYjM1NGE0NDQ4NTI1NDBk
