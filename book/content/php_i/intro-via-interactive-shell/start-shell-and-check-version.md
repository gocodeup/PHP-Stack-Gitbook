## PHP Interactive Shell

Since PHP 5.1, PHP has shipped with an [interactive shell](http://www.php.net/manual/en/features.commandline.interactive.php).  This allows you to execute PHP code via the terminal without the need to create files or setup web servers.

We will be using our vagrant virtual machine (VM) to interact with PHP.  We will edit our files locally and then run them in the VM.

You can access the VM via secure shell (SSH) by performing the following steps:

1. Open your terminal.
1. Change directory `cd` into the folder containing your `VagrantFile`.
1. Type `vagrant ssh` and then hit enter.

You should now be logged into the VM.

To start PHP's interactive shell, simply pass the `-a` argument.

	$ php -a

This should start the shell:

	$ php -a
	Interactive shell

	php > _

We can execute code in the shell one line at a time and get immediate output.

### Check the version of PHP  in shell

To check the version of PHP that our shell is using, we can use the PHP function `phpversion()` to get our output.

Outputting information can be done may ways in PHP. For example `echo` is a language construct that can be used to output strings.

Let's output our current version of PHP.

	php > echo phpversion();
	5.4.6-1ubuntu1.5

You're version should be `5.4.x` where `x` is a number representing the latest patch release.