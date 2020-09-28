https://stackoverflow.com/questions/23446635/how-to-download-http-directory-with-all-files-and-sub-directories-as-they-appear

```sh
wget -r -np -nH --cut-dirs=3 -R index.html http://website.co.za/directory-index/
```
