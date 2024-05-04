Fix Postman Flatpak not opening after login

# [Fix Postman Flatpak not opening after login](#) &mdash; 04 May, 2024

While setting up my new personal laptop with Fedora 40 I noticed that the Postman's flatpak version refused to start 
after I logged in, after running it from the command line with `flatpak run com.getpostman.Postman`  I noticed the following error:

```
Main~handleUncaughtError - Uncaught errors [Error: ENOENT: no such file or directory, open '/home/user/.var/app/com.getpostman.Postman/config/Postman/proxy/postman-proxy-ca.crt'] {
  errno: -2,
  code: 'ENOENT',
  syscall: 'open',
  path: '/home/user/.var/app/com.getpostman.Postman/config/Postman/proxy/postman-proxy-ca.crt'
}

```

<br>

After searching through the comments on Gnome Software I found a comment from Alexandre Debusschere that solved the issue:
 - Go to `~/.var/app/com.getpostman.Postman/config/Postman/proxy`
 - Run the following command to generate a valid certificate:

   `
openssl req -subj '/C=US/CN=Postman Proxy' -new -newkey rsa:2048 -sha256 -days 365 -nodes -x509 -keyout postman-proxy-ca.key -out postman-proxy-ca.crt
   `

The application should work just fine now!
