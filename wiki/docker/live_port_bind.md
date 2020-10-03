https://stackoverflow.com/questions/19897743/exposing-a-port-on-a-live-docker-container

Get the ip address of the container

```sh
docker inspect xid | grep IPAddress
```

Should get output

```sh
"SecondaryIPAddresses": null,
"IPAddress": "172.17.0.8",
		"IPAddress": "172.17.0.8",
```

Run the following iptables command

```sh
iptables -t nat -A  DOCKER -p tcp --dport 1812 -j DNAT --to-destination 172.17.0.8:1812
iptables -t nat -A  DOCKER -p tcp --dport 1813 -j DNAT --to-destination 172.17.0.8:1813
```
