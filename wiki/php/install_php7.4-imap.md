# Issue
Err:4 https://packages.sury.org/php buster InRelease
  The following signatures were invalid: EXPKEYSIG B188E2B695BD4743 DEB.SURY.ORG Automatic Signing Key <deb@sury.org>
Fetched 409 kB in 2s (253 kB/s)  
Reading package lists... Done
W: An error occurred during the signature verification. The repository is not updated and the previous index files will be used. GPG error: https://packages.sury.org/php buster InRelease: The following signatures were invalid: EXPKEYSIG B188E2B695BD4743 DEB.SURY.ORG Automatic Signing Key <deb@sury.org>
W: Failed to fetch https://packages.sury.org/php/dists/buster/InRelease  The following signatures were invalid: EXPKEYSIG B188E2B695BD4743 DEB.SURY.ORG Automatic Signing Key <deb@sury.org>
W: Some index files failed to download. They have been ignored, or old ones used instead.

# Solution
sudo wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
