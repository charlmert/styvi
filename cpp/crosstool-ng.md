# Use crosstool-ng to create custom toolchains

Clone the repo
```sh
git clone https://github.com/crosstool-ng/crosstool-ng
```

Run bootstrap before configure
```sh
./bootstrap
```

Install debian deps
```sh
apt-get install -fy bison flex texinfo unzip help2man gawk
```

Configure and install, set path
```sh
./configure --prefix=/some/place
make
make install
export PATH="${PATH}:/some/place/bin"
```

Make use of this gist to match armv7l-eabi (linux_arm_32v7.config)
https://gist.github.com/gustavsl/831d4292eddaf5d7aab63692e5279035

My goal is to get armv7l-eabi arm32 support for g++ -std=cpp11 standard to compile dynamorio
