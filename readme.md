# Develpr.com #

##Installing Dev Environment

* Install [Vagrant](http://www.vagrantup.com)
* Install [VirtualBox](https://www.virtualbox.org)
* Install the following Vagrant plugins

This will make sure the guest machine is up to date
`vagrant plugin install vagrant-vbguest`

This will automatically setup your host machine's hosts file so you can access the host via domain
`vagrant plugin install vagrant-hostmanager`

Then, run `vagrant up` to boot up and provision the VM.