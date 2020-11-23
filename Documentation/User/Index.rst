.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _user-manual:

Users Manual
============

Target group: **Editors**

Here should be described how to use the extension from the editor perspective.

Here is how the extension is intended to use:

How does it work?
-----------------

- Add a new folder in the tree on the left and another one in the files module. You want to keep your TYPO3 instance nice and tidy;)

- Upload some images to the new folder in the file module. You will need them in the following steps.

- Add a new 'Advent Calendar' to your tree folder in the list module via the plus button in the top.

- Pick a background image for your calendar.

- Add the first door to your calendar and add a new content element to it.

- Click 'save' to have a preview of your calendar on the left side.

- Create the page which will contain the calendar in the front end.

- Add an extension template to your new page to include the Advent Calendar template object.  (You might have to ask your administrator to do this.)

.. figure:: ../Images/UserManual/includetemplate.png
   :width: 500px
   :alt: Include the Advent Calendar template

   Include the Advent Calendar template (You might have to ask your administrator to do this.)


- Add a plugin to your new page via the Page module.

- In the plugin configuration pick the calendar you just created.

- The storage record page is the folder the calender is stored in.

.. figure:: ../Images/UserManual/plugin.png
   :width: 500px
   :alt: Include the Advent Calendar template

   That's who I set up my plugin.

- Save and check the page in the front end.

- Go back to your new folder in the list view and build a nice advent calendar


.. tip::

   Do not create new doors outside a calendar. They won't show up for anyone in the front end and will clutter your back end.


.. _user-faq:

FAQ
---

**Why is the door in the front end not opening? Im trying really hard!**

Check todays date! If the current day of the month is smaller than the number on the closed door it won't open. Change the number of the door temprarily to check if the result meets your expactation and change it back or manipulate your browser time. Thats something you shouldn't forget to change back too.

For customizations drop me some lines to frank[twisty A]hasenbalg[dot]org

Ask me on `github<https://github.com/hasenbalg/hasenbalg_adventcal/issues>`.

Possible subsection: FAQ
