# nizol.net

Source files for http://nizol.net.

## Local set-up

### Bare Metal

The following provides instructions for setting up the website on a local Ubuntu 14.04 machine.

- Install LAMP (Linux-Apache-MySQL-PHP):

  - `sudo apt-get update`
  - `sudo apt-get install lamp-server^`

- Create a custom site in /etc/apache2/sites-available:

  - Copy the default configuration: `cp 000-default.conf nizol.net.conf`
  - Edit nizol.net.conf to point DocumentRoot to the directory storing the website
  - Enable the site: `sudo a2dissite 000-default && sudo a2ensite nizol.net`

- Update /etc/apache2/apache2.conf:
  - Add `Servername localhost` under "Global Configuration"
  - Add the following Directory directive:

>        <Directory /path/to/local/website>
>          Options Indexes FollowSymLinks
>          Order allow,deny
>          AllowOverride All
>          Allow from All
>          Require all granted
>        </Directory>

- Ensure apache has access to the local website

  - Add your username to the www-data group: `sudo usermod -a -G www-data username`
  - Log off and log back on
  - Change permissions on the website directory: `chmod -R 2750 /path/to/local/website`

- Enable mod_rewrite: `sudo a2enmod rewrite`

- Restart apache: `service apache2 restart`

- Direct the browser to localhost

### Docker

To run the site in Docker, run `make serve`.
