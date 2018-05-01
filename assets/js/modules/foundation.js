import { Foundation } from 'foundation-sites/js/foundation.core'
import { Tabs } from 'foundation-sites/js/foundation.tabs'

function initFoundation() {
  // Include the Foundation Modules that we'll use in the app
  Foundation.plugin(Tabs, 'Tabs')

  // Add jQuery to Foundation
  Foundation.addToJquery(jQuery)

  // Kick off foundation
  jQuery(document).foundation()
}

export default initFoundation