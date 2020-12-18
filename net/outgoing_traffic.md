root@murdis:/home/charl# tcpdump src 192.168.88.10
tcpdump: verbose output suppressed, use -v or -vv for full protocol decode
listening on enp2s0, link-type EN10MB (Ethernet), capture size 262144 bytes
12:52:42.043038 IP murdis.36926 > li572-129.members.linode.com.https: Flags [F.], seq 2497234582, ack 1192579250, win 501, options [nop,nop,TS val 3826599390 ecr 3648639491], length 0
12:52:42.043792 IP murdis.59943 > dns.google.domain: 55533+ PTR? 129.88.155.192.in-addr.arpa. (45)
12:52:42.239220 IP murdis.39107 > dns.google.domain: 34839+ PTR? 10.88.168.192.in-addr.arpa. (44)
12:52:42.260879 IP murdis.50847 > dns.google.domain: 61660+ PTR? 8.8.8.8.in-addr.arpa. (38)
12:52:46.139065 IP murdis.40946 > a104-92-151-165.deploy.static.akamaitechnologies.com.https: Flags [F.], seq 2549413895, ack 1081797280, win 501, options [nop,nop,TS val 3264724674 ecr 3040360651], length 0
12:52:46.139270 IP murdis.36446 > dns.google.domain: 43062+ PTR? 165.151.92.104.in-addr.arpa. (45)
12:52:53.051041 IP murdis.36926 > li572-129.members.linode.com.https: Flags [F.], seq 0, ack 1, win 501, options [nop,nop,TS val 3826610398 ecr 3648639491], length 0
12:53:01.243044 IP murdis.40946 > a104-92-151-165.deploy.static.akamaitechnologies.com.https: Flags [F.], seq 0, ack 1, win 501, options [nop,nop,TS val 3264739778 ecr 3040360651], length 0
12:53:06.363013 ARP, Request who-has _gateway tell murdis, length 28
12:53:06.363215 IP murdis.42097 > dns.google.domain: 14431+ PTR? 1.88.168.192.in-addr.arpa. (43)
12:53:11.538883 ARP, Reply murdis is-at a4:1f:72:5e:4d:4b (oui Unknown), length 28
12:53:15.067045 IP murdis.36926 > li572-129.members.linode.com.https: Flags [F.], seq 0, ack 1, win 501, options [nop,nop,TS val 3826632414 ecr 3648639491], length 0
12:53:31.451045 IP murdis.40946 > a104-92-151-165.deploy.static.akamaitechnologies.com.https: Flags [F.], seq 0, ack 1, win 501, options [nop,nop,TS val 3264769986 ecr 3040360651], length 0
12:53:33.394855 IP murdis.58226 > dns.google.domain: 59611+ A? li572-129.members.linode.com. (46)
12:53:33.394876 IP murdis.58226 > dns.google.domain: 63724+ AAAA? li572-129.members.linode.com. (46)
12:53:36.571015 ARP, Request who-has _gateway tell murdis, length 28
12:53:54.880575 IP murdis.46943 > dns.google.domain: 34832+ A? a104-92-151-165.deploy.static.akamaitechnologies.com. (70)
12:53:54.880595 IP murdis.46943 > dns.google.domain: 34851+ AAAA? a104-92-151-165.deploy.static.akamaitechnologies.com. (70)
12:54:00.079222 ARP, Reply murdis is-at a4:1f:72:5e:4d:4b (oui Unknown), length 28
12:54:00.123049 IP murdis.36926 > li572-129.members.linode.com.https: Flags [F.], seq 0, ack 1, win 501, options [nop,nop,TS val 3826677470 ecr 3648639491], length 0
12:54:05.243020 ARP, Request who-has _gateway tell murdis, length 28

