jQuery(document).ready(function($){

  var mediaUploader;

  $('#uploadButton').click(function(e) {
    e.preventDefault();
    // If the uploader object has already been created, reopen the dialog
      if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    // Extend the wp.media object
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
      text: 'Choose Image'
    }, multiple: false });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploader.on('select', function() {
      var attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#imageURL').val(attachment.url);
      $('#imgPreview').attr('src', attachment.url);
    });
    
    // Open the uploader dialog
    mediaUploader.open();
  });
  
  
  var mediaUploaderHeaderImage;

  $('#uploadButtonHeader').click(function(e) {
    e.preventDefault();
    // If the uploader object has already been created, reopen the dialog
      if (mediaUploaderHeaderImage) {
      mediaUploaderHeaderImage.open();
      return;
    }
    // Extend the wp.media object
    mediaUploaderHeaderImage = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
      text: 'Choose Image'
    }, multiple: false });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploaderHeaderImage.on('select', function() {
      var attachment = mediaUploaderHeaderImage.state().get('selection').first().toJSON();
      $('#imageURLHeader').val(attachment.url);
      $('#imgPreviewHeader').attr('src', attachment.url);
    });
    
    // Open the uploader dialog
    mediaUploaderHeaderImage.open();
  });
  
  var mediaUploaderPersonImage;

  $('#uploadButtonPerson').click(function(e) {
    e.preventDefault();
    // If the uploader object has already been created, reopen the dialog
      if (mediaUploaderPersonImage) {
      mediaUploaderPersonImage.open();
      return;
    }
    // Extend the wp.media object
    mediaUploaderPersonImage = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
      text: 'Choose Image'
    }, multiple: false });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploaderPersonImage.on('select', function() {
      var attachment = mediaUploaderPersonImage.state().get('selection').first().toJSON();
      $('#imageURLPerson').val(attachment.url);
      $('#imgPreviewPerson').attr('src', attachment.url);
    });
    
    // Open the uploader dialog
    mediaUploaderPersonImage.open();
  });
  
  var mediaUploaderFooterLogo;

  $('#uploadButtonLogo').click(function(e) {
    e.preventDefault();
    // If the uploader object has already been created, reopen the dialog
      if (mediaUploaderFooterLogo) {
      mediaUploaderFooterLogo.open();
      return;
    }
    // Extend the wp.media object
    mediaUploaderFooterLogo = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
      text: 'Choose Image'
    }, multiple: false });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploaderFooterLogo.on('select', function() {
      var attachment = mediaUploaderFooterLogo.state().get('selection').first().toJSON();
      $('#imageURLLogo').val(attachment.url);
      $('#imgPreviewLogo').attr('src', attachment.url);
    });
    
    // Open the uploader dialog
    mediaUploaderFooterLogo.open();
  });
  
  
});