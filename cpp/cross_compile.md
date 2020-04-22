Build toolchain for armv7l-eabi (huawei Linux EchoLife_WAP 2.6.34.10_sd5115v100_wr4.3 #1 SMP Thu May 21 16:33:01 CST 2015 armv7l GNU/Linux)

https://github.com/kvic-z/brcm-arm-toolchains
clone into /opt/brcm-arm-toolchains
binary files were already there

./brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-gcc main.c -ldl -o main

make
```sh
export PATH=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin:$PATH
./configure --host=armv7l-eabi CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-gcc
make CROSS=arm-uclibc-linux-2.6.36- PREFIX=/opt/ltrace

```

Configuring curl for e.g. (./configure has an option to cross-compile arch = arm7l-eabi)
./configure --host=armv7l-eabi CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-gcc

Configure and make / install as statically linked
LDFLAGS="-static" PKG_CONFIG="pkg-config --static" ./configure --host=armv7l-eabi CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-gcc --enable-static --disable-shared
make curl_LDFLAGS=-all-static
make install curl_LDFLAGS=-all-static

CMAKE use arm toolchain compiler
cmake -DCMAKE_OSX_ARCHITECTURES=armv7l-eabi -DCMAKE_SYSTEM_PROCESSOR=arm -DCMAKE_CC_COMPILER=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-gcc -DCMAKE_C_LINK_EXECUTABLE=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-ld -DCMAKE_CXX_LINK_EXECUTABLE=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-ldd
CMAKE_{C,CXX}_LINK_EXECUTABLE
