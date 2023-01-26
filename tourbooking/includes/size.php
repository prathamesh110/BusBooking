<?php
$(document).ready(function () {
 let viewport = getViewport()
 let debounce
  $(window).resize(() => {
    debounce = setTimeout(() => {
      const currentViewport = getViewport()
      if (currentViewport !== viewport) {
        viewport = currentViewport
        $(window).trigger('newViewport', viewport)
      }
    }, 500)
  })
  $(window).on('newViewport', (viewport) => {
    // do something with viewport
  })
  // run when page loads
  $(window).trigger('newViewport', viewport)
}

?>