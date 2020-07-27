# First Option

1. Download vagrant_rancheros_guest_plugin.rb and
2. Add this to the top of your Vagrantfile
require_relative 'rancheros_plugin.rb'

# Second Option

```sh
vagrant plugin install vagrant-rancher
```

Edit Vagrantfile
```sh
config.vm.guest = :linux
```
