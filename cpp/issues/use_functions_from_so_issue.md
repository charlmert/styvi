See Screenshot 2020-04-20 at 15.39.51.png	Screenshot 2020-04-20 at 15.40.07.png

The binutils compiled perfectly ok the first time round and since then I must have overridden the base cpp binaries used
as the specific peice of code in binutils-2.24/opcodes/arm-dis.c line 2108 now throws an error instead of a warning

../../binutils-2.24/opcodes/arm-dis.c: In function ?print_insn_coprocessor?:
../../binutils-2.24/opcodes/arm-dis.c:2108:20: error: left shift of negative value [-Werror=shift-negative-value]
         imm |= (-1 << 7);
                    ^~

It must have thrown a warning the first time round as I had no issues building it.
Will have to perform everything from scratch.

The real issue is that even if the reverse engineering is a success the correct way to upload the xml config using the correct functions
in the correct way for the huawei will also take a long time to figure out.

So canning this as it is not worthit.
