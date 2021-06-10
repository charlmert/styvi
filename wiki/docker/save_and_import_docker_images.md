# Save/Backup and Restore/Import docker containers

Backup docker container
```sh
docker save -o /tmp/backup.tar repository/image:label
```

Restore docker container
```sh
cat /home/charl/backup/docker/php.tar | docker import - charlmert/php:1
```
