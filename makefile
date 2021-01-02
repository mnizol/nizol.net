
serve: ## build and run the site in docker \m/
	@docker build -t nizol-net .
	@docker run -v `pwd`:/var/www/html/ -p 8080:80 nizol-net


.PHONY: help

# self documenting makefile. thanks, https://marmelab.com/blog/2016/02/29/auto-documented-makefile.html
help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
