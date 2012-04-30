Development using a virtual machine
###################################

You can set up a development virtual machine for ZF1 unit testing and library 
development following these simple instructions.

1. Install requirements for VM. (Note: these are not required by ZF1 itself)
   - VirtualBox (https://www.virtualbox.org/)
   - Ruby (http://www.ruby-lang.org/)
   - Vagrant (http://vagrantup.com/)

2. Checkout repository to any location
   > svn checkout http://framework.zend.com/svn/framework/standard/branches/rob_allen/ zf1-dev
   > cd zf1-dev
   
3. Start the process by running Vagrant.
   > vagrant up

4. SSH into the VM
   > vagrant ssh

5. Build a version of PHP.
   > php-build.sh 5.3.11
   
5. Select PHP to use:
   > pe 5.3.11

6. Run tests
   > cd /vagrant/tests
   > phpunit --stderr -d memory_limit=-1 Zend/Acl/AllTests.php

   
Notes:
- The VM will be running in the background as VBoxHeadless
- HTTP and SSH ports on the VM are forwarded to localhost (22 -> 2222, 80 -> 8080)
- The zf1-dev directory you checked out will be mounted inside the VM at /vagrant
- You can develop by editing the files you cloned in the IDE of you choice.
- To stop the VM do one of the following:
  > vagrant suspend # if you plan on running it later
  > vagrant halt # if you wish to turn off the VM, but keep it around
  > vagrant destroy # if you wish to delete the VM completely
- Also, when any of of the Puppet manifests change (.pp files), it is a good idea to rerun them:
  > vagrant provision


