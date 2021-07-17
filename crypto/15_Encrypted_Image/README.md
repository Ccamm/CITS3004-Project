# Encrypted Image

**Description:**

On a late afternoon working hard as a NSA agent, you see an encrypted image sent between two suspected Kinder Surprise smugglers into the US. After your inspect the communications further, you discover that the sender used AES encryption using the ECB mode to encrypt the image, the original image was a PPM file and had a width and height of 1920 by 1080 pixels respectively. However, you were unable to figure out what was the key used to encrypt the image. Can you still see the hidden message within the image?

**Provided Files:** [encrypted_body.bin](provided_files/encrypted_body.bin)

**Flag:** CTF{ECB IS REALLY BAD TO ENCRYPT IMAGES}

## Solution

* It is **insecure** to encrypt data with ECB mode, **especially** if data is repeated like in images. This is because blocks of data will encrypt to the same values.

* The trick is to view the image as a PPM image (hinted from the challenge description). You will need to remake the header section of the PPM image and the combine the two together.

header.txt
```
P6
1920 1080
# Used to view the encrypted image
255
```

```bash
cat header.txt encrypted_body.bin > encrypted_image.ppm
```

* You can then see the flag in encrypted_image.ppm
