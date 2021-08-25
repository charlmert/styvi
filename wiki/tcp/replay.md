Reading the tcpdump file

```bash
sudo tcpdump -qns 0 -A -r accounting.pcap
```

Rewrite the pcap file to point to local ip addresses
```bash
tcprewrite --pnat=127.0.0.1/32:172.17.0.3/32 --infile=accounting.pcap --outfile=accounting_test_local.pcap --skipbroadcast
```

Replay the packets
```bash
tcpreplay -i enp0s31f6 -tK --loop 50 --unique-ip accounting_test_local.pcap
```
