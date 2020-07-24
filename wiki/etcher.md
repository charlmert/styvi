
```sh
diskutil list
```

/dev/disk0 (internal, physical):
   #:                       TYPE NAME                    SIZE       IDENTIFIER
   0:      GUID_partition_scheme                        *250.1 GB   disk0
   1:                        EFI EFI                     209.7 MB   disk0s1
   2:                 Apple_APFS Container disk1         249.8 GB   disk0s2

/dev/disk1 (synthesized):
   #:                       TYPE NAME                    SIZE       IDENTIFIER
   0:      APFS Container Scheme -                      +249.8 GB   disk1
                                 Physical Store disk0s2
   1:                APFS Volume Mac SSD - Data          228.5 GB   disk1s1
   2:                APFS Volume Preboot                 25.5 MB    disk1s2
   3:                APFS Volume Recovery                523.5 MB   disk1s3
   4:                APFS Volume VM                      7.1 GB     disk1s4
   5:                APFS Volume Mac SSD                 10.8 GB    disk1s5

/dev/disk2 (disk image):
   #:                       TYPE NAME                    SIZE       IDENTIFIER
   0:      GUID_partition_scheme                        +246.1 MB   disk2
   1:                  Apple_HFS balenaEtcher 1.5.100    246.1 MB   disk2s1

/dev/disk3 (external, physical):
   #:                       TYPE NAME                    SIZE       IDENTIFIER
   0:     Apple_partition_scheme                        *8.0 GB     disk3
   1:        Apple_partition_map                         4.1 KB     disk3s1
   2:                  Apple_HFS                         2.9 MB     disk3s2

```sh
diskutil eraseDisk free UNTITLED /dev/disk2
```
