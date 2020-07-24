#!/bin/bash

ps ax | grep 'skip-plugins=qweasdzxc' | awk '{print $1}' | xargs -I{} kill {}
cd /Users/charl/projects/network.routenetworks.africa/frontend
node ./node_modules/@vue/cli-service/bin/vue-cli-service.js serve --host=127.0.0.1 --port=8080 --skip-plugins=qweasdzxc
