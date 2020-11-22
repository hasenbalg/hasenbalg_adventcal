.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Administrator Manual
====================

You should install this extension from the `TER<https://extensions.typo3.org/extension/hasenbal_adventcal/>` 


.. _admin-installation:

Installation
------------

This extension does not have any dependencies. I develped it with content elements from Benjamin Kotts Bootstrap Package. Your content elements should work fine too.

To install the extension, perform the following steps:

#. Go to the Extension Manager
#. Install the extension
#. Create an new folder to store the new records
#. Add a calendar with some doors.
#. Load the static template (in an ext+ template on the plugins page to keep the rest lean)

.. _admin-configuration:

Configuration
-------------

* Where and how the extension should be configured? TypoScript? PHP?

* Are there other prerequisite to full fill beforehand?
  For example, configure a setting in a special way somewhere.


I add some PageTS to the record storage folder to keep it tidy for the editos:


.. code-block:: typoscript
   :linenos:
   #clean up list view
   mod.web_list.table.tt_content.hideTable = 1
   mod.web_list.table.tx_hasenbalgadventcal_domain_model_door.hideTable = 1
   mod.web_list.table.backend_layout.hideTable = 1
   mod.web_list.table.sys_note.hideTable = 1
   #keep content elements tidy
   TCEFORM.tt_content.colPos.disabled = 1
   TCEFORM.tt_content.section_frame.disabled = 1
   TCEFORM.tt_content.layout.disabled = 1
   TCEFORM.tt_content.date.disabled = 1
   TCEFORM.tt_content.fe_group.disabled = 1
   TCEFORM.tt_content.starttime.disabled = 1
   TCEFORM.tt_content.endtime.disabled = 1
   TCEFORM.tt_content.editlock.disabled = 1
   TCEFORM.tt_content.tx_gridelements_container.disabled = 1
   TCEFORM.tt_content.tx_gridelements_columns.disabled = 1
   TCEFORM.tt_content.tx_gridelements_columns.disabled = 1
   TCEFORM.tt_content.categories.disabled = 1
   ## Default Image cropping ##
   TCEFORM.sys_file_reference.crop.config.cropVariants.default.selectedRatio = NaN
   TCEFORM.tt_content.CType {
     removeItems = header, image, bullets, table, uploads, multimedia, media, mailform, search, login, menu, shortcut, html, script, splash, div, list, gridelements_pi1, menu_abstract, menu_categorized_content, menu_categorized_pages, menu_pages, menu_subpages, menu_recently_updated, menu_related_pages, menu_section, menu_section_pages, menu_sitemap, menu_sitemap_pages, form_formframework, textmedia, textcolumn, quote, textmedia, bootstrap_package_accordion, bootstrap_package_carousel, bootstrap_package_external_media, bootstrap_package_listgroup, bootstrap_package_panel, bootstrap_package_tab, bootstrap_package_texticon, textteaser
   }
   CEFORM.sys_file_reference.crop.config.cropVariants {
     default {
         title = Normal
         allowedAspectRatios {
             Normal {
                 title = free
                 value = 0
             }
         }
     }
   
Privileges
----------

Nothihg fancy here. Just dont forget to include the content elements for the doors.

.. _admin-faq:

FAQ
---


For customizations drop me some lines to frank[twisty A]hasenbalg[dot]org

Ask me on `github<https://github.com/hasenbalg/hasenbalg_adventcal/issues>`.
