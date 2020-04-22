# Compile easycwmp for armv7l-eabi huawei hg8346m

wget json-c
wget uci
wget ubus

```sh
mkdir /opt/easycwmp_build
export PATH=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin:$PATH
LD_LIBRARY_PATH=/opt/genieacs/lib32:$LD_LIBRARY_PATH
../configure --prefix=/opt/easycwmp_build --host=x86_64 --target=armv7l-eabi CROSS=arm-linux-2.6.36-uclibc-4.5.3 CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-gcc CFLAGS='-I/opt/json-c -I/opt/ubus/ -I/usr/include'
```

ubus
```sh
cmake -DCMAKE_OSX_ARCHITECTURES=armv7l-eabi -DCMAKE_SYSTEM_PROCESSOR=arm -DCMAKE_C_COMPILER=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-gcc -DCMAKE_C_LINK_EXECUTABLE=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-ld -DCMAKE_CXX_LINK_EXECUTABLE=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-ldd -DBUILD_LUA=OFF -DCMAKE_C_FLAGS='-I/opt/'
```

libubox
```sh
cmake -DCMAKE_OSX_ARCHITECTURES=armv7l-eabi -DCMAKE_SYSTEM_PROCESSOR=arm -DCMAKE_C_COMPILER=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-gcc -DCMAKE_C_LINK_EXECUTABLE=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-ld -DCMAKE_CXX_LINK_EXECUTABLE=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-ldd -DBUILD_LUA=OFF -DCMAKE_C_FLAGS='-I/opt/json-c -I/opt/ubus/ -I/usr/include -I/opt/ -Wno-error'
```
