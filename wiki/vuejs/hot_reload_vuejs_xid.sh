#!/bin/bash

ps ax | grep 'skip-plugins=qweasdzxc' | awk '{print $1}' | xargs -I{} kill {}
cd /Users/charl/projects/xid/frontend
node ./node_modules/@vue/cli-service/bin/vue-cli-service.js serve --host=127.0.0.1 --port=8082 --skip-plugins=qweasdzxc
