#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include <unistd.h>

#define FLAG "CTF-FAKE{beat_the_game_to_get_the_real_flag!}\0"
#define BUF_SIZE 256
#define TOTAL_ROUNDS 100

int main() {
  ignore_me_init_buffering();
	ignore_me_init_signal();
  char user_buf[BUF_SIZE];
  int num, guess;
  int fails = 0;
  int wins = 0;
  int round_no = 0;
  srand(time(NULL));
  printf("+------------------------------------+\n");
  printf("|    Welcome to My Guessing Game!    |\n");
  printf("+------------------------------------+\n\n");
  printf("+------------------------------------+\n");
  printf("|   You have 100 rounds to guess my  |\n");
  printf("|              integer!              |\n");
  printf("|                                    |\n");
  printf("|  You win if you guess correctly 99 |\n");
  printf("|               times!               |\n");
  printf("+------------------------------------+\n\n");
  printf("+------------------------------------+\n");
  printf("|            Let's Begin!            |\n");
  printf("+------------------------------------+\n\n");

  while (round_no < TOTAL_ROUNDS) {
    num = rand();
    printf("I am thinking of a random integer, which number do you think it is?\n");
    printf("Number: ");
    if (fgets(user_buf, BUF_SIZE, stdin) != NULL) {
      printf("\n");
      char *ptr;
      guess = strtol(user_buf, &ptr, 10);
      if (guess == num) {
        printf("Congratulations! You Guessed Correctly!\n");
        wins++;
      } else {
        printf("Wrong! It was %d!\n", num);
        fails++;
      }
      if (fails >= 2) {
        printf("You have lost the game! Try again another time!\n");
        return 0;
      }
      round_no++;
      printf("Rounds: %d, Wins: %d, Fails: %d\n\n", round_no, wins, fails);
    }
    sleep(0.1);
  }

  printf("+------------------------------------+\n");
  printf("|            YOU HAVE WON!           |\n");
  printf("+------------------------------------+\n\n");

  printf("Flag: %s\n", FLAG);
}
