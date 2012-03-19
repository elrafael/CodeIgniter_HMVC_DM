CodeIgniter + Modular Extensions + DataMapper
=============================================

This repository is only for start-up developing.

Put inside that the most libraries that I use for
my projects.

You can check the documentation of the libraries
included

* [datamapper](http://datamapper.wanwizard.eu/) - DataMapper ORM
* [modular_extesions](https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc/wiki/Home) - Modular Extensions
* [template_library](http://maestric.com/doc/php/codeigniter_template) - A very simple and objective template library

Virtual Hosts
-------------

You can see that I'm using www **public folder**
instead putting index.php in the same level that
*application* and *system* folders.

To do that way, you'll need to change *index.php*
file and set the right path for these folders, ie:

	$system_path = '../system';

and

	$application_folder = '../application';

You'll need to change your Apache Virtual Hosts file
and your OS hosts file.

If you are using UNIX based system, probably your
hosts file will be inside */etc/* folder.

	127.0.0.1	codeigniter.dev #Just an example

And your Apache's virtual hosts maybe look like this:

	NameVirtualHost *:80
	<Directory "/Applications/MAMP/htdocs/codeigniter/www/">

	</Directory>
	<VirtualHost *:80>
	        ServerName "codeigniter.dev"
	        DocumentRoot "/Applications/MAMP/htdocs/codeigniter/www"
	</VirtualHost>

Now you can access your project in this address: **http://codeigniter.dev**

### MAC OS X

Avoid using **.local** in the end of virtual host. Unless you like waiting
a lot every refresh.


DataMapper
----------

Change the ``application/config/database.php``

Session
-------

Change the ``application/config/config.php`` and set the desired *encryption_key* ``$config['encryption_key'] = md5('shazaan');``

UTF-8 Problem in MAC OS X
-------------------------

If you pretend to use accentuation, change the *charset*
inside ``application/config/config.php`` file to lowercase

	$config['charset'] =  'utf-8'; //Instead UTF-8

