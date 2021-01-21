If you get this error when serving or building

```sh
Cannot find module '/home/charl/projects/routenetworks.africa/isp_theme/node_modules/@babel/compat-data/data/corejs3-shipped-proposals'
Error: Cannot find module '/home/charl/projects/routenetworks.africa/isp_theme/node_modules/@babel/compat-data/data/corejs3-shipped-proposals'
    at createEsmNotFoundErr (node:internal/modules/cjs/loader:952:15)
    at finalizeEsmResolution (node:internal/modules/cjs/loader:945:15)
    at resolveExports (node:internal/modules/cjs/loader:473:14)
    at Function.Module._findPath (node:internal/modules/cjs/loader:513:31)
    at Function.Module._resolveFilename (node:internal/modules/cjs/loader:911:27)
    at Function.Module._load (node:internal/modules/cjs/loader:769:27)
    at Module.require (node:internal/modules/cjs/loader:997:19)
    at require (node:internal/modules/cjs/helpers:92:18)
    at Object.<anonymous> (/home/charl/projects/routenetworks.africa/isp_theme/node_modules/@babel/preset-env/lib/polyfills/corejs3/usage-plugin.js:10:55)
    at Module._compile (node:internal/modules/cjs/loader:1108:14)
npm ERR! code 1
npm ERR! path /home/charl/projects/routenetworks.africa/isp_theme
npm ERR! command failed
npm ERR! command sh -c vue-cli-service serve

npm ERR! A complete log of this run can be found in:
npm ERR!     /home/charl/.npm/_logs/2021-01-21T06_30_09_642Z-debug.log
```

Just run

```sh
npm update --depth 5 @babel/preset-env
```
