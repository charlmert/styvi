#~/bin/bash

usage() { echo "Usage: $0 [-d <number>] [-l]" 1>&2; exit 1; }

while getopts ":d:" o; do
    case "${o}" in
        d)
            d=${OPTARG}
            ;;
    esac
done
#shift $((OPTIND-1))

echo "d = ${d}"
if [[ " $@ " =~ "-l " ]]; then
   rm -f /tmp/chrome_versions.txt
   rm -f /tmp/chrome_versions_actionable.txt
   wget -O "/tmp/chrome_versions.txt" "https://snapshot.debian.org/package/chromium/"
   cat /tmp/chrome_versions.txt | grep '<li><a href=' | awk -F '"' '{print $2}' | tr -d '/' | perl -ne 'print $.,"\: ", $_' >> /tmp/chrome_versions_actionable.txt
   cat /tmp/chrome_versions_actionable.txt
elif [ ! -z "${d}" ]; then
   rm -f /tmp/chrome_versions.txt
   rm -f /tmp/chrome_versions_actionable.txt
   wget -O "/tmp/chrome_versions.txt" "https://snapshot.debian.org/package/chromium/"
   cat /tmp/chrome_versions.txt | grep '<li><a href=' | awk -F '"' '{print $2}' | tr -d '/' | perl -ne 'print $.,"\: ", $_' >> /tmp/chrome_versions_actionable.txt
   version=`cat /tmp/chrome_versions_actionable.txt | grep -E "^${d}:" | sed 's/.*: //' | tr -d '\n'`
   echo "wget https://dl.google.com/linux/chrome/deb/pool/main/g/google-chrome-stable/google-chrome-stable_"$version"_amd64.deb"
   wget "https://dl.google.com/linux/chrome/deb/pool/main/g/google-chrome-stable/google-chrome-stable_"$version"_amd64.deb"
else
   usage
fi


