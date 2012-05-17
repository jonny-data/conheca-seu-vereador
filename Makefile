# Help is not the default target cause its mainly used as the main
# build command. We're reserving it.
default:
	@echo "Conheça seu Vereador. See 'make help' for instructions."

help:
	@echo "\nConheça seu Vereador Help\n"
	@echo "            help: Shows this message"
	@echo "            test: Run project tests"
	@echo "        coverage: Run project tests and reports coverage status"
	@echo "           clean: Removes code coverage reports"
	@echo "" 

# Phony target so the test folder don't conflict
.PHONY: test
test:
	@cd tests/;phpunit .

coverage:
	@cd tests/;phpunit  --coverage-html=reports/coverage --coverage-text .
	@echo "Done. Reports also available on tests/reports/coverage/index.html"

# Any cleaning mechanism should be here
clean:
	@rm -Rf tests/reports