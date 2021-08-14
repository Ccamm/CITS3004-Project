#include <stdio.h>
#include <stdlib.h>

int executeme() {
  /*
  You want to execute this command by doing a buffer overflow attack!
  */
  system("echo 'SUCCESSFUL BOF ATTACK! YAY :D'");
}

int main() {
  char buffer[80];
  printf("Name: ");
  scanf("%s", buffer);
  printf("\nThanks for connecting %s!\nI go to go now, bye!\n", buffer);
}
