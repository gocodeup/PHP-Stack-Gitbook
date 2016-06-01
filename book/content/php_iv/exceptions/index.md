# Exceptions

We have seen notices, warnings, errors, and fatal errors in our examples. We have even used them to our advantage, using `require` to create an error when it fails to load a file, versus using `include` that would only yield a warning.

It is not just PHP's internal functions that get this great power, we have the ability to create our own custom errors and generate them when we need to using *exceptions*.
