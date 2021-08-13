# How to run older versions of Internet Explorer ie on linux

Install winetricks:

```bash
cd "${HOME}/Downloads"
wget  https://raw.githubusercontent.com/Winetricks/winetricks/master/src/winetricks
chmod +x winetricks
sudo mv winetricks /usr/local/bin
```

And then run by pasting the following into a terminal with user level (non root) access.

To run ie 8

```bash
WINEPREFIX=~/.wine32ie8 WINEARCH=win32 winetricks ie8 crypt32
```

To run ie 7

```bash
WINEPREFIX=~/.wine32ie7 WINEARCH=win32 winetricks ie7
```

## References

- https://www.rdeeson.com/weblog/126/how-to-run-internet-explorer-7-8-and-9-in-linux-with-or-without-wine
- https://wiki.winehq.org/Winetricks
