# Compile ltrace

git clone https://github.com/WolfgangSt/libelf.git
export PATH=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin:$PATH
./configure --host=armv7l-eabi-linux CROSS=arm-uclibc-linux-2.6.36- PREFIX=/opt/ltrace
make CROSS=arm-uclibc-linux-2.6.36- PREFIX=/opt/ltrace

git clone https://github.com/ice799/ltrace.git
cd ltrace
./configure --host=armv7l-eabi-linux CROSS=arm-uclibc-linux-2.6.36- PREFIX=/opt/ltrace --enable-static --disable-shared
make CROSS=arm-uclibc-linux-2.6.36- PREFIX=/opt/ltrace
