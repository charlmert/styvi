# Compile ltrace

apt-get install libelf-dev

libelf
```sh
git clone https://github.com/WolfgangSt/libelf.git
export PATH=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin:$PATH

./configure --host=armv7l-eabi-linux CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-gcc CXX=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-cpp LD=CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-ld AS=CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-as CROSS=arm-uclibc-linux-2.6.36- PREFIX=/opt/ltrace --disable-werror

make CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-gcc CXX=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-cpp LD=CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-ld AS=CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-as CROSS=arm-uclibc-linux-2.6.36- PREFIX=/opt/ltrace

make CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-gcc CXX=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-cpp LD=CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-ld AS=CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-as CROSS=arm-uclibc-linux-2.6.36- PREFIX=/opt/ltrace install
```

ltrace
```sh
git clone https://github.com/ice799/ltrace.git
cd ltrace
autoreconf

./configure CPPFLAGS="-static -I/usr/local/include" CFLAGS="-static -I/usr/local/include" LDFLAGS="-L/usr/local/lib" --host=armv7l-eabi-linux CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-gcc CXX=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-cpp LD=CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-ld AS=CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-as CROSS=arm-uclibc-linux-2.6.36- PREFIX=/opt/ltrace --enable-static --disable-werror

make CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-gcc CXX=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-cpp CROSS=arm-uclibc-linux-2.6.36- PREFIX=/opt/ltrace CFLAGS='-O3 -fno-strict-aliasing -D__arm__=1'

make CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-gcc CXX=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-cpp CROSS=arm-uclibc-linux-2.6.36- PREFIX=/opt/ltrace CFLAGS='-O3 -fno-strict-aliasing -D__arm__=1' install
```
