#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <signal.h>
#include <string.h>

void ignore_me_init_buffering() {
	setvbuf(stdout, NULL, _IONBF, 0);
	setvbuf(stdin, NULL, _IONBF, 0);
	setvbuf(stderr, NULL, _IONBF, 0);
}

void kill_on_timeout(int sig) {
  if (sig == SIGALRM) {
  	printf("\n[!] Taking too long! You have been disconnected!\n");
    _exit(0);
  }
}

void ignore_me_init_signal() {
	signal(SIGALRM, kill_on_timeout);
	alarm(60);
}

int exploitme() {
  /*
  You want to execute this command by doing a buffer overflow attack!
  */
  printf("\nOH NO! YOU AREN'T SUPPOSED TO BE HERE!\n");
  system("cat /bofflag");
}

int report() {
  printf("\nPlease provide us your name so we can report you to the police for trying login to this server.\n");
  char buffer[100];
  printf("Name: ");
  scanf("%s", buffer);
  printf("\nThank you %s!\nThe police should arrest you in the next few months!\n", buffer);
}

int main() {
  ignore_me_init_buffering();
	ignore_me_init_signal();

  int l;
  char *realpass = "supersecurepassword1234\n";
  char pass[100];
  printf("Password: ");
  if (fgets(pass, 100, stdin) != NULL) {
    printf("\nPassword has been submitted! Checking now!\n");
    if (strcmp(pass, realpass) == 0) {
      printf("\nSuccessful Login!\nHowever we are still developing this application so I am going to stop now!\n");
      system("cat /revflag");
    } else {
      printf("\nWrong password!\n");
      report();
    }
  }
}
