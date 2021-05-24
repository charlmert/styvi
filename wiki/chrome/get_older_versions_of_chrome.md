# Download older version of google chrome for linux (Debian / Ubuntu)

## Use this script with -l and -d number for listing available version strings and downloading the deb amd 64 package

```bash
./debian_install_previous_chrome.sh  -l
1: 90.0.4430.212-1
2: 90.0.4430.212-1%7Edeb10u1
3: 90.0.4430.93-1
4: 90.0.4430.93-1%7Edeb10u1
5: 90.0.4430.85-1
6: 90.0.4430.85-1%7Edeb10u1
7: 90.0.4430.72-1
8: 89.0.4389.114-1
9: 89.0.4389.114-1%7Edeb10u1
10: 89.0.4389.90-1
11: 89.0.4389.82-1
12: 88.0.4324.182-1
13: 88.0.4324.182-1%7Edeb10u1
```

Select the number e.g. 8 for "89.0.4389.114-1"

```bash
./debian_install_previous_chrome.sh -d8

--2021-05-24 13:47:38--  https://snapshot.debian.org/package/chromium/
Resolving snapshot.debian.org (snapshot.debian.org)... 193.62.202.27, 185.17.185.185, 2001:630:206:4000:1a1a:0:c13e:ca1b, ...
Connecting to snapshot.debian.org (snapshot.debian.org)|193.62.202.27|:443... connected.
HTTP request sent, awaiting response... 200 OK
Length: 8464 (8.3K) [text/html]
Saving to: ‘/tmp/chrome_versions.txt’

/tmp/chrome_versions.txt                             100%[======================================================================================================================>]   8.27K  --.-KB/s    in 0s      

2021-05-24 13:47:39 (128 MB/s) - ‘/tmp/chrome_versions.txt’ saved [8464/8464]

wget https://dl.google.com/linux/chrome/deb/pool/main/g/google-chrome-stable/google-chrome-stable_89.0.4389.114-1_amd64.deb
--2021-05-24 13:47:39--  https://dl.google.com/linux/chrome/deb/pool/main/g/google-chrome-stable/google-chrome-stable_89.0.4389.114-1_amd64.deb
Resolving dl.google.com (dl.google.com)... 172.217.170.78, 2c0f:fb50:4002:800::200e
Connecting to dl.google.com (dl.google.com)|172.217.170.78|:443... connected.
HTTP request sent, awaiting response... 200 OK
Length: 75857544 (72M) [application/x-debian-package]
Saving to: ‘google-chrome-stable_89.0.4389.114-1_amd64.deb’

google-chrome-stable_89.0.4389.114-1_amd64.deb       100%[======================================================================================================================>]  72.34M  3.02MB/s    in 24s     

2021-05-24 13:48:04 (2.98 MB/s) - ‘google-chrome-stable_89.0.4389.114-1_amd64.deb’ saved [75857544/75857544]

```

## Do it manually?
Get the correct version number from

```bash
https://snapshot.debian.org/package/chromium/
```

Replace the VERSION_STRING in the template with the version number

template:
wget https://dl.google.com/linux/chrome/deb/pool/main/g/google-chrome-stable/google-chrome-stable_VERSION_STRING_amd64.deb

e.g.
```bash
wget https://dl.google.com/linux/chrome/deb/pool/main/g/google-chrome-stable/google-chrome-stable_88.0.4324.109-1_amd64.deb
```
