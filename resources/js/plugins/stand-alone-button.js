(function( $ ){

  $.fn.filemanager = function(type, options) {
    type = type || 'file';

    // $("#lm").on("click", function() {
		
      var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
      var target_input = $('#thumbnail');
      var target_preview = $('#holder');
      var thumbnail2 = $('#thumbnail2');
      window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
      window.SetUrl = function (items) {
        var file_path = items.map(function (item) {
          return item.url;
        }).join(',');

        // set the value of the desired input to image url
        target_input.val('').val(file_path).trigger('change');
        $('#thumbnail2').trigger('change');
		
		
        window.inputVal=file_path;

        // clear previous preview
        target_preview.html('');

        // set or change the preview image src
        items.forEach(function (item) {
          target_preview.append(
            $('<img>').css('height', '5rem').attr('src', item.thumb_url)
          );
        });

        // trigger change event
        target_preview.trigger('change');
      };
      return false;
    //});
  }

})(jQuery);
