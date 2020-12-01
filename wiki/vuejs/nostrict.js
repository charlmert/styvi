var loaderUtils = require("loader-utils");
const Service = require('@vue/cli-service/lib/Service')
const service = new Service(process.env.VUE_CLI_CONTEXT || process.cwd())

service.init('development')
let webpack = service.resolveWebpackConfig()
console.log('webpack')
console.log(webpack)

options = loaderUtils.getOptions(webpack)
