import { Foundation } from 'foundation-sites/js/foundation.core'
import { Tabs } from 'foundation-sites/js/foundation.tabs'

// Include the Tab Module
Foundation.plugin(Tabs, 'Tabs')

// Add jQuery to foundation
Foundation.addToJquery(jQuery)

// Kick off foundation
jQuery(document).foundation()