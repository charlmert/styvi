# To install fonts on Debian

```sh
cd fonts
mv *.ttf /usr/share/fonts/truetype
cd /usr/share/fonts/truetype
sudo mkfontscale
sudo mkfontdir
sudo fc-cache
xset fp rehash
```
