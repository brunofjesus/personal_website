Ubuntu on HP Pro C640 Chromebook

# [Ubuntu on HP Pro C640 Chromebook](#) &mdash; 16 May, 2022

Some time ago I got an HP Pro C640 Chromebook for a very cheap price, although it is capable of running **Crostini**
I wasn't a huge fan of being locked to a Google account, so I decided to hack  the shit out of it and install a
**Linux Distro**, and after some trial and error I was successful!

## Disclamer

This guide will convert your Chromebook to a "generic" machine, this means that **you will no longer be able to run ChromeOS
after you flash the MrChromebox firmware**.

All of your data will be erased, make sure to backup all of your data before following this guide.

The steps listed in this guide are the ones I followed in order to install **Ubuntu** on my **HP Pro C640 Chromebook**, 
the fact that it worked for me is no guarantee that it will work on your machine as well!

## Step 1: Enable development mode

Before flashing the new firmware you need to gain root access to the ChromeOS system, you can do that by enabling **Developer Mode**.
Enabling this will wipe all your data, so make sure you have a backup.

 - Shut down the Chromebook
 - Press and hold the **esc**, **refresh** and **power** keys at the same time until a white screen saying "**Chrome OS is missing or damaged**" appears.
 - Press **Ctrl** and **D** simultaneously in order for the boot process to continue.
 - You will get a message saying **OS verification is OFF**, press **Ctrl** and **D** simultaneously in order for the boot process to continue.
 - The system will boot into Chrome OS and ask you for your google credentials. **DO NOT LOGIN**

## Step 2: Disable the firmware write protection

Usually Chromebooks do not allow you to write in the firmware flash memory without messing with hardware, the C640 is no exception,
you will need to disconnect the battery in order to remove the firmware write protection.

This official guide gives an explanation on how to do it (removing the back cover was not an easy task on my machine!)

[![HP C640 Teardown](https://img.youtube.com/vi/CTN52CBXzaE/0.jpg)](https://www.youtube.com/watch?v=CTN52CBXzaE)

## Step 3: Flash MrChromebox firmware

In order to be able to boot Linux operating systems we need to install a custom firmware, I used **MrChromebox** for that.

You can check [this page](https://mrchromebox.tech/#fwscript) for more info.