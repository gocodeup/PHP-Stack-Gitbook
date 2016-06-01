# Virtual Machines

Wikipedia defines a Virtual Machines as:

> a simulation of a particular computer system with specified hardware and software

Virtual Machines (VMs) simulate all of their hardware and software as processes on a host system. A VM is a full computer that runs inside of the host computer. Often, a host system will run one or multiple VMs. Some physical hardware is even specialized to run virtual machines as efficiently as possible.

The host machine accesses the guest VMs through a virtualization layer which is often administered through a hypervisor. The host machine's hypervisor allows users to access and administer their guest virtual machines. Hypervisors can come in the form of a desktop application with a graphical user interface (a GUI), enterprise IT applications, and also web-applications that provide a portal to manage VMs.

## Using VMs in Software Development
Virtual machines are a valuable part of a developer's toolset. Software development teams will often use identical VMs in order to standardize the development environment, control configuration options, and increase the predictability of their debugging efforts.

VMs also keep the development system more separated and safer from changes to the host system. We want to avoid the situation where an operating system update on the host breaks the entire development environment. Additionally, developers will use their own VMs as local web-servers so that they can see, test, and interact with the results of their applications without requiring internet connectivity or hosting. Their VM simulates having a server on the web to host their application. The feedback loop between coding and seeing results is shortened, since their VM is hosting their application locally.

Many developers prefer that their development VM's configuration mirrors their web-server's configuration as much as possible. For instance, developing on a VM that runs Ubuntu Linux version 14.04 and deploying to an Ubuntu Linux server also running 14.04 is preferable to developing on OS X and deploying to a different environment. An ideal situation is the ability to run identical configuration scripts, or sets of configuration instructions, for both the developer's VM and their web-server.

## How We Use VMs in Codeup

Each Codeup student runs a Linux Ubuntu VM on their Mac that is identical to the VM every other student runs. We do this to standardize configuration and dramatically lower the time needed to debug configuration issues. When we deploy Codeup projects to live hosting, we run the same local VM setup scripts on a virtual machine provided by a hosting company.
