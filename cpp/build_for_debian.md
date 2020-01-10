## How to use pkg-config

configure scripts check for package versions

```bash
/usr/bin/pkg-config --libs "pixman-1 >= 0.36.0"
```


## How to use CPPFLAGS and LDFLAGS

LDFLAGS adds lib directories to search in when building
CPPFLAGS adds include / header file directories to search in when building

Recommended LDFLAGS for debian:
```bash
export LDFLAGS='-L/usr/lib/x86_64-linux-gnu/'
```

```bash
export CPPFLAGS='-I/home/foo/sw/include/'
export LDFLAGS='-L/home/foo/sw/lib/'
```

Libraries have been installed in:
   /usr/local/lib

If you ever happen to want to link against installed libraries
in a given directory, LIBDIR, you must either use libtool, and
specify the full pathname of the library, or use the '-LLIBDIR'
flag during linking and do at least one of the following:
   - add LIBDIR to the 'LD_LIBRARY_PATH' environment variable
     during execution
   - add LIBDIR to the 'LD_RUN_PATH' environment variable
     during linking
   - use the '-Wl,-rpath -Wl,LIBDIR' linker flag
   - have your system administrator add LIBDIR to '/etc/ld.so.conf'

See any operating system documentation about shared libraries for
more information, such as the ld(1) and ld.so(8) manual pages.

