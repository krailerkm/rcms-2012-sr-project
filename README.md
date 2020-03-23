# RCMS v2012

   Abstract. Because the network is currently being expanded. Thus the replacement or additional new device into the network. Give The administrator must have the burden of the increasing number of devices. So the idea is to develop RCMS (Router Configuration and Monitoring System), For administrators to manage device. Monitoring and set to work quick and easy. And Router Configuration and Monitoring System is a web application developed using the techniques AJAX (Asynchronous JavaScript and XML). Integrated with the protocol, SNMP (Simple Network Management Protocol)  and SSH (Secure Shell), And database systems to help the system administrator. Example : user can add devices router to your account. and can be view the status and configure the device. Using protocol SNMP. And SSH for command in the User EXEC.

   Keyword : HTML, PHP, CSS, SNMP, AJAX

   This software was part of Sr. Project when I was at university. Thank you to all who are interested and those who have developed some of the code JS and CSS that I have used as part of my work.

## Installation

Use Yellow dog Updater, Modified (Yum) is the default package manager used in CentOS6 [YUM](https://wiki.centos.org/PackageManagement/Yum) to install foobar.

Pre-Software Request

```
Net-SNMP
Apache 2.2
MySQL 5.1
PHP5
phpMyAdmin
OpenSSH
```

PHP Module Request

```
libssh2
php5-mysql
php5-snmp
```

Import database and table from example database file choice one type of file.

```
1 Log into phpMyAdmin.
2 Select the destination database on the left pane.
3 Click on the Import tab in the top center pane.
4 Under the 'File to import' section, click Browse and locate the file with the .sql to import.
5 Check or uncheck the boxes for 'Partial import' and 'Other options'.
6 From the 'Format' dropdown menu choose 'SQL'.
7 Click the Go button at the bottom to import the database.
```

Import software from this Gidhub to Apache service parth.

```bash
scp /www/* user@192.168.0.1:/var/www/html
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[Unlicense](https://unlicense.org)

## Credit
Thanks to the code for displaying graphs [Highsoft](https://shop.highsoft.com/media/highsoft/Standard-License-Agreement-12.0.pdf) and free website designs [Symisun](http://symisun.com/templates/free/01/) that I have used for my senior project. Thank you so much for making me today!!
