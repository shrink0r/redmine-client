# Redmine Client 

*Redmine Client* is a small php5 library that provides an API along with a Cli for interacting with Redmine.

## Installation

This library can be used by integrating it via composer.

Install composer:

```sh
curl -s http://getcomposer.org/installer | php
```

Create a 'composer.json' file with the following content:

```json
{
    "require": {
        "shrink/redmine-client": "*"
    },
    "minimum-stability": "dev"
}
```

Then install via composer:

```sh
php composer.phar install
```

To verify that *redmine-client* has been correctly installed and is working, run:

```sh
./vendor/bin/redmine-client.make test
```

## Usage

### Command Line Interface

Almost all functionality provided by this library is exposed by it's cli.  
For a list of available commands run:

```sh
bin/redmine.console list
```

The *help* and the *list* commands are defaults from the underlying symfony console app.  
All others are *redmine-client* provided commands.  
To find out what a certain command does or how to call it  
simply run the command together with the help option *-h*.

*example for showing the help text of the list-projects command:*
```sh
bin/redmine.console list-projects -h
```

### API

to be done ...