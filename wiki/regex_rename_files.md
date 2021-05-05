find . | grep survey | xargs -I{} rename -n 's/survey/xid/g' {}

