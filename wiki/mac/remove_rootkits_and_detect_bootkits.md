# Why

I have been struggling with weird issues, latest of which, regards possible changes to code in files while I'm working on parts of the project. I would run my vuejs app and it would complain about bable strictness. I make the appropriate changes to the needed files to remove the strict checking and it works for a time and then almost by itself, very literraly starts complaining about the strictness again.

While trying to debug the exact conditions under which it would complain about strictness, when it wouldn't and when it just displays warnings, I found that all 3 of these states were reached in one developer server run instance without me having made any changes to the configuration files responsible for strictness behavior, specifically babel strictness.

VueJS dev server would re-build once it detected any changes to any .vue or config files. So if someone were to change any config file while I was browsing the frontend it would break and complain about the strictness.

I have been encountering many similar situations. My celery (https://docs.celeryproject.org/en/stable/django/first-steps-with-django.html) queue implementation stops working without any changes to any code relating to that.
It's as if it was broken by an external factor and I had to replace it with my own database level queueing system.

I have also recorded database passwords being changed at times. I can't be too sure about that one specifically as it's always intended for me to think I've gone mad and I will admit that I am on known medication for a mental disorder called paranoid schizophrenia.

My findings are very much based on facts though I am more hesitant when it comes to reporting things.
My latest findings is that I am facing a very real threat and it's stopping me from completing a very important project for which I have very little time to complete.

# Unfortunately if your mac is bricked by an eufi bootkit

https://discussions.apple.com/thread/7095250

This user complains about the rootkit making it back even after re-installing and it's unfixable, have to get a new mac if this is the case.

He complains that even setting nvram and smc doesn't work, this means that he was trying to re-install his kernel and boot from the new kernel most probably.

Here's a link to the author of the latest bootkit malware including a writeup of this eufi based attack
https://trmm.net/Thunderstrike/

If you have been infected then it would be impossible to re-flash your boot rom as it will only accept firmware from the attacker as the attacker has the rsa key to sign it with.

One could try and flash your macbook with a firmware update from apple and see if it goes through with the installation. If not then it's definitely infected.
https://support.apple.com/en_GB/downloads/macnotebooks

# Unhiding rootkits by installing a newly built kernel.

If you were able to update your mac firmware successfully and only suspect a rootkit of having been installed by other means you can try and re-install your mac or first try to re-install the kernel.

Re-installing the kernel worked for me to unhide rootkits on debian.
https://github.com/charlmert/tor

I was able to see the hidden rootkit files after a proper kernel re-install

I will test a known rootkit on mac as well and present my findings but for now it's possible to re-install the Catalina kernel.

- Build mac os catalina kernel https://github.com/charlmert/styvi/blob/master/wiki/mac/build_catalina.sh

## Activate the new Mac OS kernel

With notes from offensive security

https://www.offensive-security.com/offsec/kernel-debugging-macos-with-sip/

Since the release of macOS Catalina, the / path is mounted as read-only as an additional protection beyond SIP

> sudo mount -uw /

Find the location of the newly built kernel and copy it to the kernel directory whilst renaming the target to kernel.test:
e.g. (copying kernel.test)
> sudo cp /Library/Developer/KDKs/KDK_10.15.4_19E287.kdk/System/Library/Kernels/kernel /System/Library/Kernels/kernel.test

Invalidate the kernel cache (build kernel with extentions linked in):
> sudo kextcache -invalidate /
> sudo kextcache -invalidate /Volumes/Macintosh\ HD

Tell the system to boot into this kernel
> sudo nvram boot-args="kcsuffix=test"

Reboot

# Detecting Rootkits

https://github.com/deeptechlabs/operation51/blob/master/revisiting_osx_rootkits.md

Mac rootkits hide themselves in the following ways:
They hide from kextstat by manipulating the kmod_info_t list (now depricated)

Later techniques involve "Now we must patch an I/O Kit OSArray class called sLoadedKexts to hide from tools that list loaded kernel extensions."

There is commercial spyware called "Crisis" which uses sLoadedKexts to hide.

"Mountain Lion finally introduced kernel ASLR. It might be harder to develop and execute the necessary exploit to install the rootkit but after that it is (mostly) business as usual."

rubilyn rootkit uses the symbol table in memory as of "Lion and below"
https://github.com/nullsecuritynet/tools/tree/master/backdoor/rubilyn
this rootkit won't work on Catalina

# Notes

Mac Catalina SIP (System Integrity Protection)

- Location of kernel and dsym:
> /Library/Developer/KDKs/KDK_10.12.3_16D32.kdk/System/Library/Kernels/kernel
> /Library/Developer/KDKs/KDK_10.12.3_16D32.kdk/System/Library/Kernels/kernel.dSYM

## Library Validation

Mac Catalina Library Validation
- Library validation is how apple allows only signed libraries to be added to the system, it can be disabled:
> sudo defaults write /Library/Preferences/com.apple.security.libraryvalidation.plist DisableLibraryValidation -bool true

# Clean install of mac

https://www.macworld.co.uk/how-to/clean-install-macos-3637409/

- Back up all projects, docker images, virtual machines etc.
- Create Bootable on a 15GB disk
- Install from this disk (hold option key when booting)
- Wipe everything
- Re-install

With a clean version of mac create a volatility profile

- https://github.com/volatilityfoundation/volatility/wiki/Mac
- Note the kernel debug kit: https://ponderthebits.com/2017/02/osx-mac-memory-acquisition-and-analysis-using-osxpmem-and-volatility/

It's possible to now dump memory and perform analysis on it to see everything, even if it was hidden by rootkit activity (need to verify this).




