# Build g++ 11 for armv7l-eabi
https://preshing.com/20141119/how-to-build-a-gcc-cross-compiler/

```bash
wget http://ftpmirror.gnu.org/binutils/binutils-2.24.tar.gz
wget http://ftpmirror.gnu.org/gcc/gcc-4.9.2/gcc-4.9.2.tar.gz
wget https://www.kernel.org/pub/linux/kernel/v2.6/linux-2.6.36.tar.xz
#wget http://ftpmirror.gnu.org/glibc/glibc-2.20.tar.xz
wget https://www.uclibc.org/downloads/uClibc-0.9.32.1.tar.xz
wget http://ftpmirror.gnu.org/mpfr/mpfr-3.1.2.tar.xz
wget http://ftpmirror.gnu.org/gmp/gmp-6.0.0a.tar.xz
wget http://ftpmirror.gnu.org/mpc/mpc-1.0.2.tar.gz
wget ftp://gcc.gnu.org/pub/gcc/infrastructure/isl-0.12.2.tar.bz2
wget ftp://gcc.gnu.org/pub/gcc/infrastructure/cloog-0.18.1.tar.gz
```

extract all
```bash
for f in *.tar*; do tar xf $f; done
```

create needed symbolic links from within gcc directory
```bash
cd gcc-4.9.2
ln -s ../mpfr-3.1.2 mpfr
ln -s ../gmp-6.0.0 gmp
ln -s ../mpc-1.0.2 mpc
ln -s ../isl-0.12.2 isl
ln -s ../cloog-0.18.1 cloog
cd ..
```

create build/installation directory

```bash
sudo mkdir -p /opt/cross
sudo chown charl /opt/cross
export PATH=/opt/cross/bin:$PATH
```

This step builds and installs the cross-assembler, cross-linker, and other tools.

```bash
mkdir build-binutils
cd build-binutils
#../binutils-2.24/configure --prefix=/opt/cross --target=armv7l-eabi --disable-multilib
../binutils-2.24/configure --prefix=/opt/cross --target=armv7l-eabi --disable-multilib --disable-werror
make -j4
make install
cd ..
```

get the linux arch
```bash
cd linux-2.6.36
ls -1 arch/
cd ../
```

install linux kernel headers
```bash
cd linux-2.6.36
make ARCH=arm INSTALL_HDR_PATH=/opt/cross/armv7l-eabi-linux headers_install
cd ..
```

patch gcc
```bash
cd ../gcc-4.9.2
wget https://gcc.gnu.org/git/?p=gcc.git;a=commitdiff_plain;h=ec1cc0263f156f70693a62cf17b254a0029f4852 -O patch.txt
patch -p0 -i patch.txt
cd ..
```

build gcc c and g++ cross compilers

```bash
mkdir -p build-gcc
cd build-gcc
../gcc-4.9.2/configure --prefix=/opt/cross --target=armv7l-eabi --enable-languages=c,c++ --disable-multilib
make -j4 all-target-libgcc
make install-target-libgcc
CPPFLAGS='-I/opt/cross/lib/gcc/armv7l-eabi/4.9.2/include' LDFLAGS='-l/opt/cross_compile/uClibc-0.9.32.1/lib/libuClibc-0.9.32.1.so' ../gcc-4.9.2/configure --prefix=/opt/cross --target=armv7l-eabi --enable-languages=c,c++ --disable-multilib
make -j4 all-gcc
make install-gcc
cd ..
```

Standard C Library and Startup Files

```bash
mkdir -p build-uclibc
cd build-uclibc
cd ../uClibc-0.9.32.1/

# set the first bin path searched to the binutils generated for arm, e.g. strip for arm will be the default strip 
export PATH=/opt/cross/armv7l-eabi/bin:$PATH
make CROSS=arm-uclibc-linux-2.6.36- PREFIX=/home/vagrant/tmp

#make CC=/opt/cross/bin/armv7l-eabi-gcc CXX=/opt/cross/bin/armv7l-eabi-cpp LD=/opt/cross/bin/armv7l-eabi-ld STRIP=/opt/cross/bin/armv7l-eabi-strip AS=/opt/cross/bin/armv7l-eabi-as
#(create .config file from gui)

#cp -frv /opt/cross_compile/uClibc-0.9.32.1/include/ /opt/cross/armv7l-eabi-linux/include
make install-bootstrap-headers=yes install-headers
make -j4 csu/subdir_lib
install csu/crt1.o csu/crti.o csu/crtn.o /opt/cross/armv7l-eabi-linux/lib
/opt/cross/bin/arm-uclibc-linux-2.6.36-gcc -nostdlib -nostartfiles -shared -x c /dev/null -o /opt/cross/armv7l-eabi-linux/lib/libc.so
touch /opt/cross/aarch64-linux/include/gnu/stubs.h
cd ..
```

equip gcc to compile for the target arch

```bash
cd build-gcc
make CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-gcc CXX=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-g++ -j4 all-target-libgcc
make CC=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-gcc CXX=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-uclibc-linux-2.6.36-g++ -j4 install-target-libgcc
cd ..
```

will stop there, the readme explains how to build the standard c library, in our case clibc, as well.

add the new build toolchain bin dir to the path

If needed rebuild gcc build essentials
```bash
sudo apt-get install --reinstall build-essential
sudo apt-get install --reinstall gcc
sudo dpkg-reconfigure build-essential
sudo dpkg-reconfigure gcc
```

```bash
export PATH=$PATH:/opt/cross/bin
```

compile file
```sh
armv7l-eabi-gcc -I/opt/cross/armv7l-eabi-linux/include -I/usr/arm-linux-gnueabi/include/ -c main.c
```

# Getting the structs used by the library

https://github.com/ampotos/dynStruct
git clone https://github.com/ampotos/dynStruct.git dynstruct

wget https://github.com/DynamoRIO/dynamorio/releases/download/release_7.1.0/DynamoRIO-ARM-Linux-EABIHF-7.1.0-1.tar.gz

#export DYNAMORIO_HOME=/opt/dynamorio-arm && CFLAGS="-W -Wall -Wextra -std=gnu99 -nostdlib -fno-builtin -O3 -m32 -DBUILD_32" CXXFLAGS=-m32  -DDynamoRIO_DIR=$DYNAMORIO_HOME/cmake ../ && make && cp libdynStruct.so ../dynstruct

git clone https://github.com/DynamoRIO/dynamorio.git
mkdir build
cmake -DCMAKE_OSX_ARCHITECTURES=armv7l-eabi -DCMAKE_CXX_FLAGS="" -DCMAKE_C_FLAGS="" -DCMAKE_SYSTEM_PROCESSOR=arm -DCMAKE_CXX_COMPILER=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-g++ -DCMAKE_CC_COMPILER=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-gcc -DCMAKE_C_LINK_EXECUTABLE=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-ld -DCMAKE_CXX_LINK_EXECUTABLE=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-ldd -DCMAKE_TOOLCHAIN_FILE=../make/toolchain-arm32.cmake -DCMAKE_FIND_ROOT_PATH=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/ ../
cd ../
make -j

# optional cmake: -DBUILD_STATIC_LIBS=ON
export DYNAMORIO_HOME=/opt/dynamorio-arm-eabihf/ && cmake -DCMAKE_OSX_ARCHITECTURES=armv7l-eabi -DCMAKE_CXX_FLAGS="-m32" -DCMAKE_C_FLAGS="-m32" -DCMAKE_SYSTEM_PROCESSOR=arm -DCMAKE_CXX_COMPILER=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-g++ -DCMAKE_CC_COMPILER=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-gcc -DCMAKE_C_LINK_EXECUTABLE=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-ld -DCMAKE_CXX_LINK_EXECUTABLE=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-ldd -DDynamoRIO_DIR=$DYNAMORIO_HOME/cmake

cmake -DCMAKE_OSX_ARCHITECTURES=armv7l-eabi -DCMAKE_CXX_FLAGS="" -DCMAKE_C_FLAGS="" -DCMAKE_SYSTEM_PROCESSOR=arm -DTARGET_ABI=uclibc-linux-2.6.36 -DCMAKE_TOOLCHAIN_FILE=/opt/dynamorio/make/toolchain-arm32.cmake -DCMAKE_FIND_ROOT_PATH=/opt/brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/ -DCMAKE_CXX_FLAGS='--disable-multilib' -DCMAKE_C_FLAGS='--disable-multilib' ../

#apt-get install -fy uclibc-source
apt-get install gcc-multilib

# Dissasemble, get symbols / assembler from library
./brcm-arm-toolchains/hndtools-arm-linux-2.6.36-uclibc-4.5.3/bin/arm-brcm-linux-uclibcgnueabi-objdump -TD genieacs/libhw_ssp_basic.so > genieacs/libhw_symbols.txt

Get the function arguments
https://stackoverflow.com/questions/16255608/calling-c-functions-from-x86-assembly-language

The following "pushw" of assembler "pushw arg4"
(x86 16 bit = pushl)
(x86 32 bit = pushw) 
```assembler
pushl arg4
pushl arg3
pushl arg2
pushl arg1
call  printSomething
addl  $0x10, %esp
```

Will translate to
```c
printSomething (arg1, arg2, arg3, arg4);
```

To get the types (arm)
```sh
00033ca4 <HW_OS_Mount>:
   33ca4:       e1a0c00d        mov     ip, sp
   33ca8:       e92dd800        push    {fp, ip, lr, pc}
   33cac:       e24cb004        sub     fp, ip, #4
   33cb0:       e24dd008        sub     sp, sp, #8
   33cb4:       e59bc004        ldr     ip, [fp, #4]
   33cb8:       e58dc000        str     ip, [sp]
   33cbc:       ebff8bed        bl      16c78 <g_LockFlag+0x16b64>
   33cc0:       e24bd00c        sub     sp, fp, #12
   33cc4:       e89d6800        ldm     sp, {fp, sp, lr}
   33cc8:       e12fff1e        bx      lr
```

Specifically

```assembler
push    {fp, ip, lr, pc}
```

https://www.cl.cam.ac.uk/~fms27/teaching/2001-02/arm-project/02-sort/apcs.txt

Interresting registers
```assembler
General Registers
.................

    Name    Number      APCS Role

    a1      0           argument 1 / integer result / scratch register
    a2      1           argument 2 / scratch register
    a3      2           argument 3 / scratch register
    a4      3           argument 4 / scratch register

    v1      4           register variable
    v2      5           register variable
    v3      6           register variable
    v4      7           register variable
    v5      8           register variable

    sb/v6   9           static base / register variable
    sl/v7   10          stack limit / stack chunk handle / reg. variable
    fp      11          frame pointer
    ip      12          scratch register / new-sb in inter-link-unit calls
    sp      13          lower end of current stack frame
    lr      14          link address / scratch register
    pc      15          program counter
```



```c
#include<stdlib.h>
#include<stdio.h>
#include<dlfcn.h>

int main(int argc, char **argv) {
    void *lib_handle;
    double (*fn)(int*);
    int x;
    char *error;
    lib_handle = dlopen("/lib/libhw_ssp_basic.so", RTLD_LAZY);
    if (!lib_handle)
    {
      fprintf(stderr, "%s\n", dlerror());
      exit(1);
    }
    fn = dlsym(lib_handle, "HW_CONFIG_ReadConfigFile_Ex");
    if ((error = dlerror()) != NULL)
    {
      fprintf(stderr, "%s\n", error);
      exit(1);
    }
    (*fn)(&x);
    printf("Valx=%d\n",x);
    dlclose(lib_handle);

    //HW_CONFIG_ReadConfigFile_Ex
    printf("Testing HW_CONFIG_ReadConfigFile_Ex");
    return 0;
}
```
