# Enable IMA in your kernel (debian 10)

Linux desktop 4.19.0-13-amd64 #1 SMP Debian 4.19.160-2 (2020-11-28) x86_64 GNU/Linux
4.19.0-13-amd64

Install the dependancies and the linux-source (the linux kernel sources for your version of debian)

```sh
sudo apt-get install build-essential linux-source bc kmod cpio flex libncurses5-dev libelf-dev libssl-dev
```

Extract the kernel sources

```sh
tar xavf /usr/src/linux-source-4.19.tar.xz
```

CD into the extracted sources directory

```sh
cd linux-source-4.19
```

Copy the base config from the previouse debian install to the .config file in the current directory

```sh
cp /boot/config-4.19.0-13-amd64 .config
```


Edit .config and make sure the following kernel options read as follows

```sh
# For IMA
CONFIG_INTEGRITY=y
CONFIG_IMA=y
CONFIG_IMA_MEASURE_PCR_IDX=10
CONFIG_IMA_AUDIT=y
CONFIG_IMA_LSM_RULES=y

# For IMA-appraisal
CONFIG_INTEGRITY_SIGNATURE=y
CONFIG_INTEGRITY=y
CONFIG_IMA_APPRAISE=y

# For EVM
CONFIG_TCG_TPM=y

CONFIG_KEYS=y
CONFIG_TRUSTED_KEYS=y
CONFIG_ENCRYPTED_KEYS=y

CONFIG_INTEGRITY_SIGNATURE=y
CONFIG_INTEGRITY=y
CONFIG_EVM=y

# For ima-ng and ima-sig
CONFIG_IMA_NG_TEMPLATE=y
CONFIG_IMA_DEFAULT_TEMPLATE="ima-ng"
CONFIG_IMA_DEFAULT_HASH_SHA256=y
```

Make concurrently
Answer the kernel config questions with yes to all and the default locations for the keys

```sh
make -j $(nproc)
```

Install the new kernel modules

```sh
sudo make modules_install
```

Install the kernel

```sh
sudo make install
```
