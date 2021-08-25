#include <stdio.h>
#include <stdlib.h>
#include <time.h>

#define MAX_TIME_DIFF 10000

int find_seed(int init_seed, int target_num) {
  for(int s = init_seed; s > init_seed - MAX_TIME_DIFF; s--) {
    srand(s);
    if (rand() == target_num) {
      return s;
    }
  }
  return -1;
}

int main(int argc, char **argv) {
  // + 1000 as a buffer for time differences between container and running this command
  int init_seed = time(NULL) + 1000;
  int target_num = atoi(argv[1]);

  int seed = find_seed(init_seed, target_num);
  if (seed == -1) {
    printf("No seed found!\n");
  }

  srand(seed);
  // Need to skip the first generated number
  rand();

  for (int i = 0; i < 99; i++) {
    printf("%d\n", rand());
  }
}
