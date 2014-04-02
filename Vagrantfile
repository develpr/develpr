# -*- mode: ruby -*-
# vi: set ft=ruby :

$project_name = 'develpr'

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"
  
   config.hostmanager.enabled = true
   config.hostmanager.manage_host = true
   config.hostmanager.aliases = %w(www.develpr.dev)

  config.vm.hostname = "#{$project_name}.dev"

  config.vm.network :private_network, ip: "192.168.144.100"

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  config.vm.synced_folder "sites-available", "/root/sites-available",
    :owner=>'root', :group=>'root', :mount_options=>['dmode=775,fmode=775']
  config.vm.synced_folder "www", "/var/www",
    :owner=>'www-data', :group=>'www-data', :mount_options => ['dmode=775,fmode=775']

  config.vm.provision :shell, :path => "bootstrap.sh"

end
