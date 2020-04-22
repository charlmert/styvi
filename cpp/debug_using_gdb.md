## Compile gdb for armv7l eabi

wget "http://ftp.gnu.org/gnu/gdb/gdb-9.1.tar.gz"

mkdir build
cd build
ln -sf /opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-ar /usr/local/bin/armv7l-eabi-ar
/opt/gdb-9.1/configure --host=armv7l-eabi CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-gcc --disable-nls
make
make install

## Using jTag serial device

Need to get hold of a jtag made for arm chipsets to be able to connect it to the huawei hg8346m board.
https://pclinkshop.com/products/arm-usb-tiny-h-arm-jtag?variant=14712895504428&sfdr_ptcid=19517_617_489915881&sfdr_hash=4643b78def90d2452be4f37356b2aa59&gclid=CjwKCAjwhOD0BRAQEiwAK7JHmFLDoOLG8qZ2slpVZZRztD_48d9yYSSus7rLAE-ZByfr1WjpP3WznxoCELYQAvD_BwE

https://jacobmossberg.se/posts/2017/01/17/use-gdb-on-arm-assembly-program.html

./brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-gcc main.c -ldl -ggdb -o main

Use openocd to debug on chip remotely
apt-get install openocd

Get board configs (Ours is for huawei HG8346M)
https://github.com/artynet/OpenOCD

(Need to find the correct board or create one for the armv7l eabi chipset, will try the arm_evaluator7t.cfg for now)
Run openocd using the arm board
```bash
openocd -f openocd/tcl/board/arm_evaluator7t.cfg
```

