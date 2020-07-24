## Install and Start

```sh
sudo apt-get install supervisor
service supervisor start
service supervisor status
```



## Reload supervisord config

```sh
supervisorctl reread
supervisorctl update
```
