# Redmine Client 

*Redmine Client* is a php5 library that provides an api and cli-tool for interacting with Redmine.  
Development has just started and the current state of the lib is quite incomplete.  

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
Before you can start using the cli you need to create a small config file,  
where you put information on the redmine instance you are targetting etc.

*config.ini*

``ìni
[redmine]
user=clark-kent
password=look-ma-i-can-haz-fly
baseUrl=https://some.redmine.project.base_url/

[cacheSettings]
type=memcache
host=localhost
port=11211
```

Now we're ready to get the cli rocking.  
For a list of available commands run:

```sh
bin/redmine-client.console list
```

The *help* and the *list* commands are defaults from the underlying symfony console app.  
All others are *redmine-client* provided commands.  
To find out what a certain command does or how to call it  
simply run the command together with the help option *-h*.

*example for showing the help text of the list-projects command:*
```sh
bin/redmine-client.console list-projects -h
```

The actually firing the list-projects command with our config looks like this:

``sh
bin/redmine-client.console list-projects config.ini
```

### API

to be done ...

## Development

### Setup

To get started with development first clone this repository:

```sh
git clone git@github.com:shrink/redmine-client.git
```

and then setup your working copy along with the required dependencies:

```sh
make install
```

Verify that everything is installed ok:

```sh
make test
```

### Writing new console commands

to be done ...

### Writing/extending services

to be done ...
