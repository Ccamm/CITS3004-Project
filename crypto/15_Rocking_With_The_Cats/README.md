# Rocking With The Cats

**Description:**Man some of these cats go absolutely wild! Last Saturday, I went to a house party where I saw some feral feline screaming out their password hash to the tune of *We Will Rock You* by Queen. I tried telling them that it is a pretty dumb idea to leak their hashed password to everyone, but they insisted it was fine since their password was *32 characters long* and it cannot be brute forced.

Can you teach this feline fleabag a lesson and crack their password?

**Provided Files:** [cat.hash](provided_files/cat.hash)

**Flag:** qwertyuiopasdfghjklqwertyuiopasd

## Solution

* Grab the Rock You password word list and filter for only passswords that are 32 characters long.

```bash
awk 'length($0) == 32' /usr/share/wordlists/rockyou.txt > rockyou32.txt
```

* Crack using Hashcat or John the Ripper (doesn't really matter which one)

```bash
john -w=rockyou32.txt cat.hash
```

```bash
hashcat -a 0 -m 3200 cat.hash rockyou32.txt
```
