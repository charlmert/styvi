# view files to rename
find . | grep survey | xargs -I{} rename -n 's/survey/xid/g' {}

# actually rename files
find . | grep survey | xargs -I{} rename 's/survey/xid/g' {}
