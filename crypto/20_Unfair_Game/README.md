# Unfair Game

**Description:** BEHOLD THE GAME THAT WILL BE KING OF THE ESPORT INDUSTRY! GUESS MY NUMBER! It has everything that all other games lack to some degree; action, suspense, betrayal, battle royal, someone screaming into their microphone and overpriced loot boxes!

Some critics question if our game can be beaten, but we know it is impossible since we use a *pseudo random number generator* that has been used for decades! You can try beating this game, but we bet you won't be able to!

**Flag:** CTF{0i_y0v_w3rE_cHe4t!nG!_y0u_w3rEnT_sUpPo5eD_2_gVeS5_mY_nUmBeRs!1!!}

**Provided Files:** [guess_my_number.c](provided_files/guess_my_number.c)

## Solution

* Libc rand is not cryptographically secure.

* Plus `srand(time(NULL))` seeds to the nearest second, this can be easily bruteforced by getting the first random number that is generated and then looping until the right seed is found.

* Solution code can be found in [solution](solution/), make sure to compile the seed cracker using the following command and have `pwnlib` installed.

```bash
gcc -o cracker seed_cracker.c
```

Exploit
```bash
python3 exploit.py
```
