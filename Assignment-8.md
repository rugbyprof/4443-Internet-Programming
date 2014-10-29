## Not Done!

http://krisjordan.com/essays/setting-up-push-to-deploy-with-git

### Github

- Log in to your server
- If you haven't done so, install `git`

```bash
$ sudo apt-get install git
```

- Change into your `/var/www/html/4443` directory.
- From the `4443` directory run `git init`. 
- It should say:

> Initialized empty Git repository in /var/www/html/4443/.git/

### Pushing it to GitHub


#### Step 1 - Checking out your status with Github

- First, try this command: `ssh -T git@github.com`
- If you get the following:

```
The authenticity of host 'github.com (111.222.333.444)' can't be established.
RSA key fingerprint is 16:27:ac:a5:76:28:2d:36:63:1b:56:4d:eb:df:a6:48.
Are you sure you want to continue connecting (yes/no)? 
```
You for sure have never logged in from your server to github (well almost, but not to be explained here). So type `yes` and hit enter.

If you get something like the following, then github knows you exist, and knows about your server. And you can skip to step ??

```
Warning: Permanently added 'github.com,111.222.333.444' (RSA) to the list of known hosts.
Hi rugbyprof! You've successfully authenticated, but GitHub does not provide shell access.
```

However, if you get something similar to (notice the last line) go to step 2.
```
The authenticity of host 'github.com (111.222.333.444)' can't be established.
RSA key fingerprint is 16:27:ac:a5:76:28:2d:36:63:1b:56:4d:eb:df:a6:48.
Are you sure you want to continue connecting (yes/no)? yes
Warning: Permanently added 'github.com,111.222.333.444' (RSA) to the list of known hosts.
Permission denied (publickey).
```

#### Step 2 - Check for SSH Keys

Run the following:

```bash
$ ls -lah ~/.ssh
```

Here is the output of my .ssh directory:
```bash
drwx------ 2 griffin griffin 4.0K Sep 23 16:46 .
drwxr-xr-x 7 griffin griffin 4.0K Oct  9 19:19 ..
-rw-r--r-- 1 griffin griffin 1.3K Oct 13 21:46 known_hosts
griffin@111.222.333.444:~$ 
```
Notice there is a "known_hosts" file, lets see whats in it:

```
|1|sdHcIIltXyyZOPQJqnzQQu/sVPI=|jIvkRcYIavN+hMHYcCnqhuCp9wk= ecdsa-sha2-nistp256 AAAAE2VjZHNhLXNoYTItbmlzdHAyNTY....
|1|zgEP/ZvUyyBuFjuqKTP+qqVJCm8=|JG8sKjEOHp4S+xHo57Uyco3W9QE= ssh-rsa AAAAB3NzaC1yc2EAAAABIwAAAQEAq2A7...
```

This shows me I have a couple of different hosts that are "known", but who are they? We don't really know because the host names have been `hashed` for security.

Lets add a host and see what changes:

griffin@111.222.333.444:~$ ssh griffin@systempause.net
The authenticity of host 'systempause.net (198.199.107.73)' can't be established.
ECDSA key fingerprint is ac:b0:cb:7b:83:a1:db:85:3a:65:c0:16:5f:63:be:f2.
Are you sure you want to continue connecting (yes/no)? (yes entered)

Warning: Permanently added 'systempause.net,198.199.107.73' (ECDSA) to the list of known hosts.
griffin@systempause.net's password: (password entered)

```
|1|sdHcIIltXyyZOPQJqnzQQu/sVPI=|jIvkRcYIavN+hMHYcCnqhuCp9wk= ecdsa-sha2-nistp256 AAAAE2VjZHNhLXNoYTItbmlzdHAyNTY....
|1|zgEP/ZvUyyBuFjuqKTP+qqVJCm8=|JG8sKjEOHp4S+xHo57Uyco3W9QE= ssh-rsa AAAAB3NzaC1yc2EAAAABIwAAAQEAq2A7...
|1|zmL9c0sc2H+KvCJAxATA5FH/dIw=|zbzlp01C2aUgL72ErSiOHlqlERM= ecdsa-sha2-nistp256AAAAE2VjZHNhLXNoYTItbmlzdHAyNTYAAAAIbmlzdHAyNTYAAABBBKh8w/P8a9sbkdRDPXNKm17iHFn9IMMQEX...
```
To find the host (you need the hostname or ip address) run the following:

```
griffin@111.222.333.444:~$ ssh-keygen -H -F systempause.net
# Host systempause.net found: line 3 type ECDSA
|1|NKnDTdq7Hxdbx7jSoyrHWo7uGoU=|jO2Djm2vHR3dXX7YHW1uaCyIOa8= ecdsa-sha2-nistp256AAAAE2VjZHNhLXNoYTItbmlzdHAyNTYAAAAIbmlzdHAyNTYAAABBBKh8w/P8a9sbkdRDPXNKm17iHFn9IMMQEX...
```
