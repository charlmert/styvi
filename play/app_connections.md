# List Application Connections

List all applications connections.
Looking for udp connections to port 80

```sh
ps aux | awk '{print $2}' | xargs -I{} bin/lsac {}
```
